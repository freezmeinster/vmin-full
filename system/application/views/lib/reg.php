		
								
			</div>				
			
		<!-- content-wrap starts here -->
		
				
			<div id="main">
							
                          <div align="center">
                            <div id="tabs" class="ui-tabs ui-widget ui-widget-content ui-corner-all" style="width : 460px;">
	                      <ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all" >
		                <li><a href="#tabs-1"><?php echo $this->lang->line('reg_user'); ?></a></li>
		                <li><a href="#tabs-3"><?php echo $this->lang->line('reg_done'); ?></a></li>
	                      </ul>
	<form action="<?php echo site_url();?>/lib_vmin/user_reg" method="POST" id="form">
	<div id="tabs-1">
		<p>
                 <table>
                 <tr><td><?php echo $this->lang->line('login_user'); ?></td><td>:</td><td><input type="text" name="user" class="required" ></td></tr>
                 <tr><td><?php echo $this->lang->line('login_pass'); ?></td><td>:</td><td><input type="password" name="pass1" class="required"></td></tr>
                 <tr><td><?php echo $this->lang->line('reg_2pass'); ?></td><td>:</td><td><input type="password" name="pass2" class="required"></td></tr>
                 <tr><td><?php echo $this->lang->line('reg_name'); ?></td><td>:</td><td><input type="text" name="name" class="required" title="<?php echo $this->lang->line('reg_name_err');?>"></td></tr>
                 <tr><td><?php echo $this->lang->line('reg_email'); ?></td><td>:</td><td><input type="text" name="email" class="required email" title="<?php echo $this->lang->line('reg_email_err');?>"></td></tr>
                 <tr><td><?php echo $this->lang->line('reg_phone'); ?></td><td>:</td><td><input type="text" name="phone" class="required" title="<?php echo $this->lang->line('reg_phone_err');?>"></td></tr>
                 <tr><td><?php echo $this->lang->line('reg_address'); ?></td><td>:</td><td><textarea name="address" cols="1" class="required" title="<?php echo $this->lang->line('reg_address_err');?>"></textarea></td></tr>
                 <tr><td></td><td></td><td></td></tr>
                 <tr><td><input onclick="javascript:history.back()" type="button" value="<?php echo $this->lang->line('login_cancel'); ?>"></td><td></td><td><input type="submit" value="<?php echo $this->lang->line('reg_accept'); ?>"></td></tr>
                 </table>
		</p>
	</div>
	<div id="tabs-3">
	        <p>
	        <?php echo $this->lang->line('reg_aggrement'); ?>
	        </p>
		<p>
		<table>
	
		</table>
		</p>
		
	</div>
	</form>
</div>
</div>

			</div>
		
		<!-- content-wrap ends here -->	
		</div>
