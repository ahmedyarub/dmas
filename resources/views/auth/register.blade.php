@extends('layouts.simple')

@section('content')
    <!-- Page Content -->
    <div class="hero-static">
        <div class="content">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <!-- Sign Up Block -->
                    <div class="block block-themed block-fx-shadow mb-0">
                        <div class="block-header bg-success">
                            <h3 class="block-title">Create Account</h3>
                            <div class="block-options">
                                <a class="btn-block-option" href="{{route('login')}}" data-toggle="tooltip"
                                   data-placement="left" title="Sign In">
                                    <i class="fa fa-sign-in-alt"></i>
                                </a>
                            </div>
                        </div>
                        <div class="block-content">
                            <div class="p-sm-3 px-lg-4 py-lg-5">
                                <h1 class="mb-2">DMAS</h1>
                                <p>Please fill the following details to create a new account.</p>

                                <!-- Sign Up Form -->
                                <!-- jQuery Validation (.js-validation-signup class is initialized in js/pages/op_auth_signup.min.js which was auto compiled from _es6/pages/op_auth_signup.js) -->
                                <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                {!! Form::open(['route' => 'register']) !!}
                                @csrf
                                <div class="py-3">
                                    <div class="form-group">
                                        {{ Form::input('text', 'name', old('name'),['class' =>"form-control form-control-lg form-control-alt", 'id'=>'name', 'placeholder' => 'Username']) }}
                                        @if ($errors->has('name'))
                                            <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        {{ Form::input('text', 'email', old('email'),['class' =>"form-control form-control-lg form-control-alt", 'id'=>'email', 'placeholder' => 'Email']) }}
                                        @if ($errors->has('email'))
                                            <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        {{ Form::select('user_type',['Regular' => 'Regular', 'Engineer' => 'Engineer', 'Admin'],old('user_type'),['class' => "form-control form-control-lg form-control-alt", 'id'=> 'user_type']) }}
                                        @if ($errors->has('user_type'))
                                            <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('user_type') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        {{ Form::select('gender',['Male' => 'Male', 'Female' => 'Female'],old('gender'),['class' => "form-control form-control-lg form-control-alt", 'id'=> 'gender']) }}
                                        @if ($errors->has('gender'))
                                            <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        {{ Form::input('text', 'address', old('address'),['class' =>"form-control form-control-lg form-control-alt", 'id'=>'address', 'placeholder' => 'Address']) }}
                                        @if ($errors->has('address'))
                                            <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        {{ Form::input('text', 'phone', old('phone'),['class' =>"form-control form-control-lg form-control-alt", 'id'=>'phone', 'placeholder' => 'Phone']) }}
                                        @if ($errors->has('phone'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        {{ Form::password('password',['class' =>"form-control form-control-lg form-control-alt", 'id'=>'password', 'placeholder' => 'Password']) }}
                                        @if ($errors->has('password'))
                                            <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        {{ Form::password('password_confirmation',['class' =>"form-control form-control-lg form-control-alt", 'id'=>'password_confirmation', 'placeholder' => 'Password Confirmation']) }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6 col-xl-5">
                                        <button type="submit" class="btn btn-block btn-success">
                                            <i class="fa fa-fw fa-plus mr-1"></i> Sign Up
                                        </button>
                                    </div>
                                </div>
                            {{ Form::close() }}
                            <!-- END Sign Up Form -->
                            </div>
                        </div>
                    </div>
                    <!-- END Sign Up Block -->
                </div>
            </div>
        </div>
        <div class="content content-full font-size-sm text-muted text-center">
            <strong></strong> &copy; <span data-toggle="year-copy">2018</span>
        </div>
    </div>
    <!-- END Page Content -->


    <!-- Terms Modal -->
    <div class="modal fade" id="one-signup-terms" tabindex="-1" role="dialog" aria-labelledby="one-signup-terms"
         aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-popout" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Terms &amp; Conditions</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                    </div>
                    <div class="block-content block-content-full text-right border-top">
                        <button type="button" class="btn btn-sm btn-link mr-2" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">I Agree</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Terms Modal -->

    <!-- Page JS Plugins -->
    <script src="{{ asset('js/plugins/jquery.min.js') }}"></script>
    <script src="{{ asset('js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('js/pages/op_auth_signup.min.js') }}"></script>

@endsection