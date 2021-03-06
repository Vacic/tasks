<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dropzone.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/font-awesome-4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/my.css">
		<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/my.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/dropzone.js"></script>
		<script src="<?php echo base_url(); ?>assets/js-webshim/minified/polyfiller.js"></script>
	</head>
	<body>
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?php echo base_url(); ?>">Ci APP</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li><a href="<?php echo base_url(); ?>">Home</a></li>
						<li><a href="<?php echo base_url(); ?>projects">Projects</a></li>
						<li><a href="<?php echo base_url(); ?>tasks">Tasks</a></li>
					</ul>
					<?php if(!$this->session->userdata('logged_in')): ?>
						<ul class="nav navbar-nav navbar-right">
							<li><a href="<?php echo base_url(); ?>users/register">Register</a></li>
						</ul>
					<?php endif; ?>
					<?php if($this->session->userdata('logged_in')): ?>
						<ul class="nav navbar-nav navbar-right">
							<li><a href="<?php echo base_url(); ?>users/profile/<?php echo $this->session->userdata('user_id'); ?>">Profile</a></li>
							<li><a href="<?php echo base_url(); ?>users/logout">Logout</a></li>
						</ul>
					<?php endif; ?>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>
		<div class="container">
			<div class="message"><?=$this->session->flashdata('msg')?></div>
			<?php if (!$this->session->userdata('logged_in')): ?>
				<div class="col-xs-3">
					<?php $this->load->view('users/login_view'); ?>
				</div>
			<?php endif; ?>
			<div class="<?php 
							if ($this->session->userdata('logged_in')&&($main_view!='users/profile_view')) {
								echo 'col-xs-12';
							} elseif ($main_view ==='users/profile_view') {
								echo 'col-xs-8 col-xs-offset-2';
							} else {
								echo 'col-xs-8 col-xs-offset-1';
							}
						?>">
				<?php $this->load->view($main_view);?>
			</div>
		</div>
	</body>
</html>