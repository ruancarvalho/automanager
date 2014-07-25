<div class="row">
	<div class="col-lg-10">
		<h3><?php echo h($product['Product']['name']); ?></h3>
	</div>
	<div class="col-lg-2">
    	<?php echo $this->Html->link(__('Back'),'/products',array('class' => 'btn btn-default pull-right','style' => 'margin-top: 15px')) ?>
  	</div>
 </div>
<hr />
<div id="page-container" class="row">
	
	<div id="page-content" class="col-md-12">
		
		<div class="products view">
			
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($product['Product']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Code'); ?></strong></td>
		<td>
			<?php echo h($product['Product']['code']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Name'); ?></strong></td>
		<td>
			<?php echo h($product['Product']['name']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Brand'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($product['Brand']['name'], array('controller' => 'brands', 'action' => 'view', $product['Brand']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Quantity'); ?></strong></td>
		<td>
			<?php echo h($product['Product']['quantity']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Cost Price'); ?></strong></td>
		<td>
			<?php echo h($product['Product']['cost_price']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Minimum Price'); ?></strong></td>
		<td>
			<?php echo h($product['Product']['minimum_price']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Price'); ?></strong></td>
		<td>
			<?php echo h($product['Product']['price']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
		<td>
			<?php echo h($product['Product']['created']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
		<td>
			<?php echo h($product['Product']['modified']); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

			
	</div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->

