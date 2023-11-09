<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Site_configs extends CI_Controller {
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
		$this->load->model('admin/site_config_model');
	}

	function index()
	{
        $db_data['site_config'] = $this->site_config_model->get_site_config('home');        
		$data['content'] = $this->load->view('admin/site_config/edit_form',$db_data,true);
		//----- this is for breadcrumbs
		$breadcrumbs['breadcrumbs'][]=array('text'=>'site_configs','href'=>'');
		$data['breadcrumbs']=$this->load->view('admin/layout/breadcrumbs',$breadcrumbs,true);
		$data['page_header']="site_configs";
		//------- end breadcrumbs
		$data['active_menu']='site_configs';
		$this->load->view('admin/layout/default',$data); 
	}

	

	function edit()
	{
		if($this->input->post('edit'))
		{
			$config_info['site_name'] = $this->input->post('site_name');
			$config_info['site_title'] = $this->input->post('site_title');
			$config_info['meta_key'] = $this->input->post('meta_key');
			$config_info['meta_des'] = $this->input->post('meta_des');
			$config_info['speach'] = $this->input->post('speach');
			

			//-------- upload logo
			$config['upload_path'] = 'assets/img/logo';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '3000';
			$config['max_width']  = '0';
			$config['max_height']  = '0';
			$this->load->library('upload');
			$this->upload->initialize($config);
			if($this->upload->do_upload('logo'))
			{
				$file_info = $this->upload->data();
				$config_info['logo']=$file_info['file_name'];
				@unlink($this->input->post('pre_logo_path'));
				
			}
			//-------- end upload logo
			
			//-------- upload favicon
			$config = [];
			$config['upload_path'] = 'assets/img/logo';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '3000';
			$config['max_width']  = '0';
			$config['max_height']  = '0';
			$this->load->library('upload');
			$this->upload->initialize($config);
			if($this->upload->do_upload('favicon'))
			{
				$file_info = $this->upload->data();
				$config_info['favicon']=$file_info['file_name'];
				@unlink($this->input->post('pre_favicon_path'));
				
			}
			//-------- end upload favicon

			$id = $this->input->post('id');
			$this->site_config_model->edit($config_info, $id);
			$this->session->set_flashdata('success_message',' Site config has been saved.');
			redirect('admin/site_configs');
		}
		else
		{
			$this->session->set_flashdata('error_message',' Fill up all data.');
			redirect('admin/site_configs');

		}

	}


	public function media()
	{
		if($this->input->post('media_edit'))
		{
			$config_info['facebook'] = $this->input->post('facebook');
			$config_info['twitter'] = $this->input->post('twitter');
			$config_info['linkedin'] = $this->input->post('linkedin');
			$config_info['pinterest'] = $this->input->post('pinterest');
			$config_info['phone'] = $this->input->post('phone');
			$config_info['email'] = $this->input->post('email');
			$config_info['skype'] = $this->input->post('skype');			


			$id = $this->input->post('id');
			$this->site_config_model->edit($config_info, $id);

			$this->session->set_flashdata('success_message',' Site config has been saved.');
			redirect('admin/site_configs/media');

		}else{
			$db_data['site_config'] = $this->site_config_model->get_site_config('home');        
			$data['content'] = $this->load->view('admin/site_config/media_edit_form',$db_data,true);
			//----- this is for breadcrumbs
			$breadcrumbs['breadcrumbs'][]=array('text'=>'site_configs','href'=>'');
			$data['breadcrumbs']=$this->load->view('admin/layout/breadcrumbs',$breadcrumbs,true);
			$data['page_header']="site_configs";
			//------- end breadcrumbs
			$data['active_menu']='site_configs';
			$this->load->view('admin/layout/default',$data);
		}
	}


	public function article_config()
	{
		if($this->input->post('article_edit'))
		{
			$config_info['about_company'] = $this->input->post('about_company');
			//$config_info['speach'] = $this->input->post('speach');
			$config_info['address'] = $this->input->post('address');	


			$id = $this->input->post('id');
			$this->site_config_model->edit($config_info, $id);

			$this->session->set_flashdata('success_message',' Site config has been saved.');
			redirect('admin/site_configs/article_config');

		}else{
			$db_data['site_config'] = $this->site_config_model->get_site_config('home');        
			$data['content'] = $this->load->view('admin/site_config/article_config_form',$db_data,true);
			//----- this is for breadcrumbs
			$breadcrumbs['breadcrumbs'][]=array('text'=>'site_configs','href'=>'');
			$data['breadcrumbs']=$this->load->view('admin/layout/breadcrumbs',$breadcrumbs,true);
			$data['page_header']="site_configs";
			//------- end breadcrumbs
			$data['active_menu']='site_configs';
			$this->load->view('admin/layout/default',$data);
		}
	}


	



}







/* End of file home.php */



/* Location: ./application/controllers/home.php */