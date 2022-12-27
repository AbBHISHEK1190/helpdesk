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
			
			if(data==1)
			{
				$('.msgsgs').html('username not avilable');
	 		document.getElementById("dis").disabled = true;
			}
			if(data==3)
			{
			$('.msgsgs').html('Minimum of 8 chars');
	 		document.getElementById("dis").disabled = true;
			}
         if(data==2)
			{
			$('.msgsgs').html('Username is avilable');
	 		document.getElementById("dis").disabled = false;
			}
   
	 
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
//state
function statedata()
{
	var catids = document.getElementById("sts").value;
	//alert(catids);
	 $.ajax({
        type: "POST",
        url: "<?php echo base_url('getdistrict');?>",
        dataType: "json",
        data:{state:catids}, 
        success: function(data){
	var html='';
			var i;
			for(i=0;i<data.length;i++)
			{
	 html += '<option value='+data[i].district+'>'+data[i].district+'</option>';

				
			}
			
   $('.districtshow').html(html);
   
	 
	 
        } 
    });
	
	
}
//blocks
function blockss()
{
	var catids = document.getElementById("bloc").value;
	//alert(catids);
	 $.ajax({
        type: "POST",
        url: "<?php echo base_url('getblock');?>",
        dataType: "json",
        data:{state:catids}, 
        success: function(data){
	var html='';
			var i;
			for(i=0;i<data.length;i++)
			{
	 html += '<option value='+data[i].block+'>'+data[i].block+'</option>';

				
			}
			
   $('.blockshow').html(html);
   
	 
	 
        } 
    });
	
	
}

//getgps
function gpdata()
{
	var catids = document.getElementById("gpp").value;
	//alert(catids);
	 $.ajax({
        type: "POST",
        url: "<?php echo base_url('getgpdata');?>",
        dataType: "json",
        data:{state:catids}, 
        success: function(data){
	var html='';
			var i;
			for(i=0;i<data.length;i++)
			{
	 html += '<option value='+data[i].gp+'>'+data[i].gp+'</option>';

				
			}
			
   $('.blocgp').html(html);
   
	 
	 
        } 
    });
	
	
}


</script>
 <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Create Account</h1>
          <p></p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
         <!-- <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item"><a href="#">Sample Forms</a></li>
        --></ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title"></h3>
            <div class="tile-body">
               <form id="formoid" action="<?php echo base_url('tl/savedataintosignuptab');?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
				<h3 class="msgsgs"></h3>
                  <label class="control-label">Username</label>
                  <input class="form-control"  type="text" name="name" id="names" placeholder="Enter Username" required onkeyup="validateusername(this);">
                </div>
				 <div class="form-group">
                  <label class="control-label">Full Name</label>
                  <input class="form-control"  type="text" name="f_name"  placeholder="Enter your full name"  required >
                </div>
                <div class="form-group">
                  <label class="control-label">Email</label>
                  <input class="form-control"  type="email" name="email"  placeholder="Enter email address"  required onblur="validateEmail(this);">
                </div>
				<div class="form-group">
                  <label class="control-label">Mobile</label>
                  <input class="form-control" type="mobile" name="mobile" placeholder="Enter mobile number" size="80" required onblur="phonenumber(this);">
                </div>
				<div class="form-group">
                  <label class="control-label">Department</label>
                
			  <input class="form-control" type="text" name="department" value="<?php echo $departments;?>"  readonly >
				</div>
				<div class="form-group">
                  <label class="control-label">Account type</label>
                  
			  <input class="form-control" type="text" name="type" value="staff"  readonly >
				
				
			   </div>
				
	
                <div class="form-group">
                  <label class="control-label">Address</label>
                  <textarea class="form-control" rows="4" name="address"  placeholder="Enter your address" required></textarea>
                </div>
				<div class="form-group" size="80">
                  <label class="col-md-8">State</label>
                <select class="form-control" name="state" required id="sts" onchange="statedata()"  >
			  <option><---Select---></option>
	 
				 <?php foreach($state as $st) {?>
				  <option value="<?php echo $st->state;?>" ><?php echo $st->state_name;?></option>
<?php } ?>

	 
				</select>
				</div>
				<div class="form-group">
                  <label class="col-md-8">District</label>
                <select class="form-control districtshow" name="district" id="bloc" onchange="blockss()" >
			  <option><---Select---></option>
	 
				</select>
				</div>
				
				<div class="form-group">
                  <label class="col-md-8">Block</label>
                <select class="form-control blockshow" name="block" id="gpp" onchange="gpdata()" >
			  <option><---Select---></option>
	 
				</select>
				</div>
				
					<div class="form-group">
                  <label class="col-md-8">Gp</label>
                <select class="form-control blocgp" name="gp" id="gpps" >
			  <option><---Select---></option>
	 
				</select>
				</div>
<div class="form-group">
                  <label class="col-md-8">Pincode</label>
                  <input class="form-control" type="number" id="pincode" name="pincode"  placeholder="Enter Pincode"  required>
                </div>
                
                <div class="form-group">
                  <label class="control-label">Gender</label>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" name="gender" value="male">Male
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" name="gender" value="female">Female
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label passs">Password</label>
                  <input class="form-control" type="text" id="passp" name="password" placeholder="Enter password" required onkeyup="passwordvali()">
                </div>
				
               <div class="form-group">
                  <button class="btn btn-primary" id="dis" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Register</button>
				  
                </div>
                
              </form>
            </div>
            
          </div>
        </div>
        
            </main>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

			 <script type="text/javascript">
      
	  $(document).ready(function(){
		  //alert('dhjdh');
  $('#formoid').submit(function(e){
e.preventDefault(); 
          $.ajax({
                     url:'<?php echo base_url('tl/savedataintosignuptab');?>',
                     type:"post",
                     data:new FormData(this), //this is formData
                     processData:false,
                     contentType:false,
                     cache:false,
                     async:false,
                      success: function(data){
                          alert("Successful.");
                        location.reload();
                   }
             });
});	
  
});

    </script>
