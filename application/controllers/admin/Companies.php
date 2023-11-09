<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Companies extends CI_Controller {
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
		$this->load->model('admin/company_model');
	}

	function index()
	{
        $db_data['companies'] = $this->company_model->get_companies();        
		$data['content'] = $this->load->view('admin/company/list',$db_data,true);
		//----- this is for breadcrumbs
		$breadcrumbs['breadcrumbs'][]=array('text'=>'Company list','href'=>'');
		$data['breadcrumbs']=$this->load->view('admin/layout/breadcrumbs',$breadcrumbs,true);
		$data['page_header']="company";
		//------- end breadcrumbs
		$data['active_menu']='company';
		$this->load->view('admin/layout/default',$data); 
	}

	function delete($id)
	{
		$this->company_model->delete($id);
		$this->session->set_flashdata('success_message',' Company request has been Deleted');
		redirect('admin/companies');
	}

	

	

	



}







/* End of file home.php */



/* Location: ./application/controllers/home.php */