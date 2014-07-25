<div id="page-container" class="row">

<?php echo $this->Form->create('Method', array('role' => 'form')); ?>

	<div class="col-lg-10"><h2><?php echo __('Edit Payment Method'); ?></h2></div>
  		<div class="col-lg-2">
    		<?php echo $this->Form->submit('Save', array('class' => 'btn btn-default pull-right','style' => 'margin-top: 15px')); ?>
  		</div>
	</div>
	<hr />
	<div id="page-content" class="row">
		<div class="col-lg-6">
<?php echo $this->Session->flash() ?>
	
			<fieldset>
				<?php echo $this->Form->input('id'); ?>
				<div class="form-group">
					<?php echo $this->Form->input('name', array('class' => 'form-control')); ?>
					<?php echo $this->Form->input('fee', array('class' => 'form-control')); ?>
					<?php echo $this->Form->input('days', array('class' => 'form-control')); ?>
				</div><!-- .form-group -->
			</fieldset>
<?php echo $this->Form->end(__('Save')); ?>

		</div><!-- /.form -->
	</div><!-- /#page-content .col-lg-6 -->
</div><!-- /#page-container .row-fluid -->