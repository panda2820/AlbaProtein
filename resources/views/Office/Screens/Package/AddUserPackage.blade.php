@extends('Office.Screens.Layout')
@section('title', 'All Users')
@section('content')
    <div class="content-body" id="app">
        <!-- row -->
        <div class="page-titles">
            <ol class="breadcrumb">
                <li>
                    <h5 class="bc-title">Subscribe User to Package</h5>
                </li>
            </ol>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="table-responsive active-projects style-1" style="padding: 30px">
                                <div class="tbl-caption">
                                    <h4 class="heading mb-0">Subscribe User to Package</h4>
                                    <div>
                                        <a class="btn btn-danger btn-sm" href="{{ URL::to('office/packages') }}"
                                            role="button">Back to All Packages</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <table class="table">
                                            <tr>
                                                <th>Package Name</th>
                                                <td>{{ $package->name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Withdraw After</th>
                                                <td>{{ $package->update_after }} Days</td>
                                            </tr>
                                            <tr>
                                                <th>Meat KGs</th>
                                                <td>{{ $package->type == 1 ? 'Min. ' : '' }}{{ $package->meat_kgs }} KGs
                                                </td>
                                            </tr>
                                            @if ($package->type == 1)
                                                <tr>
                                                    <th>Profit on Total Investment</th>
                                                    <td>{{ $package->profit_per_kg }}%</td>
                                                </tr>
                                            @else
                                                <tr>
                                                    <th>Profit Per KG</th>
                                                    <td>PKR {{ $package->profit_per_kg }}</td>
                                                </tr>
                                            @endif
                                            <tr>
                                                <th>No. Of Days</th>
                                                <td>{{ $package->no_days }} Days</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-md-6">
                                        <table class="table">
                                            <tr>
                                                <th>Amount Required to Activate Package</th>
                                                <td>{{ $package->type == 1 ? 'Min. ' : '' }} PKR
                                                    {{ $meetPrice * $package->meat_kgs }}</td>
                                            </tr>
                                            @if ($package->type == 0)
                                                <tr>
                                                    <th>Each Day Profit</th>
                                                    <td>PKR {{ $package->profit_per_kg * $package->meat_kgs }}</td>
                                                </tr>
                                            @endif
                                        </table>
                                        <form id="subsForm" action="{{ URL::to('office/package/subscribe') }}" method="POST"
                                            class=" dz-form pb-3" autocomplete="off">
                                            @csrf
                                            <input type="hidden" name="package_id" value="{{ $package->id }}">
                                            <input type="hidden" name="user_id" v-model="user_info.id">
                                            @if (Session::has('error'))
                                                <div class="alert alert-danger alert-dismissible fade show">
                                                    <svg viewBox="0 0 24 24" width="24" height="24"
                                                        stroke="currentColor" stroke-width="2" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round" class="me-2">
                                                        <polygon
                                                            points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2">
                                                        </polygon>
                                                        <line x1="15" y1="9" x2="9" y2="15">
                                                        </line>
                                                        <line x1="9" y1="9" x2="15" y2="15">
                                                        </line>
                                                    </svg>
                                                    {{ Session::get('error') }}
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                        aria-label="btn-close"></button>
                                                </div>
                                            @endif
                                            <div class="row">
                                                <div class="form-group col-md-12 mb-3">
                                                    <input type="text" class="form-control" v-model="account_id"
                                                        name="email" value="{{ old('account_id') }}"
                                                        placeholder="Enter user email address">
                                                    @error('email')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                    <small class="text-danger"
                                                        v-if="accountId_error">@{{ accountId_error }}</small>
                                                </div>
                                            </div>
                                            <table class="table" v-if="isObjectEmpty(user_info)">
                                                <tr>
                                                    <th>Name</th>
                                                    <td>@{{ user_info.name }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Phone Number</th>
                                                    <td>@{{ user_info.email }}</td>
                                                </tr>
                                                <tr v-if="user_info.parent">
                                                    <th>Parent</th>
                                                    <td>@{{ user_info.parent.name }}<br>@{{ user_info.parent.email }}</td>
                                                </tr>
                                            </table>
                                            @if ($package->type == 1)
                                                <div class="row" v-if="isObjectEmpty(user_info)">
                                                    <div class="form-group col-md-12 mb-3">
                                                        <input type="text" class="form-control" v-model="meat_kgs"
                                                            name="meat_kgs" v-on:keyup="updadteMeatPrice"
                                                            value="{{ old('meat_kgs') }}"
                                                            placeholder="Enter Meat Amount in KGs">
                                                        @error('meat_kgs')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                        <small class="text-danger"
                                                            v-if="accountId_error">@{{ accountId_error }}</small>
                                                    </div>
                                                </div>
                                                <table class="table" v-if="isObjectEmpty(user_info)">
                                                    <tr>
                                                        <th>Total Meat</th>
                                                        <td>@{{ meat_kgs }} Kg</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Price</th>
                                                        <td>Rs. @{{ total_price }}</td>
                                                    </tr>
                                                </table>
                                            @endif
                                            <div class="form-group text-left mb-5 forget-main"
                                                v-if="!isObjectEmpty(user_info)">
                                                <button type="submit" class="btn btn-danger"
                                                    v-on:click.prevent="getUserInfo">Continue</button>
                                            </div>
                                            <div class="form-group text-left mb-5 forget-main"
                                                v-if="isObjectEmpty(user_info)">
                                                <button id="btnSubs" type="submit" class="btn btn-danger"
                                                    :disabled="parseInt(meat_kgs) < 1000">Subscribe Package</button>
                                                <button type="submit" class="btn"
                                                    v-on:click.prevent="cancelUser">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $("#btnSubs").click(e => {
            e.preventDefault();
            $("#btnSubs").attr('disabled', true);
            $("#btnSubs").text('Please wait...');
            $("#subsForm").submit();
        });
        $("#subsForm").submit(() => {
            $("#btnSubs").attr('disabled', true);
            $("#btnSubs").text('Please wait...');
        });
    </script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        const {
            createApp
        } = Vue;
        createApp({
            data() {
                return {
                    account_id: '',
                    meat_kgs: '1000',
                    per_kg: '{{ $meetPrice }}',
                    accountId_error: '',
                    total_price: 0,
                    user_info: {},
                    checking: false,
                }
            },
            methods: {
                isObjectEmpty(obj) {
                    return Object.keys(obj).length !== 0;
                },
                getUserInfo() {
                    if (this.account_id) {
                        this.checking = true;
                        this.accountId_error = "";
                        axios.get(`${apiUrl}user/info/${this.account_id}`).then(response => {
                            this.user_info = response.data.user;
                            this.checking = false;
                        }).catch(error => {
                            this.accountId_error = error.response.data.message;
                            this.checking = false;
                        });
                    } else {
                        this.accountId_error = "Enter account id to continue";
                    }
                },
                cancelUser() {
                    this.account_id = '';
                    this.user_info = {};
                },
                updadteMeatPrice() {
                    if (parseInt(this.meat_kgs) > 0) {
                        this.total_price = this.meat_kgs * this.per_kg;
                    }
                }
            },
            created() {
                this.updadteMeatPrice();
            },
        }).mount('#app');
    </script>
@endsection
