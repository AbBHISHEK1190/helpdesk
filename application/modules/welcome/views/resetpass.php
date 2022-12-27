<!DOCTYPE html>
<html>
  <head>
  <script>
function passwordvali()
{
	var str=$('#passp').val();
	//  document.getElementById("t1").value; 
            if (str.match(/[a-z]/g) && str.match( 
                    /[A-Z]/g) && str.match( 
                    /[0-9]/g) && str.match( 
                    /[^a-zA-Z\d]/g) && str.length >= 8) 
                //res = "TRUE"; 
				{
				//alert('true');
				$('.passs').html('');
				document.getElementById("dis").disabled = false;
				document.getElementById("cpassp").disabled = false;
				}
			else 
            {    //res = "FALSE";
$('.passs').html('At least 1 uppercase character,1 lowercase,1 digit,1 special character,Minimum 8 characters');
   		  document.getElementById("dis").disabled = true;
		  document.getElementById("cpassp").disabled = true;

	
			}// document.getElementById("t2").value = res;
	
}


function cpasswod()
{
	var str=$('#passp').val();
	var strs=$('#cpassp').val();
	if(str != strs)
	{
$('.cpasss').html('Password and conform password is not same.');
   		  document.getElementById("dis").disabled = true;
		
	}
	else
	{
		$('.cpasss').html('');
	document.getElementById("dis").disabled = false;	
	}
	
}
</script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Helpdesk</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
	  <!--<h3><?php echo $this->session->flashdata('item');?></h3>-->
        <h1>Helpdesk</h1>
      </div>
      <div class="login-box">
	   <h5><?php echo $this->session->flashdata('item');?></h5>
        <form class="login-form" method="post" action="<?php echo base_url('updatepassword');?>" >
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Reset password</h3>
          <div class="form-group">
		  <input class="form-control"  type="hidden" name="name" value="<?php echo $name; ?>" placeholder="Email" required autofocus>
          <div class="passs"></div>
		    <label class="control-label">New Password</label>
            <input class="form-control"  type="text" id="passp" name="password" placeholder="Email" required autofocus onkeyup="passwordvali()">
          </div>
         <div class="form-group">
		  <div class="cpasss"></div>
            <label class="control-label">Conform Password</label>
            <input class="form-control" type="password" id="cpassp" name="conformpassword" placeholder="Password" onkeyup="cpasswod()">
          </div>
        <!--  <div class="form-group">
            <div class="utility">
              <div class="animated-checkbox">
                <label>
                  <input type="checkbox"><span class="label-text">Stay Signed in</span>
                </label>
              </div>
              <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Forgot Password ?</a></p>
            </div>
          </div>-->
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block" id="dis"><i class="fa fa-sign-in fa-lg fa-fw"></i>Submit</button>
         
		  </div>
		  <a href="<?php echo base_url('');?>"> <i class="fa fa-sign-in fa-lg fa-fw"></i>Back</a>
        </form>
        <form class="forget-form" action="index.html">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Forgot Password ?</h3>
          <div class="form-group">
            <label class="control-label">EMAIL</label>
            <input class="form-control" type="text" placeholder="Email">
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>
          </div>
          <div class="form-group mt-3">
            <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
          </div>
        </form>
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="<?php echo base_url();?>/assets/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url();?>/assets/js/popper.min.js"></script>
    <script src="<?php echo base_url();?>/assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>/assets/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="<?php echo base_url();?>/assets/js/plugins/pace.min.js"></script>
    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });
    </script>
  </body>
</html>