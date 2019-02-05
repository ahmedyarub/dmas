@extends('layouts.simple')

@section('content')
    <!-- Page Content -->
    <div class="bg-image" style="background-image: url('{{ asset('/media/photos/photo6@2x.jpg')}}');">
        <div class="hero-static bg-white-95">
            <div class="content">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-4">
                        <!-- Sign In Block -->
                        <div class="block block-themed block-fx-shadow mb-0">
                            <div class="block-header">
                                <h3 class="block-title">Sign In</h3>
                            </div>
                            <div class="block-content">
                                <div class="p-sm-3 px-lg-4 py-lg-5">
                                    <h1 class="mb-2">DMAS</h1>
                                    <p>Welcome, please login.</p>

                                    <!-- Sign In Form -->
                                    <!-- jQuery Validation (.js-validation-signin class is initialized in js/pages/op_auth_signin.min.js which was auto compiled from _es6/pages/op_auth_signin.js) -->
                                    <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="py-3">
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-alt form-control-lg"
                                                       id="email" name="email" placeholder="Username">
                                            </div>
                                            <div class="form-group">
                                                <input type="password"
                                                       class="form-control form-control-alt form-control-lg"
                                                       id="password" name="password" placeholder="Password">
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="login-remember" name="login-remember">
                                                    <label class="custom-control-label font-w400" for="login-remember">Remember
                                                        Me</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6 col-xl-5">
                                                <button type="submit" class="btn btn-block btn-primary">
                                                    <i class="fa fa-fw fa-sign-in-alt mr-1"></i> Sign In
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- END Sign In Form -->
                                </div>
                            </div>
                        </div>
                        <!-- END Sign In Block -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Content -->

    <!-- Page JS Plugins -->
    <script src="{{ asset('js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('js/pages/op_auth_signin.min.js') }}"></script>
@endsection
