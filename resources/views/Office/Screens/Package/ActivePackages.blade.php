@extends('Office.Screens.Layout')
@section('title', 'All Active Packages')
@section('content')
<div class="content-body">
    <!-- row -->	
    <div class="page-titles">
        <ol class="breadcrumb">
            <li><h5 class="bc-title">All Active Packages</h5></li>
        </ol>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="table-responsive active-projects style-1" style="padding: 30px">
                            <div class="tbl-caption">
                                <h4 class="heading mb-0">All Active Packages</h4>
                            </div>
                            @if(Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade show">
                                <i data-feather="user-check"></i>
                                {{Session::get('success')}}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
                            </div>
                            @endif
                            <table id="example" class="display table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Package Details</th>
                                        <th>User Info</th>
                                        <th>Daily Profit</th>
                                        <th>Days Completed</th>
                                        <th>Total Return</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($actives as $package)
                                    <tr>
                                        <td><span>{{ $package->id }}</span></td>
                                        <td><span>{{ $package->package->name }}<br>{{ $package->package->meat_kgs }} KGs</span></td>
                                        <td><span>{{ $package->user->name }}<br>{{ $package->user->email }}</span></td>
                                        <td><span>PKR {{ $package->per_day_profit }}</span></td>
                                        <td><span>{{ $package->completed_days }}</span></td>
                                        <td><span>PKR {{ $package->total_return }}</span></td>
                                        <td>
                                            <a href="{{ URL::to('office/invoice/' . $package->id) }}" class="badge badge-danger light border-0">Invoice</a>
                                            <button data-bs-toggle="modal" data-bs-target="#packageModal-{{ $package->id }}" class="badge badge-danger light border-0">View Details</button>
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
                                            <h5 class="modal-title">{{ $package->user->name }} - {{ $package->user->account_id }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal">
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
        </div>
    </div>
</div>
@endsection