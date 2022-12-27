 <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> Form Components</h1>
          <p>Bootstrap default form components</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item"><a href="#">Form Components</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="row">
              <div class="col-lg-12">
			  <?php foreach($ticketdetails as $data);?>
                <form method="post" action="#">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Ticked Id</label>
                    <input class="form-control" id="exampleInputEmail1" type="email" value="<?php echo $data->ticket_id;?>" aria-describedby="emailHelp" disabled placeholder="Enter email"><small class="form-text text-muted" id="emailHelp"></small>
                  </div>
				  <?php if(!empty($data->help_topic)) {?>
				  <div class="form-group">
                    <label for="exampleInputEmail1">Help Topic</label>
                    <input class="form-control" id="exampleInputEmail1" type="email" value="<?php echo $data->help_topic;?>" aria-describedby="emailHelp" disabled placeholder="Enter email"><small class="form-text text-muted" id="emailHelp"></small>
                  </div>
				  <?php }?>
				  <?php if(!empty($data->sub_category)) {?>
				  <div class="form-group">
                    <label for="exampleInputEmail1">Sub Category</label>
                    <input class="form-control" id="exampleInputEmail1" type="email" value="<?php echo $data->sub_category;?>" aria-describedby="emailHelp" disabled placeholder="Enter email"><small class="form-text text-muted" id="emailHelp"></small>
                  </div>
				  <?php }?>
				  <?php if(!empty($data->faq)) {?>
				  <div class="form-group">
                    <label for="exampleInputEmail1">Faq</label>
                    <input class="form-control" id="exampleInputEmail1" type="email" value="<?php echo $data->faq;?>" aria-describedby="emailHelp" disabled placeholder="Enter email"><small class="form-text text-muted" id="emailHelp"></small>
                  </div>
				  <?php }?>
				  <?php if(!empty($data->others)) {?>
				  <div class="form-group">
                    <label for="exampleInputEmail1">Help Topic</label>
                    <input class="form-control" id="exampleInputEmail1" type="email" value="<?php echo $data->others;?>" aria-describedby="emailHelp" disabled placeholder="Enter email"><small class="form-text text-muted" id="emailHelp"></small>
                  </div>
				  <?php }?>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Subjects</label>
                    <input class="form-control" id="exampleInputEmail1" type="email" value="<?php echo $data->subjects;?>" aria-describedby="emailHelp" disabled placeholder="Enter email"><small class="form-text text-muted" id="emailHelp"></small>
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleTextarea">Message</label>
                    <textarea class="form-control"  id="exampleTextarea" rows="3" readonly="readonly" ><?php echo $data->messages;?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <input class="form-control-file" id="exampleInputFile" type="file" aria-describedby="fileHelp"><small class="form-text text-muted" id="fileHelp">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
                  </div>
                  
                  <div class="tile-footer">
              <button class="btn btn-primary" type="submit">Submit</button>
            </div>
                </form>
              </div>
              
            </div>
            <!--<div class="tile-footer">
              <button class="btn btn-primary" type="submit">Submit</button>
            </div>-->
          </div>
        </div>
      </div>
    </main>
   