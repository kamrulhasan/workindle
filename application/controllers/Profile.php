<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Profile extends CI_Controller {  
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
	}

	


	function index()
	{
		if($this->session->userdata('manpower_id')) {
			$id = $this->session->userdata('manpower_id');
		} else {
			redirect();
		}

		$site_config= [];		
		$db_data['man_info'] = $this->candidate_model->candidate_info($id);
		$data['content'] = $this->load->view('profile',$db_data,true);
		$data['page_title']='';
		$data['meta_title']='';
		$data['meta_des']='';
		$data['active_menu']='home';
		$this->load->view('layout/default',$data);
	}

	function edit()
	{	
		if($this->session->userdata('manpower_id')) {
			$id = $this->session->userdata('manpower_id');
		} else {
			redirect();
		}
		
		if ($this->input->post('regiSubmitBtn')) {
			$this->load->library( 'form_validation' );
			$this->form_validation->set_rules('name', 'Name', 'trim|required');

			if($this->form_validation->run()) {

				$email= $this->input->post('email');
				
				$man_info['name'] = $this->input->post('name');
				$man_info['age'] = $this->input->post('age');
				$man_info['english'] = $this->input->post('english');
				$man_info['nationality'] = $this->input->post('nationality');
				$man_info['school'] = $this->input->post('school');
				$man_info['english'] = $this->input->post('english');
				$man_info['experience'] = rtrim(implode(", ", $this->input->post('experience')), ",");
				$man_info['candidate_to'] = trim(implode(", ", $this->input->post('candidate_to')), ",");
				$man_info['gender'] = $this->input->post('gender');
				$man_info['description'] = $this->input->post('description');

				if($this->input->post('pasword')) {
					$man_info['pasword'] = md5($this->input->post('pasword'));
				}
				

				$path = "assets/img/namepowers";
				if (!file_exists($path)) {
				    mkdir($path, 0777, true);
				}
				//-------- upload photo	
				$config['upload_path'] = $path;
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size']  = '1000';
				$config['max_width']  = '0';
				$config['max_height']  = '0';
				$this->load->library('upload');
				$this->upload->initialize($config);
				if($this->upload->do_upload('photo'))
				{
					$file_info = $this->upload->data();
					$man_info['photo']= $path ."/" . $file_info['file_name'];
				}
				//-------- end upload photo	
				
				//-------- upload photo2			
				if($this->upload->do_upload('photo2'))
				{
					$file_info = $this->upload->data();
					$man_info['photo2']=  $path ."/" . $file_info['file_name'];
				}
				//-------- end upload photo2

				//-------- upload photo3			
				if($this->upload->do_upload('photo3'))
				{
					$file_info = $this->upload->data();
					$man_info['photo3']=  $path ."/" . $file_info['file_name'];
				}
				//-------- end upload photo3

				//-------- upload photo4			
				if($this->upload->do_upload('photo4'))
				{
					$file_info = $this->upload->data();
					$man_info['photo4']=  $path ."/" . $file_info['file_name'];
				}
				//-------- end upload photo4

				//-------- upload photo5			
				if($this->upload->do_upload('photo5'))
				{
					$file_info = $this->upload->data();
					$man_info['photo5']=  $path ."/" . $file_info['file_name'];
				}
				//-------- end upload photo5
				$manPowerId = $this->input->post('manPowerId');
				$this->candidate_model->update_registration($man_info, $manPowerId);

				$this->session->set_flashdata('success_message',' Registration has been complated. admin will approve');
				redirect('profile');

			} else {

				$site_config= [];
				$db_data['man_info'] = $this->candidate_model->candidate_info($id);
				$data['content'] = $this->load->view('edit_registration',$db_data,true);
				$data['page_title']='';
				$data['meta_title']='';
				$data['meta_des']='';
				$data['active_menu']='home';
				$this->load->view('layout/default',$data);
			}		
			

		}else{

			$site_config= [];
			$db_data['man_info'] = $this->candidate_model->candidate_info($id);
			$data['content'] = $this->load->view('edit_registration',$db_data,true);
			$data['page_title']='';
			$data['meta_title']='';
			$data['meta_des']='';
			$data['active_menu']='home';
			$this->load->view('layout/default',$data);
		}	

	}	


}

/* End of file home.php */
/* Location: ./application/controllers/home.php */