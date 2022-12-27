
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
  function departments()
  {
	var depart = document.getElementById("departs").value;  
	 // alert(depart);
	   $.ajax({
        type: "POST",
        url: "<?php echo base_url('getcategory');?>",
        dataType: "html",
        data:{catde:depart}, 
        success: function(data){
	 		
   $('.categoryss').html(data);
   
	 
        } 
    });
	
	
	  
	  
  }
  
  
function category()
{
	var catid = document.getElementById("mySelect").value;
	if(catid=='other')
	{
		//alert(catid);
		    $("#hide").hide();
			$("#show").show();
			

	}
	if(catid !='other')
	{
		 $("#hide").show();
		 $("#show").hide();

	}
	 $.ajax({
        type: "POST",
        url: "<?php echo base_url('getsubcategory');?>",
        dataType: "json",
        data:{catid:catid}, 
        success: function(data){
	
	 var html='';
			var i;
			for(i=0;i<data.length;i++)
			{
	 html += '<option value='+data[i].id+'>'+data[i].sub_category+'</option>'+"<br>";

				
			}
			
   $('.sub_category').html(html);
   
	 
        } 
    });
			
			
}

function subcategory()
{
	var catids = document.getElementById("mySelects").value;
	//alert(catids);
	 $.ajax({
        type: "POST",
        url: "<?php echo base_url('getfaq');?>",
        dataType: "json",
        data:{catids:catids}, 
        success: function(data){
	 var html='';
			var i;
			for(i=0;i<data.length;i++)
			{
	 html += '<option value='+data[i].id+'>'+data[i].faq+'</option>';

				
			}
			
   $('.faq_category').html(html);
   
	 
        } 
    });
	
	
}
//get faq answers
function faqanswe()
{
	var catids = document.getElementById("mySelectsss").value;
	//alert(catids);
	 $.ajax({
        type: "POST",
        url: "<?php echo base_url('getfaqres');?>",
        dataType: "html",
        data:{catids:catids}, 
        success: function(data){
	
	//alert(data);
			
		$("#faqans").show();	
   $('#faq_faqanswe').html(data);
   
	 
        } 
    });
	
	
}

//
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

//
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

function departmentcheck()
{
	
	var de = document.getElementById("departs").value;
	if(isNaN(de)==true)
	{
		alert('You not selected Department');
		
		document.getElementById("departs").focus();
return false;
	}
	
	var other = document.getElementById("others").value;
	if (other == "") {
    alert("Other field must be filled out");
	document.getElementById("others").focus();
    return false;
  }
	
	var names = document.getElementById("name").value;
	if (names == "") {
    alert("Name must be filled out");
	document.getElementById("name").focus();
    return false;
  }
  var emails = document.getElementById("email").value;
  var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

	if (emails == "") {
    alert("Email must be filled out");
	document.getElementById("email").focus();
    return false;
  }
  if(!emails.match(reg))
  {
	  alert("Email is not valid");
	document.getElementById("email").focus();
    return false;
  }
  var phoneno = /^\d{10}$/;
  var mobiles = document.getElementById("mobile").value;
	if (mobiles == "") {
    alert("mobile must be filled out");
	document.getElementById("mobile").focus();
    return false;
  }
  if(!mobiles.match(phoneno))
  {
	  alert("Mobile field is not valid");
	document.getElementById("mobile").focus();
    return false;
  }
  var subject = document.getElementById("subjects").value;
	if (subject == "") {
    alert("subjects must be filled out");
	document.getElementById("subjects").focus();
    return false;
  }
  var message = document.getElementById("messages").value;
	if (message == "") {
    alert("messages must be filled out");
	document.getElementById("messages").focus();
    return false;
  }
  var addres = document.getElementById("address").value;
	if (addres == "") {
    alert("address must be filled out");
	document.getElementById("address").focus();
    return false;
  }
  var state=document.getElementById("sts").value;
  if(state == "<---Select--->")
  {
	  document.getElementById("sts").focus();
	 alert("Stae must be selected");
	 document.getElementById("sts").focus();
	 
    return false;
  
  }
  
   var block=document.getElementById("gpp").value;
  if(block == "<---Select--->")
  {
	 alert("Block must be selected");
	 document.getElementById("gpp").focus();
    return false;
  
  }
  
   
  var gpps=document.getElementById("gpps").value;
  if(gpps == "<---Select--->")
  {
	 alert("Gp must be selected");
	 document.getElementById("gpps").focus();
	 
    return false;
  
  }
  
  var pincodes=document.getElementById("pincode").value;
  if(pincodes.length != 6)
  {
	          
	 alert("Not vald Pincode");
	 document.getElementById("pincode").focus();
	 
    return false;
  
  }
	  
}
</script>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>Helpdesk</h1>
      </div>
       <!--<div class="row">-->
        <div class="col-lg-6 col-md-6">
		
          <div class="tile">
		   <div class="form-group">
                <a href="<?php echo base_url('');?>"><i class="fa fa-sign-in fa-lg fa-fw"></i>Back</a>
				  </a>
                </div>
            <h3 class="tile-title">Create Ticket</h3>
			<h3 class="tile-title"><?php if(!empty($msg)){echo $msg;}?></h3>
            <div class="tile-body">
              <form id="formoid" action="<?php echo base_url('create-ticket');?>" method="post" enctype="multipart/form-data">
                				<!-- <div class="form-group">
                  <label class="col-md-8">Help Topic</label>
                  <input class="form-control" type="email" placeholder="Enter email address">
                </div>-->
				
				<div class="form-group" size="80">
                  <label class="col-md-8">Department</label>
                <select  class="form-control" name="department"  id="departs" onchange="departments()"  >
			  <option><---Select---></option>
	 
				 <?php foreach($department as $dept) {?>
				  <option value="<?php echo $dept->id;?>" ><?php echo $dept->department;?></option>
<?php } ?>

	 
				</select>
				</div>
				
				<div class="form-group">
                  <label class="col-md-8">Help Topic</label>
                <select class="form-control categoryss" name="help_topic" id="mySelect" onclick="category()" >
			  <option><---Select---></option>
	 
			
