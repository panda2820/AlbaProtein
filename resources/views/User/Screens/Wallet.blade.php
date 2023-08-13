@extends('User.Layouts.AppLayout')
@section('title', 'Wallet')
@section('content')
<div class="page-content" id="app">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Wallet</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @if(Session::has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ Session::get('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Fix the errors to request withdraw <br>
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-md-6" v-if="!showReferenceWithdraw">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="row justify-content-center">
                                <div class="col-lg-10">
                                    <h4 class="mt-4">Profit Wallet</h4>
                                    <h1 class="mt-4 fw-semibold">PKR {{ number_format($user->account_balance) }}</h1>
                                    @if(($currentDate >= 1 && $currentDate <= 5) || ($currentDate >= 15 && $currentDate <= 20) && intval($user->account_balance) > 0)
                                    <div class="mt-4">
                                        <button type="button" class="btn btn-danger" v-on:click="showProfitWithdraw = true">
                                            Request Withdraw
                                        </button>
                                    </div>
                                    @elseif(intval($user->account_balance) <= 0)
                                    <p class="mt-3 text-danger" style="margin-top: 1.5rem !important;">Amount must be greater than 0 to get Withdraw</p>
                                    @else
                                    <p class="mt-3 text-danger" style="margin-top: 1.5rem !important;">You can only request withdraw between 1 - 5 OR 15 - 20 of the month</p>
                                    @endif
                                </div>
                            </div>
                            <div class="row justify-content-center mt-5 mb-2">
                                <div class="col-sm-6 col-8">
                                    <div>
                                        <img src="{{ asset('assets-user/images/profit.png') }}" alt="" class="img-fluid" style="height: 300px">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6" v-if="showProfitWithdraw">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-4">Request Withdraw From Your Profit Wallet</h4>
                        <form action="{{ URL::to('user/withdraw/request') }}" method="POST">
                            @csrf
                            <input type="hidden" name="type" value="1">
                            <div class="form-group mt-3">
                                <label>Amount to Withdraw</label>
                                <input type="text" class="form-control" name="amount" value="{{ $user->account_balance }}">
                                @error('amount')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label>Choose the Office to get Withdraw</label>
                                <select name="office" class="form-control">
                                    <option value="" selected disabled>Choose Office</option>
                                    @foreach ($offices as $office)
                                    <option value="{{ $office->id }}">{{ $office->name }}</option>
                                    {{-- <option value="{{ $office->id }}">{{ $office->office_code }}</option> --}}
                                    @endforeach
                                </select>
                                @error('office')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label>Want to Withdraw from other reference? Add Reference's Phone Number (optional)</label>
                                <input type="text" class="form-control" name="reference_phone" value="">
                                <small class="text-danger">You'll not be able to edit the withdraw once initiated.</small>
                                @error('reference_phone')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <button class="btn btn-danger">Request Withdraw</button>
                                <button class="btn" v-on:click="showProfitWithdraw = false">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6" v-if="showReferenceWithdraw">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-4">Request Withdraw From Your Reference Wallet</h4>
                        <form action="{{ URL::to('user/withdraw/request') }}" method="POST">
                            @csrf
                            <input type="hidden" name="type" value="2">
                            <div class="form-group mt-3">
                                <label>Amount to Withdraw</label>
                                <input type="text" class="form-control" name="amount" value="{{ $user->reference_balance }}">
                                @error('amount')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label>Choose the Office to get Withdraw</label>
                                <select name="office" class="form-control">
                                    <option value="" selected disabled>Choose Office</option>
                                    @foreach ($offices as $office)
                                    <option value="{{ $office->id }}">{{ $office->office_code }}</option>
                                    @endforeach
                                </select>
                                @error('office')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label>Want to Withdraw from other reference? Add Reference's Phone Number (optional)</label>
                                <input type="text" class="form-control" name="reference_phone" value="">
                                <small class="text-danger">You'll not be able to edit the withdraw once initiated.</small>
                                @error('reference_phone')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <button class="btn btn-danger">Request Withdraw</button>
                                <button class="btn" v-on:click="showReferenceWithdraw = false">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6" v-if="!showProfitWithdraw">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="row justify-content-center">
                                <div class="col-lg-10">
                                    <h4 class="mt-4">Reference Wallet</h4>
                                    <h1 class="mt-4 fw-semibold">PKR {{ number_format($user->reference_balance) }}</h1>
                                    @if(intval($user->reference_balance) > 0)
                                    <div class="mt-4">
                                        <button type="button" class="btn btn-danger" v-on:click="showReferenceWithdraw = true">
                                            Request Withdraw
                                        </button>
                                    </div>
                                    @else
                                    <p class="mt-3 text-danger" style="margin-top: 1.5rem !important;">Amount must be greater than 0 to get Withdraw</p>
                                    @endif
                                </div>
                            </div>
                            <div class="row justify-content-center mt-5 mb-2">
                                <div class="col-sm-6 col-8">
                                    <div>
                                        <img src="{{ asset('assets-user/images/gift.png') }}" alt="" class="img-fluid" style="height: 300px">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- container-fluid -->
</div>
@endsection
@section('script')
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    const { createApp } = Vue;
    createApp({
        data() {
            return {
                showProfitWithdraw:false,
                showReferenceWithdraw:false,
            }
        },
    }).mount('#app');
</script>
@endsection