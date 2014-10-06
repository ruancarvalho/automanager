<div class="row">
	<div class="col-lg-12">
		<h1>Dashboard <small>Statistics Overview</small></h1>
		<ol class="breadcrumb">
			<li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
		</ol>
	</div>
</div><!-- /.row -->

<div class="row">

	<!-- New Order -->
	<div class="col-lg-3">
		<a href="<?php echo $this->params->webroot?>vehicles">
		<div class="panel panel-info">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-6">
						<i class="fa fa-plus fa-5x"></i>
					</div>
					<div class="col-xs-6 text-right">
						<p class="announcement-heading"><?php echo $vehicles_count?></p>
						<p class="announcement-text"><?php echo __('Vehicles'); ?></p>
					</div>
				</div>
			</div>
			<div class="panel-footer announcement-bottom">
				<div class="row">
					<div class="col-xs-6">
						<?php echo __('View Vehicles'); ?>
					</div>
					<div class="col-xs-6 text-right">
						<i class="fa fa-arrow-circle-right"></i>
					</div>
				</div>
			</div>
		</div>
		</a>
	</div>

	<!-- Orders -->
	<div class="col-lg-3">
		<div class="panel panel-success">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-6">
						<i class="fa fa-shopping-cart fa-5x"></i>
					</div>
					<div class="col-xs-6 text-right">
						<p class="announcement-heading"><?php echo $orders_count?></p>
						<p class="announcement-text"><?php echo __('Orders'); ?></p>
					</div>
				</div>
			</div>
			<a href="<?php echo $this->params->webroot?>orders">
				<div class="panel-footer announcement-bottom">
					<div class="row">
						<div class="col-xs-6">
							<?php echo __('View Orders'); ?>
						</div>
						<div class="col-xs-6 text-right">
							<i class="fa fa-arrow-circle-right"></i>
						</div>
					</div>
				</div>
			</a>
		</div>
	</div>

	<!-- Customers -->
	<div class="col-lg-3">
		<div class="panel panel-warning">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-6">
						<i class="fa fa-users fa-5x"></i>
					</div>
					<div class="col-xs-6 text-right">
						<p class="announcement-heading"><?php echo $customers_count?></p>
						<p class="announcement-text"><?php echo __('Customers'); ?></p>
					</div>
				</div>
			</div>
			<a href="<?php echo $this->params->webroot?>customers">
				<div class="panel-footer announcement-bottom">
					<div class="row">
						<div class="col-xs-6">
							<?php echo __('View Customers'); ?>
						</div>
						<div class="col-xs-6 text-right">
							<i class="fa fa-arrow-circle-right"></i>
						</div>
					</div>
				</div>
			</a>
		</div>
	</div>
	
	<!-- Products -->
	<div class="col-lg-3">
		<div class="panel panel-danger">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-6">
						<i class="fa fa-tags fa-5x"></i>
					</div>
					<div class="col-xs-6 text-right">
						<p class="announcement-heading"><?php echo $products_count?></p>
						<p class="announcement-text"><?php echo __('Products'); ?></p>
					</div>
				</div>
			</div>
			<a href="<?php echo $this->params->webroot?>products">
				<div class="panel-footer announcement-bottom">
					<div class="row">
						<div class="col-xs-6">
							<?php echo __('View Products'); ?>
						</div>
						<div class="col-xs-6 text-right">
							<i class="fa fa-arrow-circle-right"></i>
						</div>
					</div>
				</div>
			</a>
		</div>
	</div>
	
</div><!-- /.row -->
