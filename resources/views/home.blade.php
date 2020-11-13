@extends('layouts.app')

@section('content')
<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">

                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card-box">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-pink border-pink border">
                            <i class="fe-heart font-22 avatar-title text-pink"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-right">
                            <h3 class="mt-1 text-dark">Rp<span data-plugin="counterup">58.947</span></h3>
                            <p class="text-muted mb-1 text-truncate">Total Revenue</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card-box">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-blue border-blue border">
                            <i class="fe-shopping-cart font-22 avatar-title text-blue"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-right">
                            <h3 class="mt-1 text-dark">Rp<span data-plugin="counterup">58.947</span></h3>
                            <p class="text-muted mb-1 text-truncate">Total Payment</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card-box">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-success border-success border">
                            <i class="fe-dollar-sign font-22 avatar-title text-success"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-right">
                            <h3 class="mt-1 text-dark">Rp<span data-plugin="counterup">58.947</span></h3>
                            <p class="text-muted mb-1 text-truncate">Balance</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card-box">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-warning border-warning border">
                            <i class="fe-bar-chart-2 font-22 avatar-title text-warning"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-right">
                            <h3 class="text-dark mt-1"><span data-plugin="counterup">78.41</span>%</h3>
                            <p class="text-muted mb-1 text-truncate">Percentage</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->
    </div>
    <!-- end row-->

    <div class="row">
        <div class="col-xl-4 col-md-6">
            <div class="card-box">
                <div class="dropdown float-right">
                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown"
                        aria-expanded="false">
                        <i class="mdi mdi-dots-vertical"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Edit Report</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Action</a>
                    </div>
                </div>

                <h4 class="header-title mb-3">Payment History</h4>

                <div class="table-responsive">
                    <table class="table table-borderless table-nowrap table-hover table-centered m-0">

                        <thead class="thead-light">
                            <tr>
                                <th class="font-weight-medium">Marketplaces</th>
                                <th class="font-weight-medium">Date</th>
                                <th class="font-weight-medium">Payouts</th>
                                <th class="font-weight-medium">Status</th>
                                <th class="font-weight-medium">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <h5 class="m-0 font-weight-normal">Themes Market</h5>
                                </td>

                                <td>
                                    Oct 15, 2018
                                </td>

                                <td>
                                    $5848.68
                                </td>

                                <td>
                                    <span class="badge bg-soft-warning text-warning">Upcoming</span>
                                </td>

                                <td>
                                    <a href="javascript: void(0);" class="btn btn-xs btn-light"><i
                                            class="mdi mdi-pencil"></i></a>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <h5 class="m-0 font-weight-normal">Freelance</h5>
                                </td>

                                <td>
                                    Oct 12, 2018
                                </td>

                                <td>
                                    $1247.25
                                </td>

                                <td>
                                    <span class="badge bg-soft-success text-success">Paid</span>
                                </td>

                                <td>
                                    <a href="javascript: void(0);" class="btn btn-xs btn-light"><i
                                            class="mdi mdi-pencil"></i></a>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <h5 class="m-0 font-weight-normal">Share Holding</h5>
                                </td>

                                <td>
                                    Oct 10, 2018
                                </td>

                                <td>
                                    $815.89
                                </td>

                                <td>
                                    <span class="badge bg-soft-success text-success">Paid</span>
                                </td>

                                <td>
                                    <a href="javascript: void(0);" class="btn btn-xs btn-light"><i
                                            class="mdi mdi-pencil"></i></a>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <h5 class="m-0 font-weight-normal">Envato's Affiliates</h5>
                                </td>

                                <td>
                                    Oct 03, 2018
                                </td>

                                <td>
                                    $248.75
                                </td>

                                <td>
                                    <span class="badge bg-soft-danger text-danger">Overdue</span>
                                </td>

                                <td>
                                    <a href="javascript: void(0);" class="btn btn-xs btn-light"><i
                                            class="mdi mdi-pencil"></i></a>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <h5 class="m-0 font-weight-normal">Marketing Revenue</h5>
                                </td>

                                <td>
                                    Sep 21, 2018
                                </td>

                                <td>
                                    $978.21
                                </td>

                                <td>
                                    <span class="badge bg-soft-warning text-warning">Upcoming</span>
                                </td>

                                <td>
                                    <a href="javascript: void(0);" class="btn btn-xs btn-light"><i
                                            class="mdi mdi-pencil"></i></a>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <h5 class="m-0 font-weight-normal">Advertise Revenue</h5>
                                </td>

                                <td>
                                    Sep 15, 2018
                                </td>

                                <td>
                                    $358.10
                                </td>

                                <td>
                                    <span class="badge bg-soft-success text-success">Paid</span>
                                </td>

                                <td>
                                    <a href="javascript: void(0);" class="btn btn-xs btn-light"><i
                                            class="mdi mdi-pencil"></i></a>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div> <!-- end .table-responsive-->
            </div> <!-- end card-box-->
        </div> <!-- end col-->

        <div class="col-xl-4 col-md-6">
            <div class="card-box">
                <div class="dropdown float-right">
                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown"
                        aria-expanded="false">
                        <i class="mdi mdi-dots-vertical"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Edit Report</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Action</a>
                    </div>
                </div>

                <h4 class="header-title mb-3">Revenue History</h4>

                <div class="table-responsive">
                    <table class="table table-borderless table-nowrap table-hover table-centered m-0">

                        <thead class="thead-light">
                            <tr>
                                <th class="font-weight-medium">Marketplaces</th>
                                <th class="font-weight-medium">Date</th>
                                <th class="font-weight-medium">Payouts</th>
                                <th class="font-weight-medium">Status</th>
                                <th class="font-weight-medium">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <h5 class="m-0 font-weight-normal">Themes Market</h5>
                                </td>

                                <td>
                                    Oct 15, 2018
                                </td>

                                <td>
                                    $5848.68
                                </td>

                                <td>
                                    <span class="badge bg-soft-warning text-warning">Upcoming</span>
                                </td>

                                <td>
                                    <a href="javascript: void(0);" class="btn btn-xs btn-light"><i
                                            class="mdi mdi-pencil"></i></a>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <h5 class="m-0 font-weight-normal">Freelance</h5>
                                </td>

                                <td>
                                    Oct 12, 2018
                                </td>

                                <td>
                                    $1247.25
                                </td>

                                <td>
                                    <span class="badge bg-soft-success text-success">Paid</span>
                                </td>

                                <td>
                                    <a href="javascript: void(0);" class="btn btn-xs btn-light"><i
                                            class="mdi mdi-pencil"></i></a>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <h5 class="m-0 font-weight-normal">Share Holding</h5>
                                </td>

                                <td>
                                    Oct 10, 2018
                                </td>

                                <td>
                                    $815.89
                                </td>

                                <td>
                                    <span class="badge bg-soft-success text-success">Paid</span>
                                </td>

                                <td>
                                    <a href="javascript: void(0);" class="btn btn-xs btn-light"><i
                                            class="mdi mdi-pencil"></i></a>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <h5 class="m-0 font-weight-normal">Envato's Affiliates</h5>
                                </td>

                                <td>
                                    Oct 03, 2018
                                </td>

                                <td>
                                    $248.75
                                </td>

                                <td>
                                    <span class="badge bg-soft-danger text-danger">Overdue</span>
                                </td>

                                <td>
                                    <a href="javascript: void(0);" class="btn btn-xs btn-light"><i
                                            class="mdi mdi-pencil"></i></a>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <h5 class="m-0 font-weight-normal">Marketing Revenue</h5>
                                </td>

                                <td>
                                    Sep 21, 2018
                                </td>

                                <td>
                                    $978.21
                                </td>

                                <td>
                                    <span class="badge bg-soft-warning text-warning">Upcoming</span>
                                </td>

                                <td>
                                    <a href="javascript: void(0);" class="btn btn-xs btn-light"><i
                                            class="mdi mdi-pencil"></i></a>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <h5 class="m-0 font-weight-normal">Advertise Revenue</h5>
                                </td>

                                <td>
                                    Sep 15, 2018
                                </td>

                                <td>
                                    $358.10
                                </td>

                                <td>
                                    <span class="badge bg-soft-success text-success">Paid</span>
                                </td>

                                <td>
                                    <a href="javascript: void(0);" class="btn btn-xs btn-light"><i
                                            class="mdi mdi-pencil"></i></a>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div> <!-- end .table-responsive-->
            </div> <!-- end card-box-->
        </div> <!-- end col-->
    </div>
    <!-- end row -->

</div> <!-- container -->
@endsection
