<?php echo $this->Html->script('lib/jquery'); ?>

<div class="row">
	<div class="col-xs-4">
		<div class="row">
			<div class="col-xs-12"><h3><?php echo __('Prices Table'); ?></h3></div>
		</div>
	</div>
	<div class="col-xs-4 pull-right hidden-print">
		<?php echo $this->Html->link(__('Print'),'javascript:window.print()',array('class' => 'btn btn-primary btn-sm pull-right','style' => 'margin-top: 15px')) ?>
  	</div>
</div>

<hr />

<div class="row">
	<div class="col-xs-12">		
		<?php echo $this->Session->flash() ?>

		<div class="table">
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<thead>
					<tr>
						<th width="5%"><?php echo __('ID'); ?></th>
						<th width="65%"><?php echo __('Name'); ?></th>
						<th width="15%"><?php echo __('Brand'); ?></th>
						<th width="15%"><?php echo __('Price'); ?></th>
					</tr>
				</thead>
				<tbody>
<?php foreach ($products as $product): ?>
<tr>
	<td><?php echo h($product['Product']['id']); ?>&nbsp;</td>
	<td><?php echo h($product['Product']['name']); ?>
	<td><?php echo h($product['Brand']['name']); ?></td>
	<td>R$ <?php echo h($product['Product']['price']); ?>&nbsp;</td>
</tr>
<?php endforeach; ?>
				</tbody>
			</table>
		</div><!-- /.table-responsive -->
	</div><!-- /#page-content .col-sm-9 -->
</div><!-- /#page-container .row-fluid -->

<?php echo $this->Js->writeBuffer(); ?>