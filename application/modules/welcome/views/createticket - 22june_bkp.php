
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
        dataType: "json",
        data:{catids:catids}, 
        success: function(data){
	 var html='';
			var i;
			for(i=0;i<data.length;i++)
			{
	 html += '<option value='+data[i].id+'>'+data[i].faq_ans+'</option>';

				
			}
			
   $('.faq_faqanswe').html(html);
   
	 
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
            <h3 class="tile-title">Create Ticket</h3>
			<h3 class="tile-title"><?php if(!empty($msg)){echo $msg;}?></h3>
            <div class="tile-body">
              <form id="formoid" action="<?php echo base_url('create-ticket');?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label class="control-label">Name</label>
                  <input class="form-control"  type="text" name="name"  placeholder="Enter full name" required>
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
				  <option value="<?php echo $dept->id;?>" ><?php echo $dept->department;?></option>
<?php } ?>

	 
				</select>
				</div>
				
				<div class="form-group">
                  <label class="control-label">Help Topic</label>
                <select class="form-control categoryss" name="help_topic" id="mySelect" onclick="category()" >
			  <option><---Select---></option>
	 
			
<option value="other">Other</option>
	 
				</select>
				</div>
				<div id="hide">
				<div class="form-group">
                  <label class="control-label">Sub category</label>
                  <select class="form-control  sub_category" name="sub_category" id="mySelects"  onclick="subcategory()" >
			  <option><---Select---></option>
	 
			
				</select>
				  </div>
				<div class="form-group">
                  <label class="control-label">Faq</label>
                   <select class="form-control  faq_category" name="faq" id="mySelectsss"  onclick="faqanswe()" >
			  <option><---Select---></option>
	 
			
				</select>
                </div>
				
				<div class="form-group">
                  <label class="control-label">Faq Answers</label>
                   <select class="form-control  faq_faqanswe" name="faq">
			  <option><---Select---></option>
	 
			
				</select>
                </div>
				
				</div>
				<div class="form-group" id="show">
                  <label class="control-label">Others</label>
                  <input class="form-control" type="text" name="others" placeholder="Enter Other details">
                </div>
				<div class="form-group">
                  <label class="control-label">Subjects</label>
                  <input class="form-control" type="text" name="subjects" placeholder="Enter subject" required>
                </div>
				<div class="form-group">
                  <label class="control-label">Messages</label>
                  <textarea class="form-control" rows="4" name="messages" placeholder="Enter messages" required></textarea>
                </div>
				<div class="form-group">
                  <label class="control-label">Priority</label>
                   <select class="form-control" name="priority">
			  <option><---Select---></option>
			  <option selected value="1">Normal</option>
			  <option value="2">Low</option>
			  <option value="3">Emergency</option>
	 
			
				</select>
				
			   </div>
                <div class="form-group">
                 
                </div>
                <div class="form-group">
                  <label class="control-label">Attachment</label>
                  <input class="form-control" name="attachments" type="file" >
                </div>
                <div class="form-group">
                  <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Register</button>
				  
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