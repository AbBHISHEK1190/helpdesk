<?php
//Abhishek kumar jha
defined('BASEPATH') OR exit('No direct script access allowed');

class Homemodel extends CI_Model {

	public function __construct()
	{
		
		parent::__construct();
		
	}
	
	public function getdatafromdepartment()
	{
		return	$this->db->select('*')
		          ->from('department')
				  ->get()->result();
	
	}
	
	public function getdatafromcetgory($catid)
	{
	return	$this->db->select('*')
		          ->from('category')
				  ->where('department_id',$catid)
				  ->get()->result();
	}
	
	public function subcategory($catid)
	{
		return	$this->db->select('*')
		          ->from('sub_category')
				  ->where('category_id',$catid)
				  ->get()->result_array();
	
	}
	public function faqcategory($catid)
	{
		return	$this->db->select('*')
		          ->from('faq')
				  ->where('subcategory_id',$catid)
				  ->get()->result_array();
	
	}
	public function getfaqresmodel($catid)
	{
		return	$this->db->select('faq_ans')
		          ->from('faq_ans')
				  ->where('faq_id',$catid)
				  ->get()->result_array();
	
	}
	
	public function saveticket($dataArray)
	{
		//print_r($dataArray); die;
		$this->db->insert('create_ticket',$dataArray);
		return "Your Ticket Id is:". $dataArray['ticket_id'];
	}
	public function helptopic($helptopic)
	{
		$this->db->select('category');
		$this->db->from('category');
		          $this->db->where('id',$helptopic);
				$result=  $this->db->get()->row_array();
				  return $result['category'];
		
	}
	
	public function sub_category($helptopic)
	{
		$this->db->select('sub_category');
		$this->db->from('sub_category');
		          $this->db->where('id',$helptopic);
				$result=  $this->db->get()->row_array();
				  return $result['sub_category'];
		
	}
	public function faq($helptopic)
	{
		$this->db->select('faq');
		$this->db->from('faq');
		          $this->db->where('id',$helptopic);
				$result=  $this->db->get()->row_array();
				  return $result['faq'];
		
	}
	
	
	public function department($helptopic)
	{
		$this->db->select('department');
		$this->db->from('department');
		          $this->db->where('id',$helptopic);
				$result=  $this->db->get()->row_array();
				  return $result['department'];
		
	}
	
	public function check_user_name($post)
	{
	return	$this->db->select('*')
		         ->from('sign_up')
				 ->where('name',$post['uname'])
				 ->get()->num_rows();
	}
	
	public function saveintosignup($dataArray)
	{
		$this->db->insert('sign_up',$dataArray);
		return true;
	}
	
	public function checkusername($username)
	{
		//print_r($username['username']);die;
		$this->db->select('name');
		$this->db->from('sign_up');
		$this->db->where('name',$username['username']);
		$result=$this->db->get()->row_array();
		return $result['name']?$result['name']:'false';
		
	}
	public function checkuser_name($username)
	{
		//print_r($username['username']);die;
		$this->db->select('name');
		$this->db->from('sign_up');
		$this->db->where('name',$username);
		$result=$this->db->get()->row_array();
		return $result['name']?$result['name']:'false';
		
	}
	
	public function savepassword($post)
	{
		//print_r($post); die;
		$this->db->set('password',md5($post['password']))
		         ->where('name',$post['name'])
				 ->update('sign_up');
	}
	public function selectdatafromstate()
	{
		return $this->db->select('state_name,state')
		          ->from('state')
				  ->group_by('state_name')
                  ->get()->result();			  
		
	}
	
	public function getdistrictfromtable($catid)
	{
		return	$this->db->select('*')
		          ->from('state')
				  ->where('state',$catid)
				  ->group_by('district')
				  ->get()->result_array();
	
	}
	
	public function getblockfromtable($catid)
	{
		return	$this->db->select('block')
		          ->from('state')
				  ->where('district',$catid)
				  ->group_by('block')
				  ->get()->result_array();
	
	}
	
	public function getgpfromtable($catid)
	{
		return	$this->db->select('gp')
		          ->from('state')
				  ->where('block',$catid)
				  //->group_by('gp')
				  ->get()->result_array();
	
	}
	public function getdepartmenname($state)
	{
		     $this->db->select('state_name');
		       $this->db->from('state');
				$this->db->where('state',$state);
				$this->db->limit(1);
			    $res= $this->db->get()->row_array();
				return $res['state_name']; 
	
		
	}
	
	
	}
