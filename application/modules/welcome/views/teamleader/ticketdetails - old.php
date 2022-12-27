<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-file-text"></i>Ticket details</h1>
          <!--<p>A Printable Invoice Format</p>-->
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Invoice</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
		  <?php foreach($ticketdetails as $data);?>
            <section class="invoice">
              <div class="row mb-4">
                <div class="col-6">
                  <h2 class="page-header"><i class=""></i>#<?php echo $data->ticket_id;?></h2>
                </div>
                <div class="col-6">
                  <!--<h5 class="text-right"><?php echo $data->created_date;?></h5>
                -->
				</div>
              </div>
              <div class="row invoice-info">
                <div class="col-6">
				<!--<h5 class="text">Status:<?php if($data->status=='1'){echo 'Open';}else {echo 'Closed';}?></h5>
-->               
			   Status: <strong><?php if($data->status=='1'){echo 'Open';}else {echo 'Closed';}?></strong>
				  </div>
                <div class="col-6">
				Email: <strong><?php echo $data->email;?></strong>
                  </div>
                 <div class="col-6">
				Name: <strong><?php echo $data->name;?></strong>
                  </div>
				  <div class="col-6">
				Mobile: <strong><?php echo $data->mobile;?></strong>
                  </div>
				  <div class="col-6">
				Department: <strong><?php echo $data->department;?></strong>
                  </div>
				  <div class="col-6">
				Help Topic: <strong><?php echo $data->help_topic;?></strong>
                  </div>
				  <div class="col-6">
				Sub Category: <strong><?php echo $data->sub_category;?></strong>
                  </div>
				  <div class="col-6">
				Faq: <strong><?php echo $data->faq;?></strong>
                  </div>
				  <div class="col-6">
				Others: <strong><?php echo $data->others;?></strong>
                  </div>
				  <div class="col-6">
				Subjects: <strong><?php echo $data->subjects;?></strong>
                  </div>
			 
			 <div class="col-6">
				Priority: <strong><?php if($data->priority=='1'){echo 'Normal';}elseif($data->priority=='2'){echo 'Low';}else {echo 'Emergency';}?></strong>
                  </div>
				  <div class="col-6">
				Created Date: <strong><?php echo $data->created_date;?></strong>
                  </div>
				  <div class="col-6">
				Assigned to: <strong><?php $sql ="SELECT sign_up.name FROM sign_up LEFT JOIN assign_ticket ON sign_up.id = assign_ticket.user_id where ticket_id='".$data->ticket_id."' ";
				 $query = $this->db->query($sql);
				 $result=$query->row_array();
				 echo $result['name']?$result['name']:'Unassigned';
				 ?></strong>
                  </div>
				  <div class="col-6">
				Assigned Date: <strong><?php $sql ="SELECT created_date FROM  assign_ticket where ticket_id='".$data->ticket_id."' ";
				 $query = $this->db->query($sql);
				 $result=$query->row_array();
				 echo $result['created_date']?$result['created_date']:'Unassigned';
				 ?></strong>
                  </div>
<div class="col-6">
				Sla Time: <strong><?php $sql ="SELECT sla FROM  assign_ticket where ticket_id='".$data->ticket_id."' ";
				 $query = $this->db->query($sql);
				 $result=$query->row_array();
				 echo $result['sla']?$result['sla']:'Unassigned';
				 ?></strong>
                  </div>

			 </div>
			 
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Qty</th>
                        <th>Product</th>
                        <th>Serial #</th>
                        <th>Description</th>
                        <th>Subtotal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>The Hunger Games</td>
                        <td>455-981-221</td>
                        <td>El snort testosterone trophy driving gloves handsome</td>
                        <td>$41.32</td>
                      </tr>
                      <tr>
                        <td>1</td>
                        <td>City of Bones</td>
                        <td>247-925-726</td>
                        <td>Wes Anderson umami biodiesel</td>
                        <td>$75.52</td>
                      </tr>
                      <tr>
                        <td>1</td>
                        <td>The Maze Runner</td>
                        <td>545-457-47</td>
                        <td>Terry Richardson helvetica tousled street art master</td>
                        <td>$15.25</td>
                      </tr>
                      <tr>
                        <td>1</td>
                        <td>The Fault in Our Stars</td>
                        <td>757-855-857</td>
                        <td>Tousled lomo letterpress</td>
                        <td>$03.44</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="row d-print-none mt-2">
                <div class="col-12 text-right"><a class="btn btn-primary" href="javascript:window.print();" target="_blank"><i class="fa fa-print"></i> Print</a></div>
              </div>
            </section>
          </div>
        </div>
      </div>
    </main>
    