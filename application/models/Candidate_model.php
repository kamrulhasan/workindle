<?php 

class Candidate_model extends CI_Model {

	

	public function __construct()
    {

        parent::__construct();

    }

    function get_candidates($page,$limit)
	{
		$this->db->select('mp.*, c.name as cateName');

		
		if($this->session->userdata('cate_id')) {	
			$this->db->where('mp.category_id', $this->session->userdata('cate_id'));
		}

		if($this->session->userdata('age')) {
			$age = $this->session->userdata('age');
			$ageArr = explode("-", $age);
			$this->db->where("mp.age >=", $ageArr[0]);
			$this->db->where("mp.age <=", $ageArr[1]);
		}

		$this->db->where("mp.is_published", 1);
		$this->db->join('categories as c', 'c.id = mp.category_id', 'left');
		$this->db->from('man_powers as mp');
		$this->db->limit($limit,$page);
		if($this->session->userdata('ratting')) {
			$this->db->order_by('ratting', $this->session->userdata('ratting'));
		} else {
			$this->db->order_by('mp.ratting', 'DESC');
		}
		
		$query=$this->db->get();
		$res=$query->result();
		return $res;
	}

	function get_total_candidate()
	{
		$this->db->select('count(*) as num');
		if($this->session->userdata('cate_id')) {	
			$this->db->where('category_id', $this->session->userdata('cate_id'));
		}

		if($this->session->userdata('experience')) {
			$experience = $this->session->userdata('experience');
			$this->db->where("(FIND_IN_SET('$experience',candidate_to) !=0)");
		}

		if($this->session->userdata('age')) {
			$age = $this->session->userdata('age');
			$ageArr = explode("-", $age);
			$this->db->where("age >=", $ageArr[0]);
			$this->db->where("age <=", $ageArr[1]);
		}	
		$this->db->where("is_published", 1);
		$this->db->from('man_powers');
		$query=$this->db->get();
		$res=$query->row();
		return $res->num;
	}

	function candidate_info($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$this->db->from('man_powers');
		$query=$this->db->get();
		$res=$query->row();
		return $res;
	}

	function add_registration($data)
	{
		$this->db->insert("man_powers",$data);
		return $this->db->insert_id();
	}

	function update_registration($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update("man_powers",$data);
	}


	function saveCompany($data)
	{
		$this->db->insert("company_list",$data);
	}



}

?>

