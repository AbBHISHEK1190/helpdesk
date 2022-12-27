<?php
//Abhishek kumar jha
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminmodel extends CI_Model {

	public function __construct()
	{
		
		parent::__construct();
		
	}
	
	public function getalltickets()
	{
		return $this->db->select('*')
		            ->from('create_ticket')
					->where('status','1')
					->order_by('id','desc')
					->get()->result();
	}
	
	public function getallclosedtickets()
	{
		return $this->db->select('*')
		            ->from('create_ticket')
					->where('status','0')
					->order_by('id','desc')
					->get()->result();
	}
	
	
	public function getuserid($tid)
{
	//print_r($tid); die;
	$this->db->select('user_id');
	$this->db->from('assign_ticket');
	$this->db->where('ticket_id',$tid);
	$result=$this->db->get()->row_array();
	//print_r($result); die;
	if(!empty($result))
	{
	return $result['user_id'];
	}
	else
	{
		return '0';
	}
}
	public function getmessages($tid)
{
$this->db->select('*');
$this->db->from('message');
$this->db->where('ticket_id',$tid);
return $this->db->get()->result();

}

public function allmembers($department)
	{
	return	$this->db->select('*')
	             ->from('sign_up')
				 ->where('department',$department)
				 ->where('status','1')
				 ->get()->result();
	}
	
	public function getticketdatabytid($tid)
	{
	$this->db->select('*');
    $this->db->from('create_ticket');
    $this->db->where('ticket_id',$tid);
return $this->db->get()->result();	
	}
	
	
	public function getsla($department)
	{
		//print_r($department); die;
	$this->db->select('sla');
		       $this->db->from('sla');
				$this->db->where('department',$department);
					$res= $this->db->get()->row_array();
					return $res['sla'];
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
	
public function getdepartment($tid)
{
	$this->db->select('department');
	$this->db->from('create_ticket');
	$this->db->where('ticket_id',$tid);
	$result=$this->db->get()->row_array();
	return $result['department'];
}

public function changestatus($post)
{
	//print_r($post); die;
if($post['status']=='0')
{
	$this->db->set('status',$post['status']);
	$this->db->where('ticket_id',$post['t_id']);
	$this->db->update('create_ticket');
	
}
}


public function allunassigned()
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
		 //$this->db->where('department',$department);
    $this->db->order_by('id','desc');
	return	$this->db->get()->result();
	
	
	}

	
	public function gedepart($tid)
	{
		
		$this->db->select('department');
		$this->db->from('create_ticket');
		$this->db->where('ticket_id',$tid);
	$result=	$this->db->get()->row_array();
	return $result['department'];
	}
	
	public function myticketmodel($userid)
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
$this->db->select('create_ticket.ticket_id,create_ticket.created_date,create_ticket.subjects,create_ticket.name,create_ticket.priority,create_ticket.department');
         $this->db->from('create_ticket');
    
		//$this->db->where_not_in('ticket_id',$var);
		$this->db->where_in('ticket_id',$var);
 $this->db->where('status','1');
		// $this->db->where('department',$department);
    $this->db->order_by('id','desc');
	return	$this->db->get()->result();
	
}
		
	}
	
	public function ticketwhichisopen()
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
		// $this->db->where('department',$department);
    $this->db->order_by('id','desc');
	return	$this->db->get()->result();
	
		
		
}	
}

