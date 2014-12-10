<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Name', 'name', array('class'=>'control-label')); ?>

				<?php echo Form::input('name', Input::post('name', isset($access) ? $access->name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Name')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Desc', 'desc', array('class'=>'control-label')); ?>

				<?php echo Form::textarea('desc', Input::post('desc', isset($access) ? $access->desc : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>'Desc')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Project id', 'project_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('project_id', Input::post('project_id', isset($access) ? $access->project_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Project id')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>