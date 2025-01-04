<?php

namespace App\Http\Controllers;

use App\Enums\EnumResponse;
use App\Enums\EnumStateTransfer;
use App\Models\Transfer;
use App\Services\TransferService;
use App\Services\UserService;
use App\Services\WalletService;
use App\Validates\TransferValidate;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class TransferController extends Controller
{
    /**
     * Constructor, set model and repository
     */
    public function __construct() {
        $this->service = new TransferService();
        $this->validate = new TransferValidate();
    }

    /**
     * Do transfer between users
     * @param Request
     * @return string
     */
    public function transfer(Request $request): string {

        try {
            
            $this->return = false;

            //Begin the repositories we uses
            $userService = new UserService();
            $walletService = new WalletService();

            //Validate the value, payee and payer
            $this->validate->validate($request);

            //get the values
            $value = $request->get('value');
            $payer = $request->get('payer');
            $payee = $request->get('payee');

            //verify if exists
            $user_payer = $userService->findUserTypeWallet($payer);
            if (!$user_payer) $this->exception($this->dictionary['error']['getUserPayer']);

            //verify if exists
            $user_payee = $userService->find($payee);
            if (!$user_payee) $this->exception($this->dictionary['error']['getUserPayee']);

            //if payer have money, continuous
            if ($user_payer->value >= $value) {

                //Make the transfer
                $id_transfer = $this->service->makeTranfer($request->all());
                if (!$id_transfer) $this->exception($this->dictionary['error']['getTransfer']);

                //Make the finish transfer
                $response = Http::get(env('MOCK_FINISH_TRANSFER'));

                if ($response->successful() && 
                    $response->object()->message == EnumResponse::AUTORIZED->value) {

                    //Make the Transfer
                    $walletService->updateUserValue($payer,-$value);
                    $walletService->updateUserValue($payee,$value);
                    $this->service->setTransferFinished($id_transfer);

                    //Send the message to users know about the transfer
                    $response = Http::get(env('MOCK_RECEIVED_PAYMENT'));

                    if ($response->successful() && $response->object()->message) $this->return = true;
                    else $this->exception($this->dictionary['error']['sendMessage']);

                } else {

                    //if transfer have error, set in databse is error
                    $this->service->setTransferError($id_transfer);
                    $this->exception($this->dictionary['error']['finishTransfer']);

                }
            } else $this->exception($this->dictionary['error']['dontHaveMoney']);

        } catch(Exception $e) {
            $this->return = $e->getMessage()." - ".$e->getCode();
        }

        return $this->return;
    }

    /**
     * Return transfer of type is finished
     * @param Request
     * @return string
     */
    public function returnTransfer(Request $request): string {
        
        try {

            $this->return = false;

            //Begin the repositories we uses
            $walletService = new WalletService();

            //Validate the value, payee and payer
            $request->validate([
                'id_transfer' => 'required|integer',
            ]);

            //get the values
            $id_transfer = $request->get('id_transfer');

            //verify if exists
            $transfer = $this->service->findWithState($id_transfer);
            if (!$transfer) $this->exception($this->dictionary['error']['getTransferToReturnValues']);
            
            //if transfer state is finished, continuous
            if ($transfer->state == EnumStateTransfer::FINISHED->value) {
                
                //Return the values to owners, and set transfer to returned
                $walletService->updateUserValue($transfer->payer,$transfer->value);
                $walletService->updateUserValue($transfer->payee,-$transfer->value);
                $this->service->setTransferReturned($id_transfer);

                $this->return = true;

            } else $this->exception($this->dictionary['error']['transferNotFinishedToReturnValues']);

        } catch(Exception $e) {
            $this->return = $e->getMessage()." - ".$e->getCode();
        }

        return $this->return;
    }
}
