@extends('layouts.default')
@section('title')
Webinar Listing
@endsection

@section('local-style')
<!-- BEGIN: Vendor CSS-->
<link rel="stylesheet" type="text/css"
      href="{{ asset('/theme/app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

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
                    Webinar Listing
                </h3>
            </div>
            <div class="content-header-right col-md-8 col-12">
                <div class="breadcrumbs-top float-md-right">
                    <div class="breadcrumb-wrapper mr-1">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">
                                Webinar Listing
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
                                                    <th class="p-1"
                                                        style="width: 5px !important; vertical-align: middle">#</th>
                                                    <th class="p-1" style="vertical-align: middle; max-width: 25%;">Webinar URL</th>
                                                    <th class="p-1" style="vertical-align: middle">Type</th>
                                                    <th class="p-1" style="vertical-align: middle">Date</th>
                                                    <th class="p-1" style="vertical-align: middle"> Instructor Name</th>
                                                    <th class="p-1" style="vertical-align: middle"> Image</th>
                                                    <th class="p-1 text-center" style="vertical-align: middle"> Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $key => $record)
                                                <tr>
                                                    <td class="p-1"
                                                        style="width: 5px !important; vertical-align: middle">
                                                        {{ ++$key }}
                                                    </td>
                                                    <td class="p-1" style="vertical-align: middle">
                                                        {{ strlen($record['video_url']) > 30 ? substr($record['video_url'],0,30)."..." : $record['video_url'] }}
                                                    </td>
                                                    <td class="p-1" style="vertical-align: middle">
                                                        {{ ucfirst($record['type']) }}
                                                    </td>
                                                    <td class="p-1" style="vertical-align: middle">
                                                        {{ $record['date'] }}
                                                    </td>
                                                    <td class="p-1" style="vertical-align: middle">
                                                        {{ $record['instructor'] }}
                                                    </td>
                                                    <td class="p-1" style="vertical-align: middle">
                                                        @if(!empty($record['image']))
                                                        <img style="max-height: 150px;max-width: 150px" src="{{ asset('assets/img/'.$record['image']) }}">
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        <a type="button" href="{{route('webinar.edit',['id'=>$record['id']])}}" class="btn btn-outline-primary btn-sm mr-2">
                                                            <i class="ft-edit"></i> Edit
                                                        </a>
                                                        <a type="button" href="javascript:void(0)" class="btn btn-outline-danger btn-sm deleteWebinar" webinar_id="{{Crypt::encrypt($record['id'])}}">
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

<script type="text/javascript">
    $(document).on('click', '.deleteWebinar', function () {
        var deleteWebinar = $(this).attr('webinar_id');

        swal({
            title: "Are you sure?",
            text: "This action will delete selected webinar.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes!",
            cancelButtonText: "No!",
            closeOnConfirm: false,
            closeOnCancel: false
        },
                function (isConfirm) {
                    if (isConfirm) {
                        window.location.href = siteUrl + 'deleteWebinar/' + deleteWebinar;
                    } else {
                        swal("Cancelled", "Deletion Aborted", "error");
                    }
                });

    });
</script>
<script src="{{ asset('public/theme/app-assets/js/scripts/tables/datatables/datatable-styling.js') }}"
type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

<!-- END: Page JS-->
@endsection
