<div id="page-container" class="row">
	<div class="col-lg-10">
		<h3><?php echo __('Payment Methods'); ?></h3>
	</div>
	<div class="col-lg-2">
    	<?php echo $this->Html->link(__('Add Method'),'/methods/add',array('class' => 'btn btn-info pull-right','style' => 'margin-top: 15px')) ?>
  	</div>
 </div>
<hr />
<div id="page-content" class="row">
	<div class="col-md-12">
		
		<?php echo $this->Session->flash() ?>
			
		<table cellpadding="0" cellspacing="0" class="table table-striped">
		<thead>
	        <tr>
	          	<th><?php echo $this->Paginator->sort('name'); ?></th>
				<th><?php echo $this->Paginator->sort('fee'); ?></th>
				<th class="actions"><?php echo __('Actions'); ?></th>
	        </tr>
	 	</thead>
	 	<tbody>
			<?php foreach ($methods as $method): ?>
			<tr>
				<td><?php echo h($method['Method']['name']); ?></td>
				<td><?php echo h($method['Method']['fee']); ?>%</td>
				<td class="actions">
					<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $method['Method']['id']), array('class' => 'btn btn-warning btn-xs')); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $method['Method']['id']), array('class' => 'btn btn-danger btn-xs'), __('Are you sure you want to delete # %s?', $method['Method']['id'])); ?>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
		</table>  
	</div>
</div>