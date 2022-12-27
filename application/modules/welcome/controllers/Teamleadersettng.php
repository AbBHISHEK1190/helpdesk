<?php
//Abhishek kumar jha
defined('BASEPATH') OR exit('No direct script access allowed');

class Teamleadersettng extends MY_Controller {
public $data;
private $usertype;
private $issue_image;
private $vardata;
	public function __construct()
	{
		
		parent::__construct();
		$this->load->library('Layout');
		$this->load->model('Teamleadermodel');
		$this->load->model('Tlsettingmodel');
		$this->load->model('Adminmodel');
		$this->load->model('Homemodel');
		$this->usertype=$this->session->userdata('usertype');

		if($this->usertype[0]['type']!='teamleader')
		{
			$this->session->unset_userdata('usertype');

        redirect(base_url());
		}
		//echo 'jsfsjf';
	}
public function index()
{
	
	$data=$this->Tlsettingmodel->get_departmentid($this->usertype[0]['department']);
	
	$vardata['gethelptopic']=$this->Tlsettingmodel->getdatafromalldep($data['id']);
	//print_r($vardata); die;
$this->layout->tlead('teamleader/helptopic',$vardata);
}
public function addhelptic()
{
	$data=$this->Tlsettingmodel->get_departmentid($this->usertype[0]['department']);
	$post=$this->input->post();
	if(!empty($post))
	{
		$dataarray=array(
		"category"=>$post['heltic'],
		"department_id"=>$data['id']
		);
		$this->Tlsettingmodel->addhelptopic($dataarray);
	}
	
}

public function editaddhelptic()
{
	
	$post=$this->input->post();
	//print_r($post); die;
	if(!empty($post))
	{
		$dataarray=array(
		"category"=>$post['category'],
		"id"=>$post['depid']
		);
		$this->Tlsettingmodel->edithelptopics($dataarray);
	}
}

public function deletefromhelptc()
{
	
	$post=$this->input->post();
if(!empty($post))
{
	$dataArray=array(
	"id"=>$post['id']
	);
	$this->Tlsettingmodel->deletehelptopics($dataArray);
}
}


public function subcategoty()
{
$data=$this->Tlsettingmodel->get_departmentid($this->usertype[0]['department']);
	$vardata['htpic']=$this->Tlsettingmodel->gethelptopic($data['id']);
	$vardata['subcategory']=$this->Tlsettingmodel->getdatafromsucategory($data['id']);
	//echo '<pre>';print_r($vardata); die;
$this->layout->tlead('teamleader/subcategory',$vardata);
	
	
}

public function addsubcat()
{
	$post=$this->input->post();
	if(!empty($post))
	{
		$dataarray=array(
		"sub_category"=>$post['category'],
		"category_id"=>$post['departmentid']
		);
		$vardata=$this->Tlsettingmodel->addsubcatintotable($dataarray);
	
	}
	
}
public function deletefromsubact()
{
	
	$post=$this->input->post();
if(!empty($post))
{
	$dataArray=array(
	"id"=>$post['catid']
	);
	$this->Tlsettingmodel->deletesubcat($dataArray);
}
}
public function editsubcat()
{
	$post=$this->input->post();
	if(!empty($post))
	{
		 $vardata=$this->Tlsettingmodel->editsubcatmodel($post);
		
	}
	
}

public function faq()
{
	
	$data=$this->Tlsettingmodel->get_departmentid($this->usertype[0]['department']);
	$vardata['htpic']=$this->Tlsettingmodel->gethelptopic($data['id']);

	//$vardata['faq']=$this->Tlsettingmodel->getdatafromalldep($data['id']);

$gethelptopicids=$this->Tlsettingmodel->gethelptopicids($data['id']);

$vardata['faq']=$this->Tlsettingmodel->getsubcatids($gethelptopicids);
//echo '<pre>';print_r($dd); die;
$this->layout->tlead('teamleader/faq',$vardata);
}

public function addfaq()
{
	$post=$this->input->post();
	if(!empty($post))
	{
		$dataarray=array(
		"faq"=>$post['category'],
		"subcategory_id"=>$post['departmentid']
		);
		$vardata=$this->Tlsettingmodel->addfaqintable($dataarray);
	
	}
	
}
public function editfaq()
{
	$post=$this->input->post();
	if(!empty($post))
	{
		 $vardata=$this->Tlsettingmodel->editfaqmodel($post);
		
	}
	
}
public function deletefromfaq()
{
	
	$post=$this->input->post();
if(!empty($post))
{
	$dataArray=array(
	"id"=>$post['catid']
	);
	$this->Tlsettingmodel->deletefaq($dataArray);
}
}


public function addfaqans()
{
	$post=$this->input->post();
	if(!empty($post))
	{
		$dataarray=array(
		"faq_ans"=>$post['category'],
		"faq_id"=>$post['departmentid']
		);
		$vardata=$this->Tlsettingmodel->addfaqansintable($dataarray);
	
	}
	
}

public function editfaq_ans()
{
	$post=$this->input->post();
	if(!empty($post))
	{
		 $vardata=$this->Tlsettingmodel->editfaq_ans_model($post);
		
	}
	
}

}
