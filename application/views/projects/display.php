<?php if($this->session->flashdata('mark_complete')): ?>
<p class="bg-success">
	<?php echo $this->session->flashdata('mark_complete'); ?>
</p>
<?php endif; ?>
<?php if($this->session->flashdata('mark_incomplete')): ?>
<p class="bg-danger">
	<?php echo $this->session->flashdata('mark_incomplete'); ?>
</p>
<?php endif; ?>
<div class="col-xs-9">
	<h1><?php echo $project_data->project_name; ?><small class="pull-right"><?php echo $project_data->date_created ?></small></h1>
	<p><?php echo $project_data->project_body; ?></p>
	<h3>Active Tasks</h3>
		<?php if ($completed_tasks): ?>
		<?php foreach ($completed_tasks as $task): ?>
			<li class="project_display">
				<a href="<?php echo base_url(); ?>tasks/display/<?php echo $task->task_id; ?>"><?php echo $task->task_name; ?></a>
				<a class="btn btn-danger btn-sm pull-right" href="<?php echo base_url(); ?>tasks/delete/<?php echo $task->task_id; ?>"><span class="glyphicon glyphicon-remove"></span></a>
				<a class="btn btn-primary btn-sm pull-right" href="<?php echo base_url(); ?>tasks/edit/<?php echo $task->task_id; ?>"><span class="glyphicon glyphicon-edit"></span></a>
			</li>
		<?php endforeach ?>
	<?php else: ?>
		<p>You have no tasks pending</p>
	<?php endif ?>
	<h3>Completed Tasks</h3>
	<?php if ($not_completed_tasks): ?>
		<?php foreach ($not_completed_tasks as $task): ?>
			<li class="project_display">
				<a href="<?php echo base_url(); ?>tasks/display/<?php echo $task->task_id; ?>"><?php echo $task->task_name; ?></a>
				<a class="btn btn-danger btn-sm pull-right" href="<?php echo base_url(); ?>tasks/delete/<?php echo $task->task_id; ?>"><span class="glyphicon glyphicon-remove"></span></a>
				<a class="btn btn-primary btn-sm pull-right" href="<?php echo base_url(); ?>tasks/edit/<?php echo $task->task_id; ?>"><span class="glyphicon glyphicon-edit"></span></a>
			</li>
		<?php endforeach ?>
	<?php else: ?>
		<p>You have no completed tasks</p>
	<?php endif ?>
</div>
<div class="col-xs-3 pull-right">
	<ul class="list-group">
		<h4>Project Actions</h4>
		<li class="list-group-item"><a href="<?php echo base_url(); ?>tasks/create/<?php echo $project_data->id; ?>">Create Task</a></li>
		<li class="list-group-item"><a href="<?php echo base_url(); ?>tasks/project_tasks/<?php echo $project_data->id; ?>">View Tasks</a></li>
		<li class="list-group-item"><a href="<?php echo base_url(); ?>projects/edit/<?php echo $project_data->id; ?>">Edit Project</a></li>
		<li class="list-group-item"><a href="<?php echo base_url(); ?>projects/delete/<?php echo $project_data->id; ?>">Delete Project</a></li>
	</ul>
</div>