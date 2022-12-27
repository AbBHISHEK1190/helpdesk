<script>
function ticket(tid)
{
	var t_id=tid;
		//alert(t_id);
		$('select').on('change', function() {
            var id= this.value;
				
				
				 $.ajax({
        type: "POST",
        url: "<?php echo base_url('admin/assignedticketbyadmins');?>",
        dataType: "html",
        data:{tid:t_id,uid:id}, 
        success: function(data){
		

   $('#result').html(data);
   setTimeout(function(){
        location.reload();
    }, 3000); 
        } 
    });

				
				});
	
}
</script>
 <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>All Unassigned Tickets</h1>
         <p id="result"></p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
        <!--  <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active"><a href="#">Data Table</a></li>
        --></ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>Ticket</th>
                      <th>Date</th>
                      <th>Subject</th>
                      <th>From</th>
                      <th>Priority</th>
					  <th>Department</th>
                      <th>Assigned to</th>
                    </tr>
                  </thead>
                  <tbody>
				  <?php foreach($getalltickets as $tickets){?>
                    <tr>
                      <td><a href="<?php echo base_url('admin/ticket-details')?>/<?php echo base64_encode($tickets->ticket_id);?>"  ><?php echo $tickets->ticket_id;?></a></td>
                      <td><?php echo $tickets->created_date;?></td>
                      <td><?php echo $tickets->subjects;?></td>
                      <td><?php echo $tickets->name;?></td>
                      <td><?php if($tickets->priority==1){echo 'Normal';}elseif($tickets->priority==2){echo 'Low';}else{echo 'Emergency';}?></td>
				      <td><?php echo $tickets->department;?></td>
				 <td>
<select  onclick="ticket('<?php echo $tickets->ticket_id ?>')" name='id' id='uid'>
<option>Assigned to:</option>
<option <?php $usertype=$this->session->userdata('usertype');?> value="<?php echo $usertype[0]['id']?>">Self</option>
<?php

$this->db->select('*');
$this->db->from('sign_up');
$this->db->where('department',$tickets->department);
$this->db->where('status','1');
$members=$this->db->get()->result();




 foreach($members as $memb){?>
 
<option  value=<?php echo $memb->id;?>><button type="button"><?php 
$usertype=$this->session->userdata('usertype');
if($usertype[0]['id']==$memb->id){echo 'self';}else{echo $memb->name;};?></button></option>
<?php }?>
</select>
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   
<script>
$(document).ready(function()

{
	//alert('jhfhfhj');
}
);
</script>   