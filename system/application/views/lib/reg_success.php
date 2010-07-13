		
								
			</div>				
			
		<!-- content-wrap starts here -->
		
				
			<div id="main">
				<h3><?php echo $this->lang->line('reg_success'); ?></h3>
                                <table>
                                <tr><td><?php echo $this->lang->line('login_user'); ?></td><td>:</td><td><?php echo $user?></td></tr>
                                <tr><td><?php echo $this->lang->line('reg_name'); ?></td><td>:</td><td><?php echo $name?></td></tr>
                                <tr><td><?php echo $this->lang->line('reg_email'); ?></td><td>:</td><td><?php echo $email?></td></tr>
                                <tr><td><?php echo $this->lang->line('reg_phone'); ?></td><td>:</td><td><?php echo $phone?></td></tr>
                                <tr><td><?php echo $this->lang->line('reg_address'); ?></td><td>:</td><td><?php echo $address?></td></tr>
                                <tr><td></td><td></td><td><input type="button" value="Login" onclick="window.location.replace('<?php echo $this->config->item('uvpanel_url');?>')"></td></tr>
                                </table>
                                

			</div>
		
		<!-- content-wrap ends here -->	
		</div>