<?php
//Abhishek kumar jha
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {
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
public function index()
{
$varData['counttotalticket']=$this->Adminmodel->counttotalticket();
$varData['openticket']=$this->Adminmodel->counttotalopenticket();
$varData['closedicket']=$this->Adminmodel->counttotalclosedticket();
$varData['unassigned']=$this->Adminmodel->getallunassigned();

$this->layout->view('admin/dashboard',$varData);
}

public function alltickets()
{
	$varData['getalltickets']=$this->Adminmodel->getalltickets();
	//print_r($varData);
	$this->layout->view('admin/alltickets',$varData);
}

public function allclosedtickets()
{
	$varData['getalltickets']=$this->Adminmodel->getallclosedtickets();
	//print_r($varData);
	$this->layout->view('admin/closedticket',$varData);
}

public function ticket_details($tid="")
{
	//print_r($tid);
$department=	$this->Adminmodel->getdepartment(base64_decode($tid));
	$varData['userid']=$this->Adminmodel->getuserid(base64_decode($tid));
$varData['message']=$this->Adminmodel->getmessages(base64_decode($tid));
$varData['members']=$this->Adminmodel->allmembers($department);
$varData['ticketdetails']=$this->Adminmodel->getticketdatabytid(base64_decode($tid));
$varData['assname']=$this->Adminmodel->getassname(base64_decode($tid));
	$varData['myid']=$this->usertype[0]['id'];
	
	$this->layout->view('admin/ticketdetails',$varData);
}

public function saveadminmessage()
{
$post=$this->input->post();

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
			
exit;
			}
         

	  }
	
	$dataarray=array(
	"ticket_id"=>$post['t_id'],
	"message"=>$post['mess'],
	"type"=>$this->usertype[0]['type'],
	"user_id"=>$this->usertype[0]['id'],
	"department"=>$post['dep'],
	"attachments"=>$this->issue_image?$this->issue_image:''
	);
	
	//print_r($dataarray);	
	 $stat=$this->Adminmodel->changestatus($post);
	$var=$this->Adminmodel->savedataintomessagetable($dataarray);
if($var !==false)
{
	echo 'Successfuly Sent';
}
else
{
echo 'Something Wrong';	
}
	
	
	}
	
}


public function assignedticketbyadmin()
{
	$post=$this->input->post();
	//print_r($post); die;
if(!empty($post))
{
	date_default_timezone_set('Asia/Kolkata');
$currentTime = date( 'd-m-Y h:i:s A', time () );
	$sla=$this->Adminmodel->getsla($post['dep']);
	
	$cenvertedTime = date('Y-m-d H:i:s',strtotime("+$sla hour",strtotime($currentTime)));
	
	$dataarray=array(
	"ticket_id"=>$post['tid'],
	"user_id"=>$post['uid'],
	"sla"=>$cenvertedTime
	);
	//print_r($dataarray);
	$var=$this->Adminmodel->assignticket($dataarray);
	if($var !==false)
{
	echo 'Assigned Successfuly';
}
else
{
echo 'Something Wrong';	
}

}	
}

public function assignedticketbyadmins()
{
	$post=$this->input->post();
	//print_r($post); die;
if(!empty($post))
{
	date_default_timezone_set('Asia/Kolkata');
$currentTime = date( 'd-m-Y h:i:s A', time () );
//$dep=$this->Adminmodel->gedepart($post['tid']);
//print_r($dep); die;
	$sla=$this->Adminmodel->getsla($dep);
	//print_r($sla); die;
	$cenvertedTime = date('Y-m-d H:i:s',strtotime("+$sla hour",strtotime($currentTime)));
	//print_r($cenvertedTime); die;
	$dataarray=array(
	"ticket_id"=>$post['tid'],
	"user_id"=>$post['uid'],
	"sla"=>$cenvertedTime
	);
	//print_r($dataarray);
	$var=$this->Adminmodel->assignticket($dataarray);
	if($var !==false)
{
	echo 'Assigned Successfuly';
}
else
{
echo 'Something Wrong';	
}

}	
}



public function unassigned_ticket()
{
	//echo 'ad'; die;
	$varData['members']=$this->Adminmodel->allmembers($this->usertype[0]['department']);
	$varData['getalltickets']=$this->Adminmodel->allunassigned();
	$this->layout->view('admin/unassignedticket',$varData);
}

