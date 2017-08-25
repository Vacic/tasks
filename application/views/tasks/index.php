<?php if ($this->session->flashdata('task_updated')): ?>
	<p class="bg-success"><?php echo $this->session->flashdata('task_updated'); ?></p>
<?php elseif ($this->session->flashdata('task_deleted')): ?>
	<p class="bg-danger"><?php echo $this->session->flashdata('task_deleted'); ?></p>
<?php endif; ?>
<h1>Your Tasks</h1>
<table class="table table-hover text-center">
	<thead>
		<tr>
			<th>Task Name</th>
			<th>From Project</th>
			<th>To do:</th>
			<th>Creation Date</th>
			<th>Due Date</th>
			<th></th>
			<th></th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($tasks as $task): ?>
			<tr>
				<td><?php echo $task->task_name; ?></td>
				<td><a href="<?php echo base_url(); ?>projects/display/<?php echo $task->task_project_id; ?>"><?php echo $this->Project_model->get_project_name($task->task_project_id); ?></a></td>
				<td><?php echo $task->task_body; ?></td>
				<td><?php echo $task->date_created; ?><div class="date-space"></div></td>
				<td><?php echo $task->due_date; ?><div class="date-space"></div></td>
				<td><a class="btn btn-primary" href="<?php echo base_url(); ?>tasks/display/<?php echo $task->id; ?>">View</a></td>
				<td><a class="btn btn-primary" href="<?php echo base_url(); ?>tasks/edit/<?php echo $task->id; ?>"><span class="glyphicon glyphicon-edit"></span></a></td>
				<td><a class="btn btn-danger" href="<?php echo base_url(); ?>tasks/delete/<?php echo $task->id; ?>"><span class="glyphicon glyphicon-remove"></span></a></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>