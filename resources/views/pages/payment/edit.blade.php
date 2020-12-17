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
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Payment</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
                <h4 class="page-title">Edit</h4>
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
                    <form action="{{ route('payment.update', $payment->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf @method('PUT')
                        <input type="hidden" name="id" value="{{ $payment->id }}">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="" class="col-form-label">Date</label>
                                <input type="text" name="date" class="datepicker form-control" placeholder="Title" autocomplete="off" value="{{ $payment->date }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="" class="col-form-label">Category</label>
                                <select name="category_id" id="" class="form-control">
                                    @foreach ($category as $key => $value)
                                        <option value="{{ $key }}" {{ $payment->category_id == $key ? 'selected' : ''}}>{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <label for="" class="col-form-label">Item</label>
                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Price</th>
                                </tr>
                            </thead>
                            <tbody id="table-body">
                                <?php foreach ($payment->details as $key => $value) : ?>
                                <tr index="{{ $key }}" id="row-0">
                                    <td>
                                        {{ $value->title }}
                                    </td>
                                    <td>
                                        {{ $value->qty }}
                                    </td>
                                    <td>
                                        {{ $value->price }}
                                    </td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>

                        <div class="form-group">
                            <label for="" class="col-form-label">Amount</label>
                            <input type="number" name="amount" class="form-control" id="" value="{{ $payment->amount }}">
                        </div>

                        <div class="form-group">
                            <label for="" class="col-form-label">Description</label>
                            <textarea name="notes" id="" cols="30" rows="3" class="form-control">{{ $payment->notes }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="">Attachment</label>
                            <input type="file" name="file" class="form-control-file" id="">
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
    <script src="{{ asset('/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script>
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            todayHighlight: true,
            orientation: "bottom"
        });
    </script>
@endpush
