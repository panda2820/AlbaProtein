<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use App\Models\Setting;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function meetPrice(){
        $settings = Setting::find(1);
        return $settings->meet_kg;
    }
    
    public function transaction($user_id, $reason, $amount, $inout, $wallet = 1){
        $user = User::find($user_id);
        $transaction = new Transaction();
        $transaction->user_id = $user_id;
        $transaction->transaction_id = strtoupper(Str::random(10));
        $transaction->reason = $reason;
        $transaction->amount = $amount;
        $transaction->inout = $inout;
        $transaction->inout = $inout;
        $transaction->after_amount = $user->account_balance;
        $transaction->wallet_type = $wallet;
        $transaction->save();
        // $this->sendEmail($user_id, $reason, $inout);
    }
    public function uploadImage($request, $image){
        if($request->hasFile($image)){
            $img = $request->file($image);
            $imgName = time() ."-". str_replace(" ", "_", $img->getClientOriginalName());
            $img->move(public_path('uploads'), $imgName);
            return $imgName;
        }else{
            return "default.png";
        }
    }
}
