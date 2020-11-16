@extends('layouts.app')

@section('content')
<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Category</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <a href="{{ route('category.create') }}" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle mr-2"></i> Add</a>
                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-right">
                                <button type="button" class="btn btn-success mb-2 mr-1"><i class="mdi mdi-cog"></i></button>
                                <button type="button" class="btn btn-light mb-2">Export</button>
                            </div>
                        </div><!-- end col-->
                    </div>

                    <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Category</th>
                                <th>Parent</th>
                                <th>Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>


                        <tbody>
                        </tbody>
                    </table>

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <!-- end row-->


</div> <!-- container -->
@endsection

@push('styles')
    <!-- third party css -->
    <link href="{{ asset('/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- third party css end -->
@endpush

@push('scripts')
    <!-- third party js -->
    <script src="{{ asset('/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    <!-- third party js ends -->

    <script>
        $(document).ready(function () {
            $("#basic-datatable").DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('category.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'id'},
                    {data: 'title', name: 'title'},
                    {data: "parent", orderable: false, "render": function(data) {
                        if (data) {
                            return data.title;
                        }
                        return '-';
                    }},
                    {data: 'type', name: 'type'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ],
                language: {
                    paginate: {
                        previous: "<i class='mdi mdi-chevron-left'>",
                        next: "<i class='mdi mdi-chevron-right'>"
                    }
                },
                drawCallback: function () {
                    $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
                }
            });
        });
    </script>
@endpush
