<?php 

class Auth_model extends CI_Model {



	

	public function __construct()

    {

        parent::__construct();

    }

	function get_siteconfig()

	{

		$this->db->select('*');

		$this->db->from('site_config');

		$query=$this->db->get();

		$res=$query->row();

		return $res;

	}

    function signin($data)
	{

		$email = $data['email'];
		$password = $data['password'];

		$this->db->select('*');
		$this->db->where('email',$email);
		$this->db->where('pasword',$password);
		$this->db->from('man_powers');
		$query=$this->db->get();
		$res=$query->row();
		if($res)
		{

			$userdata['manpower_id']=$res->id;
			$userdata['email']=$res->email;
			$this->session->set_userdata($userdata);
			return $res;

		}

		else

		{

			return $res;



		}

		

		

	}

	

	

	

	function add_signup($data)
	{
		$this->db->insert('users',$data);
		return $this->db->insert_id();
	}

	

	

	function update_user($data,$id)

	{

		$this->db->where('user_id',$id);

		$this->db->update('users',$data);

	}



	

	function get_user_by_email($email)

	{

		$this->db->select('*');	
		$this->db->where('email',$email);
		$this->db->from('users');
		$query=$this->db->get();
		$res=$query->row();
		return $res;

	}



}



?>