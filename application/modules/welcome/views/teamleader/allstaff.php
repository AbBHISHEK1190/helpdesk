<script>
function bloack(id,stst)
{
	 $.ajax({
        type: "POST",
        url: "<?php echo base_url('tl/changestaffstatus');?>",
        dataType: "html",
        data:{userid:id,status:stst}, 
        success: function(data){
		

   $('#result').html(data);
   swal({
      		title: "success",
      		text: "success!",
      		
      	});
   setTimeout(function(){
        location.reload();
    }, 500); 
        } 
    });
	
}
</script>
 <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>All Members</h1>
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
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>Username</th>
                      <th>Email</th>
                      <th>Department</th>
					  <th>Type</th>
                      <th>Action</th>

                      
                    </tr>
                  </thead>
                  <tbody>
				  <?php foreach($getallmembers as $tickets){?>
                    <tr>
                     <td><a href="<?php echo base_url('tl/allstaff-details')?>/<?php echo base64_encode($tickets->id);?>"  ><?php echo $tickets->name;?></a></td>
                     <td><?php echo $tickets->email;?></td>
                      <td><?php echo $tickets->department;?></td>
                       <td><?php echo $tickets->type;?></td>
					  <td><?php if($tickets->status=='0'){?>
					  <button class="btn btn-primary" onclick="bloack('<?php echo $tickets->id;?>','<?php echo $tickets->status; ?>')" type="button"><i class=""></i>Unblock</button>

					  <?php }else{?>
					   <button class="btn btn-primary" onclick="bloack('<?php echo $tickets->id;?>','<?php echo $tickets->status; ?>')"  type="button"><i class=""></i>Block</button>

					  <?php }?>
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
   