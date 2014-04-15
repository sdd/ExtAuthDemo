<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<?php echo $this->Html->charset(); ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>
		<?php echo Configure::read('App.PageTitlePrefix'); ?>:
		<?php echo $title_for_layout; ?>
	</title>
    <meta name="viewport" content="width=device-width">
	<?php echo $this->fetch('meta'); ?>
	<?php if (isset($meta_robots) && !is_null($meta_robots)) echo $this->Html->meta(array('name' => 'robots', 'content' => $meta_robots));?>
	<?php if (Configure::read('Site.opengraph'))
	foreach (Configure::read('Site.opengraph') as $key => $content)
		echo $this->Html->meta(array('name' => 'og:' . $key, 'content' => $content)); ?>
	<?php echo $this->Html->css('cake.generic'); ?>
	<?php echo $this->Html->css(Configure::read('debug')==0 ? 'screen' : 'screen'); ?>
	<?php echo $this->Html->css('print'); ?>
    <script>
        var docready=[],$=function(){return{ready:function(fn){docready.push(fn)}}},jquiQueue=[],jqui=function(){return{ready:function(fn){jquiQueue.push(fn)}}}
        window._gaq=[['_setAccount','<?php echo Configure::read('Site.GAQid') ?>'],['_trackPageview'],['_trackPageLoadTime']];
        WebFontConfig = { google: { families: [ 'Source+Sans+Pro:400,700', 'Sansita+One' ] } };
    </script>
	<?php echo $this->Html->script('modernizr-2.6.2' . (Configure::read('debug')?'.min':'') ); ?>
	<?php echo $this->Html->script('yepnope-1.5.4' . (Configure::read('debug')?'.min':'') ); ?>
	<?php echo $this->fetch('script'); ?>
</head>
<body>
	<!--[if lt IE 7]>
		<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
	<![endif]-->

	<div id="container">

		<?php echo $this->element('layout/header'); ?>
		<?php echo $this->Session->flash(); ?>

		<?php echo $this->Html->div(
		'main' . ($this->params['prefix']=='admin' ? ' admin' : ''),
		$this->fetch('content'),
		array('role' => 'main')
	); ?>
        <div class="clearfix"></div>
		<?php echo $this->element('layout/footer'); ?>
    </div>
	<?php echo $this->element('layout/loader'); ?>
	<?php if ($this->Js) echo $this->Js->writeBuffer(); ?>
</body>
</html>
