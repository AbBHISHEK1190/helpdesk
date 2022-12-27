<?php
//Abhishek kumar jha
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgotpassword extends MY_Controller {
public $data;
	public function __construct()
	{
		
		parent::__construct();
		$this->load->library('Template');
		$this->load->model('Homemodel');
		        $this->load->helper('url');

		//echo 'jsfsjf';
	}
public function index()
{

$this->load->view('forgotpassword');
}	

public function f_password()
{
	
	if(!empty($this->input->post()))
	{
		
		$varData=$this->Homemodel->checkusername($this->input->post());
	//print_r($varData);
	if($varData !='false')
	{
		
		redirect(base_url('reset-password/' . base64_encode($varData)));

	//	print_r($url);
	}
	else
	{
		$this->session->set_flashdata('item','Username is wrong.');
$this->load->view('forgotpassword');
	}
	}
	else
	{
		
		redirect(base_url('forgotpassword'));
	}
	
}
public function reset_password($uname='')
{
$varData=$this->Homemodel->checkuser_name(base64_decode($uname));	
	if($varData !='false')
	{
	
		$varDatas['name']=$varData;
	$this->load->view('resetpass',$varDatas);
	
	}
	else{
	redirect(base_url('forgotpassword'));
	}
}

public function updatepassword()
{
	
	$post=$this->input->post();
	$varData=$this->Homemodel->savepassword($post);
	$this->session->set_flashdata('item','Update Password Successfully.');
	redirect(base_url('login'));
	//print_r($post);
}
}
