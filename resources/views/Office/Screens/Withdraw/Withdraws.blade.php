@extends('Office.Screens.Layout')
@section('title', 'Withdrawas')
@section('content')
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    <div class="body-wrapper">
        <div class="container-fluid">
            <div class="card bg-light-info shadow-none position-relative overflow-hidden">
                <div class="card-body px-4 py-3">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <h4 class="fw-semibold mb-8">Active Packages</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a class="text-muted" href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item" aria-current="page">Active Packages</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-3">
                            <div class="text-center mb-n5">
                                <img src="../../dist/images/breadcrumb/ChatBc.png" alt="" class="img-fluid mb-n4">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="widget-content searchable-container list">
                <!-- ---------------------
                            end Contact
                        ---------------- -->
                <div class="card card-body">
                    <div class="table-responsive">
                        <table class="table search-table align-middle text-nowrap">
                            <thead class="header-item">
                                <th>

                                </th>
                                <th>Withdraw ID</th>
                                            <th>User</th>
                                            <th>Withdraw Amount</th>
                                            <th>Status</th>
                                            <th>Withdraw Type</th>
                                            <th>Note</th>
                                            <th>Reference</th>
                                            <th>Actions</th>
                            </thead>
                            <tbody>
                                <!-- start row -->
                                @foreach ($withdraws as $withdraw)
                                <tr class="search-items">
                                    <td>
                                        <div class="n-chk align-self-center text-center">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input contact-chkbox primary" id="checkbox1" />
                                                <label class="form-check-label" for="checkbox1"></label>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span>{{ $package->id }}</span>
                                    </td>
                                    <td>
                                        <span class="user-name mb-0">{{ $package->package->name }}<br>{{ $package->package->meat_kgs }} KGs</span>
                                    </td>
                                    <td>
                                        <span class="usr-email-addr">{{ $package->user->name }}<br>{{ $package->user->email }}</span>
                                    </td>
                                    <td>
                                        <span>PKR {{ $package->per_day_profit }}</span>
                                    </td>
                                    <td>
                                        <span class="usr-ph-no">{{ $package->completed_days }}</span>
                                    </td>
                                    <td>
                                        <span class="usr-ph-no">PKR {{ $package->total_return }}</span>
                                    </td>
                                    <td>
                                        <a href="{{ URL::to('office/invoice/' . $package->id) }}" class="ti ti-map fs-6" title="Invoice"></a>
                                        <a data-bs-toggle="modal" data-bs-target="#packageModal-{{ $package->id }}" class="ti ti-book fs-6" type="button" title="Details"></a>
                                    </td>
                                </tr>
                                <!-- end row -->
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
