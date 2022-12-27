<script>
function bloack(id)
{
	//alert(id);
	 $.ajax({
        type: "POST",
        url: "<?php echo base_url('tl/deletefromhelptc');?>",
        dataType: "html",
        data:{id:id}, 
        success: function(data){
	$('#result').html(data);
   
   location.reload();
        } 
    });
	
}

	function deptedit(ididid,timeme)
	{
			$('.departss').val(ididid);
		$('.depidid').val(timeme);
		
	}
</script>
 <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>Help Topic</h1>
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
		  <button class="btn" data-toggle="modal" data-target="#myModal">Add Help Topic</button><br><br>
            <div class="tile-body">
			
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  
				  <thead>
				  
                    <tr>
					
					<th>S.no.</th>
                      <th>Help Topic</th>
					  <th>Delete</th>
					  <th>Edit</th>
					  
                      
                    </tr>
                  </thead>
                  <tbody>
				  <?php foreach($gethelptopic as $tickets){?>
                    <tr>
					<td><?php static $i=1; echo $i++; ?></td>
                     <td><?php echo $tickets->category;?></td>
					 
                       <td><button class="btn" onclick="bloack('<?php echo $tickets->id;?>')">delete</button></td>
                      						
<td>
 <button class="btn"  onclick="deptedit('<?php echo $tickets->category;?>','<?php echo $tickets->id;?>')" data-toggle="modal" data-target="#mythirdmodal"  type="button">Edit</button>
</td>						
							
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
        <h4 class="modal-title">Add Help Topic</h4>
      </div>
      <div class="modal-body">
       <!-- <p>Some text in the modal.</p>-->
	   <form method="post">
	   <div class="form-group">
	    <input class="form-control depart" type="hidden"></input>
                  <label class="control-label">Help Topic Name</label>
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

 <!--third modal-->
<!-- Modal -->
<div id="mythirdmodal" class="modal fade" role="dialog">
  <div class="modal-dialog">

 <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Help Topic</h4>
      </div>
      <div class="modal-body">
       <!-- <p>Some text in the modal.</p>-->
	   <form method="post">
	   <div class="form-group">
	   <input class="form-control depidid" type="hidden"></input>
                
                  <label class="control-label ">Help Topic</label>
                  
				  <input class="form-control departss" type="text"></input>
                </div>
				<div class="form-group">
                  <button class="btn btn-primary" id="sususunxhthird"  type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
				  
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
        url: "<?php echo base_url('tl/addhelptic');?>",
        dataType: "html",
        data:{heltic:depdep}, 
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
	//alert(depart);
	//alert(depid);
	
 $.ajax({
        type: "POST",
        url: "<?php echo base_url('tl/editaddhelptic');?>",
        dataType: "html",
        data:{category:depart,depid:depid}, 
        success: function(data){
		

   $('#result').html(data);
   location.reload();
       
	   } 
    });
	
	
	
});


});
</script>
