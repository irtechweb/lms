@extends('layouts.default')
@section('title')
    {{' Students' }}
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
                        {{ ' Students' }}
                    </h3>
                </div>
                <div class="content-header-right col-md-8 col-12">
                    <div class="breadcrumbs-top float-md-right">
                        <div class="breadcrumb-wrapper mr-1">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    {{  ' Students' }}
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
                                                        <th class="p-1 text-center" style="vertical-align: middle">Name</th>
                                                        <th class="p-1 text-center" style="vertical-align: middle">Email
                                                        </th>
                                                        <th class="p-1 text-center" style="vertical-align: middle">Phone
                                                        </th>
                                                        <th class="p-1 text-center" style="vertical-align: middle">Status
                                                        </th>
                                                        <th class="p-1 text-center" style="vertical-align: middle">Action
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($students as $key => $record)
                                                        <tr>
                                                            <td class="p-1 text-center"
                                                                style="width: 5px !important; vertical-align: middle">
                                                                {{ ++$key }}
                                                            </td>

                                                            <td class="p-1 text-center" style="vertical-align: middle">
                                                                {{ $record['first_name'] }}
                                                            </td>
                                                            <td class="p-1 text-center" style="vertical-align: middle">
                                                                {{ $record['email'] }}
                                                            </td>
                                                            <td class="p-1 text-center" style="vertical-align: middle">
                                                                {{ $record['phone_number'] }}
                                                            </td>

                                                            <td class="p-1 text-center" style="vertical-align: middle">
                                                                @if ($record['is_verified'] == 0)
                                                                    Not Verified
                                                                @else
                                                                    {{ $record['status'] }}
                                                                @endif
                                                            </td>
                                                            <td class="p-1 text-center" style="vertical-align: middle">
                                                                <div class="d-flex">
                                                                    <a type="button"
                                                                        href="{{ url('admin.customer-detail', ['uuid' => $record['id']]) }}"
                                                                        class="btn btn-outline-primary btn-sm mr-2">
                                                                        <i class="ft-eye"></i> View
                                                                    </a>
                                                                    @if ($record['status'] == '1')
                                                                        <a type="button"
                                                                            href="{{ url('admin.customer-status', ['uuid' => $record['id'], 'status' => 'blocked']) }}"
                                                                            class="btn btn-outline-danger btn-sm">
                                                                            <i class="ft-minus-circle"></i> Block
                                                                        </a>
                                                                    @else
                                                                        <a type="button"
                                                                            href="{{ url('admin.customer-status', ['uuid' => $record['id'], 'status' => 'active']) }}"
                                                                            class="btn btn-outline-success btn-sm">
                                                                            <i class="ft-plus-circle"></i> Active
                                                                        </a>
                                                                    @endif
                                                                    <a type="button"
                                                                        href="{{ url('admin.customer.edit', ['uuid' => $record['id']]) }}"
                                                                        class="btn btn-outline-success btn-sm px-1 ml-2">
                                                                        <i class="ft-edit"></i> Edit
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th class="p-1 text-center"
                                                            style="width: 5px !important; vertical-align: middle">#</th>
                                                        <th class="p-1 text-center" style="vertical-align: middle">Name</th>
                                                        <th class="p-1 text-center" style="vertical-align: middle">Email
                                                        </th>
                                                        <th class="p-1 text-center" style="vertical-align: middle">Phone
                                                        </th>
                                                        <th class="p-1 text-center" style="vertical-align: middle">Status
                                                        </th>
                                                        <th class="p-1 text-center" style="vertical-align: middle">Action
                                                        </th>
                                                    </tr>
                                                </tfoot>
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

    {{-- START: Model --}}
    <div class="modal fade text-left" id="boat_type_modal" tabindex="-1" role="dialog" aria-labelledby="basicModalLabel1"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="basicModalLabel1">Delete Boat Type</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Do you want to delete this Boaty Type? !</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" id="yesDeleteBoatType">Delete</button>
                </div>
            </div>
        </div>
    </div>

    {{-- END: Model --}}

    <!-- END: Content-->
@endsection

@section('local-script')
    <!-- BEGIN: Page JS-->
    <script src="{{ asset('public/theme/app-assets/js/scripts/tables/datatables/datatable-styling.js') }}"
        type="text/javascript"></script>
    <!-- END: Page JS-->
@endsection
