<?php echo $this->Html->script('lib/jquery'); ?>

<div class="row">
	<div class="col-md-4">
		<div class="row">
			<div class="col-md-3"><h3><?php echo __('Products'); ?></h3></div>
			<div class="col-md-1">
		<?php echo $this->Html->link(__('Add Product'),'/products/add',array('class' => 'btn btn-primary btn-sm','style' => 'margin-top: 15px')) ?>
		</div>
		</div>
	</div>
	<div class="col-md-4 pull-right">
		<?php echo $this->Form->create(false, array('action' => 'search', 'class' => 'form-inline pull-right', 'style' => 'margin-top: 15px')); ?>
			<?php echo $this->Form->input('Search Products', array('label' => false, 'placeholder' => __('Search Products'))); ?>
		<?php echo $this->Form->end(__('Search')); ?>
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
						<th width="5%"><?php echo $this->Paginator->sort('ID'); ?></th>
						<th><?php echo $this->Paginator->sort('name'); ?></th>
						<th width="10%"><?php echo $this->Paginator->sort('brand_id'); ?></th>
						<th width="10%"><?php echo $this->Paginator->sort('quantity'); ?></th>
						<th width="10%"><?php echo $this->Paginator->sort('price'); ?></th>
						<th class="actions" width="10%"><?php echo __('Actions'); ?></th>
					</tr>
				</thead>
				<tbody>
<?php foreach ($products as $product): ?>
<tr>
	<td><?php echo h($product['Product']['id']); ?>&nbsp;</td>
	<td><?php echo h($product['Product']['name']); ?>
	<td>
		<?php echo $this->Html->link($product['Brand']['name'], array('controller' => 'brands', 'action' => 'view', $product['Brand']['id'])); ?>
	</td>
	<td><?php echo h($product['Product']['quantity']); ?>&nbsp;</td>
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
	</div><!-- /#page-content .col-sm-9 -->
</div><!-- /#page-container .row-fluid -->

<?php echo $this->Js->writeBuffer(); ?>