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
                        <li class="breadcrumb-item active">Invoice</li>
                    </ol>
                </div>
                <h4 class="page-title">Invoice</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <!-- Logo & title -->
                <div class="clearfix">
                    <div class="float-left">
                        <div class="auth-logo">
                            <div class="logo logo-dark">
                                <span class="logo-lg">
                                    <img src="{{ asset('/storage/logo/' . $setting->logo) }}" alt="" height="100">
                                </span>
                            </div>

                            <div class="logo logo-light">
                                <span class="logo-lg">
                                    <img src="{{ asset('/storage/logo/' . $setting->logo) }}" alt="" height="100">
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="float-right">
                        <h4 class="m-0 d-print-none">Invoice</h4>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-sm-6">
                        <h6>Billing Address</h6>
                        <address>
                            {!! $setting->address !!}
                        </address>
                    </div> <!-- end col -->

                   <div class="col-sm-6">
                        <div class="mt-3 float-right">
                            <p class="m-b-10"><strong>Date : </strong> <span class="float-right"> &nbsp;&nbsp;&nbsp;&nbsp; {{ $payment->date->format('d M Y') }}</span></p>
                            <p class="m-b-10"><strong>Type : </strong> <span class="float-right"><span class="badge badge-primary">{{ $payment->type }}</span></span></p>
                        </div>
                    </div><!-- end col -->
                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table mt-4 table-centered">
                                <thead>
                                <tr><th>#</th>
                                    <th>Detail</th>
                                    <th>Category</th>
                                    <th>Receipt</th>
                                    <th style="width: 20%" class="text-right">Total</th>
                                </tr></thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <b>{{ $payment->description }}</b>
                                    </td>
                                    <td>
                                        <b>{{ $payment->category->title }}</b>
                                    </td>
                                    <td style="width: 20%">
                                        <img style="height: 250px" src="{{ asset('storage/expense/' . $payment->attachment) }}" alt="">
                                    </td>
                                    <td class="text-right">
                                        Rp{{ number_format($payment->amount, 0, ',', '.') }}
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div> <!-- end table-responsive -->
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

                <div class="mt-4 mb-1">
                    <div class="text-right d-print-none">
                        <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-printer mr-1"></i> Print</a>
                    </div>
                </div>
            </div> <!-- end card-box -->
        </div> <!-- end col -->
    </div>
    <!-- end row -->

</div> <!-- container -->
@endsection
