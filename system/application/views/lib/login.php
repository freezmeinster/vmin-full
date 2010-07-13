		
								
			</div>				
			
		<!-- content-wrap starts here -->
		
				
			<div id="main">
				<h2><?php echo $this->lang->line('login'); ?></h2>
				<?php echo form_open('lib_vmin/check');?>
				<table>
				<input type="hidden" name="asal" value="<?php echo $before;?>"/>
				<tr><td><?php echo $this->lang->line('login_user'); ?></td><td><input type="text" name="user" /></td></tr>
				<tr><td><?php echo $this->lang->line('login_pass'); ?></td><td><input type="password" name="pass" /></td></tr>
				<tr><td colspan="3"><input type="button" value="<?php echo $this->lang->line('login_back'); ?>" onClick="history.go(-1)"/>   <input type="submit" value="Login"></td></tr>
				</table>
			    </form>
			</div>
		
		<!-- content-wrap ends here -->	
		</div>
