<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Registration extends CI_Controller {  
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
		$this->load->model('category_model');

	}

	


	function index()
	{

		//============
		//echo $this->passwordGenerate();exit;
		if ($this->input->post('regiSubmitBtn')) {
			$this->load->library( 'form_validation' );
			$this->form_validation->set_rules('email', 'Email', 'trim|required|callback_check_duplicate');

			if($this->form_validation->run()) {

				$email=$this->input->post('email');
				$category_id = $this->input->post('category_id');
				$man_info['email'] = $email;
				$man_info['name'] = $this->input->post('name');
				$man_info['age'] = $this->input->post('age');
				$man_info['english'] = $this->input->post('english');
				$man_info['nationality'] = $this->input->post('nationality');
				//$man_info['school'] = $this->input->post('school');
				//$man_info['experience'] = rtrim(implode(", ", $this->input->post('experience')), ",");
				//$man_info['candidate_to'] = trim(implode(", ", $this->input->post('candidate_to')), ",");
				$man_info['gender'] = $this->input->post('gender');
				$man_info['description'] = $this->input->post('description');
				$man_info['video_link'] = $this->input->post('video_link');
				$man_info['category_id'] = $category_id;

				
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
				$password = $this->passwordGenerate();
				$man_info['pasword']= md5($password);
				$insertId = $this->candidate_model->add_registration($man_info);

				$cateName = $this->category_model->get_twoLettCategoryName($category_id);
				$update_data['reg_id'] = get_reg_id($insertId, $cateName);
				$this->candidate_model->update_registration($update_data, $insertId);

				//===============
				$userData['manpower_id']= $insertId;
				$userData['password']= $password;
				$userData['email']= $email;
				$this->session->set_userdata($userData);

				$to = $email; 
				$from = "kamrulhsn10@gmail.com";
				$subject="Registration";
				$message = '<table> <tr><td colspan="2">Dear user your registration has been complated.</td></tr>';
				$message .= '<tr><td style="width:100px;">Email:</td><td>'.$email.'</td></tr>';
				$message .= '<tr><td>Password:</td><td>'.$password.'</td></tr>';
				$message .= '<tr><td colspan="2">
				----------------------------	 <br/>
				Thanks and Regards, <br/>
				Italian manpower agency
				</td></tr>';
				$message .= '</table>';

				
				$headers = "From: " . $from . "\r\n";
				$headers .= "MIME-Version: 1.0\r\n";
				$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
				
								
				//@mail($to, $subject, $message, $headers);


				//===============

				$this->session->set_flashdata('success_message',' Registration has been complated. admin will approve');
				redirect('profile');

			} else {
				$site_config= [];
				$db_data['services'] = '';
				$db_data['categories'] = $this->category_model->get_categories();
				$data['content'] = $this->load->view('registration',$db_data,true);
				$data['page_title']='';
				$data['meta_title']='';
				$data['meta_des']='';
				$data['active_menu']='home';
				$this->load->view('layout/default',$data);
			}		
			

		}else{

			$site_config= [];
			$db_data['services'] = '';
			$db_data['categories'] = $this->category_model->get_categories();
			$data['content'] = $this->load->view('registration',$db_data,true);
			$data['page_title']='';
			$data['meta_title']='';
			$data['meta_des']='';
			$data['active_menu']='home';
			$this->load->view('layout/default',$data);
		}	

	}

	function passwordGenerate()
	{
		$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
	    $pass = array(); //remember to declare $pass as an array
	    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
	    for ($i = 0; $i < 5; $i++) {
	        $n = rand(0, $alphaLength);
	        $pass[] = $alphabet[$n];
	    }
	    return implode($pass); //turn the array into a string
	}
	

	

	function check_duplicate($str)
	{
		$email=$this->input->post('email');
		$this->db->select('count(*) as num');
		$this->db->where('email',$email);
		$this->db->from('man_powers');
		$query=$this->db->get();
		$res=$query->row();		
		if($res->num > 0)
		{
			$this->form_validation->set_message('check_duplicate', 'This Email already used , please try with another.');
			return FALSE;
		} 
		else
		{
			return true;
		}  

	}
	



}







/* End of file home.php */



/* Location: ./application/controllers/home.php */