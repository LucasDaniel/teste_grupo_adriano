<?php

use App\Http\Controllers\StateTransferController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WalletController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/state_transfer/all',[StateTransferController::class, 'list']);
Route::get('/state_transfer/{id}',[StateTransferController::class, 'show']);
Route::delete('/state_transfer/{id}',[StateTransferController::class, 'delete']);
Route::put('/state_transfer/{id}',[StateTransferController::class, 'update']);
Route::patch('/state_transfer/{id}',[StateTransferController::class, 'patch']);
Route::post('/state_transfer',[StateTransferController::class, 'create']);

Route::get('/user/all',[UserController::class, 'list']);
Route::get('/user/{id}',[UserController::class, 'show']);
Route::post('/user',[UserController::class, 'create']);

Route::get('/wallet/all',[WalletController::class, 'list']);
Route::get('/wallet/{id}',[WalletController::class, 'show']);

Route::get('/transfer/all',[TransferController::class, 'list']);
Route::get('/transfer/{id}',[TransferController::class, 'show']);
Route::post('/transfer/transfer',[TransferController::class, 'transfer']);
Route::post('/transfer/returnTransfer',[TransferController::class, 'returnTransfer']);
