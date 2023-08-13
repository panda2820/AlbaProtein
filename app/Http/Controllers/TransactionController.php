<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Auth;

class TransactionController extends Controller
{
    public function transactionsUser(){
        $transactions = Transaction::where('user_id', Auth::id())->orderBy('id', 'DESC')->get();
        return view('User.Screens.Transactions', get_defined_vars());
    }
}
