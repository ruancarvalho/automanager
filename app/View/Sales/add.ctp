<?php

$type = array(
	'ÓLEO', 
	'FILTRO DE ÓLEO', 
	'FILTRO DE AR DO MOTOR', 
	'FILTRO DE AR CONDICIONADO',
	'FILTRO DE COMBUSTÍVEL'
);

?>

<div id="page-container" class="row">
	
    <div id="page-content" class="col-md-12">

        <h2><?php echo __('Add Service Order'); ?></h2>

        <?php echo $this->Form->create('ServiceOrder', array('role' => 'form')); ?>

        <fieldset>
            

            
        <div class="form-group col-md-2 col-md-offset-10">
            <?php echo $this->Form->input('date', array('class' => 'form-control', 'data-date-format' => 'dd/mm/yyyy', 'date' => '','type' => 'text')); ?>
        </div>     

        <div class="form-group col-md-2">
            <?php echo $this->Form->input('plate', array('class' => 'form-control')); ?>
        </div><!-- .form-group -->

        <div class="form-group col-md-8">
            <?php echo $this->Form->input('vehicle', array('class' => 'form-control')); ?>
        </div><!-- .form-group -->

        <div class="form-group col-md-2">
            <?php echo $this->Form->input('km', array('class' => 'form-control', 'min' => 1)); ?>
        </div><!-- .form-group -->

        <div class="form-group col-md-2">
            <?php echo $this->Form->input('phone', array('class' => 'form-control')); ?>
        </div><!-- .form-group -->

        <div class="form-group col-md-8">
            <?php echo $this->Form->input('customer', array('class' => 'form-control')); ?>
        </div><!-- .form-group -->

        </fieldset>

        <h3><?php echo __('Products'); ?></h3>

            <div class="table-responsive">

                <table id="products-table" class="table table-hover table-bordered">
                    <tbody>
                    <tr>
                        <th><?php echo __('Product'); ?></th>
                        <th><?php echo __('Code'); ?></th>
                        <th><?php echo __('Quantity'); ?></th>
                        <th><?php echo __('Price'); ?></th>
                        <th class="actions"><?php echo __('Actions'); ?></th>
                    </tr>

<?php for ($i = 0; $i < 5; $i++): ?>
                    <tr>
                        <td><?php echo $this->Form->input('ProductSale.'. $i .'.name', array('class' => 'form-control', 'disabled' => true, 'label' => false, 'value' => $type[$i])); ?></td>
                        <td><?php echo $this->Form->input('ProductSale.'. $i .'.product_id', array('class' => 'form-control', 'label' => false, 'type' => 'text')); ?></td>
                        <td><?php echo $this->Form->input('ProductSale.'. $i .'.quantity', array('class' => 'form-control', 'label' => false, 'min' => 1)); ?></td>
                        <td><?php echo $this->Form->input('ProductSale.'. $i .'.price', array('class' => 'form-control', 'disabled' => true, 'label' => false)); ?></td>
                        <td class="actions">
                                <?php echo $this->Form->button(__('Remove'), array(
                                        'class' => 'btn btn-large btn-danger', 
                                        'onclick' => 'RemoveTableRow(this)',
                                        'type' => 'button'
                                )); ?>
                        </td>
                    </tr>
<?php endfor; ?>

                    <tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5" style="text-align: left;">
                                <button class="btn btn-large btn-success" onclick="AddTableRow(this)" type="button">Add Product</button>
                            </td>
                        </tr>
                    </tfoot>

                </table>	

            </div>

            <!-- CORRIGIR ESTAS CLASSES -->
            <div class="form-group col-xs-10"> </div>

            <div class="form-group col-xs-2">
                <?php echo $this->Form->input('discount', array('class' => 'form-control')); ?>
            </div>

            <div class="form-group col-xs-10"> </div>

            <div class="form-group col-xs-2">
                <?php echo $this->Form->input('total', array('class' => 'form-control', 'disabled' => true)); ?>
            </div><!-- .form-group -->

            <div class="form-group col-xs-12">
                <?php echo $this->Form->submit('Submit', array('class' => 'btn btn-large btn-primary')); ?>
            </div><!-- .form-group -->

        <?php echo $this->Form->end(); ?>		

    </div><!-- /#page-content .col-sm-9 -->
		
</div><!-- /#page-container .row-fluid -->


<pre>
	<?php print_r($this->data); ?>
</pre>
