<?=$upload_img_modal?>
<p class="text-center bg-fail"><?=$this->session->flashdata('error')?></p>
<p class="profile-name"><?php echo $user->first_name.' '.$user->last_name ?></p>
<a class="upload-img" href="javascript:void()" user-id="<?php echo $user->id; ?>"><img class="img-responsive profile-img" src="../../userimg/<?php echo $user->img ?>"></img></a>
<?php echo form_open('users/update/'.$user->id); ?>
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