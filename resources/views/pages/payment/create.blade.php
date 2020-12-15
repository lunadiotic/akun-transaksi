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
                        <li class="breadcrumb-item active">Add</li>
                    </ol>
                </div>
                <h4 class="page-title">Add</h4>
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
                    <form action="{{ route('payment.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="" class="col-form-label">Date</label>
                                <input type="text" name="date" class="datepicker form-control" placeholder="Title" autocomplete="off">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="" class="col-form-label">Category</label>
                                <select name="category_id" id="" class="form-control">
                                    @foreach ($category as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <label for="" class="col-form-label">Item</label>
                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Actions</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Price</th>
                                </tr>
                            </thead>
                            <tbody id="table-body">
                                <tr index="0" id="row-0">
                                    <td>
                                        <span class="btn btn-sm btn-danger btn-remove">x</span>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="item[0][title]">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="item[0][qty]" value="1">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="item[0][price]">
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5">
                                        <span class="btn btn-sm btn-success" id="add">+</span>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>

                        <div class="form-group">
                            <label for="" class="col-form-label">Description</label>
                            <textarea name="notes" id="" cols="30" rows="3" class="form-control"></textarea>
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
    <script>
        let indexRow = 0;
        $('#add').click(function() {
            indexRow++;
            $('#table-body').append(`
                <tr index="${indexRow}" id="row-${indexRow}">
                    <td>
                        <span class="btn btn-sm btn-danger btn-remove">x</span>
                    </td>
                    <td>
                        <input type="text" class="form-control" name="item[${indexRow}][title]">
                    </td>
                    <td>
                        <input type="number" class="form-control" name="item[${indexRow}][qty]" value="1">
                    </td>
                    <td>
                        <input type="number" class="form-control" name="item[${indexRow}][price]">
                    </td>
                </tr>
            `);
        });
        $(document).on('click', '.btn-remove', function(){
           let rowId = $(this).parent().parent().attr("id");
           $(`#${rowId}`).remove();
      });
    </script>
@endpush
