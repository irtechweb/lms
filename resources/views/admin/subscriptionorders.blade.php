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
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered base-style">
                                            <thead>
                                                <tr>
                                                    <th class="p-1 text-center"
                                                        style="width: 5px !important; vertical-align: middle">#</th>
                                                    <th class="p-1 text-center" style="vertical-align: middle">	Plan</th>
                                                    <th class="p-1 text-center" style="vertical-align: middle">User</th>
                                                    <th class="p-1 text-center" style="vertical-align: middle">Price</th>
                                                    <th class="p-1 text-center" style="vertical-align: middle">status</th>
                                                    <th class="p-1 text-center" style="vertical-align: middle"> Paid With</th>
                                                    <th class="p-1 text-center" style="vertical-align: middle"> Subscription Start Date</th>
                                                     <th class="p-1 text-center" style="vertical-align: middle"> Subscription End Date</th>
                                                     <th class="p-1 text-center" style="vertical-align: middle"> Created Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $key = ($plan->currentpage()-1)* $plan->perpage() + 1 @endphp
                                                @foreach ($plan as $p)
                                                <tr>
                                                    <td class="p-1 text-center"
                                                        style="width: 5px !important; vertical-align: middle">
                                                        {{ $key }}
                                                    </td>
                                                    <td class="p-1 text-center" style="vertical-align: middle">
                                                        {{   $p->plans }}
                                                    </td>
                                                    <td class="p-1 text-center" style="vertical-align: middle">
                                                        {{ $p->first_name}} {{ $p->last_name}}
                                                    </td>
                                                    <td class="p-1 text-center" style="vertical-align: middle">
                                                        {{  $p->price }}
                                                    </td>
                                                    <td class="p-1 text-center" style="vertical-align: middle">
                                                      @if($p->is_active)
                                                      <span class="badge badge-success">Active</span>
                                                      @else
                                                      <span class="badge badge-danger">Inactive</span>
                                                      @endif
                                                    </td>
                                                     <td class="p-1 text-center" style="vertical-align: middle">
                                                        {{  $p->paid_with }}
                                                    </td>
                                                    <td class="p-1 text-center" style="vertical-align: middle">
                                                        {{  $p->subscription_start_date }}
                                                    </td>
                                                    <td class="p-1 text-center" style="vertical-align: middle">
                                                        {{  $p->subscription_end_date }}
                                                    </td>

                                                    <td class="p-1 text-center" style="vertical-align: middle">
                                                        {{  $p->created_at }}
                                                    </td>
                                                  
                                                    

                                                </tr>
                                                @php $key++  @endphp
                                                @endforeach
                                            </tbody>

                                        </table>
                                    </div>

                                </div>
                                <div class="row ">
                                <div class="col-12 pull-right">
                                    <?php echo $plan->links(); ?>
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
