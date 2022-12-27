            <form id="formoid" method="post" action="<?=base_url('upload')?>" enctype="multipart/form-data">
                <input type="name" name="name">
				<input type="file"  name="profile_image" size="33" />
                <input type="submit" value="Upload Image" />
            </form>
			<script>
			  $(document).ready(function(){
     
  
   $("#formoid").click(function(){
   // alert($("div").text($("form").serialize()));
	//var data=$("form").serialize();
					 $.ajax({
        type: "POST",
        url: "<?php echo base_url('upload');?>",
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