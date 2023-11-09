<?php 

class Home_model extends CI_Model {

	

	public function __construct()
    {

        parent::__construct();

    }

    function get_testimonials()
	{
		$this->db->select('*');		
		$this->db->from('testimonials');
		$query=$this->db->get();
		$res=$query->result();
		return $res;
	}



}

?>

