<?php

namespace App\Dictionary;

trait Dictionary {

    public $dictionary = [
        'error' => [
            'getUser' => [
                'msg' => "Error on get user!",
                'code' => 502
            ],
            'getTransfer' => [
                'msg' => "Error on get transfer!",
                'code' => 503
            ],
            'getMoviment' => [
                'msg' => "Error on get moviment!",
                'code' => 504
            ],
            'finishTransfer' => [
                'msg' => "Error on finish transfer!",
                'code' => 505
            ],
            'dontHaveMoney' => [
                'msg' => "Don't have money!",
                'code' => 506
            ],
            'valueEqualsZero' => [
                'msg' => "Value to deposit or withdraw is equals zero!",
                'code' => 507
            ],
            'getTransferToReturnValues' => [
                'msg' => "Error on get transfer to return values!",
                'code' => 508
            ], 
            'transferNotFinishedToReturnValues' => [
                'msg' => "Tranfer is not finished to return values!",
                'code' => 509
            ],
            'delete' => [
                'msg' => "Error on get User to delete!",
                'code' => 510
            ], 
            'getMovimentToReturnValues' => [
                'msg' => "Error on get moviment to return value!",
                'code' => 511
            ],
            'movimentWasReturned' => [
                'msg' => "Moviment was returned!",
                'code' => 512
            ],
            'notAuthenticate' => [
                'msg' => "Not Authenticated",
                'code' => 513
            ],
            'expiredAuthenticate' => [
                'msg' => "Expired Token",
                'code' => 514
            ],
        ]
    ];

}
