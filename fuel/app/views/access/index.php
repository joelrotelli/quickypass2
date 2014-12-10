<h2>Listing Accesses</h2>
<br>
<?php if ($accesses): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Desc</th>
			<th>Project id</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($accesses as $item): ?>		<tr>

			<td><?php echo $item->name; ?></td>
			<td><?php echo $item->desc; ?></td>
			<td><?php echo $item->project_id; ?></td>
			<td>
				<?php echo Html::anchor('access/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('access/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('access/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Accesses.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('access/create', 'Add new Access', array('class' => 'btn btn-success')); ?>

</p>
