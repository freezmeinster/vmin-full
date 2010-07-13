		
								
			</div>				
			
		<!-- content-wrap starts here -->
		
				
			<div id="main">
                                <h2><?php echo $this->lang->line('home_header');?></h2>
				<p><?php echo $this->lang->line('run_ava');?>
				<table>
				<?php 
				echo"<tr><th>";
				echo $this->lang->line('create_name');
				echo "</th><th>Context";
				echo "</th><th>";
				echo $this->lang->line('create_ip');
				echo "</th><th>";
				echo $this->lang->line('create_mem');
				echo "</th></tr>";
				;?>
				
				<?php
				$this->sysinfo->start_home();
				?>
                               </table></p> 
                               
                               <p><?php echo $this->lang->line('run_run');?>
				<table>
				<?php 
				echo"<tr><th>";
				echo $this->lang->line('create_name');
				echo "</th><th>Context";
				echo "</th><th>";
				echo $this->lang->line('create_ip');
				echo "</th><th>";
				echo $this->lang->line('side_mem_free');
				echo "</th><th>";
				echo $this->lang->line('run_up');
				echo "</th></tr>";
				;?>
				
				<?php
				$this->sysinfo->run_home();
				?>
                               </table></p> 
					<h2><?php echo $this->lang->line('about_header');?></h2>

				<p>
                                   <?php echo $this->lang->line('about_content');?> 
                                   </p>
                                  
                                  <p>
                                   <img src="<?php echo $this->config->item('vmin_url'); ?>/images/vmin/ci_logo.jpg"/>
 			           <img src="<?php echo $this->config->item('vmin_url'); ?>/images/vmin/vserver-logo.png"/>
				   <img src="<?php echo $this->config->item('vmin_url'); ?>/images/vmin/slackware_logo.png"/>
                                   <img src="<?php echo $this->config->item('vmin_url'); ?>/images/vmin/apache_logo.png"/>
                                   <img src="<?php echo $this->config->item('vmin_url'); ?>/images/vmin/linux-logo.jpg"/>
                                </p>
			</div>
		
		<!-- content-wrap ends here -->	
		</div>
