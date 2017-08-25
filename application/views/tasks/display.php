<h1><?php echo $task->task_name; ?></h1>
<table class="table table-hover text-center">
	<thead>
		<tr>
			<th>To do:</th>
			<th>Creation Date</th>
			<th>Due Date</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><?php echo $task->task_body; ?></td>
			<td><?php echo $task->date_created; ?></td>
			<td><?php echo $task->due_date; ?><div class="date-space"></div></td>
			<td><a href="<?php echo base_url(); ?>tasks/mark_complete/<?php echo $task->id; ?>">Mark Complete</a></td>
			<td><a href="<?php echo base_url(); ?>tasks/mark_incomplete/<?php echo $task->id; ?>">Mark Incomplete</a></td>
			<td><a class="btn btn-primary" href="<?php echo base_url(); ?>tasks/edit/<?php echo $task->id; ?>"><span class="glyphicon glyphicon-edit"></span></a></td>
			<td><a class="btn btn-danger" href="<?php echo base_url(); ?>tasks/delete/<?php echo $task->id; ?>"><span class="glyphicon glyphicon-remove"></span></a></td>
		</tr>
	</tbody>
</table>