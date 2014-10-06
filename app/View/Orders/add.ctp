<?php

$type = array(
	'ÓLEO', 
	'FILTRO DE ÓLEO', 
	'FILTRO DE AR DO MOTOR', 
	'FILTRO DE AR CONDICIONADO',
	'FILTRO DE COMBUSTÍVEL'
);

?>
<?php echo $this->Form->create('Order', array('role' => 'form')); ?>
<div class="row">
    <div class="col-lg-8">
        <h3><?php echo __('New Order'); ?></h3>
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

<div id="order-form" class="row">
    <div id="form-content" class="col-md-12">
        <fieldset>

            <div class="form-group col-md-8">
                <?php echo $this->Form->input('vehicle_id', array('class' => 'form-control')); ?>
            </div><!-- .form-group -->

            <div class="form-group col-md-2">
                <?php echo $this->Form->input('km', array('class' => 'form-control')); ?>
            </div><!-- .form-group -->

            <div class="form-group col-md-4">
                <?php echo $this->Form->input('phone', array('class' => 'form-control')); ?>
            </div><!-- .form-group -->

            <div class="form-group col-md-4">
                <?php echo $this->Form->input('customer_id', array('class' => 'form-control')); ?>
            </div><!-- .form-group -->

            <div class="form-group col-md-2">
                <?php echo $this->Form->input('date', array( 'dateFormat' =>'DMY', 'class' => 'form-control')); ?>
            </div><!-- .form-group -->

        </fieldset>

        <h4><?php echo __('Order Items'); ?></h4>

            <div class="table-responsive">

                <table id="products-table" class="table table-hover table-striped">
                    <tbody>
                    <tr>
                        <th width="50%"><?php echo __('Product'); ?></th>
                        <th><?php echo __('Code'); ?></th>
                        <th><?php echo __('Quantity'); ?></th>
                        <th><?php echo __('Price'); ?></th>
                        <th><?php echo __('Total'); ?></th>
                        <th class="actions"><?php echo __('Actions'); ?></th>
                    </tr>

<?php for ($i = 0; $i < 5; $i++): ?>
                    <tr>
                        <td><?php echo $this->Form->input('OrderItem.'. $i .'.name', array('class' => 'form-control', 'disabled' => true, 'label' => false, 'value' => $type[$i])); ?></td>
                        <td><?php echo $this->Form->input('OrderItem.'. $i .'.product_id', array('class' => 'item-id', 'label' => false, 'type' => 'text')); ?></td>
                        <td><?php echo $this->Form->input('OrderItem.'. $i .'.quantity', array('class' => 'item-quantity', 'label' => false, 'min' => 0.1)); ?></td>
                        <td><?php echo $this->Form->input('OrderItem.'. $i .'.price', array('class' => 'form-control', 'disabled' => true, 'label' => false)); ?></td>
                        <td><?php echo $this->Form->input('OrderItem.'. $i .'.subtotal', array('class' => 'item-total', 'disabled' => true, 'label' => false)); ?></td>
                        <td class="actions">
                                <?php echo $this->Form->button(__('Remove'), array(
                                        'class' => 'btn btn-large btn-danger btn-remove-item', 
                                        'type' => 'button'
                                )); ?>
                        </td>
                    </tr>
<?php endfor; ?>

                    <tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5" style="text-align: left;">
                                <?php echo $this->Form->button(__('Add Product'), array(
                                        'class' => 'btn btn-large btn-success', 
                                        'type' => 'button',
                                        'id' => 'btnAddItem'
                                )); ?>
                                
                            </td>
                        </tr>
                    </tfoot>

                </table>	

            </div>

            <!-- CORRIGIR ESTAS CLASSES -->
            <div class="form-group col-md-8"> 
                <?php echo $this->Form->input('notes', array('class' => 'form-control')); ?>
            </div>

            <div class="form-group col-md-4">
                <?php echo $this->Form->input('discount', array('class' => 'form-control', 'value' => 0)); ?>
                <?php echo $this->Form->input('total', array('class' => 'form-control', 'value' => 0, 'disabled' => true)); ?>
            </div>

            <hr />

        <?php echo $this->Form->end(); ?>		
    </div><!-- /#page-content .col-sm-9 -->
</div><!-- /#page-container .row-fluid -->

<?php // echo '<pre>'; print_r($this->data); echo '</pre>'; ?>
