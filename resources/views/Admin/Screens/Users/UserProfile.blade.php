@extends('Admin.Screens.Layout')
@section('title', 'Users')






@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">{{$user->name . "'s Profile"}}</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="table-responsive active-projects style-1" style="padding: 30px">
                                        <div class="tbl-caption">
                                            <h4 class="heading mb-0">{{ $user->name . "'s Profile" }}</h4>
                                            <div>
                                                <a class="btn btn-danger btn-sm" href="{{ URL::to('admin/users') }}"
                                                    role="button">All Users</a>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <img src="{{ asset('uploads/' . $user->profile_pic) }}"
                                                style="height: 100px;width: 100px;border-radius:50px">
                                        </div>
                                        <table class="table">
                                            <tr>
                                                <th>Name</th>
                                                <td>{{ $user->name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Phone Number</th>
                                                <td>{{ $user->email }}</td>
                                            </tr>
                                            <tr>
                                                <th>Account ID</th>
                                                <td>{{ $user->account_id }}</td>
                                            </tr>
                                            <tr>
                                                <th>Profit Balance</th>
                                                <th style="text-align: right;">PKR {{ $user->account_balance }}</th>
                                            </tr>
                                            <tr>
                                                <th>Reference Balance</th>
                                                <th style="text-align: right;">PKR {{ $user->reference_balance }}</th>
                                            </tr>
                                        </table>
                                        <br>
                                        <br>
                                        <h4 class="heading mb-0">Referred From</h4>
                                        <br>
                                        @if ($from)
                                            <table class="table">
                                                <tr>
                                                    <th>
                                                        <a href="{{ URL::to('admin/user/profile/' . $from->id) }}">
                                                            <img src="{{ asset('uploads/' . $from->profile_pic) }}"
                                                                style="height: 50px; width:50px;border-radius:25px">
                                                            <span style="margin-left: 10px;">{{ $from->name }}</span>
                                                        </a>
                                                    </th>
                                                    <td>{{ $from->email }}</td>
                                                </tr>
                                            </table>
                                        @else
                                            <span>None</span>
                                        @endif
                                        <br>
                                        <br>
                                        <h4 class="heading mb-0">Referred Users</h4>
                                        <br>
                                        @if (count($referred) > 0)
                                            <table class="table">
                                                @foreach ($referred as $ref)
                                                    <tr>
                                                        <th>
                                                            <a href="{{ URL::to('admin/user/profile/' . $ref->id) }}">
                                                                <img src="{{ asset('uploads/' . $ref->profile_pic) }}"
                                                                    style="height: 50px; width:50px;border-radius:25px">
                                                                <span style="margin-left: 10px;">{{ $ref->name }}</span>
                                                            </a>
                                                        </th>
                                                        <td>{{ $ref->email }}</td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        @else
                                            <span>None</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="table-responsive active-projects style-1" style="padding: 30px">
                                        <div class="tbl-caption">
                                            <h4 class="heading mb-0">Active Packages</h4>
                                        </div>
                                        <div class="row">
                                            @foreach ($packages as $active_package)
                                                <div class="col-md-6" style="margin-top: 10px;padding: 10px">
                                                    <div style="background: #F4F4F4;border-radius: 10px;">
                                                        <table class="table">
                                                            <tr>
                                                                <th>Package Details</th>
                                                                <td>{{ $active_package->package->name }}<br>{{ $active_package->package->type == 1 ? $active_package->total_invested / $active_package->price_per_kg : $active_package->package->meat_kgs }}
                                                                    KGs</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Price Per KG</th>
                                                                <td>PKR {{ $active_package->price_per_kg }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Total Investment</th>
                                                                <td>PKR {{ $active_package->total_invested }}</td>
                                                            </tr>
                                                            @if ($active_package->package->type == 1)
                                                                <tr>
                                                                    <th>Total Return on Investment</th>
                                                                    <td>{{ $active_package->profit_per_kg }}%</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Total Return on Investment</th>
                                                                    <td>PKR {{ $active_package->per_day_profit }}</td>
                                                                </tr>
                                                            @else
                                                                <tr>
                                                                    <th>Profit Per KG</th>
                                                                    <td>PKR {{ $active_package->profit_per_kg }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Profit Per Day</th>
                                                                    <td>PKR {{ $active_package->per_day_profit }}</td>
                                                                </tr>
                                                            @endif
        
                                                            <tr>
                                                                <th>Total Days</th>
                                                                <td>{{ $active_package->total_days }} Day(s)</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Completed Days</th>
                                                                <td>{{ $active_package->completed_days }} Day(s)</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Remaining Days</th>
                                                                <td>{{ $active_package->remaining_days }} Day(s)</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Total Return</th>
                                                                <td>PKR {{ $active_package->total_return }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Started On</th>
                                                                <td>{{ $active_package->created_at }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Expires On</th>
                                                                <td>{{ $active_package->expire_on }}</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="table-responsive active-projects style-1" style="padding: 30px">
                                        <div class="tbl-caption">
                                            <h4 class="heading mb-0">Withdraws</h4>
                                        </div>
                                        <table class="table">
                                            <tr>
                                                <th>Transaction ID</th>
                                                <th>Amount</th>
                                                <th>Withdraw Type</th>
                                                <th>Date & Time</th>
                                                <th>Note</th>
                                                <th style="text-align: center;">Status</th>
                                            </tr>
                                            @foreach ($withdraws as $withdraw)
                                                <tr>
                                                    <th>{{ $withdraw->withdraw_id }}</th>
                                                    <td>PKR {{ $withdraw->amount }}</td>
                                                    <td>
                                                        <span>
                                                            {{ $withdraw->withdraw_type == '2' ? "Refference Wallet" : '' }}
                                                            {{ $withdraw->withdraw_type=='1'?"Profit Wallet" :'' }}
                                                        </span>
                                                    </td>
                                                    <td>{{ $withdraw->created_at }}</td>
                                                    <td>{{ $withdraw->note }}</td>
                                                    <td>
                                                        @if ($withdraw->status == 0)
                                                            <span class="badge badge-warning light border-0">Pending</span>
                                                        @elseif($withdraw->status == 1)
                                                            <span class="badge badge-success light border-0">Completed</span>
                                                        @elseif($withdraw->status == 2)
                                                            <span class="badge badge-danger light border-0">Declined</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="table-responsive active-projects style-1" style="padding: 30px">
                                        <div class="tbl-caption">
                                            <h4 class="heading mb-0">Transactions</h4>
                                        </div>
                                        <div style="height: 600px;overflow: auto;">
                                            <table class="table">
                                                <tr>
                                                    <th>Transaction ID</th>
                                                    <th>Reason</th>
                                                    <th>Amount</th>
                                                    <th>Amount After</th>
                                                    <th style="text-align: center;">Date & Time</th>
                                                </tr>
                                                @foreach ($transactions as $transaction)
                                                    <tr>
                                                        <th>{{ $transaction->transaction_id }}</th>
                                                        <td style="font-size: 10px">{{ $transaction->reason }}</td>
                                                        <td><strong>PKR
                                                                {{ $transaction->inout ? '+' : '-' }}{{ $transaction->amount }}</strong>
                                                        </td>
                                                        <td>PKR {{ $transaction->after_amount }}</td>
                                                        <td>{{ $transaction->created_at }}</td>
                                                    </tr>
                                                @endforeach
                                            </table>
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
        <!-- End Page-content -->

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>
                            document.write(new Date().getFullYear())
                        </script> © AlbaProtein.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end d-none d-sm-block">
                            
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
@endsection
@section('script')
    <script src="{{ asset('assets-office/js/dashboard/dashboard-1.js') }}"></script>
    <script src="{{ asset('assets-office/vendor/draggable/draggable.js') }}"></script>
@endsection
