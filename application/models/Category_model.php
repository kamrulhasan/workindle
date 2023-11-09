<?php 

class Category_model extends CI_Model {

	

	public function __construct()
    {

        parent::__construct();

    }

    function get_categories($page=0,$limit='')
	{
		$this->db->select('*');		
		$this->db->where("status", 1);
		$this->db->from('categories');
		if($limit){
			$this->db->limit($limit,$page);
		}				
		$query=$this->db->get();
		$res=$query->result();
		return $res;
	}



	function get_category($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$this->db->from('categories');
		$query=$this->db->get();
		$res=$query->row();
		return $res;
	}

	function get_twoLettCategoryName($id)
	{
		$this->db->select('name');
		$this->db->where('id', $id);
		$this->db->from('categories');
		$query=$this->db->get();
		$res=$query->row();
		if($res){
			$catName = $res->name;
			return strtolower(substr($catName, 0,2));
		}else{
			return false;
		}		
	}

	function add($data)
	{
		$this->db->insert("categories",$data);
		return $this->db->insert_id();
	}

	function update($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update("categories",$data);
	}




}

?>

