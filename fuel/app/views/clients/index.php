<h2>Listing Clients</h2>
<br>
<?php if ($clients): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($clients as $item): ?>		<tr>

			<td><?php echo $item->name; ?></td>
			<td>
				<?php echo Html::anchor('clients/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('clients/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('clients/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Clients.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('clients/create', 'Add new Client', array('class' => 'btn btn-success')); ?>

</p>
