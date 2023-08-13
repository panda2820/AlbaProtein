<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ActivePackageController;
use App\Http\Controllers\WithdrawController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TargetController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\PromoController;


Route::get('check-mail', [AuthController::class, 'checkMail']);

Route::get('/generate/{password}', [adminController::class, 'generatePassword']);

Route::get('/', function(){
    return view('Home');
});
Route::get('/privacy', function(){
    return view('PricayPolicy');
});

Route::get('user/package/invoice/{package_id}', [ActivePackageController::class, 'userPackageInfo']);

// User Routes
Route::prefix('user')->group(function () {
    Route::middleware(['afterUserLogin'])->group(function () {
        
        Route::get('register/{account_id?}', [AuthController::class, 'registerPage']);
        Route::get('login', [AuthController::class, 'loginPage']);
        Route::get('forgot-password', [AuthController::class, 'forgotPasswordPage']);
        Route::get('verify-email', [AuthController::class, 'verifyEmailPage']);
        Route::get('verifyemail', [AuthController::class, 'verifyEmailResetPage']);
        Route::get('reset-password', [AuthController::class, 'resetPasswordPage']);

        Route::post('register', [AuthController::class, 'register']);
        Route::post('login', [AuthController::class, 'login']);
        Route::post('forgot-password', [AuthController::class, 'forgotPassword']);
        Route::post('verify-email', [AuthController::class, 'verifyEmail']);
        Route::post('verifyemail', [AuthController::class, 'verifyEmailReset']);
        Route::post('reset-password', [AuthController::class, 'resetPassword']);

        Route::get('resend-code', [AuthController::class, 'resendCode']);
    });
    Route::middleware(['userAccess'])->group(function () {
        Route::get('dashboard', [UserController::class, 'dashboard']);
        Route::get('active-packages', [PackageController::class, 'activePackages']);
        Route::get('invites', [UserController::class, 'invitesPage']);
        Route::get('packages', [PackageController::class, 'packagesPage']);
        Route::get('transactions', [TransactionController::class, 'transactionsUser']);
        Route::get('wallet', [UserController::class, 'walletPage']);
        Route::post('withdraw/request', [WithdrawController::class, 'requestWithdraw']);
        Route::get('withdraws', [WithdrawController::class, 'allWithdraws']);
        Route::get('settings', [AuthController::class, 'settingsPageUser']);
        Route::post('password/update', [AuthController::class, 'updatePassword']);
        Route::post('profile/update', [AuthController::class, 'updateProfile']);
        Route::get('/target', [TargetController::class, 'index']);
        Route::get('logout', [AuthController::class, 'logout']); 
    });
});

// Office Routes
Route::prefix('office')->group(function () {
    Route::get('login', [AuthController::class, 'officeLogin']);
    Route::post('login', [AuthController::class, 'loginOffice']);
    Route::middleware(['officeAccess'])->group(function () {
        Route::get('logout', [AuthController::class, 'officeLogout']);
        Route::get('dashboard', [OfficeController::class, 'dashboard']);
        Route::get('give-promo/{user_id}', [UserController::class, 'givePromo']);
        // Users
        Route::get('users', [UserController::class, 'users']);
        Route::get('user/profile/{user_id}', [UserController::class, 'userProfile']);
        Route::get('add-user', [UserController::class, 'addUserPage']);
        Route::post('user/save', [UserController::class, 'saveUser']);
        // Packages
        Route::get('packages', [PackageController::class, 'allPackages']);
        Route::get('package/add/{package_id}', [PackageController::class, 'addUserToPackage']);
        // Active Packages
        Route::get('active-packages', [ActivePackageController::class, 'allActive']);
        Route::get('invoice/{package_id}', [ActivePackageController::class, 'packageInvoice']);
        Route::get('package/invoice/{package_id}', [ActivePackageController::class, 'packageInfo']);
        Route::post('package/subscribe', [ActivePackageController::class, 'subscribePackage']);
        // Withdraws
        Route::get('withdraw/create', [WithdrawController::class, 'createWithdraw']);
        Route::post('withdraw/create', [WithdrawController::class, 'saveWithdraw']);
        Route::get('withdraws/all', [WithdrawController::class, 'withdrawas']);
        Route::post('withdraw/approve', [WithdrawController::class, 'approveWithdraw']);
        Route::post('withdraw/decline', [WithdrawController::class, 'declineWithdraw']);
        Route::get('withdraws/pending', [WithdrawController::class, 'pendingWithdrawas']);
        Route::get('withdraws/completed', [WithdrawController::class, 'completedWithdrawas']);
        Route::get('withdraws/declined', [WithdrawController::class, 'declinedWithdrawas']);
        // Settings
        Route::get('settings', [AuthController::class, 'officeSettings']);
        Route::post('password/update', [AuthController::class, 'updatePassword']);
        Route::post('profile/update', [AuthController::class, 'updateProfile']);

        // Promo Routes
        Route::get('promos', [PromoController::class, 'promosPage']);
    });
});

// Admin Routes
Route::prefix('admin')->group(function () {
    Route::middleware(['AfterAdminLogin'])->group(function () {
        Route::get('login', [AuthController::class, 'adminLogin']);
        Route::post('login', [AuthController::class, 'loginAdmin']);
    });

    Route::middleware(['adminAccess'])->group(function () {
        Route::get('dashboard', [adminController::class, 'dashboard']);
        Route::get('users', [adminController::class, 'users']);
        Route::get('users/make-leader/{user_id}', [AuthController::class, 'makeLeader']);
        Route::get('users/remove-leader/{user_id}', [AuthController::class, 'removeLeader']);
        Route::get('office-users', [adminController::class, 'officeUsers']);
        Route::get('user/profile/{user_id}', [adminController::class, 'userProfile']);
        Route::get('offices', [adminController::class, 'offices']);
        Route::get('office/profile/{user_id}', [adminController::class, 'officeProfile']);
        Route::get('add-office-user/{id}', [adminController::class, 'addOfficeUser']);
        Route::get('add-office-user', [adminController::class, 'addOfficeUser']);
        Route::post('user/save', [adminController::class, 'saveUser']);
        Route::get('add-office', [adminController::class, 'addOffice']);
        Route::post('add-office', [adminController::class, 'saveOffice']);
        Route::get('packages', [adminController::class, 'allPackages']);
        Route::get('active-packages', [adminController::class, 'activePackages']);
        Route::get('invoice/{package_id}', [adminController::class, 'packageInvoice']);
        Route::get('withdraws/all', [adminController::class, 'allWithdrawas']);
        Route::get('transictions', [adminController::class, 'allTransictions']);
        Route::get('settings', [adminController::class, 'settings']);
        Route::post('setting/changePrice', [adminController::class, 'changeMeatPrice']);
        Route::post('setting/changePassword', [adminController::class, 'changeAdminPassword']);
        Route::post('setting/updateProfile', [adminController::class, 'updateProfile']);
        Route::post('packages/changedata', [PackageController::class, 'changedata']);
        Route::get('logout', [AuthController::class, 'logout']);
        Route::get('leader', [adminController::class, 'chooseLeaderScreen']);
        Route::get('leader/remove/{leader_id}', [adminController::class, 'removeLeader']);
        Route::get('leader/make/{user_id}', [adminController::class, 'makeLeader']);
    });

});
