<?php
//Abhishek kumar jha
defined('BASEPATH') OR exit('No direct script access allowed');

class Createticket extends MY_Controller {
public $data;
public $vardata;
private $issue_image;
		
	public function __construct()
	{
		
		parent::__construct();
		$this->load->library('Template');
		$this->load->model('Homemodel');
		//echo 'jsfsjf';
	}
public function index()
{

	//$this->vardata['category']=$this->Homemodel->getdatafromcetgory();
    $this->vardata['department']=$this->Homemodel->getdatafromdepartment();
    $this->vardata['state']=  $this->Homemodel->selectdatafromstate();
	//print_r($this->vardata['department']);
$post=$this->input->post();
$tid = mt_rand(100000,999999); 

	//print_r($post);
	if(!empty($post))
	{
		$imagecheck = $_FILES["attachments"]['name'];
	    if(!empty($imagecheck))
	  {
		$this->issue_image = time().$_FILES["attachments"]['name'];
		 $config['file_name'] = $this->issue_image;
		 $config['upload_path']   = './assets/Createticket/'; 
         $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf'; 
         $config['max_size']      = 0; 
         $config['max_width']     = 0; 
         $config['max_height']    = 0;  
		// print_r($config);
         $this->load->library('upload', $config);
	             if ( ! $this->upload->do_upload('attachments')) {
            $error = array('error' => $this->upload->display_errors()); 
            //print_r($error);
			echo 'Not supported file format';
			$this->vardata['msg']='This type of file is not allowed';
$controller='create-ticket';
			header("Refresh:5; url={$controller}") ;
exit;
			//redirect(base_url('create-ticket'));
			//exit;
			}
            // $issue_image=$_FILES['attachments']['name'];

	  }
		
		$dataArray=array(
		"ticket_id"=>$tid,
		"name"=>$post['name'],
		"email"=>$post['email'],
		"mobile"=>$post['mobile'],
		"department"=>$this->Homemodel->department($post['department']),
		"help_topic"=>$this->Homemodel->helptopic($post['help_topic']),
		"sub_category"=>!empty($post['sub_category'])?$this->Homemodel->sub_category($post['sub_category']):'',
		"faq"=>!empty($post['faq'])?$this->Homemodel->faq($post['faq']):'',
		"others"=>$post['others']?$post['others']:'',
		"subjects"=>$post['subjects'],
		"messages"=>$post['messages'],
		"priority"=>$post['priority'],
		"address"=>$post['address'],
		"state"=>$post['state'],
		"district"=>$post['district'],
		"block"=>$post['block'],
		"gp"=>$post['gp'],
		"pincode"=>$post['pincode'],
		"attachments"=>$this->issue_image?$this->issue_image:''
		);
		//redirect('create-ticket', 'refresh');
	$this->vardata['msg']=$this->Homemodel->saveticket($dataArray);
	//print_r($vardata);
	
	
	}
	
	$this->load->view('createticket',$this->vardata);
}	


public function getcategory()
{
	$catid=$this->input->post('catde');
	//print_r($catid);
	$vardata=$this->Homemodel->getdatafromcetgory($catid);
$html="";
foreach($vardata as $data)
	{
	$html.=	"<option value='$data->id'>$data->category</option>";
	}
	$html.="<option value='other'>Other</option>";
echo $html;
	//print_r($vardata);
	 //echo json_encode($vardata); 
}



public function getsubcategory()
{
	$catid=$this->input->post('catid');
	$vardata=$this->Homemodel->subcategory($catid);
	//print_r($vardata);
	 echo json_encode($vardata); 
}
public function getfaq()
{
	$catid=$this->input->post('catids');
	$vardata=$this->Homemodel->faqcategory($catid);

	echo json_encode($vardata); 
}

public function getfaqres()
{
	$catid=$this->input->post('catids');
	$vardata=$this->Homemodel->getfaqresmodel($catid);
	foreach($vardata as $data)
	echo $data['faq_ans'];
}

public function saveticket()
{
	$post=$this->input->post();
	print_r($post);
	
}

public function getdistrict()
{
	$catid=$this->input->post('state');
	$vardata=$this->Homemodel->getdistrictfromtable($catid);

	echo json_encode($vardata); 
}

public function getblock()
{
	$catid=$this->input->post('state');
	$vardata=$this->Homemodel->getblockfromtable($catid);

	echo json_encode($vardata); 
}
public function getgpdata()
{
	$catid=$this->input->post('state');
	$vardata=$this->Homemodel->getgpfromtable($catid);

	echo json_encode($vardata); 
}
}
