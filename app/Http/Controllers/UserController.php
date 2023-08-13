<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\ActivePackage;
use App\Models\Transaction;
use App\Models\Target;
use App\Models\Withdraw;
use App\Models\Office;
use App\Models\Promo;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;
use Auth;

class UserController extends Controller
{
    public function users()
    {
        $users = User::with('parent')->where('user_type', 0)->orderBy('id', "DESC")->get();
        return view('Office.Screens.Users.AllUsers', get_defined_vars());
    }
    public function userProfile($user_id)
    {
        $user = User::find($user_id);
        $packages = ActivePackage::with('package')->where('user_id', $user_id)->orderBy('id', 'DESC')->get();
        $referred = User::where('parent_id', $user_id)->orderBy('id', 'DESC')->get();
        $from = User::find($user->parent_id);
        $transactions = Transaction::where('user_id', $user_id)->orderBy('id', 'DESC')->get();
        $withdraws = Withdraw::where('user_id', $user_id)->orderBy('id', 'DESC')->get();
        $lastWithdraw = count($withdraws) > 0 ? $withdraws[count($withdraws) - 1]->created_at : Carbon::now();
        $now = Carbon::now();
        $diff = $lastWithdraw->diffInDays($now);
        return view('Office.Screens.Users.UserProfile', get_defined_vars());
    }
    public function getInfo($phone_number)
    {
        $user = User::with('parent')->where('email', $phone_number)->first();
        if ($user) {
            $withdraws = Withdraw::where('user_id', $user->id)->orderBy('id', 'DESC')->get();
            $lastWithdraw = count($withdraws) > 0 ? $withdraws[count($withdraws) - 1]->created_at : null;
            $now = Carbon::now();
            $diff = "";
            if ($lastWithdraw) {
                $diff = $lastWithdraw->diffInDays($now);
            }
            return get_defined_vars();
        } else {
            return response()->json([
                'message' => 'Invalid phone number. User not found',
            ], 422);
        }
    }
    public function addUserPage()
    {
        return view('Office.Screens.Users.SaveUser');
    }
    public function saveUser(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:8',
            ],
            [
                "email.unique" => "User with this email no already exist"
            ],
        );
        $parent = 0;
        if ($request->reference_id) {
            $request->validate([
                'reference_id' => 'required',
            ]);
            $checkParent = User::where('email', $request->reference_id)->get()->first();

            if ($checkParent) {
                $parent = $checkParent->id;
            } else {
                return redirect()->back()->with('error', 'invalid reference id');
            }
        }
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->account_id = Carbon::now()->timestamp;
        $user->parent_id = $parent;
        $user->email_verified_at = date('Y-m-d H:i:s');
        $user->save();
        $request->session()->flash('success', "User $user->name created successfully");
        return redirect('office/users');
    }
    public function dashboard()
    {
        $user = User::find(Auth::user()->id);
        $promo = Promo::where('user_id', Auth::id())->first();
        if($promo){
            $promo_balance = $promo->amount;
        }else{
            $promo_balance = 0;
        }
        $from = User::find($user->parent_id);
        $referred = User::where('parent_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
        $currentMonth = Carbon::now()->month;
        $totalInvestment = 0;
        $totalReturn = 0;
        $active_packages = ActivePackage::with('package', 'office')->where('user_id', Auth::id())->get();
        $refInvestment = $user->reference_investment;
        $transactions = Transaction::where('user_id', Auth::id())->orderBy('id', 'DESC')->limit(5)->get();
        $withdraws = Withdraw::where('user_id', Auth::id())->orderBy('id', 'DESC')->limit(5)->get();
        $refPackages = ActivePackage::whereMonth('created_at', Carbon::now()->month)->whereHas('user', function ($query) {
            $query->where('parent_id', Auth::id());
        })->with('user', 'package', 'office')->get();
        $nextTarget = $refInvestment + ($refInvestment * 25) / 100;
        $actives = [];
        foreach ($active_packages as $active_package) {
            $package['office_code'] = $active_package->office->office_code;
            $package['package'] = $active_package->package;
            $package['id'] = $active_package->id;
            $package['qr'] = Crypt::encryptString($active_package->id);
            array_push($actives, $package);
            $totalInvestment += $active_package->total_invested;
            $totalReturn += $active_package->total_return;
        }
        $target = Target::where('user_id', Auth::id())->whereMonth('created_at', $currentMonth)->first();
        return view('User.Screens.Dashboard', get_defined_vars());
    }
    public function invitesPage()
    {
        $user = User::find(Auth::id());
        $level1 = User::where('parent_id', Auth::id())->orderBy('id', "DESC")->get();
        $level2 = [];
        foreach($level1 as $usr){
            $children = User::where('parent_id', $usr->id)->orderBy('id', 'DESC')->get();
            foreach($children as $child){
                array_push($level2, $child);
            }
        }
        return view('User.Screens.Invites', get_defined_vars());
    }
    public function walletPage()
    {
        $user = User::find(Auth::id());
        $active_packages = ActivePackage::where('user_id', Auth::id())->get();
        $currentDate = date('j');
        $offices = Office::all();
        return view('User.Screens.Wallet', get_defined_vars());
    }
    public function givePromo($user_id, Request $request){
        $user = User::find($user_id);
        $promo = Promo::where('user_id', $user_id)->first();
        $promoCash = $promo->amount;
        $promo->amount = 0;
        $promo->save();
        $request->session()->flash('success', "PKR $promoCash has been given to $user->name");
        return redirect()->back();
    }
}
