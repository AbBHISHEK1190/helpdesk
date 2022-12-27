<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>Ticket details</h1>
          <!--<p>A Printable Invoice Format</p>-->
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <!--<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Invoice</a></li>
      -->  </ul>
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
				 if(!empty($result['name'])){echo $result['name'];}else {echo 'Unassigned';}
				 				
				?></strong>
                  </div>
				  <div class="col-6">
				Assigned Date: <strong><?php $sql ="SELECT created_date FROM  assign_ticket where ticket_id='".$data->ticket_id."' ";
				 $query = $this->db->query($sql);
				 $result=$query->row_array();
				 if(!empty($result['created_date'])){echo $result['created_date'];}else {echo '';}
				 ?></strong>
                  </div>
<div class="col-6">
				Sla Time: <strong><?php $sql ="SELECT sla FROM  assign_ticket where ticket_id='".$data->ticket_id."' ";
				 $query = $this->db->query($sql);
				 $result=$query->row_array();
				 if(!empty($result['sla'])){echo $result['sla'];}else {echo '';}
				 ?></strong>
                  </div>
<div class="col-6">
				Message: <strong><?php echo $data->messages;?></strong>
                  </div>
				  <div class="col-6">
				File:  <button class="btn"><i class="fa fa-download"></i><a href="<?php echo base_url('')?>assets/Createticket/<?php echo $data->attachments;?>" target="_blank"> Download</a></button>
				
                  </div>
			 </div>
			 
              <div class="row">
              <!--  <div class="col-12 table-responsive">
                   
            <div class="">Message:<?php echo $data->messages;?></div>
          
                </div>-->
              </div>
             <!-- <div class="row d-print-none mt-2">
                <div class="col-12 text-right"><a class="btn btn-primary" href="javascript:window.print();" target="_blank"><i class="fa fa-print"></i> Print</a></div>
              </div>-->
            </section>
			
          </div>
		  <?php foreach($message as $me) {?>
		   <div class="tile">
            <div class="tile-body"><h1><?php echo $me->message;?></h1><?php if($me->user_id=='0'){echo 'Sent';}else {echo 'recived';}?>(<?php echo $me->created_date;?>)</div>
          </div>
		  <?php }?>
		  <!--messages details -->
		  <div class="row user">
        
        <div class="col-md-12">
          <div class="tab-content">
           
            <div class="tab-pane active" id="user-settings">
              <div class="tile user-settings">
                <h4 class="line-head">Reply</h4>
				<p id="result"></p>
                <form method="post">
                 
                  <div class="row">
                   
                   <input type="hidden" id="dep" value="<?php echo $data->department;?>" />
                   
                   <input type="hidden" id="t_id" value="<?php echo $data->ticket_id;?>" />
                    <div class="clearfix"></div>
                    <div class="col-md-12 mb-4">
                      <label></label>
					  <textarea class="form-control" rows="4" id="mess" name="messages" placeholder="Enter messages" required=""></textarea>
                     
                    </div>
					<div class="clearfix"></div>
                    <div class="col-md-12 mb-4">
                      <label>Ticket Status:</label><br>
					  <input type="radio" name="colors" value="0" id="myRadio">  Close on Reply
                    </div>
                  </div>
                  <div class="row mb-10">
				  <?php if($data->status=='1'){?>
                    <div class="col-md-12">
                      <button class="btn btn-primary" id="sumitt" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Send</button>
                    </div>
				  <?php } else { ?>
				  <div class="col-md-12">
                      <button class="btn btn-primary" disabled id="sumitt" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Send</button>
                    </div>
				  <?php }?>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
		 <!--End messages details --> 
        </div>
		
      </div>
	  
    </main>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
	$(document).ready(function()
	{
	$('#sumitt').click(function()
	{
		//alert('ajhjhv');
		var t_id=$('#t_id').val();
		var mess=$('#mess').val();
		var dep=$('#dep').val();
		// var xststus = document.getElementById("myRadio").value;
		var xststus=$("#myRadio:checked").val();
	var stst=	xststus?xststus:'';
		//alert(xststus);
		if(mess=='')
		{
			return false;
		}
		 $.ajax({
        type: "POST",
        url: "<?php echo base_url('ticket/saveotmessage');?>",
        dataType: "html",
        data:{tid:t_id,mess:mess,status:stst,dep:dep}, 
        success: function(data){
	
   $('#result').html(data);
   setTimeout(function(){
        location.reload();
    }, 3000); 
     
        } 
    });
		
	
		//
	});	
	});
	</script>