public function saveprofiledata($dataArray,$id)
{
	$this->db->where('id',$id);
	$this->db->update('sign_up',$dataArray);
	return 'successfully updated';
	
}
	
	public function getprofiledata($id)
	{
		
		return $this->db->select('*')
		                ->from('sign_up')
						->where('id',$id)
						->get()->result();
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
	
	public function overdue_model()
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
$this->db->select('create_ticket.ticket_id,create_ticket.created_date,create_ticket.subjects,create_ticket.name,create_ticket.priority,create_ticket.department,assign_ticket.sla');
         $this->db->from('create_ticket');
    
		//$this->db->where_not_in('ticket_id',$var);
		$this->db->join('assign_ticket','create_ticket.ticket_id=assign_ticket.ticket_id','left');
		$this->db->where_in('create_ticket.ticket_id',$var);
 $this->db->where('create_ticket.status','1');
		 //$this->db->where('create_ticket.department',$department);
    $this->db->order_by('create_ticket.id','desc');
return	$res=	$this->db->get()->result();
	//echo '<pre>';print_r($res);die;
		
		
}	
		
	}
	
	
	public function get_all_staff_memberlist()
	{
	return	$this->db->select('*')
		         ->from('sign_up')
				 ->where_not_in('type','admin')
				 ->where_not_in('status','2')
				 //->order_by('id','asc')
				 ->get()->result();
	}
	public function get_new_staff_memberlist()
	{
	return	$this->db->select('*')
		         ->from('sign_up')
				 ->where_not_in('type','admin')
				 ->where('status','2')
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
	
	public function changestaffstatus($post)
	{
		//print_r($post);
		if($post['status']=='0')
		{
		$this->db->set('status','1');
		$this->db->where('id',$post['userid']);
		$this->db->update('sign_up');
		}
		elseif($post['status']=='1')
		{
			$this->db->set('status','0');
		$this->db->where('id',$post['userid']);
		$this->db->update('sign_up');
			
		}
		elseif($post['status']=='2')
		{
			$this->db->set('status','1');
		$this->db->where('id',$post['userid']);
		$this->db->update('sign_up');
			
		}
	}
	
	public function getdepartmentlist()
	{
		
		return $this->db->select('department.id,department.department,sla.sla,sla.id as sid')
		                ->from('department')
						->join('sla','department.department=sla.department','left')
						->get()->result();
	}
	public function adddept($post)
	{
		$dataArray=array(
		"department"=>$post['department']
		);
		$datasecond=array(
		"department"=>$post['department'],
		"sla"=>'2'
		);
		$this->db->insert('department',$dataArray);
		$this->db->insert('sla',$datasecond);
	}
	
	public function deletedept($post)
	{
	
		$this->db->where('id',$post['userid']);
		$this->db->delete('department');
	}
	public function deletefromsla($post)
	{
		$this->db->where('id',$post['department']);
		$this->db->delete('sla');
		//return true;
	}
	public function deletefrom_cat($post)
	{
		$this->db->where('department_id',$post['userid']);
		$this->db->delete('category');
		return true;
		
	}
	public function deletfaq($post)
	{
		
		$this->db->select('id');
		$this->db->from('category');
		$this->db->where('department_id',$post['userid']);
	$result=	$this->db->get()->result_array();
		
		foreach($result as $rs)
		
		for($i=0;$i<count($rs);$i++)
		{
			//echo '<br>';$result[$i];
		$this->db->where_in('subcategory_id',$rs['id']);
		$this->db->delete('faq');
			
		}
		
		
	}
	
	public function editslatime($post)
	{
		$this->db->set('sla',$post['sla']);
		$this->db->where('department',$post['department']);
		$this->db->update('sla');
		return true;
	}
	
	public function gethelptopic()
	{
	return	$this->db->select('department.id,department.department,category.category,category.id as cid')
		         ->from('category')
				 ->join('department','department.id=category.department_id','left')
				 ->get()->result();
	}
	
	public function getdepartmentfromcategory()
	{
		return $this->db->select('*')
		                ->from('department')
						->get()->result();
	}
	
	public function addhelptopicmodel($post)
	{
		$dataArray=array(
		"category"=>$post['category'],
		"department_id"=>$post['departmentid']
		);
		$this->db->insert('category',$dataArray);
		return true;
		
	}
	
	public function deletefromcat($post)
	{
	$this->db->where('id',$post['catid']);
		$this->db->delete('category');
		
	return true;
	}
	
	public function edithelptopic($post)
	{
		$this->db->set('category',$post['category']);
		$this->db->where('id',$post['departmentid']);
		$this->db->update('category');
		return true;
	}
	public function getfaq()
	{
	return	$this->db->select('sub_category.sub_category,sub_category.category_id,faq.faq,faq.subcategory_id,faq.id as faqid')
		         ->from('sub_category')
				 ->join('faq','sub_category.id=faq.subcategory_id','left')
				 ->get()->result();
	}
		
		
	public function getomcategory()
	{
		return $this->db->select('*')
		                ->from('sub_category')
						->get()->result();
	}
	
	public function addfaq($post)
	{
		$dataArray=array(
		"faq"=>$post['category'],
		"subcategory_id"=>$post['departmentid']
		);
		$this->db->insert('faq',$dataArray);
		return true;
	}
	public function deletefromfaq($post)
	{
	$this->db->where('id',$post['catid']);
	$this->db->delete('faq');
		return true;
	
	}
public function editfaq($post)
	{
		$this->db->set('faq',$post['category']);
		$this->db->where('id',$post['departmentid']);
		$this->db->update('faq');
		return true;
	}
public function editdepartmentmodel($post)
	{
		$this->db->set('department',$post['department']);
		$this->db->where('id',$post['id']);
		$this->db->update('department');
		return true;
	}	
	public function editslatab($post)
	{
		$this->db->set('department',$post['department']);
		$this->db->where('id',$post['sid']);
		$this->db->update('sla');
		return true;
	}	
public function counttotalticket()
{
	return $this->db->select('*')
	                ->from('create_ticket')
					->get()->num_rows();
}
public function counttotalopenticket()
{
	return $this->db->select('*')
	                ->from('create_ticket')
					->where('status','1')
					->get()->num_rows();
}
public function counttotalclosedticket()
{
	return $this->db->select('*')
	                ->from('create_ticket')
					->where('status','0')
					->get()->num_rows();
}
	
	public function getallunassigned()
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
		 //$this->db->where('department',$department);
    $this->db->order_by('id','desc');
	return	$this->db->get()->num_rows();
	
	
	}


	public function savepassword($dataArray)
	{
		$this->db->set('password',$dataArray['password'])
		          ->where('id',$dataArray['id'])
				  ->update('sign_up');
		
		
	}
	
	
	public function get_subcategory()
	{
	return	$this->db->select('category.id,category.category,sub_category.sub_category,sub_category.id as sid')
		         ->from('category')
				 ->join('sub_category','category.id=sub_category.category_id','left')
				 ->get()->result();
	}
	public function getsubcategory()
	{
		return $this->db->select('*')
		                ->from('category')
						->get()->result();
	}
	
	public function addsubcat($post)
	{
		$dataArray=array(
		"sub_category"=>$post['category'],
		"category_id"=>$post['departmentid']
		);
		$this->db->insert('sub_category',$dataArray);
		return true;
		
	}
	
	public function editsubcat($post)
	{
		$this->db->set('sub_category',$post['category']);
		$this->db->where('id',$post['departmentid']);
		$this->db->update('sub_category');
		return true;
	}
	
	public function deletefromsubcat($post)
	{
	$this->db->where('id',$post['catid']);
		$this->db->delete('sub_category');
		
	return true;
	}
	}
