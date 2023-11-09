<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



class Auth extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$site_config;
		$this->site_config= get_site_config('home');
		$this->load->model('auth_model');
	}


	function index()
	{	
		
		if ($message = $this->session->flashdata('message')) {
			$data['message']=$message;
			$final_data['content']=$this->load->view('auth/general_message',$data,true);
			$final_data['page_header']="Login";
			$final_data['meta_title']="Login";
			$final_data['active_menu']='auth';
			$this->load->view('layout/default',$final_data);
		} else {
			redirect('/auth/login/');
		}

	}



	/**

	 * Login user on the site

	 *

	 * @return void

	 */

	function login()
	{
		if($this->input->post('user_login'))
		{
			$data['email']=$this->input->post('email');
			$data['password']=md5($this->input->post('password'));
			$res=$this->auth_model->signin($data);		
			
			if($res)
			{
				$this->session->set_flashdata('success_message',' Registration has been complated. admin will approve.');
				redirect('profile');
			}
			else
			{
				$this->session->set_flashdata('error_message',' Username or password does not match.');
				redirect('auth/login');
			}
		}
		else
		{
			$data=array();
			$final_data['content']=$this->load->view('auth/login_form',$data,true);
			$final_data['page_title']="Login";
			$final_data['meta_title']="Login";
			$final_data['active_menu']='auth';
			$this->load->view('layout/default',$final_data);
		}
	}



	/**

	 * Logout user

	 *

	 * @return void

	 */

	function logout()
	{
		$this->session->sess_destroy();
		redirect ('home');

	}



	function register()
	{
		if($this->input->post('signup'))
		{
			$this->load->library( 'form_validation' );
			$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
			$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|callback_check_duplicate');
			if($this->form_validation->run()) 
			{
				$user_info['email']=$this->input->post('email');
				$user_info['first_name']=$this->input->post('first_name');
				$user_info['last_name']=$this->input->post('last_name');
				$user_info['password']=md5($this->input->post('password'));
				$user_info['company']=$this->input->post('company');
				
				$name=$user_info['first_name']." ".$user_info['last_name'];
				$company=$user_info['company'];
				$email=$user_info['email'];
				
				
				$insert_id=$this->auth_model->add_signup($user_info);
				
				$to="kamrulhsn10@gmail.com,clippingpathfamous@gmail.com,farhadakanda87@gmail.com"; 
				 $from=$user_info['email'];
				 $subject="New Registration";
				//begin of HTML message
				 $message="
					Dear clippingpathfamous Team, <br/>
					New registration has been made. Please check below details: <br/>
					<b>Name: </b> $name <br/>
					<b>Email: </b> $email <br/>
					<b>Company: </b> $company <br/>
		
					
					<br/>
					
					----------------------------	 <br/>
					Thanks and Regards, <br/>
					clippingpathfamous.
													  
				 ";
				 
				 //end of message
				 $headers  = "From: $from\r\n";
				 $headers .= "Content-type: text/html\r\n";
				 // now lets send the email.
				 @mail($to, $subject, $message, $headers);
			 
				$this->session->set_flashdata('success_message',' Register has been successfully complated.');
				redirect('auth/register');
			}
			else
			{
				$data['use_username'] ="";
				$final_data['content']=$this->load->view('auth/register_form',$data,true);
				$final_data['page_title']="Create New Account";
				$final_data['meta_title']="Signup";
				$final_data['active_menu']='auth';
				$this->load->view('layout/default',$final_data);
			}
			
		}
		else
		{
			$data['use_username'] ="";
			$final_data['content']=$this->load->view('auth/register_form',$data,true);
			$final_data['page_title']="Create New Account";
			$final_data['meta_title']="Signup";
			$final_data['active_menu']='auth';
			$this->load->view('layout/default',$final_data);
		}
	}
	
	
	function check_duplicate($str)
	{
		$email=$this->input->post('email');
		$this->db->select('count(*) as num');
		$this->db->where('email',$email);
		$this->db->from('users');
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



	/**

	 * Send activation email again, to the same or new email address

	 *

	 * @return void

	 */

	function send_again()

	{

		if (!$this->tank_auth->is_logged_in(FALSE)) {							// not logged in or activated

			redirect('/auth/login/');



		} else {

			$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');



			$data['errors'] = array();



			if ($this->form_validation->run()) {								// validation ok

				if (!is_null($data = $this->tank_auth->change_email(

						$this->form_validation->set_value('email')))) {			// success



					$data['site_name']	= $this->config->item('website_name', 'tank_auth');

					$data['activation_period'] = $this->config->item('email_activation_expire', 'tank_auth') / 3600;



					$this->_send_email('activate', $data['email'], $data);



					$this->_show_message(sprintf($this->lang->line('auth_message_activation_email_sent'), $data['email']));



				} else {

					$errors = $this->tank_auth->get_error_message();

					foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);

				}

			}

			$this->load->view('auth/send_again_form', $data);

		}

	}



	/**

	 * Activate user account.

	 * User is verified by user_id and authentication code in the URL.

	 * Can be called by clicking on link in mail.

	 *

	 * @return void

	 */

	function activate()

	{

		$user_id		= $this->uri->segment(3);

		$new_email_key	= $this->uri->segment(4);



		// Activate user

		if ($this->tank_auth->activate_user($user_id, $new_email_key)) {		// success

			$this->tank_auth->logout();

			$this->_show_message($this->lang->line('auth_message_activation_completed').' '.anchor('/auth/login/', 'Login'));



		} else {																// fail

			$this->_show_message($this->lang->line('auth_message_activation_failed'));

		}

	}



	/**

	 * Generate reset code (to change password) and send it to user

	 *

	 * @return void

	 */

	



	/**

	 * Replace user password (forgotten) with a new one (set by user).

	 * User is verified by user_id and authentication code in the URL.

	 * Can be called by clicking on link in mail.

	 *

	 * @return void

	 */

	function forgot_password($msg="")
	{
		if($this->input->post('forgot_password'))
		{ 
			$email=$this->input->post('email');
			$userinfo=$this->auth_model->get_user_by_email($email);
			if($userinfo)
			{

				 $str=$this->random_string();
				 $user_info['token']=$str;
				 $this->auth_model->update_user($user_info,$userinfo->user_id);
				//------------------

				

				$to=$email;
				$from="clippingpathfamous@info.com";		 
				$subject="Forgot Password";			
				$url=site_url()."auth/retrieve_password/".$userinfo->user_id."/".$str; 
				$message="<p>Dear User </p>
					  <p>You can change password by clicking bellow link: </p>
					 <p><a href=\"$url\">Click here change password</a></p>
				";			

				

				$headers = "MIME-Version: 1.0\r\n"; 	
				$headers.= "Content-type: text/html; charset=iso-8859-1\r\n"; 
				$headers.= "From: clippingpathfamous <$from>\r\n";
				@mail($to,$subject,$message,$headers);

				//---------------------		
				$this->session->set_flashdata('success_message'," Please check  email to change your password.");
				redirect ('auth/forgot_password');

			}

			else

			{


				$db_data['msg']=$msg;
				$data['content']=$this->load->view('auth/forgot_password',$db_data,true);
				$data['active_menu']='auth';
				$data['page_header']="Forgot Password";
				$this->load->view('layout/default',$data);	

				

			}

		}

		else

		{


			$db_data['msg']=$msg;
			$data['content']=$this->load->view('auth/forgot_password',$db_data,true);
			$data['active_menu']='auth';
			$data['page_header']="Forgot Password";
			$this->load->view('layout/default',$data);
		}

	}
	
	
	function retrieve_password($user_id,$str='')
	{
		if($this->input->post('update'))
		{

			$this->load->library( 'form_validation' );			
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			if($this->form_validation->run()) 
			{

				$update_user['password']=md5($this->input->post('password'));
				$update_user['token']='';
				$this->auth_model->update_user($update_user,$user_id);

				$this->session->set_flashdata('success_message'," Your password has been successfully changed.");
				redirect ('auth/forgot_password');

			}

			else
			{
				$user_info=$this->auth_model->has_token($str);
				if(empty($user_info))
				{
					 $this->session->set_flashdata('error_message',"  Link is expired.");
					 redirect ('auth/forgot_password');
				}

				$db_data['user_info']=$user_info;
				$data['content'] = $this->load->view('auth/retrieve_password',$db_data,true);
				$db_data['page_header']="Change Password";
				$data['active_menu']='auth';
				$this->load->view('layout/default',$data);

			}

		}

		else
		{
			$user_info=$this->auth_model->has_token($str);
			if(empty($user_info))
			{
				 $this->session->set_flashdata('error_message',"  Link is expired.");
				 redirect ('auth/forgot_password');
			}

			$db_data['user_info']=$user_info;
			$data['content'] = $this->load->view('auth/retrieve_password',$db_data,true);
			$db_data['page_header']="Change Password";
			$data['active_menu']='auth';
			$this->load->view('layout/default',$data);
		}

	}

	

	function random_string() 

	{

		$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";

		$pass = array(); //remember to declare $pass as an array

		$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache

		for ($i = 0; $i < 8; $i++) {

			$n = rand(0, $alphaLength);

        $pass[] = $alphabet[$n];

		}

		return implode($pass); //turn the array into a string

	}



	/**

	 * Change user password

	 *

	 * @return void

	 */

	function change_password()

	{

		if (!$this->tank_auth->is_logged_in()) {								// not logged in or not activated

			redirect('/auth/login/');



		} else {

			$this->form_validation->set_rules('old_password', 'Old Password', 'trim|required');

			$this->form_validation->set_rules('new_password', 'New Password', 'trim|required|min_length['.$this->config->item('password_min_length', 'tank_auth').']|max_length['.$this->config->item('password_max_length', 'tank_auth').']|alpha_dash');

			$this->form_validation->set_rules('confirm_new_password', 'Confirm new Password', 'trim|required|matches[new_password]');



			$data['errors'] = array();



			if ($this->form_validation->run()) {								// validation ok

				if ($this->tank_auth->change_password(

						$this->form_validation->set_value('old_password'),

						$this->form_validation->set_value('new_password'))) {	// success

					$this->_show_message($this->lang->line('auth_message_password_changed'));



				} else {														// fail

					$errors = $this->tank_auth->get_error_message();

					foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);

				}

			}

			//$this->load->view('auth/change_password_form', $data);

			$final_data['content']=$this->load->view('auth/change_password_form',$data,true);

			$final_data['page_title']="Change Password";

			$final_data['meta_title']="Change Password";

			$final_data['active_menu']='auth';

			$this->load->view('layout/default',$final_data);

		}

	}



	/**

	 * Change user email

	 *

	 * @return void

	 */

	function change_email()

	{

		if (!$this->tank_auth->is_logged_in()) {								// not logged in or not activated

			redirect('/auth/login/');



		} else {

			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

			$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');



			$data['errors'] = array();



			if ($this->form_validation->run()) {								// validation ok

				if (!is_null($data = $this->tank_auth->set_new_email(

						$this->form_validation->set_value('email'),

						$this->form_validation->set_value('password')))) {			// success



					$data['site_name'] = $this->config->item('website_name', 'tank_auth');



					// Send email with new email address and its activation link

					$this->_send_email('change_email', $data['new_email'], $data);



					$this->_show_message(sprintf($this->lang->line('auth_message_new_email_sent'), $data['new_email']));



				} else {

					$errors = $this->tank_auth->get_error_message();

					foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);

				}

			}

			$this->load->view('auth/change_email_form', $data);

		}

	}



	/**

	 * Replace user email with a new one.

	 * User is verified by user_id and authentication code in the URL.

	 * Can be called by clicking on link in mail.

	 *

	 * @return void

	 */

	function reset_email()

	{

		$user_id		= $this->uri->segment(3);

		$new_email_key	= $this->uri->segment(4);



		// Reset email

		if ($this->tank_auth->activate_new_email($user_id, $new_email_key)) {	// success

			$this->tank_auth->logout();

			$this->_show_message($this->lang->line('auth_message_new_email_activated').' '.anchor('/auth/login/', 'Login'));



		} else {																// fail

			$this->_show_message($this->lang->line('auth_message_new_email_failed'));

		}

	}



	/**

	 * Delete user from the site (only when user is logged in)

	 *

	 * @return void

	 */

	function unregister()

	{

		if (!$this->tank_auth->is_logged_in()) {								// not logged in or not activated

			redirect('/auth/login/');



		} else {

			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');



			$data['errors'] = array();



			if ($this->form_validation->run()) {								// validation ok

				if ($this->tank_auth->delete_user(

						$this->form_validation->set_value('password'))) {		// success

					$this->_show_message($this->lang->line('auth_message_unregistered'));



				} else {														// fail

					$errors = $this->tank_auth->get_error_message();

					foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);

				}

			}

			$this->load->view('auth/unregister_form', $data);

		}

	}



	/**

	 * Show info message

	 *

	 * @param	string

	 * @return	void

	 */

	function _show_message($message)

	{

		$this->session->set_flashdata('message', $message);

		redirect('/auth/');

	}



	/**

	 * Send email message of given type (activate, forgot_password, etc.)

	 *

	 * @param	string

	 * @param	string

	 * @param	array

	 * @return	void

	 */

	function _send_email($type, $email, &$data)

	{

		$this->load->library('email');

		$this->email->from($this->config->item('webmaster_email', 'tank_auth'), $this->config->item('website_name', 'tank_auth'));

		$this->email->reply_to($this->config->item('webmaster_email', 'tank_auth'), $this->config->item('website_name', 'tank_auth'));

		$this->email->to($email);

		$this->email->subject(sprintf($this->lang->line('auth_subject_'.$type), $this->config->item('website_name', 'tank_auth')));

		$this->email->message($this->load->view('email/'.$type.'-html', $data, TRUE));

		$this->email->set_alt_message($this->load->view('email/'.$type.'-txt', $data, TRUE));

		$this->email->send();

	}



	/**

	 * Create CAPTCHA image to verify user as a human

	 *

	 * @return	string

	 */

	function _create_captcha()

	{

		$this->load->helper('captcha');

		//echo base_url().$this->config->item('captcha_path', 'tank_auth');

		$cap = create_captcha(array(

			'img_path'		=> './'.$this->config->item('captcha_path', 'tank_auth'),

			'img_url'		=> base_url().$this->config->item('captcha_path', 'tank_auth'),

			'font_path'		=> './'.$this->config->item('captcha_fonts_path', 'tank_auth'),

			'font_size'		=> $this->config->item('captcha_font_size', 'tank_auth'),

			'img_width'		=> $this->config->item('captcha_width', 'tank_auth'),

			'img_height'	=> $this->config->item('captcha_height', 'tank_auth'),

			'show_grid'		=> $this->config->item('captcha_grid', 'tank_auth'),

			'expiration'	=> $this->config->item('captcha_expire', 'tank_auth'),

		));



		// Save captcha params in session

		$this->session->set_flashdata(array(

				'captcha_word' => $cap['word'],

				'captcha_time' => $cap['time'],

		));

		

		//print_r($cap);

		return $cap['image'];

	}



	/**

	 * Callback function. Check if CAPTCHA test is passed.

	 *

	 * @param	string

	 * @return	bool

	 */

	function _check_captcha($code)

	{

		$time = $this->session->flashdata('captcha_time');

		$word = $this->session->flashdata('captcha_word');



		list($usec, $sec) = explode(" ", microtime());

		$now = ((float)$usec + (float)$sec);



		if ($now - $time > $this->config->item('captcha_expire', 'tank_auth')) {

			$this->form_validation->set_message('_check_captcha', $this->lang->line('auth_captcha_expired'));

			return FALSE;



		} elseif (($this->config->item('captcha_case_sensitive', 'tank_auth') AND

				$code != $word) OR

				strtolower($code) != strtolower($word)) {

			$this->form_validation->set_message('_check_captcha', $this->lang->line('auth_incorrect_captcha'));

			return FALSE;

		}

		return TRUE;

	}



	/**

	 * Create reCAPTCHA JS and non-JS HTML to verify user as a human

	 *

	 * @return	string

	 */

	function _create_recaptcha()

	{

		$this->load->helper('recaptcha');



		// Add custom theme so we can get only image

		$options = "<script>var RecaptchaOptions = {theme: 'custom', custom_theme_widget: 'recaptcha_widget'};</script>\n";



		// Get reCAPTCHA JS and non-JS HTML

		$html = recaptcha_get_html($this->config->item('recaptcha_public_key', 'tank_auth'));



		return $options.$html;

	}



	/**

	 * Callback function. Check if reCAPTCHA test is passed.

	 *

	 * @return	bool

	 */

	function _check_recaptcha()

	{

		$this->load->helper('recaptcha');



		$resp = recaptcha_check_answer($this->config->item('recaptcha_private_key', 'tank_auth'),

				$_SERVER['REMOTE_ADDR'],

				$_POST['recaptcha_challenge_field'],

				$_POST['recaptcha_response_field']);



		if (!$resp->is_valid) {

			$this->form_validation->set_message('_check_recaptcha', $this->lang->line('auth_incorrect_captcha'));

			return FALSE;

		}

		return TRUE;

	}



}



/* End of file auth.php */

/* Location: ./application/controllers/auth.php */