 <?php $this->load->view('_layout/head');?>
  <body class="app sidebar-mini">
    <!-- Navbar-->
	<?php $this->load->view('stafflayout/header');?>
    <!-- Sidebar menu-->
	<?php $this->load->view('stafflayout/sibebar-menu');?>
    <?php echo $content; ?>
    <?php $this->load->view('_layout/footer');?>