@extends('Office.Screens.Layout')
@section('title', 'Invoice')
@section('content')
<div class="content-body">
    <!-- row -->	
    <div class="page-titles">
        <ol class="breadcrumb">
            <li><h5 class="bc-title">Invoice</h5></li>
        </ol>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3"></div>
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="table-responsive active-projects style-1 text-center" style="padding: 30px">
                            <img src="{{ asset('logo/logo.png') }}" style="height: 150px">
                            <table class="table mt-3">
                                <tr>
                                    <th style="text-align: left">Subscriber Name</th>
                                    <td style="text-align: left">{{ $active_package->user->name }}</td>
                                </tr>
                                <tr>
                                    <th style="text-align: left">Phone</th>
                                    <td style="text-align: left">{{ $active_package->user->email }}</td>
                                </tr>
                                <tr>
                                    <th style="text-align: left">Package Name</th>
                                    <td style="text-align: left">{{ $active_package->package->name }}</td>
                                </tr>
                                <tr>
                                    <th style="text-align: left">Office ID</th>
                                    <td style="text-align: left">{{ $active_package->office->office_code }}</td>
                                </tr>
                            </table>
                            <div class="text-center mt-3" style="padding-top: 30px;" height="10" width ='10>
                                {!! QrCode::size(250)->generate( Request::getSchemeAndHttpHost() . '/user/package/invoice/' . $encrypted ); !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3"></div>
        </div>
    
    </div>
</div>
@endsection