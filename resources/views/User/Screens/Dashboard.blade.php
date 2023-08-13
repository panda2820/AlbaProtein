@extends('User.Layouts.AppLayout')
@section('title', 'Dashboard')
@section('content')
    <div class="modal fade" id="userProfile-{{ Auth::user()->id }}">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ Auth::user()->name }} - {{ Auth::user()->email }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="table-responsive active-projects style-1" style="padding: 30px">
                                <div class="tbl-caption text-center mb-3">
                                    <h4 class="heading mb-0">{{ Auth::user()->name . "'s Profile" }}</h4>
                                </div>
                                <div class="text-center mb-3">
                                    <img src="{{ asset('uploads/' . Auth::user()->profile_pic) }}"
                                        style="height: 100px;width: 100px;border-radius:50px">
                                </div>
                                <table class="table">
                                    <tr>
                                        <th>Name</th>
                                        <td>{{ Auth::user()->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone Number</th>
                                        <td>{{ Auth::user()->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Profit Balance</th>
                                        <th>PKR {{ Auth::user()->account_balance }}</th>
                                    </tr>
                                    <tr>
                                        <th>Reference Balance</th>
                                        <th>PKR {{ Auth::user()->reference_balance }}</th>
                                    </tr>
                                </table>
                                <br>
                                <br>
                                <h4 class="heading mb-0">Referred From</h4>
                                <br>
                                @if ($from)
                                    <table class="table">
                                        <tr>
                                            <th class="align-middle">
                                                <a href="#">
                                                    <img src="{{ asset('uploads/' . $from->profile_pic) }}"
                                                        style="height: 50px; width:50px;border-radius:25px">
                                                    <span style="margin-left: 10px;">{{ $from->name }}</span>
                                                </a>
                                            </th>
                                            <td class="align-middle">{{ $from->email }}</td>
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
                                                <th class="align-middle">
                                                    <a href="#">
                                                        <img src="{{ asset('uploads/' . $ref->profile_pic) }}"
                                                            style="height: 50px; width:50px;border-radius:25px">
                                                        <span style="margin-left: 10px;">{{ $ref->name }}</span>
                                                    </a>
                                                </th>
                                                <td class="align-middle">{{ $ref->email }}</td>
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
            </div>
        </div>
    </div>
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Dashboard</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-xl-4">
                    <div class="card overflow-hidden">
                        <div class="bg-primary bg-soft">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-3">
                                        <h5 class="text-primary">Welcome Back !</h5>
                                        <p>{{ Auth::user()->name }}</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="{{ asset('assets-user/images/profile-img.png') }}" alt=""
                                        class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <img src="{{ asset('uploads/' . Auth::user()->profile_pic) }}" alt=""
                                            class="img-thumbnail rounded-circle"
                                            style="height: 75px;width: 75px;object-fit: cover;">
                                    </div>
                                    <h5 class="font-size-15 text-truncate">{{ Auth::user()->name }}</h5>
                                    <p class="text-muted mb-0 text-truncate">{{ Auth::user()->email }}</p>
                                </div>

                                <div class="col-sm-8">
                                    <div class="pt-4">

                                        <div class="row">
                                            <div class="col-6">
                                                <h5 class="font-size-15">PKR
                                                    {{ number_format(Auth::user()->account_balance) }}</h5>
                                                <p class="text-muted mb-0">Profit Balance</p>
                                            </div>
                                            <div class="col-6">
                                                <h5 class="font-size-15">PKR
                                                    {{ number_format(Auth::user()->reference_balance) }}</h5>
                                                <p class="text-muted mb-0">Reference Balance</p>
                                            </div>
                                        </div>
                                        <div class="mt-4">
                                            <button data-bs-toggle="modal"
                                                data-bs-target="#userProfile-{{ Auth::user()->id }}"
                                                class="btn btn-primary waves-effect waves-light btn-sm">View Profile <i
                                                    class="mdi mdi-arrow-right ms-1"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">References Investment</h4>
                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="text-muted">This month</p>
                                    <h3>PKR {{ isset($refInvestment) ? number_format($refInvestment) : '0' }}</h3>
                                    <p class="text-muted"><span class="text-success me-2"> 25% <i
                                                class="mdi mdi-arrow-up"></i> </span> Next Month Target</p>
                                    <div class="mt-4">
                                        <h4>PKR {{ isset($nextTarget) ? number_format($nextTarget) : '0' }}</h4>
                                    </div>
                                </div>
                            </div>
                            <p class="text-muted mb-0">The target will increase with more investments.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium">Active Packages</p>
                                            <h4 class="mb-0">{{ count(Auth::user()->active_packages) }}</h4>
                                        </div>
                                        <div class="flex-shrink-0 align-self-center">
                                            <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                                <span class="avatar-title">
                                                    <i class="bx bx-copy-alt font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium">Total Investement</p>
                                            <h4 class="mb-0">PKR {{ number_format($totalInvestment) }}</h4>
                                        </div>

                                        <div class="flex-shrink-0 align-self-center ">
                                            <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                <span class="avatar-title rounded-circle bg-primary">
                                                    <i class="bx bx-archive-in font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium">Total Profit Earned</p>
                                            <h4 class="mb-0">PKR {{ number_format($totalReturn) }}</h4>
                                        </div>

                                        <div class="flex-shrink-0 align-self-center">
                                            <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                <span class="avatar-title rounded-circle bg-primary">
                                                    <i class="bx bx-purchase-tag-alt font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium">Promo Cash</p>
                                            <h4 class="mb-0">PKR {{ number_format($promo_balance) }}</h4>
                                        </div>
                                        <div class="flex-shrink-0 align-self-center">
                                            <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                <span class="avatar-title rounded-circle bg-primary">
                                                    <i class="bx bx-purchase-tag-alt font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($target)
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card mini-stats-wid">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-muted fw-medium">Target Investment</p>
                                                <h4 class="mb-0">{{ number_format($target->target_amount) }}</h4>
                                            </div>
                                            <div class="flex-shrink-0 align-self-center">
                                                <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                                    <span class="avatar-title">
                                                        <i class="bx bx-dollar font-size-24"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card mini-stats-wid">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-muted fw-medium">Completed Investment</p>
                                                <h4 class="mb-0">PKR {{ number_format($target->completed) }}</h4>
                                            </div>

                                            <div class="flex-shrink-0 align-self-center ">
                                                <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                    <span class="avatar-title rounded-circle bg-primary">
                                                        <i class="bx bx-dollar font-size-24"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card mini-stats-wid">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-muted fw-medium">Remaining Investment</p>
                                                <h4 class="mb-0">PKR {{ number_format($target->remaining) }}</h4>
                                            </div>

                                            <div class="flex-shrink-0 align-self-center">
                                                <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                    <span class="avatar-title rounded-circle bg-primary">
                                                        <i class="bx bx-dollar font-size-24"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <!-- end row -->
                    <div class="row">
                        @foreach ($actives as $active)
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="text-center">
                                            <p class="font-16 text-muted mb-2"></p>
                                            <h4><a href="javascript: void(0);"
                                                    class="text-dark">{{ $active['package']->name }}</a></h4>
                                            <p class="font-16 text-muted mb-2">{{ $active['office_code'] }}</p>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-12">
                                                <div class="social-source text-center mt-3">
                                                    {!! QrCode::size(150)->generate(Request::getSchemeAndHttpHost() . '/user/package/invoice/' . $active['qr']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-lg-10">
                                    <h4 class="mt-4 fw-semibold">Invite Users</h4>
                                    <p class="text-muted mt-3" id="referLink">
                                        {{ Request::getSchemeAndHttpHost() }}/user/register/{{ Auth::user()->email }}</p>
                                    <p class="mt-3">share this link with others to invite them</p>
                                    <div class="mt-4">
                                        <button type="button" id="btnCopy" class="btn btn-danger">
                                            Click to Copy
                                        </button>
                                    </div>
                                    <div>
                                        <a href="https://api.whatsapp.com/send?text={{ Request::getSchemeAndHttpHost() }}/register/{{ Auth::user()->email }}"
                                            target="_blank" data-action="share/whatsapp/share"
                                            class="btn btn-success mt-3 m-1"><i class="bx bxl-whatsapp"></i></a>
                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ Request::getSchemeAndHttpHost() }}/register/{{ Auth::user()->email }}"
                                            target="_blank" data-action="share/whatsapp/share"
                                            class="btn btn-primary mt-3 m-1"><i class="bx bxl-facebook-circle"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-5">Activity</h4>
                            <ul class="verti-timeline list-unstyled">
                                @foreach ($transactions as $transaction)
                                    <li class="event-list">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">
                                                <h5 class="font-size-14">
                                                    {{ \Carbon\Carbon::parse($transaction->created_at)->format('d M') }} <i
                                                        class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ms-2"></i>
                                                </h5>
                                            </div>
                                            <div class="flex-grow-1">
                                                <div>
                                                    {{ $transaction->reason }}
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="text-center mt-4"><a href="{{ URL::to('/user/transactions') }}"
                                    class="btn btn-primary waves-effect waves-light btn-sm">View More <i
                                        class="mdi mdi-arrow-right ms-1"></i></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Recent Withdraws</h4>
                            <div class="table-responsive mt-4">
                                <table class="table align-middle table-nowrap">
                                    <tbody>
                                        @foreach ($withdraws as $withdraw)
                                            <tr>
                                                <td style="width: 30%">
                                                    <p class="mb-0">
                                                        {{ $withdraw->withdraw_type == 1 ? 'Profit Withdraw' : 'Reference Withdraw' }}
                                                    </p>
                                                </td>
                                                <td style="width: 25%">
                                                    <h5 class="mb-0">PKR {{ $withdraw->amount }}</h5>
                                                </td>
                                                <td>
                                                    @if ($withdraw->status == 0)
                                                        <span
                                                            class="badge rounded-pill badge-soft-warning font-size-11">Pending</span>
                                                    @elseif($withdraw->status == 1)
                                                        <span
                                                            class="badge rounded-pill badge-soft-success font-size-11">Completed</span>
                                                    @elseif($withdraw->status == 2)
                                                        <span
                                                            class="badge rounded-pill badge-soft-danger font-size-11">Rejected</span>
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
            </div>
            <!-- end row -->
        </div>
        <!-- container-fluid -->
    </div>
@endsection
@section('script')
    <script>
        $(function() {
            $("#btnCopy").click(function() {
                const toCopy = $("#referLink").html();
                navigator.clipboard.writeText(toCopy);
                notyf.success('Invitation link copied!');
            });
        })
    </script>
@endsection
