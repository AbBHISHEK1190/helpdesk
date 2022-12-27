<?php
//Abhishek kumar jha
defined('BASEPATH') OR exit('No direct script access allowed');

class Myticket extends MY_Controller {
public $otheruser;
private $issue_image;
	public function __construct()
	{
		
		parent::__construct();

		$this->load->library('Layout');
		
		$this->load->model('Myticketmodel');
		$this->load->helper('url');
$this->otheruser=$this->session->userdata('ticketstatus');

if(empty($this->otheruser['0']['ticket_id']))
		{
        redirect(base_url());
		}

	}
public function index()
{
$varData['counttotalticket']=$this->Myticketmodel->counttotalticket($this->otheruser['0']['email']);

$varData['opentickets']=$this->Myticketmodel->counttotalopenticket($this->otheruser['0']['email']);
$varData['closedickets']=$this->Myticketmodel->counttotalclosedticket($this->otheruser['0']['email']);

$this->layout->ticket('otheruser/dashboard',$varData);
}	

public function allmyticket()
{
	//$vardata['getalltickets']=$this->Myticketmodel->getallticket($this->otheruser['0']['email']);
	$this->layout->ticket('otheruser/alltickets');
}

public function allmytickets()
{
	$post=$this->input->post('status');
	//print_r($post);
	
	$vardata=$this->Myticketmodel->getallticket($this->otheruser['0']['email'],$post);
	$html="";
	foreach($vardata as $data)
	{
	$html.="<tr>";
	$html.="<td><a href='".base_url('ticket/details/')."".base64_encode($data->ticket_id)."'>$data->ticket_id</a></td>";
	$html.="<td>$data->created_date</td>";
	$html.="<td>$data->subjects</td>";
	$html.="<td>";
	if($data->status=="1"){$html.="Open";}
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
		$vardata['message']=$this->Myticketmodel->getmessages(base64_decode($tid));
		$vardata['ticketdetails']=$this->Myticketmodel->ticket_details(base64_decode($tid));
		//print_r($var); die;
		$this->layout->ticket('otheruser/ticketsdetails',$vardata);
	}
	
	
	public function saveotmessage()
{
$post=$this->input->post();
//print_r($post); 

//print_r($imagecheck);die;
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
	$status=$post['status']?$post['status']:'';
	//print_r($status);
	$type='anonumus';
	$dataarray=array(
	"ticket_id"=>$post['tid'],
	"message"=>$post['messages'],
	"type"=>$type,
	"user_id"=>'0',
	"department"=>$post['department'],
	"attachments"=>$this->issue_image?$this->issue_image:''
	);
	
	//print_r($dataarray);
      $stat=$this->Myticketmodel->changestatus($post);	
	$var=$this->Myticketmodel->savedataintomessagetable($dataarray);
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

}
