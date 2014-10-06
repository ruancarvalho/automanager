<div id="page-container" class="row">
	<div class="col-lg-10">
		<h3><?php echo __('Vehicle'); ?></h3>
	</div>
	<div class="col-lg-2">
    	<?php echo $this->Html->link(__('Edit Vehicle'),'/vehicles/edit/' . $vehicle['Vehicle']['id'] ,array('class' => 'btn btn-info pull-right','style' => 'margin-top: 15px')) ?>
  	</div>
 </div>
<hr />

<div class="vehicles view">
	<dl class="dl-horizontal">
		<dt><?php echo __('VIN'); ?></dt>
		<dd>
			<?php echo h($vehicle['Vehicle']['vin']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Make'); ?></dt>
		<dd>
			<?php echo h($vehicle['Vehicle']['make']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Model'); ?></dt>
		<dd>
			<?php echo h($vehicle['Vehicle']['model']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Year'); ?></dt>
		<dd>
			<?php echo h($vehicle['Vehicle']['year']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($vehicle['Vehicle']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($vehicle['Vehicle']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="related">
	<h3><?php echo __('Related Orders'); ?></h3>
<?php if (!empty($vehicle['Order'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-bordered">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($vehicle['Order'] as $order): ?>
		<tr>
			<td><?php echo $order['id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'orders', 'action' => 'view', $order['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'orders', 'action' => 'edit', $order['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'orders', 'action' => 'delete', $order['id']), null, __('Are you sure you want to delete # %s?', $order['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
