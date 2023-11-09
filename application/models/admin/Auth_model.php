<?php 

class Auth_model extends CI_Model {


	public function __construct()
    {
        parent::__construct();
    }



    function signin($data)
	{

		$username = $data['username'];
		$password = $data['password'];

		

		$this->db->select('*');
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$this->db->where('user_type',1);
		$this->db->from('users');
		$query=$this->db->get();
		$res=$query->row();
		//print_r($res); exit;
		if($res)
		{
			$userdata['user_id']=$res->id;
			$userdata['username']=$res->username;
			$userdata['user_type']=$res->user_type;
			$userdata['name']=$res->name;
			$this->session->set_userdata($userdata);
			return $res;
		}
		else
		{
			return false;
		}

		

		

	}

	

	

	

	

	function update_user($data,$userid)

	{

		$this->db->where('user_id',$userid);

		$this->db->update('users',$data);

	}

	

	

	function get_user($user_id)

	{

		$this->db->select('*');

		$this->db->where('user_id',$user_id);

		$this->db->from('users');

		$query=$this->db->get();

		$res=$query->row();

		return $res;

	}

	







































}



?>