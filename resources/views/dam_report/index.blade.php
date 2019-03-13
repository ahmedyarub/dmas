@extends('layouts.backend')

@section('content')
    <link rel="stylesheet" href="{{ asset('js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">

    <!-- Page Content -->
    <div class="hero-static">
        <div class="content">
            <!-- Sign Up Block -->
            <div class="block">
                <div class="block-header">
                    {{ Form::open(['action' => 'DamReportController@search']) }}
                    <div class="block-options">
                        <div class="input-group">
                            {{ Form::select('dam_id',$dams, old('dam_id'),['class' =>"form-control form-control-lg form-control-alt", 'id'=>'dam_id']) }}
                        </div>
                        <div class="input-daterange input-group" data-date-format="dd/mm/yyyy" data-week-start="1"
                             data-autoclose="true" data-today-highlight="true">
                            <input type="text" class="form-control" id="from_date" name="from_date"
                                   placeholder="From" data-week-start="1" data-autoclose="true"
                                   data-today-highlight="true" value="{{old('from_date')}}">
                            <div class="input-group-prepend input-group-append">
                                                    <span class="input-group-text font-w600">
                                                        <i class="fa fa-fw fa-arrow-right"></i>
                                                    </span>
                            </div>
                            <input type="text" class="form-control" id="to_date" name="to_date"
                                   placeholder="To" data-week-start="1" data-autoclose="true"
                                   data-today-highlight="true" value="{{old('to_date')}}">
                        </div>

                        <div class="input-group">
                            <input type="text" class="js-masked-time form-control" id="from_time" name="from_time"
                                   placeholder="00:00" value="{{old('from_time')}}">
                            <div class="input-group-prepend input-group-append">
                                                    <span class="input-group-text font-w600">
                                                        <i class="fa fa-fw fa-arrow-right"></i>
                                                    </span>
                            </div>
                            <input type="text" class="js-masked-time form-control" id="to_time" name="to_time"
                                   placeholder="00:00" value="{{old('to_time')}}">
                        </div>

                        <div class="block-options-item">
                            <input type="submit" class="btn btn-block btn-success">
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
                @if(!empty($readings))
                    <div class="block-content">
                        <div class="block">
                            <div class="block-header">
                                <div class="block-options">
                                    <button type="button" class="btn-block-option" data-toggle="block-option"
                                            data-action="state_toggle" data-action-mode="demo">
                                        <i class="si si-refresh"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="block-content block-content-full text-center">
                                <div class="py-3">
                                    <!-- Lines Chart Container -->
                                    <canvas class="js-chartjs-lines"></canvas>
                                </div>
                            </div>
                        </div>

                        <table class="table table-hover table-vcenter">
                            <thead>
                            <tr>
                                <th class="text-center" style="width: 50px;">Serial</th>
                                <th class="d-none d-sm-table-cell" style="width: 15%;">Water Level</th>
                                <th class="text-center" style="width: 100px;">Date/Time</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($readings as $reading)
                                <tr>
                                    <td class="font-w600 font-size-sm">
                                        {{$reading->serial}}
                                    </td>
                                    <td class="text-center">
                                        {{$reading->water_level}}
                                    </td>
                                    <td class="text-center">
                                        {{$reading->created_at}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="content content-full font-size-sm text-muted text-center">
        <strong></strong> &copy; <span data-toggle="year-copy">2018</span>
    </div>
    </div>
    <!-- END Page Content -->

    <script src="{{ asset('js/plugins/jquery.min.js') }}"></script>

@endsection

@section('js_after')
    <script src="{{ asset('js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('js/plugins/jquery.maskedinput/jquery.maskedinput.min.js') }}"></script>
    <script src="{{ asset('js/plugins/easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
    <script src="{{ asset('js/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('js/plugins/chart.js/Chart.bundle.min.js') }}"></script>
    <script>
        labels = {!! json_encode($readings->pluck('created_at')) !!};
        data = {{ json_encode($readings->pluck('water_level')) }};
    </script>
    <script src="{{ asset('js/pages/be_comp_charts.js') }}"></script>

    <script>jQuery(function () {
            One.helpers(['datepicker', 'masked-inputs', 'easy-pie-chart', 'sparkline']);
        });</script>
@endsection