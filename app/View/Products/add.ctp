<div class="row">
	<div class="col-lg-10">
		<h3><?php echo __('Products'); ?></h3>
	</div>
	<div class="col-lg-2">
    	<?php echo $this->Html->link(__('Products List'),'/products',array('class' => 'btn btn-default pull-right','style' => 'margin-top: 15px')) ?>
  	</div>
 </div>
<hr />

<div id="page-container" class="row">	
	<div id="page-content" class="col-md-12">
		<div class="products form">
		
			<?php echo $this->Form->create('Product', array('role' => 'form')); ?>

				<fieldset>

					<div class="form-group col-md-2 ">
						<?php echo $this->Form->input('code', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->
					<div class="form-group col-md-10 ">
						<?php echo $this->Form->input('name', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->
					<div class="form-group col-md-8 ">
						<?php echo $this->Form->input('brand_id', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->
					<div class="form-group col-md-4 ">
						<?php echo $this->Form->input('quantity', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->
					<div class="form-group col-md-4 ">
						<?php echo $this->Form->input('cost_price', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->
					<div class="form-group col-md-4">
						<?php echo $this->Form->input('minimum_price', 
                        array('type' => 'text', 'readonly' => 'readonly', 'class' => 'form-control')); ?>
						<?php //echo $this->Form->input('minimum_price', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->
					<div class="form-group col-md-4">
						<?php echo $this->Form->input('price', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->
				</fieldset>

			<?php echo $this->Form->end(); ?>

		</div><!-- /.form -->
			
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->
