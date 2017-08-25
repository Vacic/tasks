<?php if($this->session->userdata('logged_in')): ?>
<h2>Logout</h2>
<p class="bg-success">
	<?php if($this->session->flashdata('login_success')): ?>
		<?php echo $this->session->flashdata('login_success'); ?>
	<?php endif; ?>
</p>
<p><?php echo "Welcome, " .$this->session->userdata('username'); ?></p>
<?php echo form_open('users/logout'); ?>
	<?php 
		$data = array(
			'class' => 'btn btn-primary',
			'name' => 'submit',
			'value' => 'Logout'
		); 
	?>
	<?php echo form_submit($data); ?>
<?php echo form_close(); ?>
<?php else: ?>
<p class="bg-danger">
	<?php if($this->session->flashdata('login_failed')): ?>
		<?php echo $this->session->flashdata('login_failed'); ?>
	<?php endif; ?>
</p>
<h2>Login form</h2>
<?php $attributes = array('id' => 'login_form', 'class' => 'form-horizontal'); ?>
<?php if($this->session->flashdata('errors')): ?>
<?php echo $this->session->flashdata('errors'); ?>
<?php endif; ?>
<?php echo form_open('users/login', $attributes); ?>
<div class="form-group">
	<?php echo form_label('Username'); ?>
	<?php $data = array('class' => 'form-control',
						'name' => 'username',
						'placeholder' => 'Enter Username');
	?>
	<?php echo form_input($data); ?>
</div>
<div class="form-group">
	<?php echo form_label('Password'); ?>
	<?php $data = array('class' => 'form-control',
						'placeholder' => 'Enter Password',
						'name' => 'password'); ?>
	<?php echo form_password($data); ?>
</div>
<div class="form-group">
	<?php $data = array('class' => 'form-control',
						'placeholder' => 'Confirm Password',
						'name' => 'confirm_password'); ?>
	<?php echo form_password($data); ?>
</div>
<div class="form-group">
	<?php $data = array('class' => 'btn btn-primary',
						'name' => 'submit',
						'value' => 'Login'); ?>
	<?php echo form_submit($data); ?>
</div>
<?php echo form_close(); ?>
<?php endif; ?>