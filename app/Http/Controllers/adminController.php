<?php

namespace App\Http\Controllers;

use App\Models\ActivePackage;
use App\Models\Office;
use App\Models\Package;
use App\Models\Setting;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Withdraw;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class adminController extends Controller
{
    public function generatePassword($password){
        $encrypted = Hash::make($password);
        echo $encrypted;
    }

    public function dashboard()
    {
        $activePackages = ActivePackage::all(); 
        $withdraws = Withdraw::all();
        $offices = Office::all();

        $totalWithdraws = count($withdraws);
        $totalActivePackages = count($activePackages);
        $totalOffices = count($offices);

        $leader = User::where('is_leader', 1)->first();
        

        $users = User::with('parent')->where('user_type', 0)->orderBy('id', "DESC")->limit(5)->get();
        $officeUsers = User::with('parent')->where('user_type', 1)->orderBy('id', "DESC")->limit(5)->get();
        $offices = Office::with('users')->orderBy('id', "DESC")->limit(5)->get();
        $packages = Package::limit(5)->get();
        $activePackages = ActivePackage::with('user', 'package')->orderBy('id', 'DESC')->limit(5)->get();
        $withdraws = Withdraw::orderBy('id', 'DESC')->limit(5)->get();
        $transactions = Transaction::orderBy('id', 'DESC')->limit(5)->get()->all();
        $overAllInvestment = 0;
        foreach ($offices as $office) {
            $overAllInvestment = $overAllInvestment + $office->account_balance;
        }
        return view('Admin.Dashboard', get_defined_vars());
    }
    public function removeLeader($leader_id){
        $user = User::find($leader_id);
        $user->is_leader = 0;
        $user->save();
        return redirect('admin/dashboard');
    }
    public function makeLeader($user_id){
        $leader = User::where('is_leader', 1)->first();
        $leader->is_leader = 0;
        $leader->save();
        $user = User::find($user_id);
        $user->is_leader = 1;
        $user->save();
        return redirect('admin/dashboard');
    }
    public function chooseLeaderScreen(){
        $users = User::where('user_type', 0)->orderBy('id', "DESC")->get();
        return view('Admin.Screens.Users.SelectLeader', get_defined_vars());
    }
    public function users()
    {
        $users = User::with('parent')->where('user_type', 0)->orderBy('id', "DESC")->get();
        $officeUsers = false;
        return view('Admin.Screens.Users.AllUsers', get_defined_vars());
    }
    public function officeUsers()
    {
        $users = User::with('office')->where('user_type', 1)->orderBy('id', "DESC")->get();
        $officeUsers = true;
        return view('Admin.Screens.Users.AllUsers', get_defined_vars());
    }
    public function offices()
    {
        $offices = Office::with('users')->orderBy('id', "DESC")->get();
        return view('Admin.Screens.Offices.Offices', get_defined_vars());
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
        return view('Admin.Screens.Users.UserProfile', get_defined_vars());
    }
    public function officeProfile($id)
    {
        $office = Office::with('users')->find($id);
        return view('Admin.Screens.Offices.OfficeProfile', get_defined_vars());
    }
    public function addOfficeUser(Request $request)
    {
        if ($request->id) {
            $officeId = $request->id;
            $office = Office::find($officeId);
        } else {
            $offices = Office::all();
        }
        return view('Admin.Screens.Users.AddOfficeUser', get_defined_vars());
    }


    public function saveUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'office_id' => 'required',
        ]);
        $parent = 0;
        if ($request->reference_id) {
            $checkParent = User::where('accound_id', $request->reference_id)->first();
            if ($checkParent) {
                $parent = $checkParent->id;
            }
        }
        $user = new User();
        $user->office_id = $request->office_id;
        $user->user_type = '1';
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->account_id = Carbon::now()->timestamp;
        $user->parent_id = $parent;
        $user->email_verified_at = date('Y-m-d H:i:s');
        $user->save();
        $request->session()->flash('success', "User $user->name created successfully");
        return redirect('admin/office/profile/' . $request->office_id);
    }


    public function addOffice()
    {
        return view('Admin.Screens.Offices.AddOffice');
    }


    public function saveOffice(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'office_code' => 'required|unique:offices',
        ]);
        $office = new Office();
        $office->name = $request->name;
        $office->address = $request->address;
        $office->country = $request->country;
        $office->state = $request->state;
        $office->city = $request->city;
        $office->office_code = $request->office_code;
        $office->save();
        $request->session()->flash('success', "Office $office->name created successfully");
        return redirect('admin/offices');
    }


    public function allPackages()
    {
        $packages = Package::all();
        return view('Admin.Screens.Package.AllPackages', get_defined_vars());
    }

    public function activePackages()
    {
        $actives = ActivePackage::with('user', 'package')->orderBy('id', 'DESC')->get();
        return view('Admin.Screens.Package.ActivePackages', get_defined_vars());
    }

    public function packageInvoice($package_id)
    {
        $active_package = ActivePackage::with('user', 'package', 'office')->find($package_id);
        $encrypted = Crypt::encryptString($active_package->id);
        return view('Admin.Screens.Package.Invoice', get_defined_vars());
    }

    public function allWithdrawas()
    {
        $withdraws = Withdraw::with('user')->orderBy('id', 'DESC')->get();
        return view('Admin.Screens.Withdraw.AllWithdraws', get_defined_vars());
    }


    public function allTransictions()
    {
        $transactions = Transaction::with('user')->orderBy('id', 'DESC')->get();
        return view('Admin.Screens.Transiction.AllTransiction', get_defined_vars());
    }


    public function settings()
    {
        $settings = Setting::all();
        return view('Admin.Setting.Settings', get_defined_vars());
    }


    public function changeMeatPrice(Request $request)
    {
        $request->validate([
            'meet_kg' => 'required',
        ]);
        $setting = Setting::find(1);
        $setting->meet_kg = $request->meet_kg;
        $setting->save();
        $request->session()->flash('success', "Meat Price Changed Successfully");
        return redirect()->back();
    }

    

    public function changeAdminPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:8',
            'confirmPassword' => 'required|min:8',
        ]);

        if ($request->password == $request->confirmPassword) {
            $admin = User::find($request->id);
            $admin->password = Hash::make($request->password);
            $admin->save();
            $request->session()->flash('success', "Password Changed Successfully");
            return redirect()->back();
        } else {
            $request->session()->flash('failed', "Password doesn't match");
            return redirect()->back();
        }
    }

    public function updateProfile(Request $request)
    {
        $user = User::find(Auth::id());
        $user->name =$request->name;
        if($request->hasFile("profilePic")){
            $user->profile_pic = $this->uploadImage($request,'profilePic');
        }
        if ($user->save()) {
            $request->session()->flash('success', 'Profile updated successfully');
        } else {
            $request->session()->flash('error', 'Could not update profile');
        }
        
        return redirect()->back();
    }
}
