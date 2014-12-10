<h2>Editing Access</h2>
<br>

<?php echo render('access/_form'); ?>
<p>
	<?php echo Html::anchor('access/view/'.$access->id, 'View'); ?> |
	<?php echo Html::anchor('access', 'Back'); ?></p>
