<?php
//Abhishek kumar jha
defined('BASEPATH') OR exit('No direct script access allowed');

class Ticketstatus extends MY_Controller {
public $data;
	public function __construct()
	{
		
		parent::__construct();
		$this->load->library('Template');
		$this->load->model('Ticketstatusmodel');
		        $this->load->helper('url');

		//echo 'jsfsjf';
	}
public function index()
{

$this->load->view('ticketstatuslogin');
}	

public function ticketstatuscheck()
{
$post=$this->input->post();

if(!empty($post))
{
	$dataarray=array(
	"ticket_id"=>$post['ticket_id'],
	"email"=>$post['email']
	);
	
$varData=$this->Ticketstatusmodel->logincheck_model($dataarray);
//print_r($varData);
if($varData)
{	
$this->session->set_userdata('ticketstatus',$varData);
//print_r($this->session->userdata('ticketstatus'));
redirect(base_url('ticket/dashboard'));
}
else
{
	$this->session->set_flashdata('item','Something wrong');

	redirect(base_url('checkticket-status'));
}

}

}

}
