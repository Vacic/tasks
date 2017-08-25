<?php if ($this->session->flashdata('project_created')): ?>
	<p class="bg-success"><?php echo $this->session->flashdata('project_created'); ?></p>
<?php elseif ($this->session->flashdata('project_updated')): ?>
	<p class="bg-success"><?php echo $this->session->flashdata('project_updated'); ?></p>
<?php elseif ($this->session->flashdata('project_deleted')): ?>
	<p class="bg-danger"><?php echo $this->session->flashdata('project_deleted'); ?></p>
<?php endif; ?>
<h1>Projcets</h1>
<a href="<?php echo base_url(); ?>projects/create" class="btn btn-primary pull-right">Create Project</a>
<table class="table table-hover text-center">
	<thead>
		<tr>
			<th>Project</th>
			<th>About</th>
			<th>Creation Date</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($projects as $project): ?>
			<tr>
				<td><a href="<?php echo base_url(); ?>projects/display/<?php echo $project->id; ?>"><?php echo $project->project_name; ?></a></td>
				<td><?php echo $project->project_body; ?></td>
				<td><?php echo $project->date_created; ?> <div class="date-space"></div></td>
				<td><a href="<?php echo base_url(); ?>tasks/project_tasks/<?php echo $project->id; ?>" class="btn btn-primary">View Tasks</a></td>
				<td><a href="<?php echo base_url(); ?>projects/edit/<?php echo $project->id; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span></a></td>
				<td><a class="btn btn-danger" href="<?php echo base_url(); ?>projects/delete/<?php echo $project->id; ?>"><span class="glyphicon glyphicon-remove"></span></a></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>