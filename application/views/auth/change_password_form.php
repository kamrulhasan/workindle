<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>
<link href="<?php echo base_url();?>assets/css/auth.css" media="all" rel="stylesheet" type="text/css"/>

<?php
$old_password = array(
	'name'	=> 'old_password',
	'id'	=> 'old_password',
	'value' => set_value('old_password'),
	'size' 	=> 30,
	'class'	=> 'small input-text',
);
$new_password = array(
	'name'	=> 'new_password',
	'id'	=> 'new_password',
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
	'class'	=> 'small input-text',
);
$confirm_new_password = array(
	'name'	=> 'confirm_new_password',
	'id'	=> 'confirm_new_password',
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size' 	=> 30,
	'class'	=> 'small input-text',
);
?>


<div id="wrapper">
	<div class="slim container">
		<div class="row">
			<div class="box01">
				<div class="login-window">
					<div id="header">
						<h1>Change Password</h1>
					</div>

					<div class="left10">

						<?php echo form_open($this->uri->uri_string(), array('class'=>'nicely')); ?>
							<?php echo form_label('Old Password', $old_password['id']); ?>
							<?php echo form_password($old_password); ?>
							<span style="color:red;"><?php echo form_error($old_password['name']); ?><?php echo isset($errors[$old_password['name']])?$errors[$old_password['name']]:''; ?></span>
							

							<?php echo form_label('New Password', $new_password['id']); ?>
							<?php echo form_password($new_password); ?>
							<span style="color:red;"><?php echo form_error($confirm_new_password['name']); ?><?php echo isset($errors[$confirm_new_password['name']])?$errors[$confirm_new_password['name']]:''; ?></span>
							
							<?php echo form_label('Confirm New Password', $confirm_new_password['id']); ?>
							<?php echo form_password($confirm_new_password); ?>
							<?php echo form_error($confirm_new_password['name']); ?><?php echo isset($errors[$confirm_new_password['name']])?$errors[$confirm_new_password['name']]:''; ?>
							
							<div class="logbtn logbtn_margin">
								<input type="submit" name="change" class="btn btn-primary" value="Change Password" />
							</div>
						</form>
					</div>
					
					<!-- > Button -->
				
				</div>

		    

			</div>
		</div>
	</div>
</div>

