@extends('layouts.backend')

@section('content')
    <!-- Page Content -->
    <div class="hero-static">
        <div class="content">
            <!-- Sign Up Block -->
            <div class="block">
                <div class="block-header">
                    <h3 class="block-title">Create Sensor</h3>
                </div>
                <div class="block-content">
                    <div class="p-sm-3 px-lg-4 py-lg-5">
                        <!-- jQuery Validation (.js-validation-signup class is initialized in js/pages/op_auth_signup.min.js which was auto compiled from _es6/pages/op_auth_signup.js) -->
                        <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                        {!! Form::open(['action' => 'SensorController@store']) !!}
                        @csrf
                        {!! Form::hidden('id',old('id')??$sensor->id) !!}
                        <div class="form-group">
                            {{ Form::label('serial_label', 'Serial', ['for' => 'serial']) }}
                            {{ Form::input('text', 'serial', old('serial')??$sensor->serial,['class' =>"form-control form-control-lg form-control-alt", 'id'=>'serial', 'placeholder' => 'Serial']) }}
                            @if ($errors->has('serial'))
                                <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('serial') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            {{ Form::label('dam_id_label', 'Dam', ['for' => 'dam_id']) }}
                            {{ Form::select('dam_id',$dams, old('dam_id')??$sensor->dam_id,['class' =>"form-control form-control-lg form-control-alt", 'id'=>'dam_id']) }}
                            @if ($errors->has('dam'))
                                <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('dam') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 col-xl-5">
                            <button type="submit" class="btn btn-block btn-success">
                                <i class="fa fa-fw fa-plus mr-1"></i> Save
                            </button>
                        </div>
                    </div>
                {{ Form::close() }}
                <!-- END Sign Up Form -->
                </div>
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