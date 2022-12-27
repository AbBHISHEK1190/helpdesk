<?php
//Abhishek kumar jha
defined('BASEPATH') OR exit('No direct script access allowed');

class Ticketstatusmodel extends CI_Model {

	public function __construct()
	{
		
		parent::__construct();
		
	}
	
	public function logincheck_model($dataarray)
	{
		$this->db->select('*');
		$this->db->from('create_ticket');
		$this->db->where('ticket_id',$dataarray['ticket_id']);
		$this->db->where('email',$dataarray['email']);
	   $result=	$this->db->get()->num_rows();
	//print_r($result);
	if($result > 0)
	{
		return $this->db->select('*')
		                ->from('create_ticket')
						->where('ticket_id',$dataarray['ticket_id'])
						->where('email',$dataarray['email'])
						->get()->result_array();
	}
	}
	
	}
