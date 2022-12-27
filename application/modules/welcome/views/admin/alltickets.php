 <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>All Tickets</h1>
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
					  <?php 
					  $sql ="SELECT sign_up.name FROM sign_up LEFT JOIN assign_ticket ON sign_up.id = assign_ticket.user_id where ticket_id='".$tickets->ticket_id."' ";
				 $query = $this->db->query($sql);
				 $result=$query->row_array();
				  if(!empty($result['name'])){echo $result['name'];}else {echo 'Unassigned';}
				 ?>
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
   