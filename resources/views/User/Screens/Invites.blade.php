@php
use App\Models\User;
@endphp
@extends('User.Layouts.AppLayout')
@section('title', 'Invites')
@section('style')
<style>
    /*----------------genealogy-scroll----------*/
    .genealogy-scroll::-webkit-scrollbar {
        width: 5px;
        height: 8px;
    }
    .genealogy-scroll::-webkit-scrollbar-track {
        border-radius: 10px;
        background-color: #e4e4e4;
    }
    .genealogy-scroll::-webkit-scrollbar-thumb {
        background: #212121;
        border-radius: 10px;
        transition: 0.5s;
    }
    .genealogy-scroll::-webkit-scrollbar-thumb:hover {
        background: #871A8F;
        transition: 0.5s;
    }


    /*----------------genealogy-tree----------*/
    .genealogy-body{
        white-space: nowrap;
        overflow-y: hidden;
        padding: 50px;
        min-height: 500px;
        padding-top: 10px;
        text-align: center;
    }
    .genealogy-tree{
    display: inline-block;
    }
    .genealogy-tree ul {
        padding-top: 20px; 
        position: relative;
        padding-left: 0px;
        display: flex;
        justify-content: center;
    }
    .genealogy-tree li {
        float: left; text-align: center;
        list-style-type: none;
        position: relative;
        padding: 20px 5px 0 5px;
    }
    .genealogy-tree li::before, .genealogy-tree li::after{
        content: '';
        position: absolute; 
    top: 0; 
    right: 50%;
        border-top: 2px solid #ccc;
        width: 50%; 
    height: 18px;
    }
    .genealogy-tree li::after{
        right: auto; left: 50%;
        border-left: 2px solid #ccc;
    }
    .genealogy-tree li:only-child::after, .genealogy-tree li:only-child::before {
        display: none;
    }
    .genealogy-tree li:only-child{ 
        padding-top: 0;
    }
    .genealogy-tree li:first-child::before, .genealogy-tree li:last-child::after{
        border: 0 none;
    }
    .genealogy-tree li:last-child::before{
        border-right: 2px solid #ccc;
        border-radius: 0 5px 0 0;
        -webkit-border-radius: 0 5px 0 0;
        -moz-border-radius: 0 5px 0 0;
    }
    .genealogy-tree li:first-child::after{
        border-radius: 5px 0 0 0;
        -webkit-border-radius: 5px 0 0 0;
        -moz-border-radius: 5px 0 0 0;
    }
    .genealogy-tree ul ul::before{
        content: '';
        position: absolute; top: 0; left: 50%;
        border-left: 2px solid #ccc;
        width: 0; height: 20px;
    }
    .genealogy-tree li a{
        text-decoration: none;
        color: #666;
        /* font-family: arial, verdana, tahoma; */
        font-size: 11px;
        display: inline-block;
        border-radius: 5px;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
    }

    .genealogy-tree li a:hover+ul li::after, 
    .genealogy-tree li a:hover+ul li::before, 
    .genealogy-tree li a:hover+ul::before, 
    .genealogy-tree li a:hover+ul ul::before{
        border-color:  #871A8F;
    }

    /*--------------memeber-card-design----------*/
    .member-view-box{
        padding:0px 20px;
        text-align: center;
        border-radius: 4px;
        position: relative;
    }
    .member-image{
        width: 60px;
        position: relative;
    }
    .member-image img{
        width: 60px;
        height: 60px;
        border-radius: 30px;
        z-index: 1;
    }
    .member-details{
        margin-top: 5px;
    }
    .member-details h3{
        font-weight: bold;
    }
</style>
@endsection
@section('content')
@foreach($level1 as $child)
<div class="modal fade" id="userProfile-{{ $child->id }}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $child->name }} -
                    {{ $child->email }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="table-responsive active-projects style-1" style="padding: 30px">
                            <div class="tbl-caption text-center mb-3">
                                <h4 class="heading mb-0">{{ $child->name . "'s Profile" }}
                                </h4>
                            </div>
                            <div class="text-center mb-3">
                                <img src="{{ asset('uploads/' . $child->profile_pic) }}"
                                    style="height: 100px;width: 100px;border-radius:50px">
                            </div>
                            <table class="table">
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $child->name }}</td>
                                </tr>
                                <tr>
                                    <th>Phone Number</th>
                                    <td>{{ $child->email }}</td>
                                </tr>
                                <tr>
                                    <th>Profit Balance</th>
                                    <th>PKR {{ $child->account_balance }}</th>
                                </tr>
                                <tr>
                                    <th>Reference Balance</th>
                                    <th>PKR {{ $child->reference_balance }}</th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@foreach($level2 as $child)
