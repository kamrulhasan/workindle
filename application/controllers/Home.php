<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Home extends CI_Controller {  
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
		$this->load->model('home_model');		
	}

	function index($page=0)
	{
		$site_config= [];
		$db_data['services'] = '';
		$data['content'] = $this->load->view('home',$db_data,true);
		$data['page_title']='';
		$data['meta_title']='';
		$data['meta_des']='';
		$data['active_menu']='home';
		$this->load->view('layout/default',$data);

	}

	
	

	

	



}







/* End of file home.php */



/* Location: ./application/controllers/home.php */