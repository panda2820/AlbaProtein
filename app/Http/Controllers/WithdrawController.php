<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Withdraw;
use App\Models\User;
use App\Models\Office;
use Illuminate\Support\Str;
use Auth;

class WithdrawController extends Controller
{
    public function withdrawas()
    {
        $withdraws = Withdraw::with('user', 'reference_user')->where('office_id', Auth::user()->office_id)->orderBy('id', 'DESC')->get();
        return view('Office.Screens.Withdraw.Withdraws', get_defined_vars());
    }
    public function pendingWithdrawas()
    {
        $withdraws = Withdraw::with('user', 'reference_user')->where('status', 0)->where('office_id', Auth::user()->office_id)->orderBy('id', 'DESC')->get();
        return view('Office.Screens.Withdraw.PendingWithdraws', get_defined_vars());
    }
    public function completedWithdrawas()
    {
        $withdraws = Withdraw::with('user', 'reference_user')->where('status', 1)->where('office_id', Auth::user()->office_id)->orderBy('id', 'DESC')->get();
        return view('Office.Screens.Withdraw.CompletedWithdraws', get_defined_vars());
    }
    public function declinedWithdrawas()
    {
        $withdraws = Withdraw::with('user', 'reference_user')->where('status', 2)->orderBy('id', 'DESC')->where('office_id', Auth::user()->office_id)->get();
        return view('Office.Screens.Withdraw.DeclinedWithdraws', get_defined_vars());
    }
    public function createWithdraw()
    {
        return view('Office.Screens.Withdraw.CreateWithdraw');
    }
    public function saveWithdraw(Request $request)
    {
        $request->validate([
            'account_id' => 'required',
            'amount' => 'required|numeric',
            'status' => 'required',
            'withdraw_type' => 'required',
        ]);
        if ($request->amount > 0) {
            $user = User::where('account_id', $request->account_id)->first();
            if ($user) {
                if ($request->amount <= $user->account_balance) {
                    $withdraw = new Withdraw();
                    $withdraw->user_id = $user->id;
                    $withdraw->withdraw_id = strtoupper(Str::random(10));
                    $withdraw->amount = $request->amount;
                    $withdraw->status = $request->status;
                    $withdraw->note = $request->note;
                    $withdraw->withdraw_type = $request->withdraw_type;
                    $withdraw->save();
                    $status_name = $request->status == 0 ? "Created" : "Completed";
                    $message = "Withdraw for PKR $request->amount has " . $status_name;
                    $this->transaction($user->id, $message, $request->amount, 0);
                    $user->account_balance -= $request->amount;
                    $user->save();
                    $request->session()->flash('success', $message);
                    return redirect('office/withdraws/all');
                } else {
                    $request->session()->flash('error', "Can withdraw maximum PKR $user->account_balance");
                    return redirect()->back();
                }
            } else {
                $request->session()->flash('error', 'Invalid account ID');
                return redirect()->back();
            }
        } else {
            $request->session()->flash('error', 'Amount cannot be 0 or less');
            return redirect()->back();
        }
    }
    public function approveWithdraw(Request $request)
    {
        $withdraw = Withdraw::find($request->withdraw_id);
        $user = User::find($withdraw->user_id);
        $withdraw->status = 1;
        $withdraw->note = $request->note;
        $withdraw->save();
        $message = "$user->name request for withdraw of PKR $withdraw->amount has been Approved";
        $this->transaction($user->id, $message, $withdraw->amount, 0);
        $message = "Withdraw for PKR $withdraw->amount has marked Completed";
        $request->session()->flash('success', $message);
        return redirect()->back();
    }
    public function declineWithdraw($withdraw_id, Request $request)
    {
        $withdraw = Withdraw::find($request->withdraw_id);
        $withdraw->status = 2;
        $withdraw->note = $request->note;
        $user = User::find($withdraw->user_id);
        $user->account_balance = $user->account_balance + $withdraw->amount;
        $user->save();
        $withdraw->save();
        $message = "$user->name request for withdraw of PKR $withdraw->amount has been Declined";
        $this->transaction($user->id, $message, $withdraw->amount, 1);
        $message = "Withdraw for PKR $withdraw->amount has marked Declined";
        $request->session()->flash('success', $message);
        return redirect()->back();
    }
    public function requestWithdraw(Request $request)
    {
        $request->validate([
            'type' => 'required|numeric|digits_between:1,2',
            'amount' => 'required|numeric',
            'office' => 'required|numeric',
        ]);
        if ($request->amount > 0) {
            $ref_id = 0;
            if ($request->reference_phone) {
                $reference = User::where('email', $request->reference_phone)->first();
                if ($reference) {
                    $ref_id =  $reference->id;
                } else {
                    $request->session()->flash('error', 'Invalid Referece Phone Number');
                    return redirect()->back();
                }
            }
            $user = User::find(Auth::id());
            $office = Office::find($request->office);
            if ($request->type == 1) {
                $balance = $user->account_balance;
            } elseif ($request->type == 2) {
                $balance = $user->reference_balance;
            }
            if ($request->amount <= $balance) {
                $currentDate = date('j');
                $canWithdraw = false;
                if ($request->type == 1) {
                    if (($currentDate >= 1 && $currentDate <= 5) || ($currentDate >= 15 && $currentDate <= 20)) {
                        $canWithdraw = true;
                    }
                } elseif ($request->type == 2) {
                    $canWithdraw = true;
                }
                if ($canWithdraw) {
                    $withdraw = new Withdraw();
                    $withdraw->user_id = Auth::id();
                    $withdraw->withdraw_id = strtoupper(Str::random(10));
                    $withdraw->amount = $request->amount;
                    $withdraw->withdraw_type = $request->type;
                    $withdraw->status = 0;
                    $withdraw->office_id = $request->office;
                    $withdraw->reference_user_id = $ref_id;
                    $withdraw->save();
                    if ($request->type == 1) {
                        $user->account_balance -= $request->amount;
                    } elseif ($request->type == 2) {
                        $user->reference_balance -= $request->amount;
                    }
                    $user->save();
                    $walletType = $request->type == 1 ? "Profit" : "Reference";
                    $message = "$user->name initiated Withdraw request for PKR $request->amount from his $walletType wallet";
                    $this->transaction(Auth::id(), $message, $request->amount, 0);
                    $request->session()->flash('success', $message);
                    return redirect()->back();
                } else {
                    $request->session()->flash('error', 'Invalid Withdraw Request. Try Again.');
                    return redirect()->back();
                }
            } else {
                $request->session()->flash('error', "You can withdraw maximum of PKR $balance");
                return redirect()->back();
            }
        } else {
            $request->session()->flash('error', 'Amount must be greater than 0');
            return redirect()->back();
        }
    }
    public function allWithdraws()
    {
        $withdraws = Withdraw::with('office', 'reference_user')->where('user_id', Auth::id())->orderBy('id', 'DESC')->get();
        return view('User.Screens.Withdraw', get_defined_vars());
    }
}
