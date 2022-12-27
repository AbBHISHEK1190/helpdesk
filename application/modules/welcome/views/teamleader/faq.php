<script>
function categorys()
{
	var catid = document.getElementById("mySelect").value;
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


function bloack(id)
{
	//alert(id);
	 $.ajax({
        type: "POST",
        url: "<?php echo base_url('tl/deletefromfaq');?>",
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
	
	function addadd(idid)
	{
		$('.faqid').val(idid);
		
	}
	function edittfaqans(faqansns,faqids)
	{
		
		$('#faqans').val(faqansns);
		$('#faqidsd').val(faqids);
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
					  <th>Faq Answers</th>
                      <th>Delete</th>
					  <th>Edit Faq </th>
					  <th>Action Faq Answers</th>
                      
                    </tr>
                  </thead>
                  <tbody>
				  <?php foreach($faq as $tickets)if($tickets->faq !=''){{?>
                    <tr>
					<td><?php static $i=1; echo $i++; ?></td>
                     <td><?php echo $tickets->sub_category;?></td>
					 <td><?php echo $tickets->faq;?></td>
                       <td>
					   <?php $sql ="SELECT faq_ans.id,faq_ans.faq_ans FROM faq_ans  where faq_id='".$tickets->id."' ";
				 $query = $this->db->query($sql);
				 $result=$query->row_array();
				 if(!empty($result['faq_ans'])){echo $result['faq_ans'];}else {echo '';}
				 ?>
					   </td>
					   <td><button class="btn" onclick="bloack('<?php echo $tickets->id;?>')" >delete</button></td>
                      						
						 <td>
						
						 <button class="btn"   data-toggle="modal" data-target="#mysecondmodal" onclick="editedit('<?php echo $tickets->faq;?>','<?php echo $tickets->id;?>')" type="button">Edit</button></td>
                      		
<td>
						<?php if(empty($result['faq_ans'])){?>
						<button class="btn"   data-toggle="modal" data-target="#mythirdmodal" onclick="addadd('<?php echo $tickets->id;?>')" type="button">Add</button></td> <?php  }else {?>
						<button class="btn"   data-toggle="modal" data-target="#myfourthdmodal" onclick="edittfaqans('<?php echo $result['faq_ans'];?>','<?php echo $result['id'];?>')" type="button">Edit</button></td><?php }?>
                      		
																
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
                  <label class="control-label">Helptopic</label>
                <select class="form-control" id="mySelect" onclick="categorys()">
				<option>Select Helptopic</option>
				 <?php foreach($htpic as $de){?>
				<option value="<?php echo $de->id;?>"><?php echo $de->category;?></option>
				<?php } ?>
				</select>
				</div>
		<div class="form-group">
                  <label class="control-label">Sub Category</label>
                <select class="form-control  sub_category" name="faq" id="mySelectsss"  >
			  <option><---Select---></option>
	 
			
				</select>

				</div>
	   <div class="form-group">
                  <label class="control-label">Enter Faq</label>
                 
				  <input class="form-control" type="text" id="depdep" name="department" placeholder="Enter helptopic" required="">
				  
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
<!-- third modal -->
<div id="mythirdmodal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Faq Answers</h4>
      </div>
      <div class="modal-body">
       <!-- <p>Some text in the modal.</p>-->
	   <form method="post">
	   <input type="hidden" class="faqid" >
		<div class="form-group">
                  <label class="control-label">Enter Faq Answers</label>
                 
				  <textarea class="form-control" type="text" id="depdepsss" name="department" placeholder="Enter Faq answers" required=""></textarea>
				  
				</div>
				<div class="form-group">
                  <button class="btn btn-primary" id="sususunxhaddfaqans" ><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
				  
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
        <button  class="btn btn-default"  data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- fourth modal-->
<!-- Modal -->
<div id="myfourthdmodal" class="modal fade" role="dialog">
  <div class="modal-dialog">

 <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Faq Answers</h4>
      </div>
      <div class="modal-body">
       <!-- <p>Some text in the modal.</p>-->
	   <form method="post">
	   <div class="form-group">
	   <input class="form-control" id="faqidsd" type="hidden"></input>
                  <label class="control-label ">Faq Answers</label>
                  
                
				  <textarea class="form-control" size="4" id="faqans" type="text"></textarea>
                </div>
				<div class="form-group">
                  <button class="btn btn-primary" id="sususunxhfourth" ><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
				  
                </div>
				</form>
      </div>
      <div class="modal-footer">
        <button  class="btn btn-default"  data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<script src="<?php echo base_url('')?>assets/js/jquery.min.js"></script>
<script>
$(document).ready(function()
{
$('#sususunxh').click(function()
{
	
	 var departmentid= document.getElementById("mySelectsss").value;
    //alert(departmentid);
	var category=$('#depdep').val();
	//alert(category);
	if(departmentid !=='' && departmentid !==0)
	{
		//alert('hdhwf');
	 $.ajax({
        type: "POST",
        url: "<?php echo base_url('tl/addfaq');?>",
        dataType: "html",
        data:{departmentid:departmentid,category:category}, 
        success: function(data){
       $('#result').html(data);
      location.reload();
   
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
        url: "<?php echo base_url('tl/editfaq');?>",
        dataType: "html",
        data:{category:depart,departmentid:slatime}, 
        success: function(data){
	
	$('#result').html(data);
   location.reload()
        
		} 
    });
	
	
	
});

$('#sususunxhfourth').click(function()
{
	var depart=$('#faqans').val();
	var slatime=$('#faqidsd').val();
	
 $.ajax({
        type: "POST",
        url: "<?php echo base_url('tl/editfaq_ans');?>",
        dataType: "html",
        data:{category:depart,departmentid:slatime}, 
        success: function(data){
	
	$('#result').html(data);
   location.reload()
        
		} 
    });
	
	
	
});


$('#sususunxhaddfaqans').click(function()
{
	
	 var departmentid= $('.faqid').val();
    //alert(departmentid);
	var category=$('#depdepsss').val();
	//alert(category);
	if(departmentid !=='' && departmentid !==0)
	{
		//alert('hdhwf');
	 $.ajax({
        type: "POST",
        url: "<?php echo base_url('tl/addfaqans');?>",
        dataType: "html",
        data:{departmentid:departmentid,category:category}, 
        success: function(data){
       $('#result').html(data);
      location.reload();
   
        } 
    });
	}
	
	
	
	
	
});

});
</script>
