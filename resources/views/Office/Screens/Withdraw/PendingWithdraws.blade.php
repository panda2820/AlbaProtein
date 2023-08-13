@extends('Office.Screens.Layout')
@section('title', 'Pending Withdrawas')
@section('content')
<div class="content-body">
    <!-- row -->	
    <div class="page-titles">
        <ol class="breadcrumb">
            <li><h5 class="bc-title">Pending Withdrawas</h5></li>
        </ol>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="table-responsive active-projects style-1" style="padding: 30px">
                            <div class="tbl-caption">
                                <h4 class="heading mb-0">Pending Withdrawas</h4>
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
                                        <th>Actions</th>
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
                                            @if ($withdraw->status == 0)
                                                <button data-bs-toggle="modal"
                                                    data-bs-target="#approveWithdrawModel-{{ $withdraw->id }}"
                                                    class="badge badge-success light border-0">Approve</button>
                                                <button data-bs-toggle="modal"
                                                    data-bs-target="#declineWithdrawModel-{{ $withdraw->id }}"
                                                    class="badge badge-danger light border-0">Decline</button>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @foreach ($withdraws as $withdraw)
                                    <div class="modal fade" id="approveWithdrawModel-{{ $withdraw->id }}">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Any Note for User</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST"
                                                        action="{{ URL::to('office/withdraw/approve') }}">
                                                        @csrf
                                                        <input name="withdraw_id" type="hidden" value="{{$withdraw->id}}">
                                                        <div class="form-group">
                                                            <label for="approveWithdrawModel">Enter a note to user</label>
                                                            <textarea class="form-control" id="approveWithdrawModel" rows="3" name="note"></textarea>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary my-2">Submit</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="declineWithdrawModel-{{ $withdraw->id }}">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Any Note for User</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST"
                                                        action="{{ URL::to('office/withdraw/decline') }}">
                                                        @csrf
                                                        <input name="withdraw_id" type="hidden" value="{{$withdraw->id}}">
                                                        <div class="form-group">
                                                            <label for="approveWithdrawModel">Enter a note to user</label>
                                                            <textarea class="form-control" id="approveWithdrawModel" rows="3" name="note"></textarea>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary my-2">Submit</button>
                                                    </form>
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