<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Email extends CI_Controller {  
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
	}

	


	function index()
	{
		$password = "fgdgdg455"; 
		$to = "kamrulhsn10@gmail.com"; 
		$from = "kamrul.lori@gmail.com";
		$email = "kamrul.ff@gmail.com";
		$subject="Testing maila";
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
		
		//mail($to, $subject, 'This is testing mail');				
		mail($to, $subject, $message, $headers);	 

	}
	



}







/* End of file home.php */



/* Location: ./application/controllers/home.php */