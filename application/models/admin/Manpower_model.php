<?php 

class Manpower_model extends CI_Model {

	

	public function __construct()
    {

        parent::__construct();

    }

    function get_man_powers()
	{
		$this->db->select('*');		
		$this->db->from('man_powers');
		$this->db->order_by('id', 'DESC');
		$query=$this->db->get();
		$res=$query->result();
		return $res;
	}

	function get_man_power($id)
	{
		$this->db->select('*');
		$this->db->where('id',$id);
		$this->db->from('man_powers');
		$query=$this->db->get();
		$res=$query->row();
		return $res;
	}


	function edit($data,$id)
	{
		$this->db->where('id',$id);
		$this->db->update('man_powers',$data);
	}

	function add($data)
	{
		$this->db->insert('man_powers',$data);
	}

	function delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('man_powers');
	}
	
	

	
	

}

?>

