<?php 

class Site_config_model extends CI_Model {

	

	public function __construct()
    {

        parent::__construct();

    }

    

	function get_site_config($type)
	{
		$this->db->select('*');
		$this->db->where('type',$type);
		$this->db->from('site_configs');
		$query=$this->db->get();
		$res=$query->row();
		return $res;
	}


	function edit($data,$id)
	{
		$this->db->where('id',$id);
		$this->db->update('site_configs',$data);
	}

	function add($data)
	{
		$this->db->insert('site_configs',$data);
	}

	function delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('site_configs');
	}
	
	

	
	

}

?>

