@extends('Office.Screens.Layout')
@section('title', 'Declined Withdrawas')
@section('content')
<div class="content-body">
    <!-- row -->	
    <div class="page-titles">
        <ol class="breadcrumb">
            <li><h5 class="bc-title">Declined Withdrawas</h5></li>
        </ol>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="table-responsive active-projects style-1" style="padding: 30px">
                            <div class="tbl-caption">
                                <h4 class="heading mb-0">Declined Withdrawas</h4>
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
                                        <th>Withdraw ID</th>
                                        <th>User</th>
                                        <th>Withdraw Amount</th>
                                        <th>Status</th>
                                        <th>Withdraw Type</th>
                                        <th>Note</th>
                                        <th>Reference</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($withdraws as $withdraw)
                                    <tr>
                                        <td><span>{{ $withdraw->withdraw_id }}</span></td>
                                        <td>
                                            <div class="products">
                                                <img src="{{ asset('uploads/' . $withdraw->user->profile_pic) }}" class="avatar avatar-md" alt="">
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
                                            @if($withdraw->status == 0)
                                            <span class="badge badge-warning light border-0">Pending</span>
                                            @elseif($withdraw->status == 1)
                                            <span class="badge badge-success light border-0">Completed</span>
                                            @elseif($withdraw->status == 2)
                                            <span class="badge badge-danger light border-0">Declined</span>
                                            @endif
                                        </td>
                                        <td>
                                            <span>{{ $withdraw->withdraw_type }}</span>
                                        </td>
                                        <td>
                                            <span>{{ $withdraw->note }}</span>
                                        </td>
                                        @if($withdraw->reference_user_id)
                                        <td>
                                            {{$withdraw->reference_user->name}}
                                            <br>
                                            {{$withdraw->reference_user->email}}
                                        </td>
                                        @else
                                        <td>None</td>
                                        @endif
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