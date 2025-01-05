<?php

namespace App\Services;

use App\Enums\EnumStateMoviment;
use App\Models\Moviment;
use App\Repositories\MovimentRepository;
use App\Repositories\StateMovimentRepository;
use App\Services\UserService;
use App\Services\WalletService;
use App\Exceptions\GetTransferException;
use App\Exceptions\GetMovimentToReturnValuesException;
use App\Exceptions\MovimentWasReturnedException;

class MovimentService extends BaseService
{
    /**
     * Constructor, set model and repository
     */
    public function __construct() {
        $this->model = new Moviment();
        $this->repository = new MovimentRepository();
    }

    public function movimentUser(array $request): string|bool {

        //Begin the repositories we uses
        $userService = new UserService();
        
        //get the values
        $id_user = $request['id_user'];
        $value = $request['value'];
        $request['id_state_moviment'] = $this->getStateMoviment($value);

        //verify if exists
        $user = $userService->findUserAndWalletByUserId($id_user);

        //if payer have money, continuous
        $userService->verifyUserHaveMoney($user,$value);

        //Create the transfer
        $id_moviment = $this->createMoviment($request);

        //Update values in wallet
        $this->updateUserValue($user->id,$value);

        return true;

    }

    public function returnMovimentUser(array $request): string|bool {

        //Begin the repositories we uses
        $walletService = new WalletService();

        //get the values
        $id_moviment = $request['id_moviment'];

        //verify if exists
        $moviment = $this->verifyMovimentExists($id_moviment);

        //create new moviment
        $_arr['id_user'] = $moviment->id_user;
        $_arr['value'] = -$moviment->value;
        $_arr['id_state_moviment'] = $this->getStateMoviment(-$moviment->value);

        //create new moviment
        $this->createMoviment($_arr);

        //Set before moviment to returned 1
        $this->repository->changeReturnMoviment($id_moviment);
        
        //Return the value to wallet
        $this->updateUserValue($moviment->id_user,-$moviment->value);

        return true;
    }

    private function getStateMoviment($value) {
        $stateMovimentRepository = new StateMovimentRepository();
        if ($value > 0) return $stateMovimentRepository->getIdByStateMoviment(EnumStateMoviment::DEPOSIT->value);
        else return $stateMovimentRepository->getIdByStateMoviment(EnumStateMoviment::WITHDRAW->value);
    }

    private function verifyMovimentExists($id_moviment) {
        $moviment = $this->repository->findWithState($id_moviment);
        if (!$moviment) throw new GetMovimentToReturnValuesException();
        if ($moviment->returned) throw new MovimentWasReturnedException();
        return $moviment;
    }

    private function updateUserValue($id_user,$value) {
        $walletService = new WalletService();
        $walletService->updateUserValue($id_user,$value);
    }

    private function createMoviment($request) {
        $id_moviment = $this->repository->createMoviment($request);
        if (!$id_moviment) throw new GetMovimentException();
        return $id_moviment;
    }

}
