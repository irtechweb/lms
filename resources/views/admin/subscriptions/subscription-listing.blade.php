@extends('layouts.default')
@section('title')
Subscription Listing
@endsection

@section('local-style')
<!-- BEGIN: Vendor CSS-->
<link rel="stylesheet" type="text/css"
      href="{{ asset('/theme/app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
<!-- END: Vendor CSS-->
@endsection

@section('body')
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
            <div class="content-header-left col-md-4 col-12 mb-2">
                <h3 class="content-header-title">
                    Subscription Listing
                </h3>
            </div>
            <div class="content-header-right col-md-8 col-12">
                <div class="breadcrumbs-top float-md-right">
                    <div class="breadcrumb-wrapper mr-1">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">
                                Subscription Listing
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
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered base-style">
                                            <thead>
                                                <tr>
                                                    <th class="p-1 text-center"
                                                        style="width: 5px !important; vertical-align: middle">#</th>
                                                    <th class="p-1 text-center" style="vertical-align: middle">Subscription Plan</th>
                                                    <th class="p-1 text-center" style="vertical-align: middle">Duration</th>
                                                    <th class="p-1 text-center" style="vertical-align: middle">Price ($)</th>
                                                    <th class="p-1 text-center" style="vertical-align: middle"> Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $key => $record)
                                                <tr>
                                                    <td class="p-1 text-center"
                                                        style="width: 5px !important; vertical-align: middle">
                                                        {{ ++$key }}
                                                    </td>
                                                    <td class="p-1 text-center" style="vertical-align: middle">
                                                        {{ $record['plans'] }}
                                                    </td>
                                                    <td class="p-1 text-center" style="vertical-align: middle">
                                                        {{ $record['duration'] }}
                                                    </td>
                                                    <td class="p-1 text-center" style="vertical-align: middle">
                                                        {{ $record['price'] }}
                                                    </td>
                                                    <td class="text-center">
                                                        <a type="button" href="{{route('subscription.edit',['id'=>$record['id']])}}" class="btn btn-outline-primary btn-sm mr-2">
                                                            <i class="ft-edit"></i> Edit
                                                        </a>
                                                        <a type="button" href="javascript:void(0)" class="btn btn-outline-danger btn-sm">
                                                            <i class="ft-trash"></i> Delete
                                                        </a>
                                                    </td>

                                                </tr>
                                                @endforeach
                                            </tbody>

                                        </table>
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
<!-- END: Page JS-->
@endsection
