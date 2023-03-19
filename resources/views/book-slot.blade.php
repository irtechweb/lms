 @extends('layouts.main') @section('content') <style>
   .icon-shape {
     display: inline-flex;
     justify-content: center;
     text-align: center;
     vertical-align: middle;
     align-content: center;
     flex-wrap: nowrap;
     align-items: center;
     flex-direction: column;
   }

   .icon-sm {
     width: 20px;
     height: 20px;
   }

   .registerBtn {
     background: #1C1C1C;
     display: block;
     width: 100%;
     border-radius: 6px;
     color: #FFFFC8;
     font-size: 18px;
     line-height: 27px;
     font-family: 'Inter', sans-serif;
     padding: 14px 20px;
   }

   .form-check-input:checked {
     background-color: #000000 !important;
     border-color: #000000 !important;
   }
.hide{
    display:none;
   }
 </style>
 <!-- <div class="card px-0 pt-4 pb-0 mt-3 mb-3"> -->
 <!-- <div class="row"><div class="col-md-12"> 
                    @if (Session::has('error'))
                    <div class="alert alert-error text-center"><p>{{ Session::get('error') }}</p></div>
                    @elseif(Session::has('success'))
                    <div class="alert alert-success text-center"><p>{{ Session::get('success') }}</p></div></div></div>

                    @endif
                    <form role="form" action="{{ route('paybookSlot') }}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ config('paths.publish_key') }}" id="msform" enctype="multipart/form-data">
             @csrf
                <input type="hidden" name='user_id' value="{{Crypt::encrypt($data['user_id'])}}"><input type="hidden" id='price' name='price' value="{{$data['coach_price']}}"> -->
 <!-- progressbar -->
 <!-- <ul id="progressbar" style="display: flex; justify-content: center;"><li onclick="history.go(-1);" class="active" id="account"><strong style="float: left; margin-left: -8%;">Select
                                    membership</strong></li><li class='active' id="confirm"><strong style="float: right;  margin-right: -8%;">Slot Booking</strong></li></ul> -->
 <!-- fieldsets -->
 <!-- <fieldset> -->
 <!-- <div class="row "><div class="form-card col-lg-8 offset-md-2"><div class="membership-payment"><h1>Slots Booking</h1><form method="post" enctype="multipart/form-data" action="#"> @csrf
                            <div class="row"><div class="membership-field card"><label for="exampleInputEmail1" class="form-label">Card number</label><input type="text" class="form-control f-img card-number" placeholder="Enter card number" name='card_number' required><img src="{{asset('/images/credit_card.svg')}}" alt=""><div class="master-card"><a href="#"><img src="{{asset('/images/visa.svg')}}" alt=""></a><a href="#"><img src="{{asset('/images/m-card.svg')}}" alt=""></a></div></div></div><div class="row"><div class="membership-field m-half"><label for="name" class="form-label">Name on Card</label><input name='card_name' type="text" placeholder="Name on Card" class="form-control" required></div><div class="membership-field m-half cvc"><label for="exampleInputEmail1" class="form-label">CVV</label><input type="text" name='cvc' class="form-control card-cvc" placeholder="Enter CVV"></div></div><div class="row"><div class="membership-field m-half expiration"><label for="expiryMonth" class="form-label">Expiry Month</label><input name='expiry_month' type="text" class="form-control card-expiry-month" placeholder="MM" required></div><div class="membership-field m-half expiration"><label for="expiryYear" class="form-label">Expiry Year</label><input name='expiry_year' type="text" class="form-control card-expiry-year" placeholder="YYYY" required></div></div><div class="devider-line"></div><div class="row" style="margin-bottom: 5%;"><div class="membership-field m-half"><span for="exampleInputEmail1" style="font-weight: bold; color: black; font-size: 18px;" class="form-label">Total</span></div><div class="membership-field m-half">{{env('Currency')}}<span id="cost" for="exampleInputEmail1" style="float: right; font-weight: bold; color: #1C1C1C; font-size: 18px;" class="form-label">{{$data['coach_price']}}
                                                    </span></div></div><button type="submit" class="m-payment" style="background-color: #1C1C1C; color: #fff;"> Book Now</button></form></div></div> -->
 <!--                            <input type="button" name="previous" onclick="history.go(-1);" class="previous action-button-previous" value="Previous" />-->
 <!-- </div> -->
 <!-- </fieldset> -->
 <!-- </form> -->
 <!-- <div class="form-card col-sm-12 col-md-12 col-lg-12"> -->
 <!-- <div class="membership-payment"><form method="post" action="{{route('bookwithpaypal')}}" enctype="multipart/form-data" id="msform"> @csrf
                        <input type="hidden" name='user_id' value="{{Crypt::encrypt($data['user_id'])}}"><input type="hidden" name='coach_price' value="{{$data['coach_price']}}"><input type="hidden" name='quantity' id="quantity" value="1"><button type="submit" class="m-payment"><img src="{{asset('/images/pp.svg')}}" alt=""> Pay with Paypal</button></form></div> -->
 <!-- </div> -->
 <!-- </div></div> -->
 <!-- </div> -->
 <div class="container">
   <div class="row">
     <!-- <div class="col-md-12"> @if (Session::has('error')) <div class="alert alert-error text-center">
         <p>{{ Session::get('error') }}</p>
       </div> @elseif(Session::has('success')) <div class="alert alert-success text-center">
         <p>{{ Session::get('success') }}</p>
       </div>
       @endif
     </div> -->
   </div> 
 </div>
  <form  action="{{ route('paybookSlot') }}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ config('paths.publish_key') }}" id="msform1" enctype="multipart/form-data">
 <div class="row align-items-center justify-content-center">

             @csrf
                <input type="hidden" name='user_id' value="{{Crypt::encrypt($data['user_id'])}}"><input type="hidden" id='price' name='price' value="{{$data['coach_price']}}">
   <div class="col-lg-6  mt-5 mb-login">
     <h1 class="text-center">Slots Booking</h1>
     <x-auth-validation-errors class="mb-4" :errors="$errors" />
     <div class="row">
       <div class="col-lg-8 mb-4">
         <p style="font-family: 'Inter';font-style: normal;font-weight: 400;font-size: 16px;line-height: 150%;">Select number of slots</p>
       </div>
       <div class="col-lg-4">
         <div class="d-flex justify-content-between">
           <div class="input-group w-auto justify-content-end align-items-center">
             <input type="button" value="-" class="button-minus border rounded-circle  icon-shape icon-sm mx-1 " data-field="quantity">
             <input type="number" step="1" max="10" value="1" name="quantity" class="quantity-field border-0 text-center w-25">
             <input type="button" value="+" class="button-plus border rounded-circle icon-shape icon-sm " data-field="quantity">
           </div>
         </div>
       </div>
     </div>
     <!-- <div class="row">
       <div class="col-lg-8">
         <p style="font-family: 'Inter';font-style: normal;font-weight: 400;font-size: 16px;line-height: 13px;color: #1C1C1C;">Use the primary card or add another card</p>
         <div class="form-check">
           <input class="form-check-input" style="margin-left: -19px;" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
           <label class="form-check-label" style="    margin-left: 8px;" for="flexRadioDefault1"> xxxx xxxx xxx24 </label>
         </div>
       </div>
       <div class="col-lg-4">
         <button id="btn_add_card" style="background: #FFFFFF;border: 1px solid #1C1C1C;box-shadow: 0px 2px 20px rgba(0, 0, 0, 0.07);border-radius: 6px;display: block;width: 100%;border-radius: 6px;color: #1C1C1C;font-size: 14px;font-family: 'Inter', sans-serif;padding: 11px 4px;" type="submit" class="login-m registerBtn">
           <i class="fa fa-plus" aria-hidden="true"></i>&nbsp; Add another card </button>
       </div>
     </div> -->
     <div class="row" style="padding-bottom: 8px;margin-top: 20px;margin-bottom: 32px;border-bottom: 1px solid;margin-right: 3px;margin-left: 0px;">
       <div class="col-12"></div>
     </div>
     <div id="form-section" style="display:block;">
       <!-- <div class="row">
         <div class="col-lg-8">
           <h3>Add another card</h3>
         </div>
         <div class="col-lg-4">
           <button style="background: #FFFFFF;border: 1px solid #1C1C1C;box-shadow: 0px 2px 20px rgba(0, 0, 0, 0.07);border-radius: 6px;display: block;width: 100%;border-radius: 6px;color: #1C1C1C;font-size: 14px;font-family: 'Inter', sans-serif;padding: 11px 4px;" type="submit" class="login-m registerBtn">
             <i class="fa fa-minus" aria-hidden="true"></i>&nbsp; Remove this card </button>
         </div>
       </div> -->
       <form method="post" enctype="multipart/form-data" action="#"> @csrf <div class="row">
           <div class="col-lg-12">
            
                  <div class="membership-field card">
                    <label for="exampleInputEmail1" class="form-label">Card number</label>
                    <input type="text" class="form-control f-img card-number" placeholder="Enter card number" name='card_number' required><img src="{{asset('/images/credit_card.svg')}}" alt="">
                    <div class="master-card"><a href="#"><img src="{{asset('/images/visa.svg')}}" alt=""></a>
                    <a href="#"><img src="{{asset('/images/m-card.svg')}}" alt=""></a>
                    </div>  
                  </div>

                <div class="row">
                  <div class="col-lg-6">
                        <div class="membership-field">
                        <label for="name" class="form-label">Name on Card</label>
                        <input name='card_name' type="text" placeholder="Name on Card" class="form-control" required>
                        </div>
                  </div>
                  <div class="col-lg-6">
                      <div class="membership-field cvc"><label for="exampleInputEmail1" class="form-label">CVV</label>
                        <input type="text" name='cvc' class="form-control card-cvc" placeholder="Enter CVV">
                      </div>
                  </div>
                </div>

             

             <div class="row">
                  <div class="col-lg-6">
                    <div class="membership-field expiration">
                      <label for="expiryMonth" class="form-label">Expiry Month</label>
                      <input name='expiry_month' type="text" class="form-control card-expiry-month" placeholder="MM" required>
                    </div>
                  </div>
                    <div class="col-lg-6">
                        <div class="membership-field expiration">
                          <label for="expiryYear" class="form-label">Expiry Year</label>
                          <input name='expiry_year' type="text" class="form-control card-expiry-year" placeholder="YYYY" required>
                        </div>
                    </div>
              </div>

             <!-- <div class="signup-field">
               <label for="exampleInputEmail1" class="form-label">First Name</label>
               <input type="text" class="form-control f-img" name="first_name" required="required" placeholder="Enter last name">
               <img src="{{url('images/')}}/person.svg" alt="">
             </div> -->
           </div>
         </div>
         <!-- <div class="row">
           <div class="col-lg-6">
             <div class="signup-field">
               <label for="exampleInputEmail1" class="form-label">Phone Number</label>
               <input type="text" class="form-control f-img" name="phone_number" required="required" placeholder="Enter phone number">
               <img src="{{url('images/')}}/call.svg" alt="">
             </div>
           </div>
           <div class="col-lg-6">
             <div class="signup-field">
               <label for="exampleInputEmail1" class="form-label">Email id</label>
               <input type="email" class="form-control" name="email" required="required" placeholder="Enter email id">
               <img src="{{url('images/')}}//mail.svg" alt="">
             </div>
           </div>
         </div> -->
         <div class="row" style="padding-bottom: 8px;margin-bottom: 32px;border-bottom: 1px solid;margin-right: 3px;margin-left: 0px;">
           <div class="col-12"></div>
         </div>
     </div>
     <div class="row">
       <div class="col-lg-4">
         <h5>Total</h5>
       </div>
       <div class="col-lg-8 text-right">
         <h5>£<span id="total">{{$data['coach_price']}}</span></h5>
         <p style="font-family: 'Inter';
