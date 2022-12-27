<?php
//Abhishek kumar jha
defined('BASEPATH') OR exit('No direct script access allowed');

class Teamleadermodel extends CI_Model {

	public function __construct()
	{
		
		parent::__construct();
		
	}
	
	public function getalltickets($department)
	{
		return $this->db->select('*')
		            ->from('create_ticket')
					->where('department',$department)
					//->where('status','1')
					->order_by('id','desc')
					->get()->result();
	}
	
	public function getallclosedtickets($department)
	{
		return $this->db->select('*')
		            ->from('create_ticket')
					->where('department',$department)
					->where('status','0')
					->order_by('id','desc')
					->get()->result();
	}
	
	public function allmembers($department)
	{
	return	$this->db->select('*')
	             ->from('sign_up')
				 ->where('department',$department)
				 ->where('status','1')
				 ->get()->result();
	}
	
	public function assignticket($dataarray)
	{
		$this->db->select('*');
		$this->db->from('assign_ticket');
		$this->db->where('ticket_id',$dataarray['ticket_id']);
		$this->db->where('user_id',$dataarray['user_id']);
		$var=$this->db->get()->num_rows();
		if($var=='0')
		{
	$this->db->insert('assign_ticket',$dataarray);	
		}
		else
		{
			return false;
		}
	}
	
	public function getsla($department)
	{
		
	$this->db->select('sla');
		       $this->db->from('sla');
				$this->db->where('department',$department);
					$res= $this->db->get()->row_array();
					return $res['sla'];
	}
	
	public function allunassigned($department)
	{
			$this->db->select('ticket_id');
		$this->db->from('assign_ticket');
		$result=$this->db->get()->result();
		foreach($result as $results)
		{
			$var[]=$results->ticket_id?$results->ticket_id:'0';
		}
	//print_r($var);
		
	
	$this->db->select('create_ticket.ticket_id,create_ticket.created_date,create_ticket.subjects,create_ticket.name,create_ticket.priority');
         $this->db->from('create_ticket');
        if(!empty($var))
{	
		$this->db->where_not_in('ticket_id',$var);
}
		 $this->db->where('status','1');
		 $this->db->where('department',$department);
    $this->db->order_by('id','desc');
	return	$this->db->get()->result();
	
	
	}
	
	public function myticketmodel($department,$userid)
	{
	//print_r($userid);die;
	$this->db->select('ticket_id');
		$this->db->from('assign_ticket');
		$this->db->where('user_id',$userid);
		$result=$this->db->get()->result();
		//print_r($result); die;
		foreach($result as $results)
		{
			$var[]=$results->ticket_id?$results->ticket_id:'0';
		}
	
		
	
	    if(!empty($var))
{	
$this->db->select('create_ticket.ticket_id,create_ticket.created_date,create_ticket.subjects,create_ticket.name,create_ticket.priority');
         $this->db->from('create_ticket');
    
		//$this->db->where_not_in('ticket_id',$var);
		$this->db->where_in('ticket_id',$var);
 $this->db->where('status','1');
		 $this->db->where('department',$department);
    $this->db->order_by('id','desc');
	return	$this->db->get()->result();
	
}
		
	


	
	}
	
	
	
	public function assignednamemodel($post)
	{
		$this->db->select('sign_up.name');
		$this->db->from('sign_up');
		$this->db->join('assign_ticket','sign_up.id = assign_ticket.user_id','left');
	    $this->db->where('ticket_id',$post);
	return	$this->db->get()->result();
		
	}
	
	public function getticketdatabytid($tid)
	{
	$this->db->select('*');
    $this->db->from('create_ticket');
    $this->db->where('ticket_id',$tid);
return $this->db->get()->result();	
	}
	
