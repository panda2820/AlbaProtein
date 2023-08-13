@extends('Admin.Screens.Layout')
@section('title', 'Dashboard')
@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Dashboard</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ URL::to('/admin/dashboard') }}">Dashboards</a>
                                    </li>
                                    <li class="breadcrumb-item active">
                                        {{ basename(parse_url(url()->current(), PHP_URL_PATH)) }}</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col">

                        <div class="h-100">

                            <div class="row pb-1">
                                <div class="col-xl-3 col-md-6">
                                    <!-- card -->
                                    <div class="card card-animate">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                                        Total Investment</p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-end justify-content-between mt-4">
                                                <div>
                                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4">PKR <span
                                                            class="counter-value"
                                                            data-target="{{ $overAllInvestment }}"></span></h4>
                                                </div>
                                                <div class="avatar-sm flex-shrink-0">
                                                    <span class="avatar-title bg-success rounded fs-3">
                                                        <i class="fa-solid fa-rupee-sign"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div><!-- end card body -->
                                    </div><!-- end card -->
                                </div><!-- end col -->


                                <div class="col-xl-3 col-md-6">
                                    <!-- card -->
                                    <div class="card card-animate">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                                        Total Withdrawas</p>
                                                </div>
                                                {{-- <div class="flex-shrink-0">
                                                    <h5 class="text-success fs-14 mb-0">
                                                        <i class="ri-arrow-right-up-line fs-13 align-middle"></i> +29.08 %
                                                    </h5>
                                                </div> --}}
                                            </div>
                                            <div class="d-flex align-items-end justify-content-between mt-4">
                                                <div>
                                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span
                                                            class="counter-value"
                                                            data-target="{{ $totalWithdraws }}">0</span></h4>
                                                    <a href="{{URL::to('/admin/withdraws/all')}}" class="text-decoration-underline">View All Withdraws</a>
                                                </div>
                                                <div class="avatar-sm flex-shrink-0">
                                                    <span class="avatar-title bg-warning rounded fs-3">
                                                        <i class="fas fa-hand-holding-usd"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div><!-- end card body -->
                                    </div><!-- end card -->
                                </div><!-- end col -->

                                <div class="col-xl-3 col-md-6">
                                    <!-- card -->
                                    <div class="card card-animate">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> Total Activate Packages</p>
                                                </div>
                                                {{-- <div class="flex-shrink-0">
                                                    <h5 class="text-muted fs-14 mb-0">
                                                        +0.00 %
                                                    </h5>
                                                </div> --}}
                                            </div>
                                            <div class="d-flex align-items-end justify-content-between mt-4">
                                                <div>
                                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span
                                                            class="counter-value" data-target="{{$totalActivePackages}}">0</span> </h4>
                                                    <a href="{{URL::to('/admin/active-packages')}}" class="text-decoration-underline">View All Activate Packages</a>
                                                </div>
                                                <div class="avatar-sm flex-shrink-0">
                                                    <span class="avatar-title bg-danger rounded fs-3">
                                                        <i class="fas fa-tags"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div><!-- end card body -->
                                    </div><!-- end card -->
                                </div><!-- end col -->

                                
                                <div class="col-xl-3 col-md-6">
                                    <!-- card -->
                                    <div class="card card-animate">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                                        Offices</p>
                                                </div>
                                                {{-- <div class="flex-shrink-0">
                                                    <h5 class="text-danger fs-14 mb-0">
                                                        <i class="ri-arrow-right-down-line fs-13 align-middle"></i> -3.57
                                                        %
                                                    </h5>
                                                </div> --}}
                                            </div>
                                            <div class="d-flex align-items-end justify-content-between mt-4">
                                                <div>
                                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span
                                                            class="counter-value"
                                                            data-target="{{ $totalOffices }}">0</span></h4>
                                                    <a href="{{ URL::to('/admin/offices') }}"
                                                        class="text-decoration-underline">View all
                                                        Offices</a>
                                                </div>
                                                <div class="avatar-sm flex-shrink-0">
                                                    <span class="avatar-title bg-info rounded fs-3">
                                                        <i class="fa-regular fa-building"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div><!-- end card body -->
                                    </div><!-- end card -->
                                </div><!-- end col -->

                            </div> <!-- end row-->

                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-header align-items-center d-flex">
                                            <h4 class="card-title mb-0 flex-grow-1">Leader</h4>
                                            <div class="flex-shrink-0">
                                                <a href="{{ URL::to('/admin/leader') }}"
                                                    class="btn btn-soft-primary btn-sm shadow-none">
                                                    Change Leader
                                                </a>
                                            </div>
                                        </div><!-- end card header -->
                                        <div class="card-body p-0">
                                            <div class="table-responsive active-projects style-1" style="padding: 30px">
                                                <table class="display table">
                                                    <thead>
                                                        <tr>
                                                            <th>User ID</th>
                                                            <th>Name</th>
                                                            <th>Phone</th>
                                                            <th>Joining Date</th>
                                                            <th>Account Balance</th>
                                                            <th>Reference Balance</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if($leader)
                                                        <tr>
                                                            <td>
                                                                <div class="products">
                                                                    <div>
                                                                        <h6>{{ $leader->id }}</h6>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <span>{{ $leader->name }}</span>
                                                            </td>
                                                            <td>
                                                                <span>{{ $leader->email }}</span>
                                                            </td>
                                                            <td>
                                                                <span>{{ $leader->created_at }}</span>
                                                            </td>
                                                            <td>
                                                                <span>{{ $leader->account_balance }}</span>
                                                            </td>
                                                            <td>
                                                                <span>{{ $leader->reference_balance }}</span>
                                                            </td>
                                                            <td>
                                                                <a href="{{ URL::to('admin/leader/remove/' . $leader->id) }}" class="badge badge-danger light border-0">Remove Leader</a>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end col -->
                            </div>

                            <div class="row">
                                <div class="col-xl-8">
                                    <div class="card">
                                        <div class="card-header align-items-center d-flex">
                                            <h4 class="card-title mb-0 flex-grow-1">Recently Added Offices</h4>
                                            <div class="flex-shrink-0">
                                                <a href="{{ URL::to('/admin/offices') }}"
                                                    class="btn btn-soft-primary btn-sm shadow-none">
                                                    View All Offices
                                                </a>
                                            </div>
                                        </div><!-- end card header -->
                                        <div class="card-body p-0">
                                            <div class="table-responsive active-projects style-1" style="padding: 30px">
                                                <table id="example" class="display table">
                                                    <thead>
                                                        <tr>
                                                            <th>Office</th>
                                                            <th>Country</th>
                                                            <th>State</th>
                                                            <th>City</th>
                                                            <th>Office Code</th>
                                                            <th>Account Balance</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($offices as $office)
                                                            <tr>
                                                                <td>
                                                                    <div class="products">
                                                                        <div>
                                                                            <h6>{{ $office->name }}</h6>
                                                                        </div>
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <span>{{ $office->country }}</span>
                                                                </td>
                                                                <td>
                                                                    <span>{{ $office->state }}</span>
                                                                </td>
                                                                <td>
                                                                    <span>{{ $office->city }}</span>
                                                                </td>
                                                                <td>
                                                                    <span>{{ $office->office_code }}</span>
                                                                </td>
                                                                <td>
                                                                    <span>{{ $office->account_balance }}</span>
                                                                </td>
                                                                <td>
                                                                    <a href="{{ URL::to('admin/office/profile/' . $office->id) }}"
                                                                        class="badge badge-success light border-0">View
                                                                        Profile</a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end col -->

                                <div class="col-xl-4">
                                    <!-- card -->
                                    <div class="card card-height-100">
                                        <div class="card-header align-items-center d-flex">
                                            <h4 class="card-title mb-0 flex-grow-1">Office Users</h4>
                                            <div class="flex-shrink-0">
                                                <a href="{{ URL::to('/admin/office-users') }}"
                                                    class="btn btn-soft-primary btn-sm shadow-none">
                                                    View All Office Users
                                                </a>
                                            </div>
                                        </div><!-- end card header -->

                                        <!-- card body -->
                                        <div class="card-body p-0">
                                            <div class="table-responsive active-projects style-1" style="padding: 20px">
                                                <table id="example" class="display table">
                                                    <thead>
                                                        <tr>
                                                            <th>User</th>
                                                            <th>Office</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($officeUsers as $user)
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
                                                                    <span>{{ $user->office->name }}</span>
                                                                </td>

                                                                <td>
                                                                    <a href="{{ $user->user_type == '0' ? URL::to('admin/user/profile/' . $user->id) : URL::to('admin/office/profile/' . $user->office->id) }}"
                                                                        class="badge badge-success light border-0">View
                                                                        {{ $user->user_type == '0' ? 'Profile' : 'Office' }}
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- end card body -->
                                    </div>
                                    <!-- end card -->
                                </div>
                                <!-- end col -->
                            </div>

                            <div class="row">
                                <div class="col-xl-7">
                                    <div class="card">
                                        <div class="card-header align-items-center d-flex">
                                            <h4 class="card-title mb-0 flex-grow-1">Recently Activated Packages</h4>
                                            <div class="flex-shrink-0">
                                                <a href="{{ URL::to('/admin/active-packages') }}"
                                                    class="btn btn-soft-primary btn-sm shadow-none">
                                                    View All Active Packages
                                                </a>
                                            </div>
                                        </div><!-- end card header -->
                                        <div class="card-body p-0">
                                            <div class="table-responsive active-projects style-1" style="padding: 30px">
                                                <table id="example" class="display table">
                                                    <thead>
                                                        <tr>
                                                            <th>Package Details</th>
                                                            <th>User Info</th>
                                                            <th>Daily Profit</th>
                                                            <th>Invested Amount</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($activePackages as $package)
                                                            <tr>
                                                                <td><span>{{ $package->package->name }}<br>{{ $package->package->meat_kgs }}
                                                                        KGs</span></td>
                                                                <td><span>{{ $package->user->name }}<br>{{ $package->user->email }}</span>
                                                                </td>
                                                                <td><span>PKR {{ $package->per_day_profit }}</span></td>
                                                                <td><span>PKR {{ $package->total_invested }}</span></td>
                                                                <td>
                                                                    <a href="{{ URL::to('admin/invoice/' . $package->id) }}"
                                                                        class="badge badge-danger light border-0">Invoice</a>
                                                                    <button data-bs-toggle="modal"
                                                                        data-bs-target="#packageModal-{{ $package->id }}"
                                                                        class="badge badge-danger light border-0">View
                                                                        Details</button>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                @foreach ($activePackages as $package)
                                                    <div class="modal fade" id="packageModal-{{ $package->id }}">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">{{ $package->user->name }} -
                                                                        {{ $package->user->account_id }}</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal">
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <table class="table">
                                                                        <tr>
                                                                            <th>Name</th>
                                                                            <td>{{ $package->user->name }} </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Phone Number</th>
                                                                            <td>{{ $package->user->email }} </td>
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

                                <div class="col-xl-5">
                                    <div class="card">
                                        <div class="card-header align-items-center d-flex">
                                            <h4 class="card-title mb-0 flex-grow-1">Packages</h4>
                                            <div class="flex-shrink-0">
                                                <a href="{{ URL::to('/admin/packages') }}"
                                                    class="btn btn-soft-primary btn-sm shadow-none">
                                                    View All Packages
                                                </a>
                                            </div>
                                        </div><!-- end card header -->
                                        <div class="card-body p-0">
                                            <div class="table-responsive active-projects style-1" style="padding: 20px">
                                                <table id="example" class="display table">
                                                    <thead>
                                                        <tr>
                                                            <th>Package Name</th>
                                                            <th>Withdraw After</th>
                                                            <th>Meat KGs</th>
                                                            <th>Profit Per KG</th>
                                                            <th>No. Of Days</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($packages as $package)
                                                            <tr>
                                                                <td><span>{{ $package->name }}</span></td>
                                                                <td><span>{{ $package->update_after }} Days</span></td>
                                                                <td><span>{{ $package->meat_kgs }} KGs</span></td>
                                                                <td><span>PKR {{ $package->profit_per_kg }}</span></td>
                                                                <td><span>{{ $package->no_days }} Days</span></td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- .col-->
                            </div> <!-- end row-->

                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="card">
                                        <div class="card-header align-items-center d-flex">
                                            <h4 class="card-title mb-0 flex-grow-1">Recent Withdrawas</h4>
                                            <div class="flex-shrink-0">
                                                <a href="{{ URL::to('/admin/withdraws/all') }}"
                                                    class="btn btn-soft-primary btn-sm shadow-none">
                                                    View All Withdrawas
                                                </a>
                                            </div>
                                        </div><!-- end card header -->
                                        <div class="card-body p-0">
                                            <div class="table-responsive active-projects style-1" style="padding: 30px">
                                                <table id="example" class="display table">
                                                    <thead>
                                                        <tr>
                                                            <th>Withdraw ID</th>
                                                            <th>User</th>
                                                            <th>Withdraw Amount</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($withdraws as $withdraw)
                                                            <tr>
                                                                <td><span>{{ $withdraw->withdraw_id }}</span></td>
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
                                                                    <span>PKR {{ $withdraw->amount }}</span>
                                                                </td>
                                                                <td>
                                                                    @if ($withdraw->status == 0)
                                                                        <span
                                                                            class="badge badge-warning light border-0">Pending</span>
                                                                    @elseif($withdraw->status == 1)
                                                                        <span
                                                                            class="badge badge-success light border-0">Completed</span>
                                                                    @elseif($withdraw->status == 2)
                                                                        <span
                                                                            class="badge badge-danger light border-0">Declined</span>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- .card-->
                                </div> <!-- .col-->
                                <div class="col-xl-6">
                                    <div class="card">
                                        <div class="card-header align-items-center d-flex">
                                            <h4 class="card-title mb-0 flex-grow-1">Recent Transictions</h4>
                                            <div class="flex-shrink-0">
                                                <a href="{{ URL::to('/admin/transictions') }}"
                                                    class="btn btn-soft-primary btn-sm shadow-none">
                                                    View All Transictions
                                                </a>
                                            </div>
                                        </div><!-- end card header -->
                                        <div class="card-body p-0">
                                            <div class="table-responsive active-projects style-1" style="padding: 30px">
                                                <table id="example" class="display table">
                                                    <thead>
                                                        <tr>
                                                            <th>Transaction ID</th>
                                                            <th>Performed By</th>
                                                            <th>Amount</th>
                                                            <th>Date & Time</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($transactions as $transaction)
                                                            <tr>
                                                                <td>{{ $transaction->transaction_id }}</td>
                                                                <td>{{ $transaction->user->name }}</td>
                                                                <td><strong>PKR
                                                                        {{ $transaction->inout ? '+' : '-' }}{{ $transaction->amount }}</strong>
                                                                </td>
                                                                <td>{{ $transaction->created_at }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- .card-->
                                </div> <!-- .col-->

                            </div> <!-- end row-->

                        </div> <!-- end .h-100-->

                    </div> <!-- end col -->
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
                </div>
            </div>
        </footer>
    </div>
@endsection
