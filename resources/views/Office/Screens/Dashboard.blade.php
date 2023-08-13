@extends('Office.Screens.Layout')
@section('title', 'Dashboard')
@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="page-titles">
            <ol class="breadcrumb">
                <li>
                    <h5 class="bc-title">Dashboard</h5>
                </li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">
                        <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M2.125 6.375L8.5 1.41667L14.875 6.375V14.1667C14.875 14.5424 14.7257 14.9027 14.4601 15.1684C14.1944 15.4341 13.8341 15.5833 13.4583 15.5833H3.54167C3.16594 15.5833 2.80561 15.4341 2.53993 15.1684C2.27426 14.9027 2.125 14.5424 2.125 14.1667V6.375Z"
                                stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M6.375 15.5833V8.5H10.625V15.5833" stroke="#2C2C2C" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                        Home </a>
                </li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li>
            </ol>
            <!-- <a class="text-danger fs-13" data-bs-toggle="offcanvas" href="#offcanvasExample1" role="button"
                aria-controls="offcanvasExample1">+ Add Task</a> -->
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-9 wid-100">
                    <div class="row">
                        <div class="col-xl-3 col-sm-6">
                            <div class="card chart-grd same-card">
                                <div class="card-body depostit-card p-0">
                                    <div class="depostit-card-media d-flex justify-content-between pb-0">
                                        <div>
                                            <h6>Total Investment</h6>
                                            <h3>{{ number_format($overAllInvestment) }}</h3>
                                        </div>
                                        <div class="icon-box bg-danger-light">
                                            <i class="fa-sharp fa-solid fa-rupee-sign text-danger"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6">
                            <div class="card chart-grd same-card">
                                <div class="card-body depostit-card p-0">
                                    <div class="depostit-card-media d-flex justify-content-between pb-0">
                                        <div>
                                            <h6>Office Investment</h6>
                                            <h3>{{ number_format($office->account_balance) }}</h3>

                                        </div>
                                        <div class="icon-box bg-danger-light">
                                            <i class="fa-sharp fa-solid fa-rupee-sign text-danger"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6">
                            <div class="card chart-grd same-card">
                                <div class="card-body depostit-card p-0">
                                    <div class="depostit-card-media d-flex justify-content-between pb-0">
                                        <div>
                                            <h6>Daily Profit</h6>
                                            <h3>{{ number_format($dailyProfit, 0, '.', ',') }}</h3>
                                        </div>
                                        <div class="icon-box bg-danger-light">
                                            <i class="fa-sharp fa-solid fa-rupee-sign text-danger"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 same-card">
                            <div class="card">
                                <div class="card-body depostit-card">
                                    <div class="depostit-card-media d-flex justify-content-between style-1">
                                        <div>
                                            <h6>Pending Withdraws</h6>
                                            <h3>{{ count($pendingWithdraws) }}</h3>
                                        </div>
                                        <div class="icon-box bg-danger-light">
                                            <i class="fas fa-clock text-danger"></i>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xl-3 t-earn">
                    <div class="card chart-grd same-card">
                        <div class="card-body depostit-card p-0">
                            <div class="depostit-card-media d-flex justify-content-between pb-0">
                                <div>
                                    <h4 class="heading mb-0">Total Earning</h4>
                                    <h2>{{ number_format($totalProfit, 0, '.', ',') }}</h2>
                                </div>
                                <div class="icon-box bg-danger-light">
                                    <i class="fa-sharp fa-solid fa-rupee-sign text-danger"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-md-12">
                    <div class="card overflow-hidden">
                        <div class="card-body p-0">
                            <div class="table-responsive active-projects style-1" style="padding: 30px">
                                <div class="tbl-caption">
                                    <h4 class="heading mb-0">Recent Withdrawas</h4>
                                    <div>
                                        <a class="btn btn-danger btn-sm" href="{{ URL::to('office/withdraws/all') }}"
                                            role="button">All Withdraws</a>
                                    </div>
                                </div>
                                <table class="display table">
                                    <thead>
                                        <tr>
                                            <th>User</th>
                                            <th>Withdraw Amount</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($withdraws as $withdraw)
                                            <tr>
                                                <td>
                                                    <div class="products">
                                                        <img src="{{ asset('uploads/' . $withdraw->user->profile_pic) }}"
                                                            class="avatar avatar-md" alt="">
                                                        <div>
                                                            <h6>{{ $withdraw->user->name }}</h6>
                                                            <span>{{ $withdraw->user->accound_id }}</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span>PKR {{ number_format($withdraw->amount) }}</span>
                                                </td>
                                                <td>
                                                    @if ($withdraw->status == 0)
                                                        <span class="badge badge-warning light border-0">Pending</span>
                                                    @elseif($withdraw->status == 1)
                                                        <span class="badge badge-success light border-0">Completed</span>
                                                    @elseif($withdraw->status == 2)
                                                        <span class="badge badge-danger light border-0">Declined</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($withdraw->status == 0)
                                                        <a href="{{ URL::to('office/withdraw/approve/' . $withdraw->id) }}"
                                                            class="badge badge-success light border-0">Approve</a>
                                                        <a href="{{ URL::to('office/withdraw/decline/' . $withdraw->id) }}"
                                                            class="badge badge-success light border-0">Decline</a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-md-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="table-responsive active-projects style-1" style="padding: 30px">
                                <div class="tbl-caption">
                                    <h4 class="heading mb-0">Recent Transactions</h4>
                                </div>
                                <div>
                                    <table class="table">
                                        <tr>
                                            <th>Transaction ID</th>
                                            <th>Reason</th>
                                            <th>User</th>
                                            <th>Amount</th>
                                        </tr>
                                        @foreach ($transactions as $transaction)
                                            <tr>
                                                <th>{{ $transaction->transaction_id }}</th>
                                                <td style="font-size: 10px">{{ $transaction->reason }}</td>
                                                <td style="font-size: 10px">
                                                    {{ isset($transaction->user->name) ? $transaction->user->name : '' }}
                                                </td>
                                                <td><strong>PKR
                                                        {{ $transaction->inout ? '+' : '-' }}{{ $transaction->amount }}</strong>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-md-12">
                    <div class="card overflow-hidden">
                        <div class="card-body p-0">
                            <div class="table-responsive active-projects style-1" style="padding: 30px">
                                <div class="tbl-caption">
                                    <h4 class="heading mb-0">Recently Activated Packages</h4>
                                    <div>
                                        <a class="btn btn-danger btn-sm" href="{{ URL::to('office/active-packages') }}"
                                            role="button">All Active Packages</a>
                                    </div>
                                </div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Package Details</th>
                                            <th>User Info</th>
                                            <th>Daily Profit</th>
                                            <th>Invested Amount</th>
                                            <th>Total Return</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($actives as $package)
                                            <tr>
                                                <td><span>{{ $package->package->name }}<br>{{ $package->package->meat_kgs }}
                                                        KGs</span></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        @if (isset($package->user->profile_pic) && isset($package->user->name))
                                                            <img src="{{ asset('uploads/' . $package->user->profile_pic) }}"
                                                                class="avatar rounded-circle" alt="">
                                                            <p class="mb-0 ms-2">
                                                                <span>{{ $package->user->name }}<br>{{ $package->user->email }}</span>
                                                            </p>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td class="pe-0">
                                                    <div class="tbl-progress-box">
                                                        <span class="text-danger">PKR
                                                            {{ $package->per_day_profit }}</span>
                                                    </div>
                                                </td>
                                                <td><span>PKR {{ $package->total_invested }}</span></td>
                                                <td><span>PKR {{ $package->total_return }}</span></td>
                                                <td>
                                                    <a href="{{ URL::to('office/invoice/' . $package->id) }}"
                                                        class="badge badge-danger light border-0">Invoice</a>
                                                    <button data-bs-toggle="modal"
                                                        data-bs-target="#packageModal-{{ $package->id }}"
                                                        class="badge badge-danger light border-0">View Details</button>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>

                                </table>
                                @foreach ($actives as $package)
                                    <div class="modal fade" id="packageModal-{{ $package->id }}">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">
                                                        {{ isset($package->user->name) ? $package->user->name : '' }} -
                                                        {{ isset($package->user->account_id) ? $package->user->account_id : '' }}
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <table class="table">
                                                        <tr>
                                                            <th>Name</th>
                                                            <td>{{ isset($package->user->name) ? $package->user->name : '' }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Phone Number</th>
                                                            <td>{{ isset($package->user->email) ? $package->user->email : '' }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Package Name</th>
                                                            <td>{{ $package->package->name }} </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Package Meat in KGs</th>
                                                            <td>{{ $package->package->meat_kgs }} KGs</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Price Per KG</th>
                                                            <td>PKR {{ $package->price_per_kg }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Total Investment</th>
                                                            <td>PKR {{ $package->total_invested }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Profit Per KG</th>
                                                            <td>PKR {{ $package->profit_per_kg }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Profit Per Day</th>
                                                            <td>PKR {{ $package->per_day_profit }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Total Days</th>
                                                            <td>{{ $package->total_days }} Day(s)</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Completed Days</th>
                                                            <td>{{ $package->completed_days }} Day(s)</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Remaining Days</th>
                                                            <td>{{ $package->remaining_days }} Day(s)</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Total Return</th>
                                                            <td>PKR {{ $package->total_return }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Started On</th>
                                                            <td>{{ $package->created_at }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Expires On</th>
                                                            <td>{{ $package->expire_on }}</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 flag">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="table-responsive active-projects style-1" style="padding: 30px">
                                <div class="tbl-caption">
                                    <h4 class="heading mb-0">Recent Users</h4>
                                    <div>
                                        <a class="btn btn-danger btn-sm" href="{{ URL::to('office/users') }}"
                                            role="button">All Users</a>
                                    </div>
                                </div>
                                <table class="display table">
                                    <thead>
                                        <tr>
                                            <th>User</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>
                                                    <div class="products">
                                                        <img src="{{ asset('uploads/' . $user->profile_pic) }}"
                                                            class="avatar avatar-md" alt="">
                                                        <div>
                                                            <h6>{{ $user->name }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="{{ URL::to('office/user/profile/' . $user->id) }}"
                                                        class="badge badge-success light border-0">View Profile</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('assets-office/js/dashboard/dashboard-1.js') }}"></script>
    <script src="{{ asset('assets-office/vendor/draggable/draggable.js') }}"></script>
@endsection
