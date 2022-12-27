
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

function validateEmail(emailField){
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

        if (reg.test(emailField.value) == false) 
        {
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
            <h3 class="tile-title">Create Ticket</h3>
            <div class="tile-body">
                <form action="<?php echo base_url('saveticket')?>" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
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
  
  /* $("#formoid").click(function(){
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

  
*/  
});


    </script>
	
  </body>
</html>