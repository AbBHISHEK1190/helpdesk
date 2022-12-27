<?php
//Abhishek kumar jha
defined('BASEPATH') OR exit('No direct script access allowed');

class Tlsettingmodel extends CI_Model {

	public function __construct()
	{
		
		parent::__construct();
		
	}
	
	public function get_departmentid($department)
	{
		return $this->db->select('id')
		                ->from('department')
						->where('department',$department)
						->get()->row_array();
	}
	public function getdatafromalldep($did)
	{
	$this->db->select('*');
	$this->db->from('category');
	$this->db->where('department_id',$did);	
		return	$this->db->get()->result();
			
			
		
	}
	
	public function addhelptopic($dataarray)
	{
		
		$this->db->insert('category',$dataarray);
			
	}
	
	public function edithelptopics($dataarray)
	{	
	
		$this->db->set('category',$dataarray['category']);
		$this->db->where('id',$dataarray['id']);
		$this->db->update('category');
		
	}
	
	public function deletehelptopics($dataArray)
	{
	    $this->db->where('id',$dataArray['id']);
		$this->db->delete('category');

		
	}
	public function getdatafromsucategory($did)
	{
	$this->db->select('category.id,category.category,sub_category.sub_category,sub_category.id as sid,sub_category.category_id');
	$this->db->from('category');
	$this->db->join('sub_category','category.id=sub_category.category_id','left');	
		$this->db->where('category.id',$did);
		return	$this->db->get()->result();
	}
	
	public function gethelptopic($did)
	{
	return	$this->db->select('*')
	                 ->from('category')
					 ->where('id',$did)
					 ->get()->result();
	}
	public function addsubcatintotable($dataarray)
	{
	//	
	
	$this->db->select('*');
	$this->db->from('sub_category');
	$this->db->where('sub_category',$dataarray['sub_category']);
	$this->db->where('category_id',$dataarray['category_id']);
	$result=$this->db->get()->num_rows();
		if($result ==0)
		{
			
			$this->db->insert('sub_category',$dataarray);
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function deletesubcat($dataArray)
	{
	    $this->db->where('id',$dataArray['id']);
		$this->db->delete('sub_category');

		
	}
	
	public function editsubcatmodel($post)
	{
		$this->db->set('sub_category',$post['category']);
		$this->db->where('id',$post['departmentid']);
		$this->db->update('sub_category');
		return true;
		
	}
	
	public function gethelptopicids($id)
	{
		
		return $this->db->select('id')
		                ->from('category')
						->where('department_id',$id)
						->get()->result();
	}
	
	public function getsubcatids($gethelptopicids)
	{
		foreach($gethelptopicids as $ids)
		{
		$id[]=	$ids->id;
			
		}
		for($i=0;$i<count($id);$i++)
		{
			
			$this->db->select('id');
			$this->db->from('sub_category');
			$this->db->where_in('category_id',$id);
			$result=$this->db->get()->result();
		}
	 foreach($result as $rs)
	 {
		 $fid[]=$rs->id;
	 }
	 //print_r($fid);
	 $this->db->select('sub_category.sub_category,faq.id,faq.faq,faq.subcategory_id');
	 $this->db->from('sub_category');
	 $this->db->join('faq','sub_category.id=faq.subcategory_id','left');
	 $this->db->where_in('sub_category.id',$fid);
	 return $faqdata=$this->db->get()->result();
		
	}
	public function addfaqintable($dataarray)
	{
		$this->db->insert('faq',$dataarray);
		return true;
	}
	
	public function editfaqmodel($post)
	{
		$this->db->set('faq',$post['category']);
		$this->db->where('id',$post['departmentid']);
		$this->db->update('faq');
		return true;
		
	}
	
	public function deletefaq($dataArray)
	{
	    $this->db->where('id',$dataArray['id']);
		$this->db->delete('faq');
		
        $this->db->where('faq_id',$dataArray['id']);
		$this->db->delete('faq_ans');

		
	}
	
public function addfaqansintable($dataarray)
	{
		$this->db->insert('faq_ans',$dataarray);
		return true;
	}
	
	public function editfaq_ans_model($post)
	{
		$this->db->set('faq_ans',$post['category']);
		$this->db->where('id',$post['departmentid']);
		$this->db->update('faq_ans');
		return true;
		
	}
	}
