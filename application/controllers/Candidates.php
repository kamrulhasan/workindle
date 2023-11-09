<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Candidates extends CI_Controller {  
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
		$site_config;
		$this->site_config = get_site_config('home');
		$this->load->model('candidate_model');
		$this->load->model('Category_model');
	}

	


	function index($page =0)
	{		
		if(isset($_GET['cate_id'])) {
			$this->session->set_userdata('cate_id', $_GET['cate_id']);
		}
		$total_rows = $this->candidate_model->get_total_candidate();		
		$limit=10;
		$this->load->library('pagination');	
		$config['base_url'] = site_url().'candidates/search';
		$config['uri_segment'] = 3;
		$config['num_links'] = 10;
		$config['prev_link'] = 'Pre';
		$config['next_link'] = 'Next';
		$config['total_rows'] = $total_rows;
		$config['per_page'] = $limit;
		$this->pagination->initialize($config);
		$db_data['pagination']=$this->pagination->create_links();
		$db_data['total_record']=$total_rows;		
		$db_data['page_number']=$page;

		$site_config= [];
		$db_data['results'] = $this->candidate_model->get_candidates($page,$limit);
		$db_data['categories'] = $this->Category_model->get_categories();
		$data['content'] = $this->load->view('candidates2',$db_data,true);
		$data['page_title']='';
		$data['meta_title']='';
		$data['meta_des']='';
		$data['active_menu']='home';
		$this->load->view('layout/default',$data);	

	}

	function search($page =0)
	{
		if(!empty($_GET['experience'])) {
			$this->session->set_userdata('experience', $_GET['experience']);
		}

		if($this->input->post('experience')) {
			$this->session->set_userdata('experience',$this->input->post('experience'));
		}

		if($this->input->post('age')) {
			$this->session->set_userdata('age',$this->input->post('age'));
		}

		if($this->input->post('ratting')) {
			$this->session->set_userdata('ratting',$this->input->post('ratting'));
		}

		$total_rows = $this->candidate_model->get_total_candidate();		
		$limit=10;
		$this->load->library('pagination');	
		$config['base_url'] = site_url().'candidates/search';
		$config['uri_segment'] = 3;
		$config['num_links'] = 10;
		$config['prev_link'] = 'Pre';
		$config['next_link'] = 'Next';
		$config['total_rows'] = $total_rows;
		$config['per_page'] = $limit;
		$this->pagination->initialize($config);
		$db_data['pagination']=$this->pagination->create_links();
		$db_data['total_record']=$total_rows;		
		$db_data['page_number']=$page;

		$site_config= [];
		$db_data['results'] = $this->candidate_model->get_candidates($page,$limit);
		$data['content'] = $this->load->view('candidates2',$db_data,true);
		$data['page_title']='';
		$data['meta_title']='';
		$data['meta_des']='';
		$data['active_menu']='home';
		$this->load->view('layout/default',$data);	

	}


	public function candidate($id)
	{
		$site_config= [];
		$db_data['is_preview']= false;
		$db_data['man_info'] = $this->candidate_model->candidate_info($id);
		$data['content'] = $this->load->view('candidate',$db_data,true);
		$data['page_title']='';
		$data['meta_title']='';
		$data['meta_des']='';		
		$data['active_menu']='home';
		$this->load->view('layout/default',$data);	
	}

	function saveCompany()
	{
		if ($this->input->post('manPowerContact')) {
			$manpower_id = $this->input->post('manpower_id');
			$data_info['company_name'] = $this->input->post('company_name');
			$data_info['telephone'] = $this->input->post('telephone');
			$data_info['email'] = $this->input->post('email');
			$data_info['requestId'] = $this->input->post('requestId');
			$data_info['manpower_id'] = $manpower_id;			

			$this->candidate_model->saveCompany($data_info);

			$this->session->set_flashdata('success_message',' Your request has been sent');
			redirect('/candidates/candidate/'.$manpower_id);
		}
	}

	function clear()
	{
		$this->session->set_userdata('experience', '');
		$this->session->set_userdata('age', '');
		$this->session->set_userdata('ratting', '');
		$this->session->set_userdata('cate_id', '');

		//$this->session->set_flashdata('success_message',' Session has been cleared');
		redirect('/candidates');
	}

	function generate_reg_id()
	{
		$data = $this->candidate_model->get_candidates(0, 10000);
		if($data){
			foreach($data as $row){
				$cateName = strtolower(substr($row->cateName, 0,2));
				$update_data['reg_id'] = get_reg_id($row->id, $cateName);
				$this->candidate_model->update_registration($update_data, $row->id);
			}
		}
	}

	

	

	



}







/* End of file home.php */



/* Location: ./application/controllers/home.php */