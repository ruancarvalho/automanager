<div id="page-container" class="row">

<?php echo $this->Form->create('Customer', array('role' => 'form')); ?>

	<div class="col-lg-10"><h2><?php echo __('Add Customer'); ?></h2></div>
  		<div class="col-lg-2">
    		<?php echo $this->Form->submit('Save', array('class' => 'btn btn-default pull-right','style' => 'margin-top: 15px')); ?>
  		</div>
	</div>
	<hr />
	<div id="page-content" class="row">
		<div class="col-md-12">
<?php echo $this->Session->flash() ?>
	
			<fieldset>
				<?php echo $this->Form->input('id'); ?>
				
				<div class="form-group col-md-6">
					<?php echo $this->Form->input('name', array('class' => 'form-control')); ?>
				</div><!-- .form-group -->
				<div class="form-group col-md-4">
					<?php echo $this->Form->input('registry', array('class' => 'form-control')); ?>
				</div><!-- .form-group -->
				<div class="form-group col-md-2">
					<?php echo $this->Form->input('created', array('class' => 'form-control', 'type'=>'text', 'disabled' => true)); ?>
				</div><!-- .form-group -->

				<div class="form-group col-md-6">
					<?php echo $this->Form->input('address', array('class' => 'form-control')); ?>
				</div><!-- .form-group -->
				<div class="form-group col-md-2">
					<?php echo $this->Form->input('district', array('class' => 'form-control')); ?>
				</div><!-- .form-group -->
				<div class="form-group col-md-2">
					<?php echo $this->Form->input('cep', array('class' => 'form-control')); ?>
				</div><!-- .form-group -->
				<div class="form-group col-md-2">
					<?php echo $this->Form->input('modified', array('class' => 'form-control', 'type'=>'text', 'disabled' => true)); ?>
				</div><!-- .form-group -->

				<div class="form-group col-md-3">
					<?php echo $this->Form->input('city', array('class' => 'form-control')); ?>
				</div><!-- .form-group -->
				<div class="form-group col-md-3">
					<?php echo $this->Form->input('phone', array('class' => 'form-control')); ?>
				</div><!-- .form-group -->
				<div class="form-group col-md-3">
					<?php echo $this->Form->input('uf', array('class' => 'form-control')); ?>
				</div><!-- .form-group -->
				<div class="form-group col-md-3">
					<?php echo $this->Form->input('ie', array('class' => 'form-control','dateFormat' => 'DMY')); ?>
				</div><!-- .form-group -->
			</fieldset>
<?php echo $this->Form->end(__('Save')); ?>

		</div><!-- /.form -->
	</div><!-- /#page-content .col-lg-6 -->
</div><!-- /#page-container .row-fluid -->