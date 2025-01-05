<?php

use App\Http\Controllers\StateTransferController;
use App\Http\Controllers\StateMovimentController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\MovimentController;
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

Route::get('/state_moviment/all',[StateMovimentController::class, 'list']);
Route::get('/state_moviment/{id}',[StateMovimentController::class, 'show']);

Route::get('/user/all',[UserController::class, 'list']);
Route::get('/user/{id}',[UserController::class, 'show']);
Route::post('/user',[UserController::class, 'createNewUser']);

Route::get('/wallet/all',[WalletController::class, 'list']);
Route::get('/wallet/{id}',[WalletController::class, 'show']);

Route::get('/transfer/all',[TransferController::class, 'list']);
Route::get('/transfer/{id}',[TransferController::class, 'show']);
Route::post('/transfer/transfer',[TransferController::class, 'transfer']);
Route::post('/transfer/returnTransfer',[TransferController::class, 'returnTransfer']);

Route::get('/moviment/all',[MovimentController::class, 'list']);
Route::get('/moviment/{id}',[MovimentController::class, 'show']);
Route::post('/moviment/moviment',[MovimentController::class, 'moviment']);
Route::post('/moviment/returnMoviment',[MovimentController::class, 'returnMoviment']);
