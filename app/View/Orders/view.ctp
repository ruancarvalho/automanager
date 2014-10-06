<div class="row">
	<div class="col-lg-8">
		<h3><?php echo __('Order') . ' #' . h($order['Order']['id']); ?></h3>
	</div>
	<div class="col-lg-4">
		<div class="row">
			<div class="col-md-8">

			</div>
			<div class="col-md-4 hidden-print">
				<?php echo $this->Html->link(__('List Orders'),'/orders',array('class' => 'btn btn-info pull-right','style' => 'margin-top: 15px')) ?>
			</div>
		</div>
  	</div>
 </div>
<hr />
<div id="orders-container" class="row">
	<div id="page-content" class="col-md-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered">
			<tbody>
			<tr>
				<td><strong><?php echo __('Date'); ?></strong></td>
				<td><?php echo h($order['Order']['date']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong><?php echo __('Km'); ?></strong></td>
				<td><?php echo h($order['Order']['km']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong><?php echo __('Vehicle'); ?></strong></td>
				<td><?php echo h($order['Vehicle']['model']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong><?php echo __('Plate'); ?></strong></td>
				<td><?php echo h($order['Vehicle']['vin']); ?>&nbsp;</td>
			</tr>
			<tr>		
				<td><strong><?php echo __('Customer'); ?></strong></td>
				<td><?php echo h($order['Customer']['name']); ?>&nbsp;</td>
			</tr>
			<tr>		
				<td><strong><?php echo __('Phone'); ?></strong></td>
				<td><?php echo h($order['Order']['phone']); ?>&nbsp;</td>
			</tr>	
			</tbody>
			</table><!-- /.table table-striped table-bordered -->
		</div><!-- /.table-responsive -->
			
		<div class="related">
			<h3><?php echo __('Order Items'); ?></h3>			
			<?php if (!empty($order['OrderItem'])): ?>
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th><?php echo __('Product'); ?></th>
						<th><?php echo __('Product Id'); ?></th>
						<th><?php echo __('Quantity'); ?></th>
						<th><?php echo __('Price'); ?></th>
						<th><?php echo __('Total'); ?></th>
					</tr>	
				</thead>
				<tbody>
<?php $i = 0; foreach ($order['OrderItem'] as $productSale): ?>
				<tr>
					<td><?php echo $productSale['Product']['name']; ?></td>
					<td><?php echo $productSale['Product']['id']; ?></td>
					<td><?php echo $productSale['quantity']; ?></td>
					<td><?php echo $this->Number->currency($productSale['price'], 'BRL'); ?></td>
					<td><strong><?php echo $this->Number->currency($productSale['price'] * $productSale['quantity'], 'BRL'); ?></strong></td>
				</tr>
<?php endforeach; ?>
				</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
					
			<?php endif; ?>
		</div><!-- /.related -->	
		<hr />
		<div class="row"  class="col-md-12">
			<div class="col-md-8">
				<dl class="dl-horizontal">
					<dt><?php echo __('Notes'); ?></dt>
					<dd><?php echo h($order['Order']['notes']); ?></dd>
				</dl>
			</div>
			<div class="col-md-4">			
				<dl class="dl-horizontal">
					<dt><?php echo __('Sub-Total'); ?></dt>
					<dd><?php echo $this->Number->currency($order['Order']['total'] + $order['Order']['discount'], 'BRL'); ?></dd>
					<dt><?php echo __('Desconto'); ?></dt>
					<dd><?php echo $this->Number->currency($order['Order']['discount'], 'BRL'); ?></dd>
					<dt><?php echo __('Total'); ?></dt>
					<dd><?php echo $this->Number->currency($order['Order']['total'], 'BRL'); ?></dd>
				</dl>
			</div>
		</div>
	  	
	</div><!-- /#page-content .span9 -->
</div><!-- /#page-container .row-fluid -->

<?php // echo '<pre>'; print_r($order); echo '</pre>'; ?>