<div class="row">
    <div class="col-lg-8">
        <h3><?php echo __('Order Checkout'); ?></h3>
    </div>
    <div class="col-lg-4">
        <div class="row">
            <div class="col-md-8">

            </div>
            <div class="col-md-4">
                <?php echo $this->Form->submit('Save', array('class' => 'btn btn-info pull-right','style' => 'margin-top: 15px')); ?>
            </div>
        </div>
    </div>
 </div>
<hr />

<div id="order-checkout" class="row">
    <div id="order-payment" class="col-md-6">
        <h3><?php echo __('Payment Method'); ?></h3>
        <p>Escolha uma ou mais formas de pagamento:</p>
<?php echo $this->Form->create('Order'); ?>
<?php echo $this->Form->hidden("Order.status", array('value' => 1)); ?>
<?php for($i = 0; $i < $count; $i++): ?>
        <?php echo $this->Form->hidden("OrderPayment.$i.order_id", array('value' => $order['Order']['id'])); ?>
        <?php echo $this->Form->hidden("OrderPayment.$i.customer_id", array('value' => 0)); ?>
        <?php echo $this->Form->hidden("OrderPayment.$i.method_id", array('value' => $methods[$i]['Method']['id'])); ?>
        <?php echo $this->Form->input("OrderPayment.$i.amount", array('label' => $methods[$i]['Method']['name'])); ?>
<?php endfor; ?>
<?php echo $this->Form->end(); ?>
    </div>


    <div id="order-review" class="col-md-6">
        <h3><?php echo __('Order Items'); ?></h3>
        <div class="table-responsive">
            <table id="products-table" class="table">
                <thead>
	                <tr>
	                    <th width="50%"><?php echo __('Product'); ?></th>
	                    <th><?php echo __('Quantity'); ?></th>
	                    <th><?php echo __('SubTotal'); ?></th>
	                </tr>
                </thead>
                <tfoot>
                    <tr>
                        <td><?php echo h('Total'); ?></td>
                        <td>&nbsp;</td>
                        <td><?php echo $this->Number->currency($order['Order']['total'], 'BRL'); ?></td>
                    </tr>
                </tfoot>
				<tbody>
<?php foreach ($order['OrderItem'] as $item): ?>
					<tr>
						<td><?php echo h($item['Product']['name']); ?></td>
						<td><?php echo h($item['quantity']); ?></td>
						<td><?php echo $this->Number->currency($item['quantity'] * $item['price'], 'BRL'); ?></td>
					</tr>
<?php endforeach; ?>
				</tbody>
                
            </table>
        </div>
    </div> <!-- order-review -->
</div> <!-- order-checkout -->
<hr />