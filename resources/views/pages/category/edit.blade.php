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
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Category</a></li>
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
                    <form action="{{ route('category.update', $data->id) }}" method="POST">
                        @csrf @method('PUT')
                        <input type="hidden" name="id" value="{{ $data->id }}}">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="" class="col-form-label">Category</label>
                                <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $data->title }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="" class="col-form-label">Type</label>
                                <select id="" class="form-control" name="type">
                                    <option value="expense" {{ $data->type == 'expense' ? 'selected' : ''}}>Expense</option>
                                    <option value="revenue" {{ $data->type == 'revenue' ? 'selected' : ''}}>Revenue</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-form-label">Parent Category</label>
                            <select name="parent_id" id="" class="form-control">
                                <option value="">-</option>
                                @foreach ($category as $key => $value)
                                    <option value="{{ $key }}" {{ $data->parent_id == $key ? 'selected' : ''}}>{{ $value }}</option>
                                @endforeach
                            </select>
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
