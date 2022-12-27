<?php
//Abhishek kumar jha
defined('BASEPATH') OR exit('No direct script access allowed');

class Loginmodel extends CI_Model {

	public function __construct()
	{
		
		parent::__construct();
		
	}
	
	public function logincheck_model($dataArray)
	{
		$this->db->select('*');
		$this->db->from('sign_up');
		$this->db->where('name',$dataArray['name']);
		$this->db->where('password',md5($dataArray['password']));
		$this->db->where('status','1');
	$result=	$this->db->get()->num_rows();
	//print_r($result);
	if($result > 0)
	{
		return $this->db->select('*')
		                ->from('sign_up')
						->where('name',$dataArray['name'])
						->where('name',$dataArray['name'])
						->get()->result_array();
	}
	}
	
	}
