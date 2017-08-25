<?php if($this->session->flashdata('missing_variable')): ?>
<p class="bg-danger">
	<?php echo $this->session->flashdata('missing_variable'); ?>
</p>
<?php endif; ?>
<?php if($this->session->flashdata('user_registered')): ?>
<p class="bg-success">
	<?php echo $this->session->flashdata('user_registered'); ?>
</p>
<?php endif; ?>
<?php if($this->session->flashdata('no_access')): ?>
<p class="bg-danger">
	<?php echo $this->session->flashdata('no_access'); ?>
</p>
<?php endif; ?>
<?php if (!$this->session->userdata('logged_in')): ?>	
<div class="jumbotron">
	<h2 class="text-center">Welcome to the CI APP</h2>
</div>
<?php elseif ($this->session->userdata('logged_in')): ?>
<div class="jumbotron">
	<h2 class="text-center">Welcome to the CI APP, <?php echo $this->session->userdata('username') ?></h2>
</div>
<?php endif ?>