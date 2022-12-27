<?php
//Abhishek kumar jha
defined('BASEPATH') OR exit('No direct script access allowed');

class Staffmodel extends CI_Model {

	public function __construct()
	{
		
		parent::__construct();
		
	}
	
	public function getallticket($userid,$post)
	{
		$this->db->select('ticket_id');
		$this->db->from('assign_ticket');
		$this->db->where('user_id',$userid);
		$result=$this->db->get()->result();
		foreach($result as $results)
		{
			$var[]=$results->ticket_id?$results->ticket_id:'0';
		}
		
		
		
	if(!empty($var))
	{
		
		if($post=='0')
		{
			 $this->db->select('*');
		                $this->db->from('create_ticket');
						if(!empty($var))
						{
						$this->db->where_in('ticket_id',$var);
						}
						$this->db->where('status','0');
					return	$this->db->get()->result_array();
	
		}
		elseif($post==1)
		{
			 $this->db->select('*');
		               $this->db->from('create_ticket');
						if(!empty($var))
						{
						$this->db->where_in('ticket_id',$var);
						}
						$this->db->where('status','1');
					return	$this->db->get()->result_array();
	
		}
		else
		{
			 $this->db->select('*');
		               $this->db->from('create_ticket');
						if(!empty($var))
						{
						$this->db->where_in('ticket_id',$var);
						}
					return	$this->db->get()->result_array();
					//return $result?$result:'';
	
		}
	}
	else
	{
		$this->db->select('*');
		               $this->db->from('create_ticket');
						$this->db->where('status','9');
					return	$this->db->get()->result_array();
				}
	
		
	}
	
	
	public function ticket_details($tid)
	{
		return $this->db->select('*')
		                ->from('create_ticket')
						->where('ticket_id',$tid)
						->get()->result();
	
		
	}


public function savedataintomessagetable($dataarray)
{
	
if($this->db->insert('message',$dataarray))
{
	
	return true;
}
else
{
	return false;
}
}

public function changestatus($post)
{
	//print_r($post); die;
if($post['status']=='0')
{
	$this->db->set('status',$post['status']);
	$this->db->where('ticket_id',$post['tid']);
	$this->db->update('create_ticket');
	
}
}

public function getmessages($tid)
{
$this->db->select('*');
$this->db->from('message');
$this->db->where('ticket_id',$tid);
return $this->db->get()->result();

}	
	
	public function getprofiledata($id)
	{
		
		return $this->db->select('*')
		                ->from('sign_up')
						->where('id',$id)
						->get()->result();
	}
	
	public function saveprofiledata($dataArray,$id)
{
	$this->db->where('id',$id);
	$this->db->update('sign_up',$dataArray);
	return 'successfully updated';
	
}


public function counttotalticket($userid)
{
$this->db->select('ticket_id');
		$this->db->from('assign_ticket');
		$this->db->where('user_id',$userid);
		$result=$this->db->get()->result();
		foreach($result as $results)
		{
			$var[]=$results->ticket_id?$results->ticket_id:'0';
		}
if(!empty($var))
{
$this->db->select('*');
		               $this->db->from('create_ticket');
						if(!empty($var))
						{
						$this->db->where_in('ticket_id',$var);
						}
					return	$this->db->get()->num_rows();
			
}	
}
public function counttotalopenticket($userid)
{
$this->db->select('ticket_id');
		$this->db->from('assign_ticket');
		$this->db->where('user_id',$userid);
		$result=$this->db->get()->result();
		foreach($result as $results)
		{
			$var[]=$results->ticket_id?$results->ticket_id:'0';
		}
if(!empty($var))
{
$this->db->select('*');
		               $this->db->from('create_ticket');
						if(!empty($var))
						{
						$this->db->where_in('ticket_id',$var);
						}
						$this->db->where('status','1');
					return	$this->db->get()->num_rows();
			
}	
}


public function counttotalclosedticket($userid)
{
$this->db->select('ticket_id');
		$this->db->from('assign_ticket');
		$this->db->where('user_id',$userid);
		$result=$this->db->get()->result();
		foreach($result as $results)
		{
			$var[]=$results->ticket_id?$results->ticket_id:'0';
		}
if(!empty($var))
{
$this->db->select('*');
		               $this->db->from('create_ticket');
						if(!empty($var))
						{
						$this->db->where_in('ticket_id',$var);
						}
						$this->db->where('status','0');
					return	$this->db->get()->num_rows();
			
}	
}
	
	public function savepassword($dataArray)
	{
		$this->db->set('password',$dataArray['password'])
		          ->where('id',$dataArray['id'])
				  ->update('sign_up');
		
		
	}
	
	}
