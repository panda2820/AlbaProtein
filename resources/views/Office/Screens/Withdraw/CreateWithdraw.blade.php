@extends('Office.Screens.Layout')
@section('title', 'Create Withdraw')
@section('content')
<div class="content-body" id="app">
    <!-- row -->	
    <div class="page-titles">
        <ol class="breadcrumb">
            <li><h5 class="bc-title">Create New Withdraw</h5></li>
        </ol>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="table-responsive active-projects style-1" style="padding: 30px">
                            <div class="tbl-caption">
                                <h4 class="heading mb-0">Create New Withdraw</h4>
                                <div>
                                    <a class="btn btn-danger btn-sm" href="{{ URL::to('office/withdraws/all') }}" role="button">All Withdrawas</a>
                                </div>
                            </div>
                            <form action="{{ URL::to('office/withdraw/create') }}" method="POST" class=" dz-form pb-3" autocomplete="off">
                                @csrf
                                @if(Session::has('error'))
                                <div class="alert alert-danger alert-dismissible fade show">
                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                                    {{ Session::get('error') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
                                </div>
                                @endif
                                <div class="row">
                                    <div class="form-group col-md-12 mb-3">
                                        <input type="text" class="form-control" v-model="account_id" name="account_id" value="{{ old('account_id') }}" placeholder="Enter Account ID">
                                        @error('account_id')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        <small class="text-danger" v-if="accountId_error">@{{ accountId_error }}</small>
                                    </div>
                                </div>
                                <table class="table" v-if="isObjectEmpty(user_info)">
                                    <tr>
                                        <th>Name</th>
                                        <td>@{{ user_info.name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>@{{ user_info.email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Account ID</th>
                                        <td>@{{ user_info.account_id }}</td>
                                    </tr>
                                    <tr v-if="user_info.parent">
                                        <th>Parent</th>
                                        <td>@{{ user_info.parent.name }}<br>@{{ user_info.parent.account_id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Total Withdraws</th>
                                        <td>@{{ withdraws.length }}</td>
                                    </tr>
                                    <tr>
                                        <th>Last Withdraw</th>
                                        <td>@{{ lastWithdraw ? lastWithdraw : 'No Withdraw Yet' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Days passed since last withdraw</th>
                                        <td>@{{ diff ? diff : 'No Withdraw Yet' }}</td>
                                    </tr>
                                </table>
                                <div class="row mb-3" v-if="isObjectEmpty(user_info)">
                                    <div class="col-md-6 form-group">
                                        <input type="text" class="form-control" v-model="user_info.account_balance" name="amount" value="{{ old('amount') }}" placeholder="Enter Amount">
                                        @error('amount')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <select type="text" class="form-control" name="withdraw_type">
                                            <option value="Cash">Cash</option>
                                        </select>
                                        @error('withdraw_type')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3" v-if="isObjectEmpty(user_info)">
                                    <div class="col-md-6 form-group">
                                        <select type="text" class="form-control" name="status">
                                            <option value="0">Pending</option>
                                            <option value="1" selected>Completed</option>
                                        </select>
                                        @error('status')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <input type="text" class="form-control" name="note" value="{{ old('note') }}" placeholder="Enter any note (optional) ">
                                        @error('note')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group text-left mb-5 forget-main" v-if="!isObjectEmpty(user_info)">
                                    <button type="submit" class="btn btn-danger" v-on:click.prevent="getUserInfo">Continue</button>
                                </div>
                                <div class="form-group text-left mb-5 forget-main" v-if="isObjectEmpty(user_info)">
                                    <button type="submit" class="btn btn-danger">Create Withdraw</button>
                                    <button type="submit" class="btn" v-on:click.prevent="cancelUser">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                account_id:'',
                accountId_error:'',
                user_info:{},
                withdraws:[],
                lastWithdraw:'',
                diff:'',
                checking:false,
            }
        },
        methods: {
            isObjectEmpty(obj) {
                return Object.keys(obj).length !== 0;
            },
            getUserInfo(){
                if(this.account_id){
                    this.checking = true;
                    this.accountId_error = "";
                    axios.get(`${apiUrl}user/info/${this.account_id}`).then(response => {
                        this.user_info = response.data.user;
                        this.withdraws = response.data.withdraws;
                        this.lastWithdraw = response.data.lastWithdraw;
                        this.diff = response.data.diff;
                        this.checking = false;
                    }).catch(error => {
                        this.accountId_error = error.response.data.message;
                        this.checking = false;
                    });
                }else{
                    this.accountId_error = "Enter account id to continue";
                }
            },
            cancelUser(){
                this.account_id = '';
                this.user_info = {};
            }
        },
        created() {
            
        },
    }).mount('#app');
</script>
@endsection