<h2>Viewing #<?php echo $project->id; ?></h2>

<p>
	<strong>Name:</strong>
	<?php echo $project->name; ?></p>
<p>
	<strong>Client id:</strong>
	<?php echo $project->client_id; ?></p>

<?php echo Html::anchor('projects/edit/'.$project->id, 'Edit'); ?> |
<?php echo Html::anchor('projects', 'Back'); ?>