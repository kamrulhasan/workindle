<?php

defined('BASEPATH') OR exit('No direct script access allowed');

//require_once('application/libraries/phpass-0.1/PasswordHash.php');



class Auth extends CI_Controller {



	/**

	 * Index Page for this controller.

	 *

	 * Maps to the following URL

	 * 		http://example.com/index.php/welcome

	 *	- or -

	 * 		http://example.com/index.php/welcome/index

	 *	- or -

	 * Since this controller is set as the default controller in

	 * config/routes.php, it's displayed at http://example.com/

	 *

	 * So any other public methods not prefixed with an underscore will

	 * map to /index.php/welcome/<method_name>

	 * @see https://codeigniter.com/user_guide/general/urls.html

	 */

	function __construct() 
	{
		parent::__construct();
		$this->load->model('admin/auth_model');
	}

	

	public function index()
	{
		if($this->session->userdata('user_type') == 1)
		{
			redirect('admin/manpowers');
		}

		else if($this->session->userdata('user_type') == 2)
		{
			redirect('auth');
		}

		$db_data=array();
		$data['content'] = $this->load->view('admin/auth/login',$db_data,true);
		$data['page_header']="Login Page";
		$data['active_menu']='auth';
		$this->load->view('admin/layout/default',$data);
	}

	

	function signin()
	{
		if($this->input->post('user_login'))
		{
			$data['username']=$this->input->post('username');
			$data['password']=md5($this->input->post('password'));
			$res = $this->auth_model->signin($data);
			//print_r($res);	exit;		
			if($res)
			{
				redirect('admin/manpowers');
			}
			else
			{
				$db_data=array();
				$db_data['error_messaage']="Username or password does not match.";
				$data['content']=$this->load->view('admin/auth/login',$db_data,true);
				$data['page_header']="Login";
				$data['active_menu']='auth';
				$this->load->view('admin/layout/default',$data);
			}
		}
		else
		{
			$this->index();
		}
	}

	



	

	function edit_profile()
	{

		if(!$this->session->userdata('user_id')  || $this->session->userdata('user_type')!=1 ) redirect('admin/auth');

		

		if($this->input->post('edit_profile'))

		{

			$user_info['first_name']=$this->input->post('first_name');

			$user_info['last_name']=$this->input->post('last_name');

			$user_info['email']=$this->input->post('email');

			if($this->input->post('password')) $user_info['password']=md5($this->input->post('password'));

			

			$this->auth_model->update_user($user_info,$this->session->userdata('user_id'));

			

			$this->session->set_flashdata('success_message',' User has been saved.');

			redirect('admin/auth/edit_profile');

		}

		else

		{

			$data['profile_info']=$this->auth_model->get_user($this->session->userdata('user_id'));

			$data['content']=$this->load->view('admin/auth/edit_profile',$data,true);

			//----- this is for breadcrumbs



			$breadcrumbs['breadcrumbs'][]=array('text'=>'Dashboad','href'=>site_url().'admin');

			$breadcrumbs['breadcrumbs'][]=array('text'=>"Edit Profile",'href'=>'');

			$data['breadcrumbs']=$this->load->view('admin/layout/breadcrumbs',$breadcrumbs,true);	

			$data['page_header']="user Add Form";

			//------- end breadcrumbs



			$data['active_menu']='users';

			$this->load->view('admin/layout/default',$data);

		}



	}

	

	

	

	

	function logout()

	{

		$this->session->sess_destroy();

		redirect ('admin/auth');

	}









}

