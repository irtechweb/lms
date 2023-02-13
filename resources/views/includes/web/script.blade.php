<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '598391572121134',
      cookie     : true,
      xfbml      : true,
      version    : '{api-version}'
    });
      
    FB.AppEvents.logPageView();   
      
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

<script type="text/javascript">
  
  
  // $( "form" ).on( "submit", function( event ) {
  //   $('div.loaderImage').show();
  // });

  $( ".loginBtn" ).on("click", function( event ) {
    event.preventDefault();

    $(".emailError").hide();
    $(".passwordError").hide();
    
    var errors = 0;
    var email =  $("input[name='email']");
    var password =  $("input[name='password']");

    if(email.val() == ''){
        errors+=1;
        $(".emailError").show();
    }
    if(password.val() == '') {
        errors+=1;
        $(".passwordError").show();
    }
    
    
    if(errors==0){

      $('div.loaderImage').show();
      $("#loginForm").submit();
    }

  
  
  });

  $( ".registerBtn" ).on("click", function( event ) {
    event.preventDefault();

    $(".firstNameError").hide();
    $(".lastNameError").hide();
    $(".phoneNumberError").hide();
    $(".emailError").hide();
    $(".passwordError").hide();
    $(".cpasswordError").hide();
    $(".cityError").hide();
    
    var errors = 0;
    
    var first_name =  $("input[name='first_name']");
    var last_name =  $("input[name='last_name']");
    var phone_number =  $("input[name='phone_number']");
    var email =  $("input[name='email']");
    var password =  $("input[name='password']");
    var password_confirmation =  $("input[name='password_confirmation']");
    var city =  $("input[name='city']");
    

    if(first_name.val() == ''){
        errors+=1;
        $(".firstNameError").show();
    }
    if(last_name.val() == ''){
        errors+=1;
        $(".lastNameError").show();
    }
    if(phone_number.val() == ''){
        errors+=1;
        $(".phoneNumberError").show();
    }
    if(email.val() == ''){
        errors+=1;
        $(".emailError").show();
    }
    if(password.val() == '') {
        errors+=1;
        $(".passwordError").show();
    }
    if(password_confirmation.val() == '') {
        errors+=1;
        $(".cpasswordError").show();
    }
    if(city.val() == '') {
        errors+=1;
        $(".cityError").show();
    }
    
    
    if(errors==0){
      $('div.loaderImage').show();
      $("#registerForm").submit();
    }

  
  
  });
  
</script>