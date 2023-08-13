@extends('Office.Screens.Layout')
@section('title', 'All Packages')
@section('content')
<div class="content-body">
    <!-- row -->	
    <div class="page-titles">
        <ol class="breadcrumb">
            <li><h5 class="bc-title">Packages</h5></li>
        </ol>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="table-responsive active-projects style-1" style="padding: 30px">
                            <div class="tbl-caption">
                                <h4 class="heading mb-0">Packages</h4>
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
                                        <th>Package ID</th>
                                        <th>Package Name</th>
                                        <th>Withdraw After</th>
                                        <th>Meat KGs</th>
                                        <th>Profit Per KG</th>
                                        <th>No. Of Days</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($packages as $package)
                                    <tr>
                                        <td><span>{{ $package->id }}</span></td>
                                        <td><span>{{ $package->name }}</span></td>
                                        <td><span>{{ $package->update_after }} Days</span></td>
                                        <td><span>{{ $package->meat_kgs }} KGs</span></td>
                                        <td><span>PKR {{ $package->profit_per_kg }}</span></td>
                                        <td><span>{{ $package->no_days }} Days</span></td>
                                        <td>
                                            <a href="{{ URL::to('office/package/add/' . $package->id) }}" class="badge badge-danger light border-0">Add User</a>
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