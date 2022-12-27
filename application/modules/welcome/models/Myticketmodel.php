<?php
//Abhishek kumar jha
defined('BASEPATH') OR exit('No direct script access allowed');

class Myticketmodel extends CI_Model {

	public function __construct()
	{
		
		parent::__construct();
		
	}
	
	public function getallticket($email,$post)
	{
		
		if($post=='0')
		{
			return $this->db->select('*')
		                ->from('create_ticket')
						->where('email',$email)
						->where('status','0')
						->get()->result();
	
		}
		elseif($post==1)
		{
			return $this->db->select('*')
		                ->from('create_ticket')
						->where('email',$email)
						->where('status','1')
						->get()->result();
	
		}
		else
		{
			return $this->db->select('*')
		                ->from('create_ticket')
						->where('email',$email)
						->get()->result();
	
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
public function counttotalticket($email)
{
return	$this->db->select('*')
	         ->from('create_ticket')
			 ->where('email',$email)
			 ->get()->num_rows();
	
}
public function counttotalopenticket($email)
{
return	$this->db->select('*')
	         ->from('create_ticket')
			 ->where('email',$email)
			 ->where('status','1')
			 ->get()->num_rows();
	
}

public function counttotalclosedticket($email)
{
return	$this->db->select('*')
	         ->from('create_ticket')
			 ->where('email',$email)
			 ->where('status','0')
			 ->get()->num_rows();
	
}
	
	}
