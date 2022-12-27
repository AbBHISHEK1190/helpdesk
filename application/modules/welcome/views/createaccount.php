
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
  <script>
  function validateusername()
  {
	  var name=$('#names').val();
	 	 $.ajax({
        type: "POST",
        url: "<?php echo base_url('checkusername');?>",
        dataType: "html",
        data:{uname:name}, 
        success: function(data){
	 		
   $('.msgsgs').html(data);
   
	 
        } 
    });
	  
  }
  function validateEmail(emailField){
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

        if (reg.test(emailField.value) == false) 
        {
		//	swal("Invalid Email Address");

				alert('Invalid Email Address');
            return false;
        }

        return true;

}

//for mobile

function phonenumber(inputtxt)
{
  var phoneno = /^\d{10}$/;
  if (phoneno.test(inputtxt.value) == false) 
        {
            alert('Invalid Mobile Format');
            return false;
        }
        
        return false;
        
}

function passwordvali()
{
	var str=$('#passp').val();
	//  document.getElementById("t1").value; 
            if (str.match(/[a-z]/g) && str.match( 
                    /[A-Z]/g) && str.match( 
                    /[0-9]/g) && str.match( 
                    /[^a-zA-Z\d]/g) && str.length >= 8 && str.length < 13) 
                //res = "TRUE"; 
				{
				//alert('true');
				$('.passs').html('true');
				document.getElementById("dis").disabled = false;
				}
			else 
            {    //res = "FALSE";
$('.passs').html('At least 1 uppercase character,1 lowercase,1 digit,1 special character,Minimum 8 and Maximum 12 characters');
   		  document.getElementById("dis").disabled = true;

	
			}// document.getElementById("t2").value = res;
	
}
</script>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>Helpdesk</h1>
		
      </div>
       <div class="row">
        <div class="col-lg-12 col-md-12">
		
          <div class="tile">
		   <div class="form-group">
                <a href="<?php echo base_url('');?>"><i class="fa fa-sign-in fa-lg fa-fw"></i>Back</a>
				  </a>
                </div>
            <h3 class="tile-title">Create Account</h3>
			<h3 class="tile-title"><?php if(!empty($msg)){echo $msg;}?></h3>
            <div class="tile-body">
              <form id="formoid" action="<?php echo base_url('create-account');?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
				<h3 class="msgsgs"></h3>
                  <label class="control-label">Username</label>
                  <input class="form-control"  type="text" name="name" id="names" placeholder="Enter full name" required onkeyup="validateusername(this);">
                </div>
                <div class="form-group">
                  <label class="control-label">Email</label>
                  <input class="form-control"  type="email" name="email"  placeholder="Enter email address"  required onblur="validateEmail(this);">
                </div>
				 <div class="form-group">
                  <label class="control-label">Mobile</label>
                  <input class="form-control" type="mobile" name="mobile" placeholder="Enter mobile number" size="80" required onblur="phonenumber(this);">
                </div>
				<!-- <div class="form-group">
                  <label class="control-label">Help Topic</label>
                  <input class="form-control" type="email" placeholder="Enter email address">
                </div>-->
				<div class="form-group">
                  <label class="control-label">Department</label>
                <select class="form-control" name="department" id="departs" onchange="departments()" >
			  <option><---Select---></option>
	 
				 <?php foreach($department as $dept) {?>
				  <option value="<?php echo $dept->department;?>" ><?php echo $dept->department;?></option>
<?php } ?>

	 
				</select>
				</div>
				<div class="form-group">
                  <label class="control-label">Account type</label>
                   <select class="form-control" name="type">
			  <option><---Select---></option>
			  <option selected value="teamleader">Team leader</option>
			  <option value="staff">Staff</option>
			  </select>
				
			   </div>
				
							
				<div class="form-group">
                  <label class="control-label">Address</label>
                  <input class="form-control" type="text" name="address" placeholder="Enter subject" required>
                </div>
				<div class="form-group">
                  <label class="control-label">State</label>
                  <input class="form-control" type="text" name="state" placeholder="Enter subject" required>
                </div>
				<div class="form-group">
                  <label class="control-label">District</label>
                  <input class="form-control" type="text" name="district" placeholder="Enter subject" required>
                </div>
				<div class="form-group">
                  <label class="control-label">Block</label>
                  <input class="form-control" type="text" name="block" placeholder="Enter subject" required>
                </div>
				<div class="form-group">
                  <label class="control-label">Gp</label>
                  <input class="form-control" type="text" name="gp" placeholder="Enter subject" required>
                </div>
				<div class="form-group">
                  <label class="control-label passs">Password</label>
                  <input class="form-control" type="text" id="passp" name="password" placeholder="Enter subject" required onkeyup="passwordvali()">
                </div>
				
                <div class="form-group">
                  <button class="btn btn-primary" id="dis" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Register</button>
				  
                </div>
              </form>
			  </div>
				</div>
				</div>
            <div class="tile-footer" >
			<div id="showshow">
              <button  class="btn btn-primary" type="button">
			  <i class="fa fa-fw fa-lg fa-check-circle"></i>Register</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
            </div>
			</div>
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
	  
	  $(document).ready(function(){
      $("#show").hide();
  $("#showshow").hide();
  $('#formoid').submit(function(e){
e.preventDefault(); 
          $.ajax({
                     url:'<?php echo base_url('savedataintosignup');?>',
                     type:"post",
                     data:new FormData(this), //this is formData
                     processData:false,
                     contentType:false,
                     cache:false,
                     async:false,
                      success: function(data){
                         // alert("Successful.");
                        location.reload();
                   }
             });
});	
  
});

    </script>
	
  </body>
</html>