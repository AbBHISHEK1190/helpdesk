<!DOCTYPE html>
<html>
  <head>
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
        <h1>Helpdesk</h1>
      </div>
      <div class="login-box">
	  <div class="form-group btn-container " style="margin-bottom:75px;">
           <a href="#"> <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>Open New Ticket by vale</button>
          </a>
		  </div>
	  <div class="form-group btn-container " style="margin-bottom:75px;">
          <a href="<?php echo base_url('create-ticket');?>">   <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>Open New Ticket</button>
</a>         
		 </div>
<div class="form-group btn-container" style="margin-bottom:75px;">
         <a href="<?php echo base_url('checkticket-status');?>">    <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>Check Ticket Status</button>
          </a>
		  </div>
<div class="form-group btn-container">
           <a href="<?php echo base_url('login');?>">  <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>Employee Login</button>
</a>        
		</div>
	  
	  
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