<?php

namespace App\Http\Controllers;

use App\Models\ActivePackage;
use App\Models\Office;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Withdraw;
use Illuminate\Support\Facades\Auth;

class OfficeController extends Controller
{
    public function dashboard()
    {
        $activePackages = ActivePackage::where('office_id', Auth::id())->get();
        $totalProfit = 0;
        $dailyProfit = 0;
        foreach ($activePackages as $activePackage) {
            $totalProfit = $totalProfit + $activePackage->total_return;
            $dailyProfit = $dailyProfit + $activePackage->per_day_profit;
        }
        $allOffices = Office::all();
        $overAllInvestment = 0;
        foreach ($allOffices as $office) {
            $overAllInvestment = $overAllInvestment + $office->account_balance;
        }

        $office = Office::find(Auth::user()->office_id);
        $pendingWithdraws = Withdraw::where('office_id', Auth::id())->where('status', '0')->limit(5)->get();
        $withdraws = Withdraw::where('office_id', Auth::id())->orderBy('id', 'DESC')->limit(5)->get();
        $actives = ActivePackage::with('user', 'package')->orderBy('id', 'DESC')->limit(5)->get();
        $users = User::with('parent')->where('user_type', 0)->orderBy('id', 'DESC')->limit(5)->get();
        $transactions = Transaction::with('user')->orderBy('id', 'DESC')->limit(5)->get();
        return view('Office.Screens.Dashboard', get_defined_vars());
    }
}
