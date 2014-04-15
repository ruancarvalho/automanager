<div class="row">
	<div class="col-lg-10">
		<h3><?php echo __('Products'); ?></h3>
	</div>
	<div class="col-lg-2">
    	<?php echo $this->Html->link(__('Add Product'),'/products/add',array('class' => 'btn btn-default pull-right','style' => 'margin-top: 15px')) ?>
  	</div>
 </div>
<hr />
<div class="row">
	<div class="col-sm-12">		
	<?php echo $this->Session->flash() ?>
		<div class="table-responsive">
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<thead>
					<tr>
						<th><?php echo $this->Paginator->sort('ID'); ?></th>
						<th><?php echo $this->Paginator->sort('code'); ?></th>
						<th><?php echo $this->Paginator->sort('name'); ?></th>
						<th><?php echo $this->Paginator->sort('brand_id'); ?></th>
						<th><?php echo $this->Paginator->sort('quantity'); ?></th>
						<th><?php echo $this->Paginator->sort('minimum_price'); ?></th>
						<th><?php echo $this->Paginator->sort('price'); ?></th>
						<th class="actions"><?php echo __('Actions'); ?></th>
					</tr>
				</thead>
				<tbody>
<?php foreach ($products as $product): ?>
<tr>
	<td><?php echo h($product['Product']['id']); ?>&nbsp;</td>
	<td><?php echo h($product['Product']['code']); ?>&nbsp;</td>
	<td><?php echo h($product['Product']['name']); ?>
	<td>
		<?php echo $this->Html->link($product['Brand']['name'], array('controller' => 'brands', 'action' => 'view', $product['Brand']['id'])); ?>
	</td>
	<td><?php echo h($product['Product']['quantity']); ?>&nbsp;</td>
	<td>R$ <?php echo h($product['Product']['minimum_price']); ?>&nbsp;</td>
	<td>R$ <?php echo h($product['Product']['price']); ?>&nbsp;</td>
	<td class="actions">
		<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $product['Product']['id']), array('class' => 'btn btn-warning btn-xs')); ?>
		<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $product['Product']['id']), array('class' => 'btn btn-danger btn-xs'), __('Are you sure you want to delete # %s?', $product['Product']['id'])); ?>
	</td>
</tr>
<?php endforeach; ?>
				</tbody>
			</table>
		</div><!-- /.table-responsive -->

		<div class="container">
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
		</div>
	</div><!-- /#page-content .col-sm-9 -->
</div><!-- /#page-container .row-fluid -->
