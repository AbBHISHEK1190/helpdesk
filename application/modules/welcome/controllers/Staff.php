<?php
//Abhishek kumar jha
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends MY_Controller {
public $data;
private $usertype;
private $issue_image;
private $vardata;
	public function __construct()
	{
		
		parent::__construct();
		$this->load->library('Layout');
		$this->load->model('Staffmodel');
		$this->usertype=$this->session->userdata('usertype');
	
		if($this->usertype[0]['type']!='staff')
		{
        redirect(base_url());
		}
		//echo 'jsfsjf';
	}
public function index()
{
//echo 'Staff';
$varData['counttotalticket']=$this->Staffmodel->counttotalticket($this->usertype[0]['id']);
$varData['openticket']=$this->Staffmodel->counttotalopenticket($this->usertype[0]['id']);
$varData['closedickets']=$this->Staffmodel->counttotalclosedticket($this->usertype[0]['id']);

$this->layout->staff('staff/dashboard',$varData);
}

public function all_tickets()
{
	
	//echo $this->usertype[0]['id']; die;
	//$varData['getalltickets']=$this->Staffmodel->getalltickets();
	//print_r($varData);
	$this->layout->staff('staff/alltickets');
}
public function allmy_tickets()
{
	$post=$this->input->post('status');
	//print_r($post);
	
	$vardata=$this->Staffmodel->getallticket($this->usertype[0]['id'],$post);
	//print_r($varData);
	$html="";
	 

	foreach($vardata as $data)
	{
	$html.="<tr>";
	$html.="<td><a href='".base_url('staff/details/')."".base64_encode($data['ticket_id'])."'>$data[ticket_id]</a></td>";
	$html.="<td>$data[created_date]</td>";
	$html.="<td>$data[subjects]</td>";
	$html.="<td>";
	if($data['status']=="1"){$html.="Open";}
	else
	{
		$html.="Closed";
	}
	$html.="</td>";
			$html.="</tr>";	
	}
	echo $html;
	
	}


public function details($tid='')
	{
		//print($tid);die;
		$vardata['message']=$this->Staffmodel->getmessages(base64_decode($tid));
		$vardata['ticketdetails']=$this->Staffmodel->ticket_details(base64_decode($tid));
		//print_r($var); die;
		$this->layout->staff('staff/ticketsdetails',$vardata);
	}
	
	
	public function saveot_message()
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
		
	$var=$this->Staffmodel->savedataintomessagetable($dataarray);
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
	$this->vardata['pdatas']=$this->Staffmodel->getprofiledata($this->usertype[0]['id']);
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
	$this->vardata['msg']=$this->Staffmodel->saveprofiledata($dataArray,$this->usertype[0]['id']);
	$this->session->set_flashdata('item','Profile updated.');
	redirect(base_url('staff/profile'));
	
	
}
$this->layout->staff('staff/profile',$this->vardata);
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
			$varData=$this->Staffmodel->savepassword($dataArray);
		$this->session->set_flashdata('item','succesfully changed');
		redirect(base_url('staff/profile'));
		}
		
		
	}



	}
