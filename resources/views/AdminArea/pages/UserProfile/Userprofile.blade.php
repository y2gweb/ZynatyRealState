@extends('AdminArea/layouts/app-common')

@section('header')
<div class="header pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                   

                    <h6 class="h2 text-black d-inline-block mb-0">Profile Section</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin-dashboard')}}">Dashboards</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Profile Section</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row mt-4">
    <div class="col-xl-4">
        <div class="card card-profile">
            <img src="{{ asset('MemberArea/img/prowall.jpg') }}" alt="Image placeholder" class="card-img-top">
            <div class="row justify-content-center">
                <div class="col-lg-3 order-lg-2">
                    <div class="card-profile-image">
                        <a href="#">
                            @if (Auth::user()->image_id)
                            <img src="{{ asset('uploads/'.Auth::user()->profileimage->name) }}" alt="Profile Image"
                                class="rounded-circle">
                            @else

                            <img src="{{ asset('MemberArea/img/avatar.png')  }}" alt="Progile Image"
                                class="rounded-circle">
                            @endif
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                <div class="d-flex justify-content-between">

                </div>
            </div>
            <div class="card-body pt-0">
                <div class="row">
                    <div class="col">
                        <div class="card-profile-stats d-flex justify-content-center">

                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <h5>
                        {{Auth::user()->name}}<span class="font-weight-light">
                        </span>
                    </h5>
                    <h6>
                        {{Auth::user()->email}}<span class="font-weight-light">
                        </span>
                    </h6>
                </div>
            </div>
        </div>

        <!-- Tab System Button -->
        <div class="nav-wrapper">
            <ul class="nav nav-pills nav-fill flex-column" id="tabs-icons-text" role="tablist">
                <li class="nav-item mb-2">
                    <a class="nav-link active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1"
                        role="tab" aria-controls="tabs-icons-text-1" aria-selected="true">
                        Admin Personal Information</a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2"
                        role="tab" aria-controls="tabs-icons-text-2" aria-selected="false">
                        Password Information
                    </a>
                </li>
                <li hidden></li>
            </ul>
        </div>
    </div>

    <div class="col-xl-8 order-xl-1">
        <div class="card shadow bg-secondary">
            <div class="card-body bg-transparent">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel">
                        <form class="tab-wizard wizard-circle wizard clearfix" action="{{Route('user-profile-update')}}"
                            method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="first_name">Full Name</label>
                                        <input type="text" value="{{Auth::user()->name}}"
                                            onkeypress="return checkSpcialChar(event)"
                                            class="form-control  form-control-alternative  {{ $errors->has('lastname') ? ' is-invalid' : '' }}"
                                            id="lastname" name="last_name" placeholder="Enter Name Here" required>
                                        @if ($errors->has('lastname'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('lastname') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="first_name">Email</label>
                                        <input type="email" value="{{Auth::user()->email}}"
                                            class="form-control  form-control-alternative  {{ $errors->has('emai') ? ' is-invalid' : '' }}"
                                            id="emailInput" name="email" required onkeyup="validateEmail()">
                                        <span class="invalid-feedback" id="email_msg">
                                        </span>
                                    </div>
                                </div>

                                <div class="col-lg-12 ">
                                    <h6 class="text-center">
                                        <button class="btn btn-info" id="submit-btn" type="submit">Update</button>
                                    </h6>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade " id="tabs-icons-text-2" role="tabpanel"
                        aria-labelledby="tabs-icons-text-2-tab">
                        <form class="tab-wizard wizard-circle wizard clearfix"
                            action="{{route('profile-password-update')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12 ml-auto mr-auto">
                                    <span id="new_pass_section">
                                        <label for="">New Password&nbsp;|&nbsp;<a href="javascript:void(0)"
                                                id="passGen">Generate</a></label>
                                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                        <input type="password" name="password" id="new_pass"
                                            class="form-control form-control-alternative">
                                        <label for="">Confirm Password</label>
                                        <input type="password" onkeyup="validatepasswordconf()" name="confirm_password"
                                            id="confirm_pass" class="form-control form-control-alternative">
                                        <small id="conf_pass_msg"></small>
                                        <div class="col-lg-12 text-center mt-4 pt-4">
                                            <button onmouseover="validatepasswordconf()" class="btn btn-info"
                                                id="sumbit-btn" disabled type="submit">Update</button>
                                        </div>
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    //checked already use email
    function validateEmail() {
        $.ajax({
            url: "{{ route('validate-email') }}?email=" + $('#emailInput').val(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'GET',
            success: function (response) {
                if (response['status'] == 1) {
                    $('#emailInput').addClass("is-valid").removeClass("is-invalid");
                    $('#submit-btn').prop('disabled', false);
                } else {

                    $('#emailInput').addClass("is-invalid").removeClass("is-valid");
                    $('#email_msg').html(
                        "<strong class='text-danger'>" +
                        response['msg'] +
                        " </strong> ");
                    $('#submit-btn').prop('disabled', true);
                }
            }
        });
    }

</script>
@endsection
