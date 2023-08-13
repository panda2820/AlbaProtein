@extends('User.Layouts.AppLayout')
@section('title', 'Withdraws')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Withdraws</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">All Withdraws</h4>
                        <table id="transactionsTable" class="table table-bordered dt-responsive  nowrap w-100">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Withdraw ID</th>
                                    <th>Amount</th>
                                    <th>Withdraw Type</th>
                                    <th>Office ID</th>
                                    <th>Note</th>
                                    <th>Refered To</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($withdraws as $withdraw)
                                <tr>
                                    <td>{{ $withdraw->id }}</td>
                                    <td>{{ $withdraw->withdraw_id }}</td>
                                    <td>PKR {{ $withdraw->amount }}</td>
                                    <td>{{ $withdraw->withdraw_type == 1 ? 'Profit Withdraw' : 'Reference Withdraw' }}</td>
                                    <td>{{ $withdraw->office->office_code }}</td>
                                    <td>{{ $withdraw->note }}</td>
                                    @if($withdraw->reference_user_id)
                                    <td>
                                        {{$withdraw->reference_user->name}}
                                        <br>
                                        {{$withdraw->reference_user->email}}
                                    </td>
                                    @else
                                    <td>None</td>
                                    @endif
                                    <td>
                                        @if($withdraw->status == 0)
                                        <span class="badge rounded-pill badge-soft-warning font-size-11">Pending</span>
                                        @elseif($withdraw->status == 1)
                                        <span class="badge rounded-pill badge-soft-success font-size-11">Completed</span>
                                        @elseif($withdraw->status == 2)
                                        <span class="badge rounded-pill badge-soft-danger font-size-11">Rejected</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>

    </div> <!-- container-fluid -->
</div>
@endsection
@section('script')
<script>
    $("#transactionsTable").DataTable({
        "order": [[ 0, "desc" ]]
    });
</script>
@endsection