	public function overdue_model($department)
	{
		date_default_timezone_set('Asia/Kolkata');
$currentTime = date( 'Y-m-d h:i:s A', time () );
		//echo $currentTime; die;
		
		/*$sql ="SELECT ticket_id FROM assign_ticket where sla <'".$currentTime."' ";
				 $query = $this->db->query($sql);
				 $result=$query->result();
		
		print_r($this->db->last_query()); die;
		
		*/
		//
		
		$this->db->select('ticket_id');
		$this->db->from('assign_ticket');
		//$this->db->where('sla <',$currentTime);
		$result=$this->db->get()->result();
		//print_r($this->db->last_query()); die;
		
		foreach($result as $results)
		{
			$var[]=$results->ticket_id?$results->ticket_id:'0';
		}
	
		
	
	    if(!empty($var))
{	
$this->db->select('create_ticket.ticket_id,create_ticket.created_date,create_ticket.subjects,create_ticket.name,create_ticket.priority,assign_ticket.sla');
         $this->db->from('create_ticket');
    
		//$this->db->where_not_in('ticket_id',$var);
		$this->db->join('assign_ticket','create_ticket.ticket_id=assign_ticket.ticket_id','left');
		$this->db->where_in('create_ticket.ticket_id',$var);
 $this->db->where('create_ticket.status','1');
		 $this->db->where('create_ticket.department',$department);
    $this->db->order_by('create_ticket.id','desc');
return	$res=	$this->db->get()->result();
	echo '<pre>';print_r($res);die;
		
		
}	
		
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
	
	public function getmessages($tid)
{
$this->db->select('*');
$this->db->from('message');
$this->db->where('ticket_id',$tid);
return $this->db->get()->result();

}
public function getuserid($tid)
{
	$this->db->select('user_id');
	$this->db->from('assign_ticket');
	$this->db->where('ticket_id',$tid);
	$result=$this->db->get()->row_array();
	return $result['user_id'];
}
	
	public function ticketwhichisopen($department)
	{
		
	

		$this->db->distinct('ticket_id');
		$this->db->from('message');
		
		$result=$this->db->get()->result();
		
		foreach($result as $results)
		{
			$var[]=$results->ticket_id?$results->ticket_id:'0';
		}
	
		
	
	    if(!empty($var))
{	
$this->db->select('ticket_id,created_date,subjects,name,priority,department');
         $this->db->from('create_ticket');
    
		//$this->db->where_not_in('ticket_id',$var);
		$this->db->where_in('ticket_id',$var);
 $this->db->where('status','1');
		 $this->db->where('department',$department);
    $this->db->order_by('id','desc');
	return	$this->db->get()->result();
	
		
		
}	

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
public function getassname($tid)
	{
		
		$sql ="SELECT sign_up.name FROM sign_up LEFT JOIN assign_ticket ON sign_up.id = assign_ticket.user_id where ticket_id='".$tid."' ";
				 $query = $this->db->query($sql);
				 $result=$query->row_array();
				 if(!empty($result['name']))
				 {
					 return $result['name'];
				 }
				 else
				 {
					 return 'Unassigned';
				 }
	}
	
	
	
	public function get_all_staff_memberlist($department)
	{
		//print_r($department); die;
	return	$this->db->select('*')
		         ->from('sign_up')
				 ->where_not_in('type','teamleader')
				 ->where('department',$department)
				 //->order_by('id','asc')
				 ->get()->result();
	}
	
	public function getstaffdata($id)
	{
	return	$this->db->select('*')
		         ->from('sign_up')
				 ->where('id',$id)
				 //->order_by('id','asc')
				 ->get()->result();
		
	}
	
	
	public function counttotalticket($department)
{
	return $this->db->select('*')
	                ->from('create_ticket')
					->where('department',$department)
					->get()->num_rows();
}
public function counttotalopenticket($department)
{
	return $this->db->select('*')
	                ->from('create_ticket')
					->where('status','1')
					->where('department',$department)
					->get()->num_rows();
}
public function counttotalclosedticket($department)
{
	return $this->db->select('*')
	                ->from('create_ticket')
					->where('status','0')
					->where('department',$department)
					->get()->num_rows();
}

public function getallunassigned($department)
	{
			$this->db->select('ticket_id');
		$this->db->from('assign_ticket');
		$result=$this->db->get()->result();
		foreach($result as $results)
		{
			$var[]=$results->ticket_id?$results->ticket_id:'0';
		}
	//print_r($var);
		
	
	$this->db->select('create_ticket.ticket_id,create_ticket.created_date,create_ticket.subjects,create_ticket.name,create_ticket.priority,create_ticket.department');
         $this->db->from('create_ticket');
        if(!empty($var))
{	
		$this->db->where_not_in('ticket_id',$var);
}
		 $this->db->where('status','1');
		 $this->db->where('department',$department);
    $this->db->order_by('id','desc');
	return	$this->db->get()->num_rows();
	
	
	}

	public function savepassword($dataArray)
	{
		$this->db->set('password',$dataArray['password'])
		          ->where('id',$dataArray['id'])
				  ->update('sign_up');
		
		
	}
	
	
	}