public function mytickets()
{
	$varData['getalltickets']=$this->Adminmodel->myticketmodel($this->usertype[0]['id']);
	
	$this->layout->view('admin/myticket',$varData);

}

public function answered()
{
	$varData['getalltickets']=$this->Adminmodel->ticketwhichisopen();
	$this->layout->view('admin/answered',$varData);
}


public function profile()
{
	$this->vardata['pdatas']=$this->Adminmodel->getprofiledata($this->usertype[0]['id']);
    $this->vardata['states']=$this->Homemodel->selectdatafromstate();
	foreach($this->vardata['pdatas'] as $picd);

	$post=$this->input->post();
if(!empty($post))
{
	//print_r($post); die;
	
	 $imagecheck = $_FILES["p_pic"]['name'];
	  if(!empty($imagecheck))
	  {
		$this->issue_image = time().$_FILES["p_pic"]['name'];
		 $config['file_name'] = $this->issue_image;
		 $config['upload_path']   = './assets/Createticket/'; 
         $config['allowed_types'] = 'jpg|png|jpeg'; 
         $config['max_size']      = 0; 
         $config['max_width']     = 0; 
         $config['max_height']    = 0;  
		// print_r($config);
         $this->load->library('upload', $config);
	             if ( ! $this->upload->do_upload('p_pic')) {
            $error = array('error' => $this->upload->display_errors()); 
            print_r($error);
			}
            // $issue_image=$_FILES['attachments']['name'];
  
	  }
		
		
		$dataArray=array(
		"f_name"=>$post['f_name']?$post['f_name']:'',
		"email"=>$post['email']?$post['email']:'',
		"mobile"=>$post['mobile']?$post['mobile']:'',
		"address"=>$post['address']?$post['address']:'',
		"state"=>$post['state']?$post['state']:'',
		"district"=>$post['district']?$post['district']:'',
		"block"=>$post['block']?$post['block']:'',
		"gp"=>$post['gp']?$post['gp']:'',
		"pincode"=>$post['pincode']?$post['pincode']:'',
		
		"p_pic"=>$this->issue_image?$this->issue_image:"$picd->p_pic"
		);
		//redirect('create-ticket', 'refresh');
	$this->vardata['msg']=$this->Adminmodel->saveprofiledata($dataArray,$this->usertype[0]['id']);
	$this->session->set_flashdata('item','Profile updated.');
	redirect(base_url('admin/profile'));
	
	
}
$this->layout->view('admin/profile',$this->vardata);
}	


public function overdue()
{
	$varData['getalltickets']=$this->Adminmodel->overdue_model();

	$this->layout->view('admin/overdue',$varData);
}


//for staff
public function allstaff()
{
	$varData['getallmembers']=$this->Adminmodel->get_all_staff_memberlist();
//echo '<pre>';print_r($varData);
$this->layout->view('admin/allstaff',$varData);
	}
	
	public function allstaff_details($id='')
	{
	$varData['getallmembers']=$this->Adminmodel->getstaffdata(base64_decode($id));
//echo '<pre>';print_r($varData);die;
$this->layout->view('admin/allstaffdetails',$varData);
	
	}
	
	public function changestaffstatus()
	{
		$post=$this->input->post();
		if(!empty($post))
		{
		$varData=	$this->Adminmodel->changestaffstatus($post);
		}
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
	$varData['getomcategory']=$this->Adminmodel->getomcategory();
	
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
	
	public function approvestaff()
{
	$varData['getallmembers']=$this->Adminmodel->get_new_staff_memberlist();
//echo '<pre>';print_r($varData);
$this->layout->view('admin/approvestaff',$varData);
	}
	
	
	public function changepassword()
	{
		$post=$this->input->post();
		if(!empty($post))
		{
			$dataArray=array(
			"password"=>md5($post['password']),
			"id"=>$this->usertype[0]['id']
			);
			$varData=$this->Adminmodel->savepassword($dataArray);
			$this->session->set_flashdata('item','succesfully changed');
		redirect(base_url('admin/profile'));
		}
		
		
	}
public function subcategoty()
{
	$varData['subca']=$this->Adminmodel->get_subcategory();
	$varData['getdepartment']=$this->Adminmodel->getsubcategory();
	
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
		echo	$varData=$this->Adminmodel->editsubcat($post);
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
	
}
