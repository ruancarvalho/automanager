<div class="row">
	<div class="col-lg-8">
		<h3><?php echo __('Orders'); ?></h3>
	</div>
	<div class="col-lg-4">
		<div class="row">
			<div class="col-md-8">

			</div>
			<div class="col-md-4">
				<?php echo $this->Html->link(__('Add Order'),'/orders/add',array('class' => 'btn btn-info pull-right','style' => 'margin-top: 15px')) ?>
			</div>
		</div>
  	</div>
 </div>
<hr />
<div class="row">
	<div class="col-md-12">
		<div class="orders index">
			<div class="table-responsive">
				<table cellpadding="0" cellspacing="0" class="table table-striped">
					<thead>
						<tr>
							<th><?php echo $this->Paginator->sort('date'); ?></th>
							<th><?php echo $this->Paginator->sort('vehicle'); ?></th>
							<th><?php echo $this->Paginator->sort('customer'); ?></th>
							<th><?php echo $this->Paginator->sort('total'); ?></th>
							<th class="actions"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
<?php foreach ($orders as $sale): ?>
	<tr>
		<td><?php echo h($sale['Order']['date']); ?>&nbsp;</td>
		<td><?php echo h($sale['Order']['vehicle']); ?>&nbsp;</td>
		<td><?php echo h($sale['Order']['customer']); ?>&nbsp;</td>
		<td><?php echo h($sale['Order']['total']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $sale['Order']['id']), array('class' => 'btn btn-success btn-xs')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $sale['Order']['id']), array('class' => 'btn btn-danger btn-xs'), __('Are you sure you want to delete # %s?', $sale['Order']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
					</tbody>
				</table>
			</div><!-- /.table-responsive -->
			
			<p><small>
				<?php
					echo $this->Paginator->counter(array(
					'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
					));
				?>
			</small></p>

			<ul class="pagination">
				<?php
					echo $this->Paginator->prev('< ' . __('Previous'), array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
					echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'tag' => 'li', 'currentClass' => 'disabled'));
					echo $this->Paginator->next(__('Next') . ' >', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
				?>
			</ul><!-- /.pagination -->
		</div><!-- /.index -->
	</div><!-- /#page-content .col-sm-9 -->
</div><!-- /#page-container .row-fluid -->

<?php echo $this->Js->writeBuffer(); // Write cached scripts ?>
