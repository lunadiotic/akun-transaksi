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
                            <p class="m-b-10"><strong>Order No. : </strong> <span class="float-right">{{ $payment->id }} </span></p>
                        </div>
                    </div><!-- end col -->
                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table mt-4 table-centered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Item</th>
                                        <th style="width: 10%" class="text-right">Price</th>
                                        <th style="width: 10%" class="text-right">Qty</th>
                                        <th style="width: 10%" class="text-right">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach ($payment->details as $item)
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>
                                            <b>{{ $item->title }}</b>
                                        </td>
                                        <td class="text-right">
                                            Rp{{ number_format($item->price, 0, ',', '.') }}
                                        </td>
                                        <td class="text-right">
                                            <b>{{ $item->qty }}</b>
                                        </td>
                                        <td class="text-right">
                                            Rp{{ number_format($item->total, 0, ',', '.') }}
                                        </td>
                                    </tr>
                                    <?php $no++ ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> <!-- end table-responsive -->
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-sm-6">
                        <div class="clearfix pt-5">
                            <h6 class="text-muted">Notes:</h6>

                            <small class="text-muted">
                                {{ $payment->notes }}
                            </small>
                        </div>
                    </div> <!-- end col -->
                    <div class="col-sm-6">
                        <div class="float-right">
                            <h3> Rp{{ number_format($payment->amount, 0, ',', '.') }}</h3>
                        </div>
                        <div class="clearfix"></div>
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
