<nav class="navbar navbar-inverse navbar-fixed-top hidden-print" role="navigation">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<?php echo $this->Html->link(
			Configure::read('Application.name'),
			AuthComponent::user('id') ? "/home" : "/"
			, array('class' => 'navbar-brand')) ?>
	</div>

	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse navbar-ex1-collapse">

		<?php if(AuthComponent::user('id')){?>
			<ul class="nav navbar-nav">
				<li class="<?php echo $this->params->params['controller'] == 'pages' ? 'active' : ''?>"><a href="<?php echo $this->params->webroot?>home"><i class="fa fa-dashboard"></i> Dashboard</a></li>

				<!-- Orders -->
				<li class="dropdown <?php echo $this->params->params['controller'] == 'orders' ? 'active' : ''?>">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-shopping-cart"></i> <?php echo __('Loja'); ?> <b
							class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo $this->params->webroot?>orders"><i class="fa fa-list"></i> <?php echo __('Orders'); ?> </a></li>
						<li><a href="<?php echo $this->params->webroot?>orders/add"><i class="fa fa-plus"></i> <?php echo __('New Order'); ?> </a></li>

						<li><a href="<?php echo $this->params->webroot?>methods"><i class="fa fa-list"></i> <?php echo __('Methods'); ?> </a></li>
					</ul>
				</li>

				<!-- Products -->
				<li class="dropdown <?php echo $this->params->params['controller'] == 'products' ? 'active' : ''?>">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-tag"></i> <?php echo __('Inventory'); ?> <b
							class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo $this->params->webroot?>products"><i class="fa fa-list"></i> <?php echo __('Products'); ?></a></li>
						<li><a href="<?php echo $this->params->webroot?>products/add"><i class="fa fa-plus"></i> <?php echo __('New Product'); ?></a></li>
						<li><a href="<?php echo $this->params->webroot?>brands"><i class="fa fa-list"></i> <?php echo __('Brands'); ?></a></li>

						<li><a href="<?php echo $this->params->webroot?>products/table"><i class="fa fa-list"></i> <?php echo __('Prices Table'); ?></a></li>
					</ul>
				</li>
	
				<!-- Configs -->
				<li class="dropdown <?php echo $this->params->params['controller'] == 'users' ? 'active' : ''?>">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-users"></i> Config <b
							class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo $this->params->webroot?>users"><i class="fa"></i>Users</a></li>
					</ul>
				</li>
<!--				<li><a href="tables.html"><i class="fa fa-list"></i> Activity</a></li>-->
			</ul>
		<?php } ?>



		<?php if(AuthComponent::user('id')){?>

		<ul class="nav navbar-nav navbar-right navbar-user">
			<li class="dropdown user-dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo AuthComponent::user('username')?> <b
						class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="<?php echo $this->params->webroot?>me"><i class="fa fa-user"></i> Profile</a></li>
					<li><a href="<?php echo $this->params->webroot?>me/edit"><i class="fa fa-gear"></i> Settings</a></li>
					<li class="divider"></li>
					<li><a href="<?php echo $this->params->webroot?>logout"><i class="fa fa-power-off"></i> Log Out</a></li>
				</ul>
			</li>
		</ul>
		<?php }?>
	</div>
	<!-- /.navbar-collapse -->
</nav>