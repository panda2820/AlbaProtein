<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\User;
use App\Models\Package;
use App\Models\ActivePackage;
use App\Models\Transaction;
use App\Models\Target;
use Carbon\Carbon;
use Illuminate\Support\Str;

class Kernel extends ConsoleKernel
{
    public function dailyProfitDistribution()
    {
        $users = User::where('user_type', '0')->get();
        $dayNumber = Carbon::now()->format('N');
        foreach ($users as $user) {
            $actives = ActivePackage::with('package')->where('user_id', $user->id)->get();
            foreach ($actives as $active) {
                if ($active->package->type == 0) {
                    $active->completed_days += 1;
                    $active->remaining_days -= 1;
                    if ($dayNumber < 6) {
                        $active->total_return += $active->per_day_profit;
                        $user->account_balance += $active->per_day_profit;
                        $user->save();
                        $transaction = new Transaction();
                        $transaction->user_id = $user->id;
                        $transaction->transaction_id = strtoupper(Str::random(10));
                        $transaction->reason = "PKR $active->per_day_profit returned as daily profit";
                        $transaction->amount = $active->per_day_profit;
                        $transaction->inout = 1;
                        $transaction->after_amount = $user->account_balance;
                        $transaction->save();
                    }
                    $active->save();
                    if ($active->completed_days == $active->total_days) {
                        $user->account_balance += $active->investment;
                        $user->save();
                        $transaction = new Transaction();
                        $transaction->user_id = $user->id;
                        $transaction->transaction_id = strtoupper(Str::random(10));
                        $transaction->reason = "PKR $active->investment returned to your account as the " . $active->package->name . " package is completed";
                        $transaction->amount = $active->investment;
                        $transaction->inout = 1;
                        $transaction->after_amount = $user->account_balance;
                        $transaction->save();
                        $active->delete();
                    }
                } else {
                    $active->completed_days += 1;
                    $active->remaining_days -= 1;
                    $active->save();
                    if ($active->completed_days == $active->total_days) {
                        $user->account_balance += $active->per_day_profit;
                        $user->save();
                        $transaction = new Transaction();
                        $transaction->user_id = $user->id;
                        $transaction->transaction_id = strtoupper(Str::random(10));
                        $transaction->reason = "PKR $active->per_day_profit profit from the package " . $active->package->name;
                        $transaction->amount = $active->per_day_profit;
                        $transaction->inout = 1;
                        $transaction->after_amount = $user->account_balance;
                        $transaction->save();
                        $user->account_balance += $active->investment;
                        $user->save();
                        $transaction = new Transaction();
                        $transaction->user_id = $user->id;
                        $transaction->transaction_id = strtoupper(Str::random(10));
                        $transaction->reason = "PKR $active->investment returned to your account as the " . $active->package->name . " package is completed";
                        $transaction->amount = $active->investment;
                        $transaction->inout = 1;
                        $transaction->after_amount = $user->account_balance;
                        $transaction->save();
                        $active->delete();
                    }
                }
            }
        }
    }

    public function transaction($user_id, $reason, $amount, $inout){
        $user = User::find($user_id);
        $transaction = new Transaction();
        $transaction->user_id = $user_id;
        $transaction->transaction_id = strtoupper(Str::random(10));
        $transaction->reason = $reason;
        $transaction->amount = $amount;
        $transaction->inout = 1;
        $transaction->after_amount = $user->account_balance;
        $transaction->save();
    }

    public function targetReturn(){
        $users = User::where('user_type', 0)->get();
        foreach($users as $user){
            if($user->previous_investment){
                $targetInvestment = $user->previous_investment + (($user->previous_investment * 25) / 100);
                if($targetInvestment >= $user->reference_investment){
                    $profit = ($user->reference_investment * 5) / 100;
                    $user->reference_balance += $profit;
                    $user->save();
                    $this->transaction($user->id, "$$profit amount is received on your target achievement of $targetInvestment", $profit, 1);
                }
            }
        }
    }

    public function monthlyReturn()
    {
        $currentMonth = date('j');
        $previousMonth = Carbon::now()->subMonth()->month;
        $targets = Target::where('month', Carbon::now()->subMonth()->month)->where('status', 0)->get();
        foreach ($targets as $target) {
            $userId = $target->user_id;
            $refActives = ActivePackage::whereMonth('created_at', Carbon::now()->subMonth()->month)->whereHas('user', function ($query) use ($userId) {
                $query->where('parent_id', $userId);
            })->with('user', 'package', 'office')->get();
            $totalInvestmentRef = 0;
            foreach ($refActives as $active) {
                $totalInvestmentRef += $active->total_invested;
            }
            if ($totalInvestmentRef >= $target->target_amount) {
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
                $transaction->wallet_type = 2;
                $transaction->after_amount = $user->reference_balance;
                $transaction->save();
                $target->status = 1;
            } else {
                $target->status = 2;
            }
            $target->save();
        }
        $parents = User::where('user_type', 0)->get();
        foreach ($parents as $parent) {
            $users = User::where('parent_id', $parent->id)->get();
            $totalInvested = 0;
            foreach ($users as $user) {
                $active_packages = ActivePackage::where('user_id', $user->id)->whereMonth('created_at', $previousMonth)->get();
                foreach ($active_packages as $active_package) {
                    $totalInvested += $active_package->total_invested;
                }
            }
            if ($totalInvested > 0) {
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

    // public function leaderProfit()
    // {
    //     $previousMonth = Carbon::now()->subMonth()->month;
    //     $active_packages = ActivePackage::whereMonth('created_at', $previousMonth)->get();
    //     $totalInvestment = 0;
    //     foreach ($active_packages as $package) {
    //         $totalInvestment += $package->total_invested;
    //     }
    //     $profit = ($totalInvestment * 5) / 100;
    //     $user = User::where('is_leader', 1)->first();
    //     $user->reference_balance += $profit;
    //     $user->save();
    //     $transaction = new Transaction();
    //     $transaction->user_id = $user->id;
    //     $transaction->transaction_id = strtoupper(Str::random(10));
    //     $transaction->reason = "PKR $profit added to your reference wallet as 5% of the total investment as you are a leader";
    //     $transaction->amount = $profit;
    //     $transaction->inout = 1;
    //     $transaction->wallet_type = 2;
    //     $transaction->after_amount = $user->reference_balance;
    //     $transaction->save();
    // }

    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $this->dailyProfitDistribution();
        })->everyFiveMinutes();
        $schedule->call(function () {
            $this->targetReturn();
            $users = User::where('user_type', 0)->get();
            foreach($users as $user){
                $user->previous_investment = $user->reference_investment;
                $user->reference_investment = 0;
                $user->save();
            }
        })->hourly();
        // $schedule->call(function () {
        //     $this->dailyProfitDistribution();
        // })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
