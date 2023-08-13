@extends('Office.Screens.Layout')
@section('title', 'Promos')
@section('content')
<div class="content-body">
    <!-- row -->	
    <div class="page-titles">
        <ol class="breadcrumb">
            <li><h5 class="bc-title">Promos</h5></li>
        </ol>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="table-responsive active-projects style-1" style="padding: 30px">
                            <div class="tbl-caption">
                                <h4 class="heading mb-0">Promos</h4>
                            </div>
                            @if(Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade show">
                                <i data-feather="user-check"></i>
                                {{Session::get('success')}}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
                            </div>
                            @endif
                            <table class="display table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>User</th>
                                        <th>Promo Balance</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($promos as $promo)
                                    <tr>
                                        <td><span>{{ $promo->id }}</span></td>
                                        <td>
                                            <div class="products">
                                                <img src="{{ asset('uploads/' . $promo->user->profile_pic) }}" class="avatar avatar-md" alt="">
                                                <div>
                                                    <h6>{{ $promo->user->name }}</h6>
                                                </div>	
                                            </div>
                                        </td>
                                        <td><span>PKR {{ $promo->amount }}</span></td>
                                        <td>
                                            <a href="{{ URL::to('office/give-promo/' . $promo->user->id) }}" class="badge badge-success light border-0">Give Cash</a>
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