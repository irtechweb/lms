@extends('layouts.main')
@section('content')
<div class="container emp-profile ff">
            <form method="post">
            <div class="row mt-5 mh-100">
                    <div class="col-md-2">
                       
                    <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" width="200px" class="rounded-circle mx-auto d-block" alt="avatar">
                    <br/>
                    <div class="profile-work text-center">
                        <h5 class="cfhp">
                                        Bilal Bashir
                                    </h5>
                                    <h6 class="cfhpd">
                                        UI UX Designer
                                    </h6>
                                    <p><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp; Karachi</p>
                        </div> 
                    </div>
                    <div class="col-md-6 offset-md-2">
                        <div class="profile-head">
                                   
                            <ul class="nav nav-tabs text-center" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Contact Info</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">About</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="tab-content profile-tab" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                            <div class="row mt-5">
                                                <div class="col-lg-5">
                                                    <div class="signup-field">
                                                        <label for="exampleInputEmail1" class="form-label">First Name</label>
                                                            <input type="text" class="form-control f-img" name="first_name" required="required" placeholder="Enter last name">
                                                        <img src="{{url('images/')}}/person.svg" alt="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 offset-lg-2">
                                                    <div class="signup-field">
                                                        <label for="exampleInputEmail1" class="form-label">Last Name</label>
                                                        <input type="text" class="form-control f-img" name="last_name" required="required" placeholder="Enter last name">
                                                        <img src="{{url('images/')}}/person.svg" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    <div class="signup-field">
                                                        <label for="exampleInputEmail1" class="form-label">Phone Number</label>
                                                        <input type="text" class="form-control f-img" name="phone_number" required="required" placeholder="Enter phone number">
                                                        <img src="{{url('images/')}}/call.svg" alt="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 offset-lg-2">
                                                    <div class="signup-field">
                                                        <label for="exampleInputEmail1" class="form-label">Email id</label>
                                                        <input type="email" class="form-control" name="email" required="required" placeholder="Enter email id">
                                                        <img src="{{url('images/')}}//mail.svg" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    <div class="signup-field">
                                                    <label for="exampleInputEmail1" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" required="required" placeholder="Enter password">
                
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 offset-lg-2">
                                                    <div class="signup-field">
                                                    <label for="exampleInputEmail1" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation" required="required" placeholder="Confirm Password">
                   
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    <div class="signup-field">
                                                    <label for="exampleInputEmail1" class="form-label">City</label>
                        <input type="text" class="form-control f-img" name="city" placeholder="City">
                        <img src="{{url('images/')}}/location_on.svg" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                            <div class="col-md-2">
                                            <button class="btn btn-custom"> Save Details</button>
                                            </div>
                                            </div>
                                            
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="row mt-5">
                                <div class="form-group">
                                        <label for="exampleFormControlTextarea1">About</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                                
                                            </div>
                                            <div class="row mt-3">
                                            <div class="col-md-2">
                                            <button class="btn btn-custom">Save Details</button>
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

