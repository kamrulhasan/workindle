<?php
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'class'	=> 'small input-text',
);
if ($this->config->item('use_username', 'tank_auth')) {
	$login_label = 'Email or login';
} else {
	$login_label = 'Email';
}

$error_message = '';
if( form_error($login['name']) !=''){
$error_message = "<small class=\"error\">".str_replace("Login field", "Email field", form_error($login['name']) )."</small>";
}

if(isset($errors[$login['name']])){
$error_message .= "<small class=\"error\">".str_replace("Login", "Email", $errors[$login['name']] )."</small>";
}
?>

<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>
<link href="<?php echo base_url();?>assets/css/auth.css" media="all" rel="stylesheet" type="text/css"/>

<div id="wrapper">
	<div class="slim container">
		<div class="row">
			<div class="box01">
				<div class="login-window">
					<div id="header">
						<h1>Reset Password</h1>
					</div>
					
					<?php echo $error_message; ?>

					<div class="left10">

						<?php echo form_open($this->uri->uri_string(), array('class'=>'nicely')); ?>
							<?php echo form_label($login_label, $login['id']); ?>
							<?php echo form_input($login); ?>

							<div class="logbtn resetbtn_margin">
								<button type="submit" id="loginBtn" class="nice radius button white">Reset Password</button>
							</div>
						</form>
					</div>

				</div>



			</div>
		</div>
	</div>
</div>
