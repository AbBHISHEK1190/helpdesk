<?php
//Abhishek kumar jha
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
public $data;
private $vardata;
private $usertype;
	public function __construct()
	{
		
		parent::__construct();
		$this->load->library('Template');
		$this->load->library('Layout');
		$this->load->model('Homemodel');
		$this->usertype=$this->session->userdata('usertype');
	
	}
public function index()
{
$this->load->view('index');
}

public function createaccount()
{
	if($this->usertype[0]['type']!='admin')
		{
        redirect(base_url());
		}
	 $this->vardata['department']=$this->Homemodel->getdatafromdepartment();
    $this->vardata['state']=  $this->Homemodel->selectdatafromstate();
	
$this->layout->view('admin/createaccount',$this->vardata);
}
public function savedataintosignup()
{
$post=$this->input->post();
if(!empty($post))
{
	//$dep=$this->Homemodel->getdepartmenname($post['department']);
	//print_r($dep);
	$dataArray=array(
	"name"=>$post['name'],
	"f_name"=>$post['f_name'],
	"email"=>$post['email'],
	"mobile"=>$post['mobile'],
	"address"=>$post['address'],
	"state"=>$post['state'],
	"district"=>$post['district'],
	"block"=>$post['block'],
	"gp"=>$post['gp'],
	"type"=>$post['type'],
	"department"=>$post['department'],
	"gender"=>$post['gender'],
	"pincode"=>$post['pincode'],
	"password"=>md5(trim($post['password'])),
	"status"=>'1'	
	);
	$vardata=$this->Homemodel->saveintosignup($dataArray);
	if(!empty($vardata))
	{
		echo 'Successfully';
		//redirect(base_url('admin/create-account'));
	}
}
}

public function checkusername()
{
$post=$this->input->post();
if(!empty($post))
{
$count=strlen($post['uname']);
if($count >7)
{
$vardata=$this->Homemodel->check_user_name($post);
//print_r($vardata);die;
 if($vardata >0)
 {
	//echo 'username not avilable'; 
	echo '1';
 }
 elseif($vardata ==0)
 {
	 echo '2';
 }
}
else
{
	//echo 'Minimum of 8 chars';
	echo '3';
}
}	
}
}
