<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActivePackage;
use App\Models\User;
use App\Models\Office;
use App\Models\Package;
use App\Models\Target;
use App\Models\Promo;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;
use Auth;

class ActivePackageController extends Controller
{
    public function allActive()
    {
        $actives = ActivePackage::with('user', 'package')->orderBy('id', 'DESC')->get();
        return view('Office.Screens.Package.ActivePackages', get_defined_vars());
    }

    public function packageInvoice($package_id)
    {
        $active_package = ActivePackage::with('user', 'package', 'office')->find($package_id);
        $encrypted = Crypt::encryptString($active_package->id);
        return view('Office.Screens.Package.Invoice', get_defined_vars());
    }

    public function packageInfo($package_id)
    {
        $pkg_id = Crypt::decryptString($package_id);
        $active_package = ActivePackage::with('user', 'package', 'office')->find($pkg_id);
        return view('Office.Screens.Package.SinglePackage', get_defined_vars());
    }

    public function userPackageInfo($package_id)
    {
        $pkg_id = Crypt::decryptString($package_id);
        $active_package = ActivePackage::with('user', 'package', 'office')->find($pkg_id);
        return view('User.Screens.Invoice', get_defined_vars());
    }

    public function subscribePackage(Request $request)
    {
        $user = User::where('email', $request->email)->where('id', $request->user_id)->first();
        $package = Package::find($request->package_id);
        $office = Office::find(Auth::user()->office_id);
        if ($package->type == 1) {
            $investment = $this->meetPrice() * $request->meat_kgs;
        } else {
            $investment = $this->meetPrice() * $package->meat_kgs;
        }
        $active = new ActivePackage();
        $active->package_id = $request->package_id;
        $active->user_id = $user->id;
        $active->per_day_profit = $package->type == 1 ? ($package->profit_per_kg * $investment) / 100 : ($package->meat_kgs * $package->profit_per_kg);
        $active->profit_per_kg = $package->profit_per_kg;
        $active->price_per_kg = $this->meetPrice();
        $active->total_invested = $investment;
        $active->total_days = $package->no_days;
        $active->completed_days = 0;
        $active->remaining_days = $package->no_days;
        $active->total_return = 0;
        $active->expire_on = date('Y-m-d H:i:s', strtotime(" +$package->no_days days"));
        $active->last_updated = 0;
        $active->give_after = 0;
        $active->office_id = $office->id;
        $active->save();
        $office->account_balance += $investment;
        $office->save();
        $this->distributeProfit($user->id, $investment);
        $this->initialReturn($user->id, $investment);
        $totalMeat = $package->type == 1 ? $request->meat_kgs : $package->meat_kgs;
        $message = "$user->name subscribed package $package->name - $totalMeat KGs with PKR " . $this->meetPrice() . " per kg";
        $this->transaction($user->id, $message, $investment, 0);
        $request->session()->flash('success', $message);
        return redirect('office/packages');
    }

    public function initialReturn($user_id, $amount){
        $user = User::find($user_id);
        if($user->parent_id){
            $parent = User::find($user->parent_id);
            $profit = ($amount * 5) / 100;
            $promo = Promo::where('user_id', $parent->id)->first();
            if(!$promo){
                $promo = new Promo();
                $promo->user_id = $parent->id;
            }
            $promo->amount += $profit;
            $promo->save();
        }
    }

    public function distributeProfit($user_id, $amount)
    {
        $user = User::find($user_id);
        if($user && $user->parent_id){
            $parent = User::find($user->parent_id);
            $parent_actives = ActivePackage::where('user_id', $parent->id)->get();
            if(count($parent_actives) > 0){
                if($parent->is_leader){
                    $profit = (15 * $amount) / 100;
                }else{
                    $profit = (10 * $amount) / 100;
                }
                $parent->reference_balance += $profit;
                $parent->reference_investment += $amount;
                $parent->save();
                $this->transaction($parent->id, "You received PKR $profit on investment PKR $amount by $user->name", $profit, 1);
            }
            if($parent && $parent->parent_id){
                $grandParent = User::find($parent->parent_id);
                $grand_actives = ActivePackage::where('user_id', $grandParent->id)->get();
                if(count($grand_actives) > 0){
                    if($grandParent->is_leader){
                        $profit = (10 * $amount) / 100;
                    }else{
                        $profit = (5 * $amount) / 100;
                    }
                    $grandParent->reference_balance += $profit;
                    $grandParent->reference_investment += $amount;
                    $grandParent->save();
                    $this->transaction($grandParent->id, "You received PKR $profit on investment PKR $amount by $user->name", $profit, 1);
                }
            }
        }
    }
}
