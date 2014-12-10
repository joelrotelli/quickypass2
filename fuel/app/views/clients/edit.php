<h2>Editing Client</h2>
<br>

<?php echo render('clients/_form'); ?>
<p>
	<?php echo Html::anchor('clients/view/'.$client->id, 'View'); ?> |
	<?php echo Html::anchor('clients', 'Back'); ?></p>
