<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?php echo $title_for_layout; ?> - <?php echo Configure::read('Application.name') ?></title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width">

	<?php echo $this->Html->css('bootstrap.min', array('media' => 'all')); ?>
	<?php echo $this->Html->css(array('font-awesome/css/font-awesome.min', 'sb-admin', 'style')); ?>
	<?php echo $this->CakeStrap->automaticCss(); ?>
	<?php echo $this->Html->script('lib/modernizr') ?>
	
	<?php echo $this->fetch('script');  ?>

</head>
<body class="<?php echo $this->params->params['controller'].'_'.$this->params->params['action']?>">
<!--[if lt IE 7]>
<p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser
	today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better
	experience this site.</p>
<![endif]-->


<div id="wrapper">

	<?php echo $this->element('nav')?>

	<div id="page-wrapper">

		<?php echo $this->Session->flash(); ?>
		<?php echo $this->fetch('content'); ?>

	</div>
	<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php echo $this->params->webroot ?>js/lib/jquery.min.js"><\/script>')</script>
<?php echo $this->Html->script(array('lib/bootstrap.min', 'src/scripts.js')); ?>
<?php echo $this->CakeStrap->automaticScript(); ?>
<?php echo $this->element('sql_dump'); ?>
<?php //echo $this->Js->writeBuffer(); // Write cached scripts ?>

</body>
</html>
