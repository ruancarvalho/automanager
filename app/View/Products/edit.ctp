<div class="row">
	<div class="col-md-10">
		<h3><?php echo __('Edit Product'); ?></h3>
	</div>
	<div class="col-md-2">
    	<?php echo $this->Html->link(__('Products List'),'/products',array('class' => 'btn btn-primary pull-right','style' => 'margin-top: 15px')) ?>
  	</div>
 </div>
<hr />
<div id="page-container" class="row">
	<div id="page-content" class="col-md-12">
		<div class="products form">
		
			<?php echo $this->Form->create('Product', array('role' => 'form')); ?>

				<fieldset>
					<?php echo $this->Form->hidden('id'); ?>
					<div class="form-group col-md-2">
						<?php echo $this->Form->input('code', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->
					<div class="form-group col-md-10">
						<?php echo $this->Form->input('name', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->
					<div class="form-group col-md-8">
						<?php echo $this->Form->input('brand_id', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->
					<div class="form-group col-md-4">
						<?php echo $this->Form->input('quantity', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->
					<div class="form-group col-md-4">
						<?php echo $this->Form->input('cost_price', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->
					<div class="form-group col-md-4">
						<?php echo $this->Form->input('minimum_price', array('class' => 'form-control', 
							'type' => 'text', 'readonly' => 'readonly')); ?>
					</div><!-- .form-group -->
					<div class="form-group col-md-4">
						<?php echo $this->Form->input('price', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->
				</fieldset>
			<?php echo $this->Form->end(); ?>

		</div><!-- /.form -->

		<hr>

		<?php echo __('Last Modified:'); ?>

		<?php echo $this->Time->format(
					'd M Y - H:i',
				  	$this->data['Product']['modified'],
				  	null,
				  	'America/Manaus'
				);
		?>
			
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->

