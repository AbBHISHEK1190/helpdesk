<style>
.article-body{
  word-break: break-all;
  
}
.imageclass{
	  height: 200px;
  width: 50%;
  
}
</style>
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
		  <?php foreach($getallmembers as $data);?>
            <section class="invoice">
              <div class="row mb-4">
                <div class="col-6">
                  <h2 class="page-header"><i class=""></i><?php //echo $data->name;?>
				  <?php if(!empty($data->p_pic)) {?>
		<img class="imageclass" src="<?php echo base_url('');?>assets/Createticket/<?php echo $data->p_pic;?>"></a>

				  <?php }else{?>
				  <img class="imageclass" src="<?php echo base_url('');?>assets/images/128.jpg"></a>
				  <?php }?>
				  </h2>
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
			   Username: <strong><?php echo $data->name; ?></strong>
				  </div>
                <div class="col-6">
				Name: <strong><?php echo $data->f_name; ?></strong>
				  </div>
                <div class="col-6">
				Email: <strong><?php echo $data->email;?></strong>
                  </div>
                 <div class="col-6">
				Mobile: <strong><?php echo $data->mobile;?></strong>
                  </div>
				  <div class="col-6">
				Address: <strong><?php echo $data->address;?></strong>
                  </div>
				  <div class="col-6">
				State: <strong><?php echo $data->state;?></strong>
                  </div>
				  <div class="col-6">
				District: <strong><?php echo $data->district;?></strong>
                  </div>
				  <div class="col-6">
				Block: <strong><?php echo $data->block;?></strong>
                  </div>
				  <div class="col-6">
				Gp: <strong><?php echo $data->gp;?></strong>
                  </div>
				   <div class="col-6">
				Pincode: <strong><?php echo $data->pincode; ?></strong>
				  </div>
				  <div class="col-6">
				Type: <strong><?php echo $data->type;?></strong>
                  </div>
				  <div class="col-6">
				Department: <strong><?php echo $data->department;?></strong>
                  </div>
			 
				  <div class="col-6">
				Joined Date: <strong><?php echo $data->created_date;?></strong>
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
		   
		  
        </div>
		
      </div>
	  
    </main>
	