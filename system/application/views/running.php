		
								
			</div>				
			
		<!-- content-wrap starts here -->
		
				
			<div id="main">
				<h2><?php echo $this->lang->line('run_header');?></h2>
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
				echo "</th><th>Status</th><th>";
				echo $this->lang->line('reg_option');
				echo "</th></tr>";
				;?>
				
				<?php
				$this->sysinfo->start_list();
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
				echo "</th><th>";
				echo $this->lang->line('reg_option');
				echo "</th></tr>";
				;?>
				
				<?php
				$this->sysinfo->run_list();
				?>
                               </table></p> 
			</div>
		
		<!-- content-wrap ends here -->	
		</div>
