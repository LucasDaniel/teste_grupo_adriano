<?php

namespace App\Services;

use App\Enums\EnumStateTransfer;
use App\Models\Transfer;
use App\Repositories\TransferRepository;
use App\Services\UserService;
use App\Services\WalletService;
use App\Exceptions\GetTransferException;
use App\Exceptions\TransferNotFinishedToReturnValuesException;
use App\Exceptions\GetTransferToReturnValuesException;

class TransferService extends BaseService
{
    /**
     * Constructor, set model and repository
     */
    public function __construct() {
        $this->repository = new TransferRepository();
    }

    public function transferBetweenUsers(array $request): string|bool {

        //Begin the repositories we uses
        $userService = new UserService();
        
        //get the values
        $value = $request['value'];
        $payer = $request['payer'];
        $payee = $request['payee'];

        //verify if exists
        $user_payer = $userService->findUserAndWalletByUserId($payer);
        
        //verify if exists
        $user_payee = $userService->findUserAndWalletByUserId($payee);

        //if payer have money, continuous
        $userService->verifyUserHaveMoney($user_payer,$value);

        //Create the transfer
        $id_transfer = $this->createTransfer($request);

        //Update values in wallets
        $this->updatePayerPayeeValue($payer,$payee,$value);
        $this->repository->setTransferFinished($id_transfer);

        return true;

    }

    public function returnTransferBetweenUsers(array $request): string|bool {

        //Begin the repositories we uses
        $walletService = new WalletService();

        //get the values
        $id_transfer = $request['id_transfer'];

        //verify if exists
        $transfer = $this->verifyTransferExists($id_transfer);

        //if transfer state is finished, continuous
        $this->verifyTransferFinished($transfer);
            
        //Return the values to owners, and set transfer to returned
        $this->updatePayerPayeeValue($transfer->payer,$transfer->payee,-$transfer->value);

        //Set Transfer with stage returned
        $this->repository->setTransferReturned($id_transfer);

        return true;
    }

    private function verifyTransferFinished($transfer) {
        if ($transfer->state != EnumStateTransfer::FINISHED->value) throw new TransferNotFinishedToReturnValuesException();
    }

    private function verifyTransferExists($id_transfer) {
        $transfer = $this->repository->findWithState($id_transfer);
        if (!$transfer) throw new GetTransferToReturnValuesException();
        return $transfer;
    }

    private function updatePayerPayeeValue($payer,$payee,$value) {
        $walletService = new WalletService();
        $walletService->updateUserValue($payer,-$value);
        $walletService->updateUserValue($payee,$value);
    }

    private function createTransfer($request) {
        $id_transfer = $this->repository->createTransfer($request);
        if (!$id_transfer) throw new GetTransferException();
        return $id_transfer;
    }

}
