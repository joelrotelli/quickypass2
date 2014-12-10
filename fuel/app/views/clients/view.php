<h2>Viewing #<?php echo $client->id; ?></h2>

<p>
	<strong>Name:</strong>
	<?php echo $client->name; ?></p>

<?php echo Html::anchor('clients/edit/'.$client->id, 'Edit'); ?> |
<?php echo Html::anchor('clients', 'Back'); ?>