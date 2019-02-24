@extends('layouts.backend')

@section('content')
    <!-- Page Content -->
    <div class="hero-static">
        <div class="content">
            <!-- Sign Up Block -->
            <div class="block">
                <div class="block-header">
                    <h3 class="block-title">Sensors</h3>
                    <div class="block-options">
                        <div class="block-options-item">
                            <a href="{{action('SensorController@create')}}" class="btn btn-block btn-success">
                                <i class="fa fa-fw fa-plus mr-1"></i> New
                            </a>
                        </div>
                    </div>
                </div>
                <div class="block-content">
                    <table class="table table-hover table-vcenter">
                        <thead>
                        <tr>
                            <th style="width: 50px;">Serial</th>
                            <th>Dam</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($sensors->all() as $sensor)
                            <tr>
                                <td class="font-w600 font-size-sm">
                                    {{$sensor->serial}}
                                </td>
                                <td class="text-center">
                                    {{$sensor->dam->name}}
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{action('SensorController@edit', ['id'=>$sensor->id])}}"
                                           class="btn btn-sm btn-light js-tooltip-enabled" data-toggle="tooltip"
                                           title="" data-original-title="Edit Sensor">
                                            <i class="fa fa-fw fa-pencil-alt"></i>
                                        </a>
                                        <form action="{{ route('sensors.destroy', $sensor->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-light js-tooltip-enabled"
                                                    data-toggle="tooltip" title="" data-original-title="Remove Sensor">
                                                <i class="fa fa-fw fa-times"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
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