<div class="modal fade" id="userProfile-{{ $child->id }}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $child->name }} -
                    {{ $child->email }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="table-responsive active-projects style-1" style="padding: 30px">
                            <div class="tbl-caption text-center mb-3">
                                <h4 class="heading mb-0">{{ $child->name . "'s Profile" }}
                                </h4>
                            </div>
                            <div class="text-center mb-3">
                                <img src="{{ asset('uploads/' . $child->profile_pic) }}"
                                    style="height: 100px;width: 100px;border-radius:50px">
                            </div>
                            <table class="table">
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $child->name }}</td>
                                </tr>
                                <tr>
                                    <th>Phone Number</th>
                                    <td>{{ $child->email }}</td>
                                </tr>
                                <tr>
                                    <th>Profit Balance</th>
                                    <th>PKR {{ $child->account_balance }}</th>
                                </tr>
                                <tr>
                                    <th>Reference Balance</th>
                                    <th>PKR {{ $child->reference_balance }}</th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">My Team</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="body genealogy-body genealogy-scroll">
                            <div class="genealogy-tree">
                                <ul>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="card text-center">
                                                <div class="card-body">
                                                    <div class="mb-4">
                                                        <img class="rounded-circle avatar-sm" src="{{ asset('uploads/' . $user->profile_pic) }}" alt="">
                                                    </div>
                                                    <h5 class="font-size-15 mb-1"><a href="javascript: void(0);" class="text-dark">{{ $user->name }}</a></h5>
                                                    <p class="text-muted">{{ $user->email }}</p>
                                                </div>
                                            </div>
                                        </a>
                                        @php
                                            $level1Users = User::where('parent_id', $user->id)->get();
                                        @endphp
                                        <ul @if(count($level1Users) > 0) class="active" @endif>
                                            @foreach ($level1Users as $level1user)
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <div class="card-body">
                                                        <div class="mb-4">
                                                            <img class="rounded-circle avatar-sm" src="{{ asset('uploads/' . $level1user->profile_pic) }}" alt="">
                                                        </div>
                                                        <h5 class="font-size-15 mb-1"><a href="javascript: void(0);" class="text-dark">{{ $level1user->name }}</a></h5>
                                                        <p class="text-muted">{{ $level1user->email }}</p>
                                
                                                        <div>
                                                            <button data-bs-toggle="modal" data-bs-target="#userProfile-{{ $level1user->id }}" href="javascript: void(0);" class="btn btn-danger waves-effect waves-light btn-sm btnModal">View Profile</button>
                                                        </div>
                                                    </div>
                                                </a>
                                                @php
                                                    $level2Users = User::where('parent_id', $level1user->id)->get();
                                                @endphp
                                                <ul @if(count($level2Users) > 0 ) class="active" @endif>
                                                    @foreach($level2Users as $level2user)
                                                    <li>
                                                        <a href="javascript:void(0);">
                                                            <div class="card-body">
                                                                <div class="mb-4">
                                                                    <img class="rounded-circle avatar-sm" src="{{ asset('uploads/' . $level2user->profile_pic) }}" alt="">
                                                                </div>
                                                                <h5 class="font-size-15 mb-1"><a href="javascript: void(0);" class="text-dark">{{ $level2user->name }}</a></h5>
                                                                <p class="text-muted">{{ $level2user->email }}</p>
                                        
                                                                <div>
                                                                    <button data-bs-toggle="modal" data-bs-target="#userProfile-{{ $level2user->id }}" href="javascript: void(0);" class="btn btn-danger waves-effect waves-light btn-sm">View Profile</button>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>                    
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="row justify-content-center">
                                <div class="col-lg-10">
                                    <h4 class="mt-4 fw-semibold">Invite Users</h4>
                                    <p class="text-muted mt-3" id="referLink">{{ Request::getSchemeAndHttpHost() }}/user/register/{{ Auth::user()->email }}</p>
                                    <p class="mt-3">share this link with others to invite them</p>
                                    <div class="mt-4">
                                        <button type="button" id="btnCopy" class="btn btn-danger">
                                            Click to Copy
                                        </button>
                                    </div>
                                    <div>
                                        <a href="https://api.whatsapp.com/send?text={{ Request::getSchemeAndHttpHost() }}/register/{{ Auth::user()->email }}" target="_blank" data-action="share/whatsapp/share" class="btn btn-success mt-3 m-1"><i class="bx bxl-whatsapp"></i></a>
                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ Request::getSchemeAndHttpHost() }}/register/{{ Auth::user()->email }}" target="_blank" data-action="share/whatsapp/share" class="btn btn-primary mt-3 m-1"><i class="bx bxl-facebook-circle"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center mt-5 mb-2">
                                <div class="col-sm-6 col-8">
                                    <div>
                                        <img src="{{ asset('assets-user/images/verification-img.png') }}" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- container-fluid -->
</div>
@endsection
@section('script')
<script>
    // $(function () {
    //     $('.genealogy-tree ul').hide();
    //     $('.genealogy-tree>ul').show();
    //     $('.genealogy-tree ul.active').show();
    //     $('.genealogy-tree li').on('click', function (e) {
    //         var children = $(this).find('> ul');
    //         if (children.is(":visible")) children.hide('fast').removeClass('active');
    //         else children.show('fast').addClass('active');
    //         e.stopPropagation();
    //     });
    });
</script>
<script>
    $(function(){
        $("#btnCopy").click(function(){
            const toCopy = $("#referLink").html();
            navigator.clipboard.writeText(toCopy);
            notyf.success('Invitation link copied!');
        });
    })
</script>
@endsection