<option value="other">Other</option>
	 
				</select>
				</div>
				<div id="hide">
				<div class="form-group">
                  <label class="col-md-8">Sub category</label>
                  <select class="form-control  sub_category" name="sub_category" id="mySelects"  onclick="subcategory()" >
			  <option><---Select---></option>
	 
			
				</select>
				  </div>
				<div class="form-group">
                  <label class="col-md-8">Faq</label>
                   <select class="form-control  faq_category" name="faq" id="mySelectsss"  onclick="faqanswe()" >
			  <option><---Select---></option>
	 
			
				</select>
                </div>
				
			
				<div class="form-group" id="faqans">
                  <label class="col-md-8">Faq Answers</label>
                  <textarea class="form-control" id="faq_faqanswe" rows="4" name="messages"  readonly></textarea>
                  </div>
				
				</div>
				<div id="show">
				<div class="form-group">
				 <label class="col-md-8">Others</label>
                  <input class="form-control" type="text" id="others" name="others" placeholder="Enter Other details">
                </div>
				<!--
				-->
				<div class="form-group">
                  <label class="col-md-8">Name</label>
                  <input class="form-control"  type="text" id="name" name="name"  placeholder="Enter full name" required>
                </div>
                <div class="form-group">
                  <label class="col-md-8">Email</label>
                  <input class="form-control"  type="email" id="email" name="email"  placeholder="Enter email address"  required >
                </div>
				 <div class="form-group">
                  <label class="col-md-8">Mobile</label>
                  <input class="form-control" type="mobile" id="mobile" name="mobile" placeholder="Enter mobile number" size="80" required >
                </div>
<div class="form-group">
                  <label class="col-md-8">Subjects</label>
                  <input class="form-control" type="text" id="subjects" name="subjects" placeholder="Enter subject" required>
                </div>
				<div class="form-group">
                  <label class="col-md-8">Messages</label>
                  <textarea class="form-control" rows="4" id="messages" name="messages" placeholder="Enter messages" required></textarea>
                </div>
				<div class="form-group">
                  <label class="col-md-8">Priority</label>
                   <select class="form-control" name="priority">
			  <option><---Select---></option>
			  <option selected value="1">Normal</option>
			  <option value="2">Low</option>
			  <option value="3">Emergency</option>
	 
			
				</select>
				
			   </div>
			   <div class="form-group">
                  <label class="col-md-8">Address</label>
                  <input class="form-control" type="text" id="address" name="address" placeholder="Enter address" required>
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
                 
                </div>
                <div class="form-group">
                  <label class="col-md-8">Attachment</label>
                  <input class="form-control" name="attachments" type="file" >
                </div>
				<div class="form-group">
                  <button class="btn btn-primary" onclick="return(departmentcheck());" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>create ticket</button>
				  
                </div>
               </div>
				<!--
				-->
                 
				 
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
  $("#faqans").hide();	
  
   $("#formoid").click(function(){
   // alert($("div").text($("form").serialize()));
	//var data=$("form").serialize();
					 $.ajax({
        type: "POST",
        url: "<?php echo base_url('saveticket');?>",
        dataType: "html",
        data:$("form").serialize(), 
        success: function(data){
		//$("#myform")[0].reset();
		//location.reload();

   //$('#result').html(data);
    
        } 
    });
	
	
  });

  
  
});

    </script>
	
  </body>
</html>