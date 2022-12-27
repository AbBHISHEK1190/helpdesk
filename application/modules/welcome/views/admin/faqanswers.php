<script>
function bloack(id)
{
	//alert(dep);
	 $.ajax({
        type: "POST",
        url: "<?php echo base_url('admin/deletefromfaq');?>",
        dataType: "html",
        data:{catid:id}, 
        success: function(data){
		

   $('#result').html(data);
   location.reload();
        } 
    });
	
}
function editedit(ididid,timeme)
	{
		$('.depart').val(ididid);
		$('.slatime').val(timeme);
	}
</script>
 <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>Faq</h1>
         <!-- <p>Table to display analytical data effectively</p>-->
        </div>
        <ul class="app-breadcrumb breadcrumb side">
         <!-- <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active"><a href="#">Data Table</a></li>
       --> </ul>
      </div>
      <div class="row">
	  
        <div class="col-md-12">
		
          <div class="tile">
		  <button class="btn" data-toggle="modal" data-target="#myModal">Add Faq</button><br><br>
            <div class="tile-body">
			
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  
				  <thead>
				  
                    <tr>
					
					<th>S.no.</th>
                      <th>Sub Category</th>
					  <th>Faq</th>
                      <th>Delete</th>
					  <th>Edit</th>
                      
                    </tr>
                  </thead>
                  <tbody>
				  <?php foreach($getfaq as $tickets)if($tickets->faq !=''){{?>
                    <tr>
					<td><?php static $i=1; echo $i++; ?></td>
                     <td><?php echo $tickets->sub_category;?></td>
					 <td><?php echo $tickets->faq;?></td>
                       <td><button class="btn" onclick="bloack('<?php echo $tickets->faqid;?>')" >delete</button></td>
                      						
						 <td>
						
						 <button class="btn"   data-toggle="modal" data-target="#mysecondmodal" onclick="editedit('<?php echo $tickets->faq;?>','<?php echo $tickets->faqid;?>')" type="button">Edit</button></td>
                      		
										  </tr>
				  <?php }}?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
   <!-- modal box-->
   
   <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Faq</h4>
      </div>
      <div class="modal-body">
       <!-- <p>Some text in the modal.</p>-->
	   <form method="post">
	   <div class="form-group">
                  <label class="control-label">Sub Category</label>
                <select class="form-control" id="mySelect">
				<option>Select Sub Category</option>
				 <?php foreach($getomcategory as $de){?>
				<option value="<?php echo $de->id;?>"><?php echo $de->sub_category;?></option>
				<?php } ?>
				</select>
				</div>
		
	   <div class="form-group">
                  <label class="control-label">Enter Helptopic</label>
                 
				  <input class="form-control" type="text" id="depdep" name="department" placeholder="Enter faq" required="">
				  
				</div>
				<div class="form-group">
                  <button class="btn btn-primary" id="sususunxh" ><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
				  
                </div>
				</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default"  data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!--second modal box-->

<!-- Modal -->
<div id="mysecondmodal" class="modal fade" role="dialog">
  <div class="modal-dialog">

 <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Faq</h4>
      </div>
      <div class="modal-body">
       <!-- <p>Some text in the modal.</p>-->
	   <form method="post">
	   <div class="form-group">
                  <label class="control-label ">Faq</label>
                  <input class="form-control slatime" type="hidden"></input>
                
				  <input class="form-control depart" type="text"></input>
                </div>
				<div class="form-group">
                  <button class="btn btn-primary" id="sususunxhsecond" ><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
				  
                </div>
				</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default"  data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function()
{
$('#sususunxh').click(function()
{
	
	 var departmentid= document.getElementById("mySelect").value;
    
	var category=$('#depdep').val();
	if(departmentid !=='' && departmentid !==0)
	{
	 $.ajax({
        type: "POST",
        url: "<?php echo base_url('admin/addfaq');?>",
        dataType: "html",
        data:{departmentid:departmentid,category:category}, 
        success: function(data){
		

   $('#result').html(data);
   
   setTimeout(function(){
        location.reload();
    }, 1000); 
        } 
    });
	}
	
	
	
	
	
});
$('#sususunxhsecond').click(function()
{
	var depart=$('.depart').val();
	var slatime=$('.slatime').val();
	//alert(depart);
	
 $.ajax({
        type: "POST",
        url: "<?php echo base_url('admin/editfaq');?>",
        dataType: "html",
        data:{category:depart,departmentid:slatime}, 
        success: function(data){
		

   $('#result').html(data);
   location.reload();
    
        } 
    });
	
	
	
});
});
</script>
