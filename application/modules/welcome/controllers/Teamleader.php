<?php
//Abhishek kumar jha
defined('BASEPATH') OR exit('No direct script access allowed');

class Teamleader extends MY_Controller {
public $data;
private $usertype;
private $issue_image;
private $vardata;
	public function __construct()
	{
		
		parent::__construct();
		$this->load->library('Layout');
		$this->load->model('Teamleadermodel');
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
$varData['counttotalticket']=$this->Teamleadermodel->counttotalticket($this->usertype[0]['department']);
$varData['openticket']=$this->Teamleadermodel->counttotalopenticket($this->usertype[0]['department']);
$varData['closedicket']=$this->Teamleadermodel->counttotalclosedticket($this->usertype[0]['department']);
$varData['unassigned']=$this->Teamleadermodel->getallunassigned($this->usertype[0]['department']);

$this->layout->tlead('teamleader/dashboard',$varData);
}

public function alltickets()
{
	$varData['members']=$this->Teamleadermodel->allmembers($this->usertype[0]['department']);
	$varData['getalltickets']=$this->Teamleadermodel->getalltickets($this->usertype[0]['department']);
	//print_r($varData);
	$this->layout->tlead('teamleader/alltickets',$varData);
}

public function allclosedtickets()
{
	$varData['getalltickets']=$this->Teamleadermodel->getallclosedtickets($this->usertype[0]['department']);
	//print_r($varData);
	$this->layout->tlead('teamleader/closedticket',$varData);
}

public function assignedticketbytl()
{
	$post=$this->input->post();
if(!empty($post))
{
	date_default_timezone_set('Asia/Kolkata');
$currentTime = date( 'd-m-Y h:i:s A', time () );
	$sla=$this->Teamleadermodel->getsla($this->usertype[0]['department']);
	
	$cenvertedTime = date('Y-m-d H:i:s',strtotime("+$sla hour",strtotime($currentTime)));
	
	$dataarray=array(
	"ticket_id"=>$post['tid'],
	"user_id"=>$post['uid'],
	"sla"=>$cenvertedTime
	);
	//print_r($dataarray);
	$var=$this->Teamleadermodel->assignticket($dataarray);
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

public function unassignedticket()
{
	$varData['members']=$this->Teamleadermodel->allmembers($this->usertype[0]['department']);
	$varData['getalltickets']=$this->Teamleadermodel->allunassigned($this->usertype[0]['department']);
	$this->layout->tlead('teamleader/unassignedticket',$varData);
}

public function myticket()
{
	$varData['getalltickets']=$this->Teamleadermodel->myticketmodel($this->usertype[0]['department'],$this->usertype[0]['id']);
	
	$this->layout->tlead('teamleader/myticket',$varData);

}
public function assignedname()
{
	$post=$this->input->post('tid');
	 $var=$this->Teamleadermodel->assignednamemodel($post);
	print_r($var);
}


public function ticketdetails($tid)
{
	$varData['deplist']	=$this->Homemodel->getdatafromdepartment();
	$varData['userid']=$this->Teamleadermodel->getuserid(base64_decode($tid));
$varData['message']=$this->Teamleadermodel->getmessages(base64_decode($tid));
$varData['members']=$this->Teamleadermodel->allmembers($this->usertype[0]['department']);
$varData['ticketdetails']=$this->Teamleadermodel->getticketdatabytid(base64_decode($tid));
$varData['assname']=$this->Adminmodel->getassname(base64_decode($tid));
//print_r($varData['userid']);die;
 $varData['myid']=$this->usertype[0]['id']; 
$this->layout->tlead('teamleader/ticketdetails',$varData);

}

public function overdue()
{
	$varData['getalltickets']=$this->Teamleadermodel->overdue_model($this->usertype[0]['department']);

	$this->layout->tlead('teamleader/overdue',$varData);
}
public function answered()
{
	$varData['getalltickets']=$this->Teamleadermodel->ticketwhichisopen($this->usertype[0]['department']);
	$this->layout->tlead('teamleader/answered',$varData);
}


public function savetlmessage()
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
	"department"=>$this->usertype[0]['department'],
	"attachments"=>$this->issue_image?$this->issue_image:''
	);
	
	//print_r($dataarray);	
	$var=$this->Teamleadermodel->savedataintomessagetable($dataarray);
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

public function profile()
{
	$this->vardata['pdatas']=$this->Teamleadermodel->getprofiledata($this->usertype[0]['id']);
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
	$this->vardata['msg']=$this->Teamleadermodel->saveprofiledata($dataArray,$this->usertype[0]['id']);
	$this->session->set_flashdata('item','Profile updated.');
	redirect(base_url('tl/profile'));
	
	
}
$this->layout->tlead('teamleader/profile',$this->vardata);
}	


public function allstaff()
{
	$varData['getallmembers']=$this->Teamleadermodel->get_all_staff_memberlist($this->usertype[0]['department']);
//echo '<pre>';print_r($varData);
$this->layout->tlead('teamleader/allstaff',$varData);
	}
	
	public function allstaff_details($id='')
	{
	$varData['getallmembers']=$this->Teamleadermodel->getstaffdata(base64_decode($id));
//echo '<pre>';print_r($varData);die;
$this->layout->tlead('teamleader/allstaffdetails',$varData);
	
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
			$varData=$this->Teamleadermodel->savepassword($dataArray);
		$this->session->set_flashdata('item','succesfully changed');
		redirect(base_url('tl/profile'));
		}
		
		
	}
	
	
	public function create_account()
{
   
    $this->vardata['department']=$this->Homemodel->getdatafromdepartment();
    $this->vardata['state']=  $this->Homemodel->selectdatafromstate();
	$this->vardata['departments']=$this->usertype[0]['department'];
$this->layout->tlead('teamleader/createaccount',$this->vardata);
}

public function savedataintosignuptab()
{
$post=$this->input->post();
if(!empty($post))
{
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
	
	}
}
}
public function changestaffstatus()
	{
		$post=$this->input->post();
		if(!empty($post))
		{
		$varData=	$this->Adminmodel->changestaffstatus($post);
		}
	}
	
	public function dep_tranfer()
	{
		$post=$this->input->post();
		//print_r($post); die;
		$this->Adminmodel->updatedepartkment($post);
		$this->Adminmodel->savedeptranferdata($post,$this->usertype[0]['id']);
		
	}
}
