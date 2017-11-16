<?=$upload_img_modal?>
<div id="profile-name">
	<i class="fa fa-2x fa-pencil-square-o"></i>
	<span class="divider"></span>
	<p class="profile-name"><?php echo $user->first_name.' '.$user->last_name ?></p>
</div>
<div class="profile-name-form text-center">
	<?php echo form_open('users/update_name/'.$user->id); ?>
	<div class="form-group profile-name-input">
	<?php echo form_label('First Name', 'first_name', ['class' => 'profile-name-label']); ?>
	<?php $data = array('class' => 'form-control focus',
						'name' => 'first_name',
						'placeholder' => $user->first_name
						);?>
	<?php echo form_input($data); ?>
	</div>
	<div class="form-group profile-name-input">
	<?php echo form_label('Last Name', 'last_name', ['class' => 'profile-name-label']) ?>
	<?php $data = array('class' => 'form-control',
						'name' => 'last_name',
						'placeholder' => $user->last_name
						);?>
	<?php echo form_input($data); ?>
	</div>
	<div class="form-group profile-name-submit">
	<?php $data = array('class' => 'btn btn-primary',
						'name' => 'submit',
						'value' => 'Change Name'
						);?>
	<?php echo form_submit($data); ?>
	</div>
	<?php echo form_close()?>
</div>
<img class="img-responsive profile-img" user-id="<?php echo $user->id; ?>" src="../../userimg/<?php echo $user->img ?>"></img>
<?php echo form_open('users/update/'.$user->id, ['class' => 'profile-form']); ?>
<div class="form-group">
	<?php echo form_label('Username') ?>
	<?php $data = array('class' => 'form-control',
						'name' => 'username',
						'value' => $user->username
						);?>
	<?php echo form_input($data); ?>
</div>
<div class="form-group">
	<?php echo form_label('Email') ?>
	<?php $data = array('class' => 'form-control',
						'name' => 'email',
						'value' => $user->email
						);?>
	<?php echo form_input($data); ?>
</div>
<div class="form-group">
	<?php echo form_label('Password') ?>
	<?php $data = array('class' => 'form-control',
						'name' => 'password',
						'type' => 'password'
						);?>
	<?php echo form_input($data); ?>
</div>
<div class="form-group">
	<?php echo form_label('Confirm Password') ?>
	<?php $data = array('class' => 'form-control',
						'name' => 'confirm_password',
						'type' => 'password'
						);?>
	<?php echo form_input($data); ?>
</div>
<div class="form-group text-center">
	<?php $data = array('class' => 'btn btn-primary',
						'name' => 'submit',
						'value' => 'Update'
						);?>
	<?php echo form_submit($data); ?>
</div>
<?php echo form_close()?>