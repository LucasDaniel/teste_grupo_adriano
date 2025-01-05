<?php

namespace App\Http\Controllers;

use App\Enums\EnumResponse;
use App\Enums\EnumStateTransfer;
use App\Models\Transfer;
use App\Services\TransferService;
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
    public function transfer(Request $request): string|bool {
        $this->validate->validate($request);
        return $this->service->transferBetweenUsers($request->all());
    }

    /**
     * Return transfer of type is finished
     * @param Request
     * @return string
     */
    public function returnTransfer(Request $request) {
        $this->validate->validateIdTransfer($request);
        return $this->service->returnTransferBetweenUsers($request->all());
    }
}
