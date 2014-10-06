<div class="row">
	<div class="col-md-10">
		<h3><?php echo __('Add Vehicle'); ?></h3>
	</div>
	<div class="col-md-2">
    	<?php echo $this->Form->submit(__('Save'), array('class' => 'btn btn-primary pull-right','style' => 'margin-top: 15px')); ?>
  	</div>
</div>
<hr />
<div id="page-container" class="row">
	<div id="page-content" class="col-md-12">
		<div class="vehicles form">
			<?php echo $this->Form->create('Vehicle', array('role' => 'form')); ?>
			<fieldset>
				<div class="form-group col-md-6">
					<?php echo $this->Form->input('customer_id', array('class' => 'form-control')); ?>
				</div><!-- .form-group -->
				<div class="form-group col-md-4">
					<?php echo $this->Form->input('vin', array('class' => 'form-control')); ?>
				</div><!-- .form-group -->
				<div class="form-group col-md-2">
					<?php echo $this->Form->input('created', array('class' => 'form-control', 'type'=>'text', 'disabled' => true)); ?>
				</div><!-- .form-group -->

				<div class="form-group col-md-4">
					<?php echo $this->Form->input('make', array('class' => 'form-control')); ?>
				</div><!-- .form-group -->
				<div class="form-group col-md-4">
					<?php echo $this->Form->input('model', array('class' => 'form-control')); ?>
				</div><!-- .form-group -->
				<div class="form-group col-md-2">
					<?php echo $this->Form->input('year', array('class' => 'form-control')); ?>
				</div><!-- .form-group -->
				<div class="form-group col-md-2">
					<?php echo $this->Form->input('modified', array('class' => 'form-control', 'type'=>'text', 'disabled' => true)); ?>
				</div><!-- .form-group -->
			</fieldset>
			<?php echo $this->Form->end(__('Save')); ?>

		</div><!-- /.form -->
	</div><!-- /#page-content .col-lg-6 -->
</div><!-- /#page-container .row-fluid -->