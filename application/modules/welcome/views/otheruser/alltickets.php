<script>
function getalldata()
   {
	   var catid = document.getElementById("mySelect").value;
//alert(catid);
 $.ajax({
        type: "POST",
        url: "<?php echo base_url('ticket/allmytickets');?>",
        dataType: "html",
        data:{status:catid}, 
        success: function(data){
			
			//alert(data);
			$('.alldata').html(data);
			
 }});
	   
   }
</script>
<style>
.form-control-new
{
display: block;
    height: calc(1.5em + 0.75rem + 4px);
  padding: 0.375rem 0.75rem;
  font-size: 0.875rem;
  font-weight: 400;
  line-height: 1.5;
  color: #495057;
  background-color: #FFF;
  background-clip: padding-box;
  border: 2px solid #ced4da;
  border-radius: 4px;
  }

</style>
 <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>All Tickets</h1>
         <!-- <p>Table to display analytical data effectively</p>-->
        </div>	
        <ul class="app-breadcrumb breadcrumb side">
       <!--   <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active"><a href="#">Data Table</a></li>
        --></ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
			  
	                <select class="form-control-new" name="help_topic" id="mySelect" onchange="getalldata()" >
			 
	 
				 				  <option value="" >All</option>
				  <option value="1" >Open</option>
<option value="0">Closed</option>
	 
				</select>
  
			  <!--<table class="table table-hover table-bordered" id="sampleTable">
                -->
                <table class="table table-hover table-bordered" >
                  <thead>
                    <tr>
                      <th>Ticket</th>
                      <th>Date</th>
                      <th>Subject</th>
					  <th>Status</th>
                                          </tr>
                  </thead>
                  <tbody class="alldata">
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
   
   $(document).ready(function(){
getalldata();
});

   </script>