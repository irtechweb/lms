@extends('layouts.main')
@section('content')

<?php 
        use App\Models\UserSubscribedPlan;
        $subs=UserSubscribedPlan::join('subscriptions','subscriptions.id','user_subscribed_plans.subscription_id')->where('user_id',Auth::user()->id)->where('is_active',1)->select('subscriptions.plans','user_subscribed_plans.*')->first(); 
        //dd($subs);
        //dd(Auth::user()->first_name);
        ?>
<div class="container emp-profile ff">
            <form method="get" action="{{url('editprofile')}}">
            <div class="row mt-5 mh-100">
                    <div class="col-md-2">
                       
                        <!-- <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" width="150px" class="rounded-circle mx-auto d-block" alt="avatar"> -->
                        
                        <img id="preview" src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" width="200px" class="output_image rounded-circle mx-auto d-block" alt="avatar">
                        <br/> <br/>
                        <div class="custom-file">
                            <input name="logo" type="file" class="custom-file-input logo" form="mail-img-form" accept="image/*">
                            <label id="fileLabel" class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                        <button id="upload-pimage" class="btn m-b-xs w-auto btn-success upload-thumbnail-img" type="button"><i class="icon-upload"></i> Upload</button>
                        <button id="remove-pimage" class="btn m-b-xs w-auto btn-danger" type="button" ng-click="clearThumbnailPicture(hotel)"><i class="icon-cancel-circle2"></i> Remove</button>
                        
                      
                    
                    <br/><br/> <br/>
                    <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" width="150px" class="rounded-circle mx-auto d-block" alt="avatar">
                    <br/>
                    <div class="profile-work text-center">
                        <h5 class="cfhp">
                                        {{Auth::user()->first_name}} {{Auth::user()->last_name}}
                                    </h5>
                                    <h6 class="cfhpd">
                                        @if ($subs != null)
                                         {{strtoupper($subs->plans)}}
                                        @endif
                                    </h6>
                                    <p><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp; {{ucfirst(Auth::user()->city)}}</p>
                        </div> 
                    </div>
                    <div class="col-md-6 offset-md-2">
                        <div class="profile-head">
                                   
                            <ul class="nav nav-tabs text-center" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active contactTab" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Contact Info</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link aboutTab" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">About</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="tab-content profile-tab" id="myTabContent">
                                <div class="tab-pane fade show active contactTabPane" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="row mt-5">
                                        <div class="col-md-4">
                                            <h6 class="cfh">Name</h6>
                                            <p class="cf"> {{Auth::user()->first_name}}  {{Auth::user()->last_name}} </p>
                                        </div>
                                        <div class="col-md-4">
                                            <h6 class="cfh">Phone Number</h6>
                                            <p class="cf">{{Auth::user()->phone_number}}</p>
                                        </div>
                                        <div class="col-md-4">
                                            <h6 class="cfh">City</h6>
                                            <p class="cf">{{Auth::user()->city}}</p>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-6">
                                                <h6 class="cfh">Email</h6>
                                                <p class="cf">{{Auth::user()->email}}</p>
                                            </div>
                                            <div class="col-md-6">
                                                
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-2">
                                                <a href=""><button class="btn btn-custom"><i class="fa fa-pencil"></i>&nbsp; Edit Contact Info</button></a>
                                            </div>
                                        </div>
                                            
                                    </div>
                                </div>
                                <div class="tab-pane fade aboutTabPane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="row mt-5">
                                                    <div class="col-md-10">
                                                        <h6 class="cfh">About</h6>
                                                        <p class="cf">{{Auth::user()->about}}</p>
                                                    </div>
                                                    
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-2">
                                            <button class="btn btn-custom"><i class="fa fa-pencil"></i>&nbsp; Edit About Info</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <!-- <div class="col-md-2">
                        <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"/>
                    </div> -->
                </div>
            </form> 
            <div style="height: 200px;" ></div>         
        </div>
@endsection('content')

