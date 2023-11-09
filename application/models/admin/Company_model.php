<?php 

class Company_model extends CI_Model {

	

	public function __construct()
    {

        parent::__construct();

    }

     

	function get_companies()
	{
		$this->db->select('c.*, m.name');		
		$this->db->from('company_list AS c');
		$this->db->join("man_powers AS m", "m.id = c.manpower_id", "left");
		$query=$this->db->get();
		$res=$query->result();
		return $res;
	}

	function delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('company_list');
	}


	
	
	

	
	

}

?>

