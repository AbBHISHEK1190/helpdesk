<?php
//Abhishek kumar jha
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {
public $data;
	public function __construct()
	{
		
		parent::__construct();
		$this->load->library('Template');
		$this->load->model('Loginmodel');
		        $this->load->helper('url');

		//echo 'jsfsjf';
	}
public function index()
{

$this->load->view('login');
}	

public function logincheck()
{
	$post=$this->input->post();
if(!empty($post))
{
	$dataArray=array(
	"name"=>$post['name'],
	"password"=>$post['password']
	);
$varData=	$this->Loginmodel->logincheck_model($dataArray);
	//print_r($var);
	if($varData)
	{
		if($varData['0']['type']=='admin')
	{
		$this->session->set_userdata('usertype',$varData);
		redirect(base_url('admin/dashboard'));
	}
	elseif($varData['0']['type']=='teamleader')
	{
		$this->session->set_userdata('usertype',$varData);
		redirect(base_url('tl/dashboard'));
	}
	elseif($varData['0']['type']=='staff')
	{
		$this->session->set_userdata('usertype',$varData);
		redirect(base_url('staff/dashboard'));
	}
		
	}
	else
	{
		$this->session->set_flashdata('item','Something wrong');

		redirect(base_url('login'));
	}
}
}



public function logout()
{
	//print_r($this->session->userdata('usertype'));
	//die;
 $this->session->unset_userdata('usertype');
 redirect(base_url());

}	



}
