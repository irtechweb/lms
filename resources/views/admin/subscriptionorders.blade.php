@extends('layouts.default')
@section('title')
Subscription Orders
@endsection

@section('local-style')
<!-- BEGIN: Vendor CSS-->
<link rel="stylesheet" type="text/css"
      href="{{ asset('/theme/app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
<!-- END: Vendor CSS-->
@endsection

@section('body')

<?php $page = (isset($_GET['page']) && $_GET['page'] != "")? $_GET['page'] :1;?>
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
            <div class="content-header-left col-md-4 col-12 mb-2">
                <h3 class="content-header-title">
                    Subscription Orders
                </h3>
            </div>
            <div class="content-header-right col-md-8 col-12">
                <div class="breadcrumbs-top float-md-right">
                    <div class="breadcrumb-wrapper mr-1">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">
                                Subscription Orders
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Base style table -->
            <section id="base-style">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    @include('includes.error')
                                    <div class="">
                                        <table class="table table-striped table-bordered base-style table-responsive" id="subscription_orders_table" style="width: 100%; white-space: nowrap;">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Plan</th>
                                                    <th>User</th>
                                                    <th>Price</th>
                                                    <th>status</th>
                                                    <th> Paid With</th>
                                                    <th> Subscription Start Date</th>
                                                    <th> Subscription End Date</th>
                                                    <th> Created Date</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </section>
            <!--/ Base style table -->

        </div>
    </div>
</div>

<!-- END: Content-->

@endsection

@section('local-script')
<!-- BEGIN: Page JS-->


<script src="{{ asset('public/theme/app-assets/js/scripts/tables/datatables/datatable-styling.js') }}"
type="text/javascript"></script>

<script>
    $(function() {
        $('#subscription_orders_table').DataTable({
            ajax: '{{ route("subscription-orders-datatable") }}',
            processing: true,
            serverSide: true,
            scrollX: false,
            autoWidth: true,
            columnDefs: [
                { width: 1, targets: 0 }
            ],
            columns: [
                {data: 'DT_RowIndex', name: 'id'},
                {data: 'plan', name: 'plan'},
                {data: 'user', name: 'user'},
                {data: 'price', name: 'price', orderable: false, searchable: false},
                {data: 'status', name: 'status'},
                {data: 'paid_with', name: 'paid_with'},
                {data: 'subscription_start_date', name: 'subscription_start_date'},
                {data: 'subscription_end_date', name: 'subscription_end_date'},
                {data: 'created_at', name: 'created_at'},
                // {data: 'actions', name: 'actions'},
            ]
        });

        $("#subscription_orders_table_wrapper div:first-child").addClass("align-items-baseline");
    });
</script>
<!-- END: Page JS-->
@endsection
