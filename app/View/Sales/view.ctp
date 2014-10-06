
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">
			
			<ul class="list-group">			
						<li class="list-group-item"><?php echo $this->Html->link(__('Edit Service Order'), array('action' => 'edit', $serviceOrder['ServiceOrder']['id']), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Form->postLink(__('Delete Service Order'), array('action' => 'delete', $serviceOrder['ServiceOrder']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $serviceOrder['ServiceOrder']['id'])); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Service Orders'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Service Order'), array('action' => 'add'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Companies'), array('controller' => 'companies', 'action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Company'), array('controller' => 'companies', 'action' => 'add'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Product Sales'), array('controller' => 'product_sales', 'action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Product Sale'), array('controller' => 'product_sales', 'action' => 'add'), array('class' => '')); ?> </li>
				
			</ul><!-- /.list-group -->
			
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .span3 -->
	
	<div id="page-content" class="col-sm-9">
		
		<div class="serviceOrders view">

			<h2><?php  echo __('Service Order'); ?></h2>
			
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($serviceOrder['ServiceOrder']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Date'); ?></strong></td>
		<td>
			<?php echo h($serviceOrder['ServiceOrder']['date']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Km'); ?></strong></td>
		<td>
			<?php echo h($serviceOrder['ServiceOrder']['km']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Vehicle'); ?></strong></td>
		<td>
			<?php echo h($serviceOrder['ServiceOrder']['vehicle']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Plate'); ?></strong></td>
		<td>
			<?php echo h($serviceOrder['ServiceOrder']['plate']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Customer'); ?></strong></td>
		<td>
			<?php echo h($serviceOrder['ServiceOrder']['customer']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Phone'); ?></strong></td>
		<td>
			<?php echo h($serviceOrder['ServiceOrder']['phone']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Discount'); ?></strong></td>
		<td>
			<?php echo h($serviceOrder['ServiceOrder']['discount']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Total'); ?></strong></td>
		<td>
			<?php echo h($serviceOrder['ServiceOrder']['total']); ?>
			&nbsp;
		</td>
</tr>			</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

					
			<div class="related">

				<h3><?php echo __('Related Product Sales'); ?></h3>
				
				<?php if (!empty($serviceOrder['ProductSale'])): ?>
					
					<div class="table-responsive">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
		<th><?php echo __('Product Id'); ?></th>
		<th><?php echo __('Quantity'); ?></th>
		<th><?php echo __('Total'); ?></th>
								</tr>	
							</thead>
							<tbody>
									<?php
										$i = 0;
										foreach ($serviceOrder['ProductSale'] as $productSale): ?>
		<tr>
			<td><?php echo $productSale['Product']['name']; ?></td>
			<td><?php echo $productSale['quantity']; ?></td>
			<td><?php echo $productSale['total']; ?></td>
		</tr>
	<?php endforeach; ?>
							</tbody>
						</table><!-- /.table table-striped table-bordered -->
					</div><!-- /.table-responsive -->
					
				<?php endif; ?>

				
				<div class="actions">
					<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> '.__('New Product Sale'), array('controller' => 'product_sales', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div><!-- /.actions -->
				
			</div><!-- /.related -->

			
	</div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->


<pre>
<?php print_r($serviceOrder) ?>
</pre>
