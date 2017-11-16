<h2>Register</h2>
<?php $attributes = array('id' => 'register_form', 'class' => 'form-horizontal'); ?>
<?php echo form_open('users/reg', $attributes); ?>
<div class="form-group">
	<?php echo form_label('First Name'); ?>
	<?php $data = array('class' => 'form-control',
						'name' => 'first_name',
						'placeholder' => 'First Name',
						'value' => set_value('first_name'));
	?>
	<?php echo form_input($data); ?>
</div>
<div class="form-group">
	<?php echo form_label('Last Name'); ?>
	<?php $data = array('class' => 'form-control',
						'name' => 'last_name',
						'placeholder' => 'Last Name',
						'value' => set_value('last_name'));
	?>
	<?php echo form_input($data); ?>
</div>
<div class="form-group">
	<?php echo form_label('Email'); ?>
	<?php $data = array('class' => 'form-control',
						'name' => 'email',
						'placeholder' => 'Email',
						'value' => set_value('$user->email'));
	?>
	<?php echo form_input($data); ?>
</div>
<div class="form-group">
	<?php echo form_label('Username'); ?>
	<?php $data = array('class' => 'form-control',
						'name' => 'username',
						'placeholder' => 'Username',
						'value' => set_value('username'));
	?>
	<?php echo form_input($data); ?>
</div>
<div class="form-group">
	<?php echo form_label('Password'); ?>
	<?php $data = array('class' => 'form-control',
						'placeholder' => 'Password',
						'name' => 'password',
						'value' => set_value('password')); ?>
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
						'value' => 'Register'); ?>
	<?php echo form_submit($data); ?>
</div>
<?php echo form_close(); ?>