<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

<meta name="Description" content="System Administrator" />
<meta name="Keywords" content="your, keywords" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="Distribution" content="Global" />
<meta name="Author" content="Bramandityo Prabowo, freez_meinster@yahoo.co.id" />
<meta name="Robots" content="index,follow" />
                <script type="text/javascript" src="<?php echo $this->config->item('vmin_url'); ?>/images/vmin/js/jquery.js"></script>
		<script type="text/javascript" src="<?php echo $this->config->item('vmin_url'); ?>/images/vmin/js/jquery.progressbar.min.js"></script>
		<script>
			var progress_key = '';
			
			$(document).ready(function() {
				$("#spaceused1").progressBar({ 
				barImage: '<?php echo $this->config->item('vmin_url'); ?>images/vmin/progressbg_yellow.gif',
				boxImage: '<?php echo $this->config->item('vmin_url'); ?>images/vmin/progressbar.gif',
				showText: false
				} );
				$("#spaceused2").progressBar({ 
				barImage: '<?php echo $this->config->item('vmin_url'); ?>images/vmin/progressbg_green.gif',
				boxImage: '<?php echo $this->config->item('vmin_url'); ?>images/vmin/progressbar.gif',
				showText: false
				} );

			});
			
		</script>


<link rel="stylesheet" href="<?php echo $this->config->item('vmin_url'); ?>images/vmin/Envision.css" type="text/css" />

<title><?php echo $this->lang->line('site');?></title>
	
</head>

<body>
<!-- wrap starts here -->
<div id="wrap">
		
		<!--header -->
		<div id="header">			
				
			<h1 id="logo-text"><a href="<?php echo site_url();?>/vmin"><?php echo $this->lang->line('site'); ?></a></h1>		
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
			<ul>
			       <?php
			        $site = site_url();
                                $user = $this->session->userdata('user');
                                $user_vmin = $this->config->item('user_vmin'); 
				echo "<li id=\"\"><a href=\"$site/vmin\">".$this->lang->line('home')."</a></li>\n";
				echo "<li id=\"\"><a href=\"$site/vmin/create\">".$this->lang->line('create')."</a></li>\n";
				echo "<li id=\"\"><a href=\"$site/vmin/reg\">".$this->lang->line('reg')."</a></li>\n";
				echo "<li id=\"\"><a href=\"$site/vmin/user\">".$this->lang->line('user')."</a></li>\n";
				echo "<li id=\"\"><a href=\"$site/vmin/message\">".$this->lang->line('message')."</a></li>\n";
				echo "<li id=\"\"><a href=\"$site/vmin/run\">".$this->lang->line('run')."</a></li>\n";
                                if ($user == $user_vmin){
                                  echo "<li id=\"\"><a href=\"$site/lib_vmin/logout\">Logout</a></li>\n";
                                 }
                                  ?>
			</ul>
		</div>	
