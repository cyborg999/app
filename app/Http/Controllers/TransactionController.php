<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    static function print($paymentReceived){
        $transaction = Transaction::create(["userid" => Auth::id(), "total" => 0, "payment_received" => $paymentReceived]);
        
        return $transaction;
    }
}
