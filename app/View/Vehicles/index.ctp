<div class="row">
	<div class="col-md-3">
		<h3><?php echo __('Vehicles'); ?></h3>
	</div>
	<div class="col-md-6">
		<?php echo $this->Form->create('Vehicle', array('action' => 'index', 'style' => 'margin-top: 15px')); ?>
			<div class="input-group">
				<input name="data[search]" class="form-control" placeholder="Procurar Veículos" type="text" id="search">
				<span class="input-group-btn">
					<button class='btn btn-primary' type="submit"><span class='glyphicon glyphicon-search'></span></button>
				</span>
			</div>
		</form>
	</div>
	<div class="col-md-3 pull-right">
		<?php echo $this->Html->link(__('Add Vehicle'),'/vehicles/add',array('class' => 'btn btn-primary pull-right','style' => 'margin-top: 15px')) ?>
  	</div>
</div>
<hr />
<div id="page-content" class="row">
	<div class="col-md-12">
		
		<?php echo $this->Session->flash() ?>
			
		<table cellpadding="0" cellspacing="0" class="table table-striped">
		<thead>
	        <tr>
	          	<th><?php echo $this->Paginator->sort('vin'); ?></th>
				<th><?php echo $this->Paginator->sort('model'); ?></th>
				<th class="actions"><?php echo __('Actions'); ?></th>
	        </tr>
	 	</thead>
	 	<tbody>
			<?php foreach ($vehicles as $vehicle): ?>
			<tr>
				<td><?php echo h($vehicle['Vehicle']['vin']); ?>&nbsp;</td>
				<td><?php echo h($vehicle['Vehicle']['model']); ?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->Html->link(__('View'), array('action' => 'view', $vehicle['Vehicle']['id']), array('class' => 'btn btn-success btn-xs')); ?>
					<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $vehicle['Vehicle']['id']), array('class' => 'btn btn-warning btn-xs')); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $vehicle['Vehicle']['id']), array('class' => 'btn btn-danger btn-xs'), __('Are you sure you want to delete # %s?', $vehicle['Vehicle']['id'])); ?>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
		</table>  
	</div>

	<div class="clearfix"> </div>
	<div class="row center-block">
		<p><small>
			<?php
				echo $this->Paginator->counter(array(
				'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
				));
			?>
		</small></p>

		<ul class="pagination">
			<?php
				$this->Paginator->options(array(
			    	'update' => '#page-wrapper',
			    	'evalScripts' => true
				));

				echo $this->Paginator->prev('< ' . __('Previous'), array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
				echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'tag' => 'li', 'currentClass' => 'disabled'));
				echo $this->Paginator->next(__('Next') . ' >', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
			?>
		</ul><!-- /.pagination -->
	</div>
</div>