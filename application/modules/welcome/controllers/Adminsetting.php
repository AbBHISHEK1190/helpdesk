<?php
//Abhishek kumar jha
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminsetting extends MY_Controller {
public $data;
private $usertype;
private $issue_image;
private $vardata;
	public function __construct()
	{
		
		parent::__construct();
		$this->load->library('Layout');
		$this->load->model('Adminmodel');
		$this->load->model('Homemodel');
		$this->usertype=$this->session->userdata('usertype');
	
		if($this->usertype[0]['type']!='admin')
		{
        redirect(base_url());
		}
		//echo 'jsfsjf';
	}
	
	public function departmentlist()
	{
	$varData['department']=	$this->Adminmodel->getdepartmentlist();
	//print_r($varData['department']); die;
	$this->layout->view('admin/department',$varData);
	}
	
	public function adddepartment()
	{
		$post=$this->input->post();
		//print_r($post); die;
		if(!empty($post))
		{
			$varData=$this->Adminmodel->adddept($post);
		}
		
	}
	
	public function deletefromdepart()
	{
		
		$post=$this->input->post();
		//print_r($post); die;
		if(!empty($post))
		{
			$varData=$this->Adminmodel->deletedept($post);
			$this->Adminmodel->deletefromsla($post);
			//$this->Adminmodel->deletfaq($post);
			$varcat=$this->Adminmodel->deletefrom_cat($post);
	
			$varsucat=$this->Adminmodel->deletefromsub_cat($varcat);
		
			$data=$this->Adminmodel->deletfaq($varsucat);
		}
	}
	
	public function editslatime()
	{
		$post=$this->input->post();
		//print_r($post); die;
		if(!empty($post))
		{
		echo	$varData=$this->Adminmodel->editslatime($post);
		}
		
	}
	public function editdepartment()
	{
		$post=$this->input->post();
	//	print_r($post); die;
		if(!empty($post))
		{
			$varData=$this->Adminmodel->editdepartmentmodel($post);
		$varData=$this->Adminmodel->editslatab($post);
	
		}
		
	}
	public function helptopic()
	{
		$varData['helptopic']=$this->Adminmodel->gethelptopic();
	$varData['getdepartment']=$this->Adminmodel->getdepartmentfromcategory();
	
	//print_r($varData); die;
	$this->layout->view('admin/helptopic',$varData);
	}
	
	public function addhelptopic()
	{
			$post=$this->input->post();
		//print_r($post); die;
		if(!empty($post))
		{
			$varData=$this->Adminmodel->addhelptopicmodel($post);
		}
	
	}
	
	
	public function deletefromhelptopic()
	{
		
		$post=$this->input->post();
		//print_r($post); die;
		if(!empty($post))
		{
			$varData=$this->Adminmodel->deletefromcat($post);
			
			
		}
	}
	
	public function edithelptopic()
	{
		$post=$this->input->post();
		//print_r($post); die;
		if(!empty($post))
		{
			$varData=$this->Adminmodel->edithelptopic($post);
		}
		
	}
	public function faq()
	{
		$varData['getfaq']=$this->Adminmodel->getfaq();
	$varData['getomcategory']=$this->Adminmodel->getdepartmentlist();
	
	//echo '<pre>';print_r($varData); die;
	$this->layout->view('admin/faq',$varData);
	
	}
	public function addfaq()
	{
			$post=$this->input->post();
		//print_r($post); die;
		if(!empty($post))
		{
			$varData=$this->Adminmodel->addfaq($post);
		}
	
	}
	public function deletefromfaq()
	{
		
		$post=$this->input->post();
		//print_r($post); die;
		if(!empty($post))
		{
			$varData=$this->Adminmodel->deletefromfaq($post);
			
			
		}
	}
	
	public function editfaq()
	{
		$post=$this->input->post();
		//print_r($post); die;
		if(!empty($post))
		{
			$varData=$this->Adminmodel->editfaq($post);
		}
		
	}
	
	
public function subcategoty()
{
	$varData['subca']=$this->Adminmodel->get_subcategory();
		//$varData['getdepartment']=$this->Adminmodel->getsubcategory();
	$varData['getdepartment']=$this->Adminmodel->getdepartmentlist();
	$this->layout->view('admin/subcategoty',$varData);
}
public function adssubcategory()
	{
			$post=$this->input->post();
		//print_r($post); die;
		if(!empty($post))
		{
			$varData=$this->Adminmodel->addsubcat($post);
		}
	
	}
	
	
	public function editsubcat()
	{
		$post=$this->input->post();
		//print_r($post); die;
		if(!empty($post))
		{
			$varData=$this->Adminmodel->editsubcat($post);
		}
		
	}
	
	public function deletefromsubcat()
	{
		
		$post=$this->input->post();
		//print_r($post); die;
		if(!empty($post))
		{
			$varData=$this->Adminmodel->deletefromsubcat($post);
			
			
		}
	}
	public function faqanswers()
	{
		
	$varData['getfaq']=$this->Adminmodel->getfaq();
	$varData['getomcategory']=$this->Adminmodel->getomcategory();
	
	//echo '<pre>';print_r($varData); die;
	$this->layout->view('admin/faqanswers',$varData);
		
	}
	public function categorysss()
{
	$catid=$this->input->post('catde');
	$vardata=$this->Adminmodel->subcategorysss($catid);
	//print_r($vardata);
	 echo json_encode($vardata); 
}
public function addfaqanss()
{
	$post=$this->input->post();
	if(!empty($post))
	{
		$dataarray=array(
		"faq_ans"=>$post['category'],
		"faq_id"=>$post['departmentid']
		);
		$vardata=$this->Adminmodel->addfaqansintable($dataarray);
	
	}
	
}
public function editfaqans()
{
	$post=$this->input->post();
	if(!empty($post))
	{
		 $vardata=$this->Adminmodel->editfaq_ans_model($post);
		
	}
	
}

}
