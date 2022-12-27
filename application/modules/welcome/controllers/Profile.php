<?php
//Abhishek kumar jha
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MY_Controller {
public $data;
	public function __construct()
	{
		
		parent::__construct();
		$this->load->library('Layout');
		$this->load->model('Loginmodel');
		        $this->load->helper('url');

		//echo 'jsfsjf';
	}
public function index()
{
$post=$this->input->post();
if(!empty($post))
{
	print_r($post);
}
$this->layout->view('admin/profile');
}	


}