font-style: normal;
font-weight: 400;
font-size: 14px;
line-height: 150%;
/* identical to box height, or 21px */

text-align: right;

color: #686868;">You have opted for <span id='quantity'>1</span> additional slots (£<span id='cost'>{{$data['coach_price']}}</span> per slot)</p>
       </div>
     </div>

  <div class="row error hide">
       <div class="alert alert-error text-center alert-danger">
         <p></p>
       </div>
      </div>
     <button type="submit" class="login-m registerBtn">Book Slots</button>
     </form>
     </br>
     <form method="post" action="{{route('bookwithpaypal')}}" enctype="multipart/form-data" id="msform"> @csrf <input type="hidden" name='user_id' value="{{Crypt::encrypt($data['user_id'])}}">
       <input type="hidden" name='coach_price' value="{{$data['coach_price']}}">
       <button style="background: #FFFFFF;border: 1px solid #1C1C1C;box-shadow: 0px 2px 20px rgba(0, 0, 0, 0.07);border-radius: 6px;display: block;width: 100%;border-radius: 6px;color: #1C1C1C;font-size: 18px;line-height: 27px;font-family: 'Inter', sans-serif;padding: 14px 20px;" type="submit" class="login-m registerBtn">
         <i class="fa fa-paypal" aria-hidden="true"></i>&nbsp; Pay with Paypal </button>
     </form>
     <br>
   </div>
 </div>
 </div>
 <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
 <script type="text/javascript">
   $(function() {
         /*------------------------------------------
          --------------------------------------------
          Stripe Payment Code
          --------------------------------------------
          --------------------------------------------*/
         var $form = $(".require-validation");
         $('form.require-validation').bind('submit', function(e) {
           var $form = $(".require-validation"),
             inputSelector = ['input[type=email]', 'input[type=password]', 'input[type=text]', 'input[type=file]', 'textarea'].join(', '),
             $inputs = $form.find('.required').find(inputSelector),
             $errorMessage = $form.find('div.error'),
             valid = true;
           $errorMessage.addClass('hide');
           $('.has-error').removeClass('has-error');
           $inputs.each(function(i, el) {
             var $input = $(el);
             if ($input.val() === '') {
               $input.parent().addClass('has-error');
               $errorMessage.removeClass('hide');
               e.preventDefault();
             }
           });
           if (!$form.data('cc-on-file')) {
             e.preventDefault();
             Stripe.setPublishableKey($form.data('stripe-publishable-key'));
             Stripe.createToken({
               number: $('.card-number').val(),
               cvc: $('.card-cvc').val(),
               exp_month: $('.card-expiry-month').val(),
               exp_year: $('.card-expiry-year').val()
             }, stripeResponseHandler);
           }
         });
         /*------------------------------------------
          --------------------------------------------
          Stripe Response Handler
          --------------------------------------------
          --------------------------------------------*/
         function stripeResponseHandler(status, response) {
           if (response.error) {
             $('.error').removeClass('hide').find('.alert').text(response.error.message);
           } else {
             /* token contains id, last4, and card type */
             var token = response['id'];
             $form.find('input[type=text]').empty();
             var tokenField = $('<input>').attr({
              type: 'hidden',
              name: 'stripeToken',
              value: token
            });
             $form.append(tokenField);
               $form.get(0).submit();
             }
           }
         });
 </script>
 <script type="text/javascript">
   //show hide
   $("#btn_add_card").click(function() {
     //alert("The paragraph was clicked.");
     $("#form-section").toggle();
   });
   $('form').on('submit',function(){
        console.log('loading loader');
        $('div.loaderImage').show();
   })
   function increaseValue() {
     var value = parseInt(document.getElementById('quantity').value, 10);
     value = isNaN(value) ? 0 : value;
     value++;
     $('input#quantity').val(value);
     //document.getElementById('quantity').value = value;
     $('span#cost').text(parseInt($('input#price').val()) * value);
     //alert(parseInt($('span#cost').text()));
   }

   function decreaseValue() {
     var value = parseInt(document.getElementById('quantity').value, 10);
     value = isNaN(value) ? 1 : value;
     if (value > 1) value--;
     //document.getElementById('quantity').value = value;
     $('input#quantity').val(value);
     $('span#cost').text(parseInt($('input#price').val()) * value);
   }
 </script>
 <script>
   function incrementValue(e) {
     e.preventDefault();
     var fieldName = $(e.target).data('field');
     var parent = $(e.target).closest('div');
     var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);
     if (!isNaN(currentVal)) {
       parent.find('input[name=' + fieldName + ']').val(currentVal + 1);
     } else {
       parent.find('input[name=' + fieldName + ']').val(0);
     }
     var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);
     $('span#total').text(parseInt($('input#price').val()) * currentVal);
     $('span#quantity').text(currentVal);
   }

   function decrementValue(e) {
     e.preventDefault();
     var fieldName = $(e.target).data('field');
     var parent = $(e.target).closest('div');
     var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);
     if (!isNaN(currentVal) && currentVal > 1) {
       parent.find('input[name=' + fieldName + ']').val(currentVal - 1);
     } else {
       parent.find('input[name=' + fieldName + ']').val(1);
     }
     var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);
     $('span#total').text(parseInt($('input#price').val()) * currentVal);
     $('span#quantity').text(currentVal);
   }
   $('.input-group').on('click', '.button-plus', function(e) {
     incrementValue(e);
   });
   $('.input-group').on('click', '.button-minus', function(e) {
     decrementValue(e);
   });
 </script> @endsection('content')