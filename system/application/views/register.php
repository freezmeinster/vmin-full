		
								
			</div>				
			
		<!-- content-wrap starts here -->
		
				
			<div id="main">
				<h2><?php echo $this->lang->line('reg_header');?></h2>
				<table>
				<?php 
				echo"<tr><th>";
				echo $this->lang->line('create_name');
				echo "</th><th>";
				echo $this->lang->line('reg_user');
				echo "</th><th>Context";
				echo "</th><th>";
				echo $this->lang->line('create_ip');
				echo "</th><th>";
				echo $this->lang->line('create_mem');
				echo "</th><th>";
				echo $this->lang->line('reg_option');
				echo "</th></tr>";
				;?>
				
				<?php
				$this->sysinfo->reg_list();
				?>
                               </table> 
			</div>
		
		<!-- content-wrap ends here -->	
		</div>