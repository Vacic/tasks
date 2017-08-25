<h2>Edit Task</h2>
<?php $attributes = array('id' => 'create_form', 'class' => 'form-horizontal'); ?>
<?php echo validation_errors("<p class='bg-danger'>"); ?>
<?php echo form_open('tasks/edit/'.$task_data->id, $attributes); ?>
<div class="form-group">
	<?php echo form_label('task Name'); ?>
	<?php $data = array('class' => 'form-control',
						'name' => 'task_name',
						'value' => $task_data->task_name);
	?>
	<?php echo form_input($data); ?>
</div>
<div class="form-group">
	<?php echo form_label('Description'); ?>
	<?php $data = array('class' => 'form-control',
						'name' => 'task_body',
						'value' => $task_data->task_body);
	?>
	<?php echo form_textarea($data); ?>
</div>
<div class="form-group">
	<?php echo form_label('Task Due Date'); ?>
	<?php $data = array('class' => 'form-control',
						'name' => 'due_date',
						'type' => 'date',
						'value' => $task_data->due_date);
	?>
	<?php echo form_input($data); ?>
</div>
<div class="form-group">
	<?php $data = array('class' => 'btn btn-primary',
						'name' => 'submit',
						'value' => 'Update'); ?>
	<?php echo form_submit($data); ?>
</div>
<?php echo form_close(); ?>