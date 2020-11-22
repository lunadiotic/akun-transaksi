@extends('layouts.app')

@section('content')
<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Report</a></li>
                        <li class="breadcrumb-item active">Search</li>
                    </ol>
                </div>
                <h4 class="page-title">Search</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

     <!-- Form row -->
     <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Form Input</h4>
                    <form action="{{ route('report.store') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="" class="col-form-label">Date Start</label>
                                <input type="text" name="date_start" class="form-control datepicker" placeholder="Title">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="" class="col-form-label">Date End</label>
                                <input type="text" name="date_end" class="form-control datepicker" placeholder="Title">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="" class="col-form-label">Type</label> <br>
                                <div class="radio radio-primary">
                                    <input type="radio" name="type" id="radio1" value="expense" checked>
                                    <label for="radio1">
                                        Payment
                                    </label>
                                </div>
                                <div class="radio radio-primary">
                                    <input type="radio" name="type" id="radio2" value="revenue">
                                    <label for="radio2">
                                        Revenue
                                    </label>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="" class="col-form-label">Attachment?</label> <br>
                                <div class="radio radio-primary">
                                    <input type="radio" name="attachment" id="radio3" value=1>
                                    <label for="radio3">
                                        Yes
                                    </label>
                                </div>
                                <div class="radio radio-primary">
                                    <input type="radio" name="attachment" id="radio4" value=0 checked>
                                    <label for="radio4">
                                        No
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-12">

                            </div>
                        </div>


                        <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>

                    </form>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->

</div> <!-- container -->
@endsection

@push('styles')
<link href="{{ asset('/assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('scripts')
    <script src="{{ asset('/assets/libs/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.datepicker').datepicker({
                setDate: 'now',
                format: 'yyyy-mm-dd',
                todayHighlight: true,
                orientation: "bottom"
            });
            $('.datepicker').val(moment().format('YYYY-M-D'));
        });
    </script>
@endpush
