<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

<meta name="Description" content="System Administrator" />
<meta name="Keywords" content="your, keywords" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="Distribution" content="Global" />
<meta name="Author" content="Bramandityo Prabowo, freez_meinster@yahoo.co.id" />
<meta name="Robots" content="index,follow" />
<title><?php echo $this->lang->line('site');?></title>

<link type="text/css" href="<?php echo $this->config->item('vmin_url'); ?>images/vmin/ui-lightness/jquery-ui-1.8.custom.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo $this->config->item('vmin_url'); ?>images/vmin/Envision.css" type="text/css" />
<script type="text/javascript" src="<?php echo $this->config->item('vmin_url'); ?>images/vmin/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo $this->config->item('vmin_url'); ?>images/vmin/js/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo $this->config->item('vmin_url'); ?>images/vmin/js/jquery-ui-1.8.custom.min.js"></script>
<script type="text/javascript">
	$(function() {
		$("#tabs").tabs();
	});
	</script>
<script>
  $(document).ready(function(){
    $("#form").validate();
  }); 
  </script>

	
</head>

<body>
<!-- wrap starts here -->
<div id="wrap">
		
		<!--header -->
		<div id="header">			
				
			<h1 id="logo-text"><a href="index.html"><?php echo $this->lang->line('site'); ?></a></h1>		
			<p id="slogan"><?php echo $this->lang->line('slogan'); ?></p>	
                        <div id="header-links">
			<p>
				<a href="<?php echo site_url();?>/lib_vmin/set_lang/english/<?php echo $pos; ?>">English</a> | 
				<a href="<?php echo site_url();?>/lib_vmin/set_lang/indonesia/<?php echo $pos; ?>">Endonesa</a> 			
			</p>		
		</div>	
			
		</div>
		
		<!-- menu -->	
		<div  id="menu">
			
		</div>	
