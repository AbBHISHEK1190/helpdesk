<style>
.imgimgimg{
	
	height:30px;
	weight:30px;
}
.app-sidebar__user-avatar {
  -webkit-box-flex: 0;
      -ms-flex: 0 0 auto;
          flex: 0 0 auto;
  margin-right: 15px;
  height:90px;
	weight:90px;
}

</style>
<?php 
$usertype=$this->session->userdata('usertype');
?>
 <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user">
	  <?php 
		  $sql ="SELECT p_pic FROM sign_up where id='".$usertype[0]['id']."' ";
				 $query = $this->db->query($sql);
				 $result=$query->row_array();
				 if(!empty($result['p_pic']))
				 {?>
			 <img class="app-sidebar__user-avatar" src="<?php echo base_url('');?>assets/Createticket/<?php echo $result['p_pic'];?>" alt="User Image">
				 <?php }else {?>

      <img class="app-sidebar__user-avatar" src="<?php echo base_url('');?>assets/images/48.jpg" alt="User Image">
				 <?php }?>
	  <div>
          <p class="app-sidebar__user-name"><?php echo $usertype['0']['name'];?></p>
        <!--  <p class="app-sidebar__user-designation">Frontend Developer</p>-->
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item active" href="<?php echo base_url('staff/dashboard'); ?>"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Tickets</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="<?php echo base_url('staff/all-tickets');?>"><i class="icon fa fa-circle-o"></i>All Tickets</a></li>
           <!-- <li><a class="treeview-item" href="<?php echo base_url('staff/allclosedtickets');?>" ><i class="icon fa fa-circle-o"></i> Closed Tickets</a></li>
            <li><a class="treeview-item" href="#"><i class="icon fa fa-circle-o"></i> Cards</a></li>
            <li><a class="treeview-item" href="#"><i class="icon fa fa-circle-o"></i> Widgets</a></li>
          --></ul>
        </li>
         </aside>
		