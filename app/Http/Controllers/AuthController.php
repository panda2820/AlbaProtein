<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Office;
use App\Models\Target;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Jobs\VerifyEmailJob;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyEmail;
use Auth;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function sendMail(Request $request){
        $data = [
            'code' => $request->code,
            'subject' => $request->subject,
            'message' => $request->message,
        ];
        dispatch(new VerifyEmailJob($request->email, $data));
        return response()->json(["status" => "sent"], 200);
    }

    public function sendCode($user_id, $request){
        $user = User::find($user_id);
        $code = rand(111111, 999999);
        $data = [
            'email' => $user->email,
            'code' => $code,
            'subject' => 'Verify Your Email',
            'message' => 'Please verify your email address to continue.',
        ];
        $response = Http::post('https://albaprotein.com/api/send-mail', $data);
        $user->code = $code;
        $user->save();
        $request->session()->put('verification_code', $code);
        $request->session()->put('user_email', $user->email);
        $request->session()->put('user_id', $user->id);
    }
    public function resendCode(Request $request){
        $this->sendCode($request->session()->get('user_id'), $request);
        $request->session()->flash('success', 'A code is sent to your provided email address. Check your inbox for the code please');
        return redirect()->back();
    }
    // User Methods
    public function registerPage($account_id = null){
        $reference = "";
        if($account_id){
            $reference = $account_id;
        }
        return view('User.Auth.Register', get_defined_vars());
    }
    public function register(Request $request){
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);
        $check = User::where('email', $request->email)->first();
        if(!$check){
            $parent_id = 0;
            if($request->reference_email){
                $parent = User::where('email', $request->reference_email)->first();
                if($parent){
                    $parent_id = $parent->id;
                }else{
                    $request->session()->flash('error', 'Invalid reference email .
                     Enter a valid reference email  to continue');
                    return redirect()->back();
                }
            }
            $user = new User();
            $user->profile_pic = 'default.png';
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->parent_id = $parent_id;
            $user->account_id = Carbon::now()->timestamp;
            $user->save();
            $this->sendCode($user->id, $request);
            $request->session()->flash('success', 'You are registered successfully. Please check your email for code');
            return redirect('user/verify-email');
        }else{
            $request->session()->flash('error', 'email already registerd.');
            return redirect()->back();
        }
    }
    public function forgotPasswordPage(){
        if(Auth::check()){
            return redirect('user/dashboard');
        }
        return view('User.Auth.Forgot');
    }

    public function forgotPassword(Request $request){
        $request->validate([
            'email' => 'required|email',
        ]);
        $user = User::where('email', $request->email)->first();
        if($user){
            $this->sendCode($user->id, $request);
            $request->session()->flash('success', "An email has sent to your inbox. Verify code and reset your password");
            return redirect('user/verifyemail');
        }else{
            $request->session()->flash('error', "No account found with this email");
            return redirect()->back();
        }
    }

    public function loginPage(){
        return view('User.Auth.Login');
    }
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $check = User::where('email', $request->email)->first();
        if($check && $check->user_type == 0){
            if($check->email_verified_at){
                $data = [
                    'email' => $request->email,
                    'password' => $request->password,
                ];
                if(Auth::attempt($data)){
                    return redirect('/user/dashboard');
                }
                else{
                    $request->session()->flash('error', 'Invalid Email or Password');
                    return redirect()->back();  
                }
            }
            else{
                $this->sendCode($check->id, $request);
                return redirect('user/verify-email');
            }
        }else{
            $request->session()->flash('error', 'This email is not registered');
            return redirect()->back();
        }
    }
    public function verifyEmailPage(Request $request){
        if($request->session()->has('verification_code') && $request->session()->has('user_email') && $request->session()->has('user_id')){
            return view('User.Auth.VerifyEmail');
        }else{
            return redirect('user/login');
        }
    }
    
    public function verifyEmailResetPage(Request $request){
        if($request->session()->has('verification_code') && $request->session()->has('user_email') && $request->session()->has('user_id')){
            return view('User.Auth.VerifyEmailReset');
        }else{
            return redirect('user/login');
        }
    }
   
    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    public function settingsPageUser(){
        $user = User::find(Auth::user()->id);
        return view('User.Screens.Settings', get_defined_vars());
    }
    public function verifyEmail(Request $request){
        if($request->session()->has('verification_code') && $request->session()->has('user_email') && $request->session()->has('user_id')){
            $request->validate([
                'code' => 'required|numeric|digits:6',
            ]);
            $user = User::find($request->session()->get('user_id'));
            if($user->code == $request->code && $request->code == $request->session()->get('verification_code')){
                $user->code = null;
                $user->email_verified_at = date('Y-m-d H:i:s');
                $user->save();
                $request->session()->flash('success', 'Your email is verified successfully');
                return redirect('user/login');    
            }else{
                $request->session()->flash('error', 'Invalid code. Try Again');
                return redirect()->back();
            }
        }else{
            return redirect('user/login');
        }
    }
    
    public function verifyEmailReset(Request $request){
        if($request->session()->has('verification_code') && $request->session()->has('user_email') && $request->session()->has('user_id')){
            $request->validate([
                'code' => 'required|numeric|digits:6',
            ]);
            $user = User::find($request->session()->get('user_id'));
            if($user->code == $request->code && $request->code == $request->session()->get('verification_code')){
                $user->code = null;
                $user->email_verified_at = date('Y-m-d H:i:s');
                $user->save();
                $request->session()->flash('success', 'Your email is verified successfully');
                return redirect('user/reset-password');    
            }else{
                $request->session()->flash('error', 'Invalid code. Try Again');
                return redirect()->back();
            }
        }else{
            return redirect('user/login');
        }
    }

    public function resetPasswordPage(Request $request){
        if($request->session()->has('user_email') && $request->session()->has('user_id')){
            return view('User.Auth.ResetPassword');
        }else{
            return redirect('user/login');
        }
    }

    public function resetPassword(Request $request){
        if($request->session()->has('user_email') && $request->session()->has('user_id')){
            $request->validate([
                'password' => 'required|min:8|confirmed',
            ]);
            $user = User::find($request->session()->get('user_id'));
            $user->password = Hash::make($request->password);
            $user->save();
            $request->session()->flash('success', 'Password updated successfully');
            return redirect('user/login');
        }else{
            return redirect('user/login');
        }
    }

    // Office Methods
    public function officeLogin(){
        if(Auth::check() && Auth::user()->user_type == 1){
            return redirect('office/dashboard');
        }
        return view('Office.Screens.Auth.Login');
    }
    public function loginOffice(Request $request){
        $request->validate([
            'email' => 'email|required',
            'password' => 'required',
        ]);
        $check = User::where('email', $request->email)->first();
        if($check){
            if($check->user_type == 1){
                $data = [
                    'email' => $request->email,
                    'password' => $request->password,
                ];
                if(Auth::attempt($data)){
                    return redirect('office/dashboard');
                }else{
                    $request->session()->flash('error', 'Invalid email or password');
                    return redirect()->back();    
                }
            }else{
                $request->session()->flash('error', 'Provided email is not valid to any office');
                return redirect()->back();
            }
        }else{
            $request->session()->flash('error', 'Email not assiciated to any account');
            return redirect()->back();
        }
    }
    public function officeLogout(){
        Auth::logout();
        return redirect('/office/login');
    }
    public function officeSettings(){
        $user = User::find(Auth::user()->id);
        return view('Office.Screens.Settings', get_defined_vars());
    }
    public function updatePassword(Request $request){
        $request->validate([
            'old_password' => 'required|min:8',
            'new_password' => 'required|min:8',
        ]);
        $user = User::find(Auth::id());
        if(Hash::check($request->old_password, $user->password)){
            if($request->new_password == $request->password_confirmation){
                $user->password = Hash::make($request->new_password);
                $user->save();
                $request->session()->flash('success', 'Password is updated successfully');
                return redirect()->back();
            }else{
                $request->session()->flash('error', 'Confirmation password does not match');
                return redirect()->back();
            }
        }else{
            $request->session()->flash('error', 'Invalid old password');
            return redirect()->back();
        }
    }

    public function updateProfile(Request $request)
    {
        $user = User::find(Auth::id());
        $user->name = $request->name;
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

    public function adminLogin()
    {
        return view('Admin.Screens.Auth.Login');
    }


    public function loginAdmin(Request $request)
    {
        $request->validate([
            'email' => 'email|required',
            'password' => 'required',
        ]);
        $check = User::where('email', $request->email)->first();
        if ($check) {
            if ($check->user_type == 2) {
                $data = [
                    'email' => $request->email,
                    'password' => $request->password,
                ];
                if (Auth::attempt($data)) {
                    return redirect('admin/dashboard');
                } else {
                    $request->session()->flash('error', 'Invalid email or password');
                    return redirect()->back();
                }
            } else {
                $request->session()->flash('error', 'Provided email is not valid to any Admin user');
                return redirect()->back();
            }
        } else {
            $request->session()->flash('error', 'Email not assiciated to any account');
            return redirect()->back();
        }
    }

    public function makeLeader($user_id, Request $request){
        $user = User::find($user_id);
        $user->is_leader = 1;
        $user->save();
        $request->session()->flash('success', "$user->name marked as leader");
        return redirect()->back();
    }

    public function removeLeader($user_id, Request $request){
        $user = User::find($user_id);
        $user->is_leader = 0;
        $user->save();
        $request->session()->flash('success', "$user->name removed as leader");
        return redirect()->back();
    }

}
