<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Setting;
use App\Models\ActivePackage;
use Auth;
use Illuminate\Support\Facades\Crypt;

class PackageController extends Controller
{
    public function allPackages()
    {
        $packages = Package::all();
        return view('Office.Screens.Package.AllPackages', get_defined_vars());
    }

    public function changedata(Request $request)
    {
        $request->validate([
            'update_after' => 'required',
            'meat_kgs' => 'required',
            'profit_per_kg' => 'required',
            'no_days' => 'required',
        ]);
        $packages = Package::find(1);
        $packages->meat_kgs = $request->meat_kgs;
        $packages->update_after = $request->update_after;
        $packages->profit_per_kg = $request->profit_per_kg;
        $packages->no_days = $request->no_days;
        $packages->save();
        $request->session()->flash('success', "Withdrawl Days Changed Successfully");
        return redirect()->back();
    }

    public function packagesPage()
    {
        $packages = Package::all();
        $meetPrice = $this->meetPrice();
        return view('User.Screens.Packages', get_defined_vars());
    }
    public function addUserToPackage($package_id)
    {
        $package = Package::find($package_id);
        $meetPrice = $this->meetPrice();
        return view('Office.Screens.Package.AddUserPackage', get_defined_vars());
    }
    public function activePackages()
    {
        $totalInvestment = 0;
        $totalReturn = 0;
        $active_packages = ActivePackage::with('package', 'office')->where('user_id', Auth::id())->get();
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
        return view('User.Screens.ActivePackages', get_defined_vars());
    }
}
