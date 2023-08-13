@extends('Office.Screens.Layout')
@section('title', 'All Users')
@section('content')
<div class="content-body">
    <!-- row -->	
    <div class="page-titles">
        <ol class="breadcrumb">
            <li><h5 class="bc-title">Users</h5></li>
        </ol>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="table-responsive active-projects style-1" style="padding: 30px">
                            <div class="tbl-caption">
                                <h4 class="heading mb-0">Users</h4>
                                <div>
                                    <a class="btn btn-danger btn-sm" href="{{ URL::to('office/add-user') }}" role="button">+ Add User</a>
                                </div>
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
                                        <th>User ID</th>
                                        <th>User</th>
                                        <th>Phone</th>
                                        <th>Parent User</th>
                                        <th>Joining Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td><span>{{ $user->id }}</span></td>
                                        <td>
                                            <div class="products">
                                                <img src="{{ asset('uploads/' . $user->profile_pic) }}" class="avatar avatar-md" alt="">
                                                <div>
                                                    <h6>{{ $user->name }}</h6>
                                                </div>	
                                            </div>
                                        </td>
                                        <td><span class="text-danger">{{ $user->email }}</span></td>
                                        @if($user->parent)
                                        <td>
                                            <div class="products">
                                                <img src="{{ asset('uploads/' . $user->parent->profile_pic) }}" class="avatar avatar-md" alt="">
                                                <div>
                                                    <h6>{{ $user->parent->name }}</h6>
                                                    <span>{{ $user->parent->email }}</span>	
                                                </div>	
                                            </div>
                                        </td>
                                        @else
                                        <td>
                                            <span>None</span>
                                        </td>
                                        @endif
                                        <td>
                                            <span>{{ $user->created_at }}</span>
                                        </td>
                                        <td>
                                            <a href="{{ URL::to('office/user/profile/' . $user->id) }}" class="badge badge-success light border-0">View Profile</a>
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