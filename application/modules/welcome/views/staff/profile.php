<script>
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
				$('.passs').html('');
				document.getElementById("dis").disabled = false;
				 document.getElementById("cpassp").disabled = false;
				}
			else 
            {    //res = "FALSE";
$('.passs').html('At least 1 uppercase character,1 lowercase,1 digit,1 special character,Minimum 8 and Maximum 12 characters');
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

<?php foreach($pdatas as $pdata);?>
 <main class="app-content">
      <div class="row user">
        <div class="col-md-12">
          <div class="profile">
            <div class="info">
			<?php if(!empty($pdata->p_pic)){?>
<img class="user-img" src="<?php echo base_url('')?>/assets/Createticket/<?php echo $pdata->p_pic;?>"></a>

<?php } else {?>

<img class="user-img" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/128.jpg">
                            
<?php }?>
			  <h4><?php echo $pdata->name;?></h4>
              <!--<p>FrontEnd Developer</p>-->
            </div>
            <div class="cover-image"></div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="tile p-0">
            <ul class="nav flex-column nav-tabs user-tabs">
              <li class="nav-item"><a class="nav-link active" href="#user-timeline" data-toggle="tab">Password</a></li>
              <li class="nav-item"><a class="nav-link" href="#user-settings" data-toggle="tab">Profile</a></li>
            </ul>
          </div>
        </div>
		<?php if(!empty($msg)){ echo $msg;}?>
        <div class="col-md-9">
          <div class="tab-content">
            <div class="tab-pane active" id="user-timeline">
              <div class="timeline-post">
			  <h5><?php echo $this->session->flashdata('item');?></h5>
              <h4 class="line-head">Change Password</h4>
              <form method="post" action="<?php echo base_url('staff/changepassword');?>" enctype="multipart/form-data" >
                          <div class="col-md-8">
						  <div class="passs"></div>
                      <label>New Password</label>
                      <input class="form-control" id="passp" name="password" type="text" required onkeyup="passwordvali()">
                    </div>
                   <div class="col-md-8">
				    <div class="cpasss"></div>
                      <label>Conform Password</label>
                      <input class="form-control" id="cpassp" name="conformpassword"type="text" required onkeyup="cpasswod()">
                    </div>
					<div class="row mb-10">
                    <div class="col-md-12">
                    <br>  <button class="btn btn-primary" id="dis" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> Save</button>
                    </div>
                  </div>
                 </form>

              </div>
            </div>
            <div class="tab-pane fade" id="user-settings">
              <div class="tile user-settings">
                <h4 class="line-head">Settings</h4>
				<?php //foreach($pdatas as $pdata);?>
                <form method="post" action="<?php echo base_url('staff/profile');?>" enctype="multipart/form-data" >
                 <!-- <div class="row mb-4">
                    <div class="col-md-4">
                      <label>First Name</label>
                      <input class="form-control" type="text">
                    </div>
                    <div class="col-md-4">
                      <label>Last Name</label>
                      <input class="form-control" type="text">
                    </div>
                  </div>-->
                  <div class="row">
				  <div class="col-md-8 mb-4">
                      <label>Username</label>
                      <input class="form-control" type="text"  value="<?php echo $pdata->name;?>" readonly >
                    </div> 
 <div class="col-md-8 mb-4">
                      <label>Name</label>
                      <input class="form-control" type="text" name="f_name" value="<?php echo $pdata->f_name;?>">
                    </div>					

                    <div class="col-md-8 mb-4">
                      <label>Email</label>
                      <input class="form-control" type="text" name="email" value="<?php echo $pdata->email;?>">
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-8 mb-4">
                      <label>Mobile No</label>
                      <input class="form-control" type="text" name="mobile" value="<?php echo $pdata->mobile;?>">
                    </div>
					<div class="clearfix"></div>
                    <div class="col-md-8 mb-4">
                      <label>Address</label>
                      <input class="form-control" type="text" name="address" value="<?php echo $pdata->address;?>">
                    </div>
					<div class="clearfix"></div>
                    <div class="col-md-8 mb-4">
                      <label>state</label>
                      <input class="form-control" type="text" name="state" value="<?php echo $pdata->state;?>" readonly>
                    </div>
					<div class="clearfix"></div>
                    <div class="col-md-8 mb-4">
                      <label>District</label>
                      <input class="form-control" type="text" name="district" value="<?php echo $pdata->district;?>" readonly>
                    </div>
					<div class="clearfix"></div>
                    <div class="col-md-8 mb-4">
                      <label>Block</label>
                      <input class="form-control" type="text" name="block" value="<?php echo $pdata->block;?>" readonly >
                    </div>
					<div class="clearfix"></div>
                    <div class="col-md-8 mb-4">
                      <label>Gp</label>
                      <input class="form-control" type="text" name="gp" value="<?php echo $pdata->gp;?>" readonly>
                    </div>
					<div class="col-md-8 mb-4">
                      <label>Pincode</label>
                      <input class="form-control" type="text" name="pincode" value="<?php echo $pdata->pincode;?>">
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-8 mb-4">
                      <label>Department</label>
                      <input class="form-control" type="text" readonly value="<?php echo $pdata->department;?>">
                    </div>
                   <!-- <div class="clearfix"></div>
                    <div class="col-md-8 mb-4">
                      <label>Password</label>
                      <input class="form-control" readonly type="text" value="<?php echo $pdata->password;?>">
                    </div>-->
					<div class="clearfix"></div>
                    <div class="col-md-8 mb-4">
                      <label>Change pic</label>
                      <input class="form-control" type="file" name="p_pic">
                    </div>
                  </div>
                  <div class="row mb-10">
                    <div class="col-md-12">
                      <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> Save</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
   