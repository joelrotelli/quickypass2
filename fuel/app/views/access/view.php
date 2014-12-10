<h2>Viewing #<?php echo $access->id; ?></h2>

<p>
	<strong>Name:</strong>
	<?php echo $access->name; ?></p>
<p>
	<strong>Desc:</strong>
	<?php echo $access->desc; ?></p>
<p>
	<strong>Project id:</strong>
	<?php echo $access->project_id; ?></p>

<?php echo Html::anchor('access/edit/'.$access->id, 'Edit'); ?> |
<?php echo Html::anchor('access', 'Back'); ?>