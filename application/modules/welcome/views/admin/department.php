<script>
function bloack(id,dep)
{
	//alert(id);
	 $.ajax({
        type: "POST",
        url: "<?php echo base_url('admin/deletefromdepart');?>",
        dataType: "html",
        data:{userid:id,department:dep}, 
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
	function deptedit(ididid,timeme,sid)
	{
			$('.departss').val(ididid);
		$('.depidid').val(timeme);
		$('.sidsid').val(sid);
	}
</script>
 <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>Department</h1>
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
		  <button class="btn" data-toggle="modal" data-target="#myModal">Add Department</button><br><br>
            <div class="tile-body">
			
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  
				  <thead>
				  
                    <tr>
					
					<th>S.no.</th>
                      <th>Department</th>
					  <th>Sla Duration</th>
                      <th>Delete</th>
					  <th>Edit department</th>
					  <th>Edit Sla</th>
                      
                    </tr>
                  </thead>
                  <tbody>
				  <?php foreach($department as $tickets){?>
                    <tr>
					<td><?php static $i=1; echo $i++; ?></td>
                     <td><?php echo $tickets->department;?></td>
					 <td><?php echo $tickets->sla;?></td>
                       <td><button class="btn" onclick="bloack('<?php echo $tickets->id;?>','<?php echo $tickets->sid;?>')">delete</button></td>
                      						
<td>
 <button class="btn"  onclick="deptedit('<?php echo $tickets->department;?>','<?php echo $tickets->id;?>','<?php echo $tickets->sid;?>')" data-toggle="modal" data-target="#mythirdmodal"  type="button">Edit</button>
</td>						
						<td>
						
						 <button class="btn"  onclick="editedit('<?php echo $tickets->department;?>','<?php echo $tickets->sla;?>')" data-toggle="modal" data-target="#mysecondmodal"  type="button">Edit</button></td>
                      		
										  </tr>
				  <?php }?>
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
        <h4 class="modal-title">Add Department</h4>
      </div>
      <div class="modal-body">
       <!-- <p>Some text in the modal.</p>-->
	   <form method="post">
	   <div class="form-group">
                  <label class="control-label">Department name</label>
                  <input class="form-control" type="text" id="depdep" name="department" placeholder="Enter subject" required="">
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
        <h4 class="modal-title">Edit sla time</h4>
      </div>
      <div class="modal-body">
       <!-- <p>Some text in the modal.</p>-->
	   <form method="post">
	   <div class="form-group">
                  <label class="control-label ">New Sla</label>
                  <input class="form-control depart" type="hidden"></input>
                
				  <input class="form-control slatime" type="text"></input>
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

<!--third modal-->
<!-- Modal -->
<div id="mythirdmodal" class="modal fade" role="dialog">
  <div class="modal-dialog">

 <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit department</h4>
      </div>
      <div class="modal-body">
       <!-- <p>Some text in the modal.</p>-->
	   <form method="post">
	   <div class="form-group">
                  <label class="control-label ">Department</label>
                  <input class="form-control sidsid" type="hidden"></input>
                
				  <input class="form-control depidid" type="hidden"></input>
                
				  <input class="form-control departss" type="text"></input>
                </div>
				<div class="form-group">
                  <button class="btn btn-primary" id="sususunxhthird" ><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
				  
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
	//alert('fkjdkjg');
	
	var depdep=$('#depdep').val();
	//alert(depdep);
	 $.ajax({
        type: "POST",
        url: "<?php echo base_url('admin/adddepartment');?>",
        dataType: "html",
        data:{department:depdep}, 
        success: function(data){
		

   $('#result').html(data);
   location.reload();
    
        } 
    });
	
	
	
	
	
});
$('#sususunxhsecond').click(function()
{
	var depart=$('.depart').val();
	var slatime=$('.slatime').val();
	
 $.ajax({
        type: "POST",
        url: "<?php echo base_url('admin/editslatime');?>",
        dataType: "html",
        data:{department:depart,sla:slatime}, 
        success: function(data){
		

   $('#result').html(data);
   location.reload();
       
	   } 
    });
	
	
	
});

$('#sususunxhthird').click(function()
{
	var depart=$('.departss').val();
	var depid=$('.depidid').val();
	var sid=$('.sidsid').val();
	//alert(depart);
	
 $.ajax({
        type: "POST",
        url: "<?php echo base_url('admin/editdepartment');?>",
        dataType: "html",
        data:{department:depart,id:depid,sid:sid}, 
        success: function(data){
		

   $('#result').html(data);
   location.reload();
       
	   } 
    });
	
	
	
});


});
</script>
