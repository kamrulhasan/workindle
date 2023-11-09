<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Manpowers extends CI_Controller {
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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */



	function __construct()
	{
		parent::__construct();		
		if(!$this->session->userdata('user_id')  || $this->session->userdata('user_type')!=1 ) redirect('admin/auth');

		$site_config;
		$this->site_config = get_site_config('home');

		$this->load->model('admin/manpower_model');
		$this->load->model('candidate_model');
	}

	function index()
	{
        $db_data['man_powers'] = $this->manpower_model->get_man_powers();
		$data['content'] = $this->load->view('admin/man_power/list',$db_data,true);
		//----- this is for breadcrumbs
		$breadcrumbs['breadcrumbs'][]=array('text'=>'Man powers','href'=>'');
		$data['breadcrumbs']=$this->load->view('admin/layout/breadcrumbs',$breadcrumbs,true);
		$data['page_header']="man_powers";
		//------- end breadcrumbs
		$data['active_menu']='man_powers';
		$this->load->view('admin/layout/default',$data); 
	}

	function preview($id)
	{
		$site_config= [];
		$db_data['is_preview']= "preview";
		$db_data['man_info'] = $this->candidate_model->candidate_info($id);
		$data['content'] = $this->load->view('candidate',$db_data,true);
		$data['page_title']='';
		$data['meta_title']='';
		$data['meta_des']='';		
		$data['active_menu']='home';
		$this->load->view('layout/default',$data);
	}

	function add()
	{
		if($this->input->post('add'))
		{
			$man_power_info['name'] = $this->input->post('name');
			$man_power_info['man_power'] = $this->input->post('man_power');
			$man_power_info['ratting'] = $this->input->post('ratting');
			$man_power_info['country'] = $this->input->post('country');

			$this->manpower_model->add($man_power_info);
			$this->session->set_flashdata('success_message',' man_power has been saved.');
			redirect('admin/manpowers');
		}
		else
		{
			$data[] = '';
			$data['content']=$this->load->view('admin/man_power/add_form',$data,true);
			//----- this is for breadcrumbs
			$breadcrumbs['breadcrumbs'][]=array('text'=>'man_powers','href'=>site_url().'admin');
			$breadcrumbs['breadcrumbs'][]=array('text'=>"Add man_powers",'href'=>'');
			$data['breadcrumbs']=$this->load->view('admin/layout/breadcrumbs',$breadcrumbs,true);	
			$data['page_header']="Add man_powers";
			//------- end breadcrumbs

			$data['active_menu']='add_man_powers';
			$this->load->view('admin/layout/default',$data);

		}

	}

	function edit($id)
	{
		if($this->input->post('edit'))
		{
			$man_power_info['name'] = $this->input->post('name');
			$man_power_info['man_power'] = $this->input->post('man_power');
			$man_power_info['ratting'] = $this->input->post('ratting');
			$man_power_info['country'] = $this->input->post('country');
			

			$this->manpower_model->edit($man_power_info, $id);
			$this->session->set_flashdata('success_message',' Man power has been saved.');
			redirect('admin/manpowers');
		}
		else
		{
			$data['man_power'] = $this->manpower_model->get_man_power($id);
			$data['content']=$this->load->view('admin/man_power/edit_form',$data,true);
			//----- this is for breadcrumbs
			$breadcrumbs['breadcrumbs'][]=array('text'=>'man_powers','href'=>site_url().'admin');
			$breadcrumbs['breadcrumbs'][]=array('text'=>"Add man_powers",'href'=>'');
			$data['breadcrumbs']=$this->load->view('admin/layout/breadcrumbs',$breadcrumbs,true);	
			$data['page_header']="Add man_powers";
			//------- end breadcrumbs

			$data['active_menu']='add_man_powers';
			$this->load->view('admin/layout/default',$data);

		}

	}


	function delete($id)
	{
		$this->manpower_model->delete($id);
		$this->session->set_flashdata('success_message',' Man power has been Deleted');
		redirect('admin/manpowers');
	}

	function approved()
	{
		$id = $this->input->post('id');
		$option = $this->input->post('option');

		$data_info['is_published'] = $option;
		$this->manpower_model->edit($data_info, $id);

		$db_data['man_powers'] = $this->manpower_model->get_man_powers();
		echo $this->load->view('admin/man_power/ajax_list',$db_data,true);
	}

	function addRating()
	{
		$ratting = $this->input->post('ratting');
		$is_published = $this->input->post('is_published');
		$manpower_id = $this->input->post('manpower_id');

		$data_info['ratting'] = $ratting;
		$data_info['is_published'] = $is_published;

		$this->manpower_model->edit($data_info, $manpower_id);

		$this->session->set_flashdata('success_message',' Rating has been saved');
		redirect('admin/manpowers');

	}



	



	



}







/* End of file home.php */



/* Location: ./application/controllers/home.php */