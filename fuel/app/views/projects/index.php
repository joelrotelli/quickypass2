<h2>Listing Projects</h2>
<br>
<?php if ($projects): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Client id</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($projects as $item): ?>		<tr>

			<td><?php echo $item->name; ?></td>
			<td><?php echo $item->client_id; ?></td>
			<td>
				<?php echo Html::anchor('projects/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('projects/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('projects/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Projects.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('projects/create', 'Add new Project', array('class' => 'btn btn-success')); ?>

</p>
