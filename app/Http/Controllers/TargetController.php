<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Package;
use App\Models\ActivePackage;
use App\Models\Transaction;
use App\Models\Target;
use Carbon\Carbon;
use Illuminate\Support\Str;

class TargetController extends Controller
{
    public function index(){
        $currentMonth = date('j');
        $previousMonth = Carbon::now()->subMonth()->month;
        $targets = Target::where('month', Carbon::now()->subMonth()->month)->where('status', 0)->get();
        foreach($targets as $target){
            $userId = $target->user_id;
            $refActives = ActivePackage::whereMonth('created_at', Carbon::now()->subMonth()->month)->whereHas('user', function($query) use ($userId) {
                $query->where('parent_id', $userId);
            })->with('user', 'package', 'office')->get();
            $totalInvestmentRef = 0;
            foreach($refActives as $active){
                $totalInvestmentRef += $active->total_invested;
            }
            if($totalInvestmentRef >= $target->target_amount){
                $reward = (5 * $target->achieve_amount) / 100;
                $user = User::find($userId);
                $user->reference_balance += $reward;
                $user->save();
                $transaction = new Transaction();
                $transaction->user_id = $user->id;
                $transaction->transaction_id = strtoupper(Str::random(10));
                $transaction->reason = "PKR $reward added to your reference wallet as 5% of your reference investment of PKR $target->achieve_amount";
                $transaction->amount = $reward;
                $transaction->inout = 1;
                $transaction->after_amount = $user->reference_balance;
                $transaction->save();
                $target->status = 1;
            }else{
                $target->status = 2;
            }
            $target->save();
        }
        $parents = User::where('user_type', 0)->get();
        foreach($parents as $parent){
            $users = User::where('parent_id', $parent->id)->get();
            $totalInvested = 0;
            foreach($users as $user){
                $active_packages = ActivePackage::where('user_id', $user->id)->whereMonth('created_at', $previousMonth)->get();
                foreach($active_packages as $active_package){
                    $totalInvested += $active_package->total_invested;
                }
            }
            if($totalInvested > 0){
                $targetAmount = (20 * $totalInvested) / 100;
                $target = new Target();
                $target->user_id = $parent->id;
                $target->target_amount = $targetAmount;
                $target->achieve_amount = 0;
                $target->completed = 0;
                $target->remaining = $targetAmount;
                $target->month = Carbon::now()->month;
                $target->status = 0;
                $target->save();
            }
        }
    }
}
