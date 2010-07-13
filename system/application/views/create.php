		
								
			</div>				
			
		<!-- content-wrap starts here -->
		
				
			<div id="main">
				<h2><a href="index.html"><?php echo $this->lang->line('create_header');?></a></h2>
				<?php echo form_open('lib_vmin/create');?>
				   <table>
				   <tr><td><?php echo $this->lang->line('create_name');?></td><td>:</td><td><input type="text" name="name"/></td></tr>
				    <tr><td><?php echo $this->lang->line('create_mem');?></td><td>:</td><td><select name="mem" >
				                                      <option value="16">16 Mb</option>
				                                      <option value="24">24 Mb</option>
				                                      <option value="32">32 Mb</option>
				                                      <option value="64">64 Mb</option>
				                                      <option value="128">128 Mb</option>
				                                      <option value="256">256 Mb</option>
				                                      </select>
				    </td></tr>
				    <tr><td><?php echo $this->lang->line('create_ip');?></td><td>:</td><td><select name="ip" >
				                                         <?php
				                                          $ip = $this->config->item('vmin_ip');
				                                          $nguk = $this->sysinfo->system();
				                                            if ($nguk['vs_max'] > "254"){
				                                                $nguk['vs_max'] = "254"; 
				                                                }
				                                           else if ($nguk['vs_max'] < "254"){
				                                                $nguk['vs_max'] = $nguk['vs_max']+=200; 
				                                                }
				                                            $i=150;
									  while($i<=$nguk['vs_max'])
									    {
									      echo "<option value=\"".$ip.".".$i."\">".$ip.".".$i."</option>\n";
									      $i++;
									    }
				                                         
                                                                         ?>
				                                      </select>
				    </td></tr>
				     <tr><td><?php echo $this->lang->line('create_pass1');?></td><td>:</td><td><input type="password" name="pass1"/></td></tr>
				     <tr><td><?php echo $this->lang->line('create_pass2');?></td><td>:</td><td><input type="password" name="pass2"/></td></tr>
				      <tr><td colspan="2"><input type="reset" value="<?php echo $this->lang->line('create_reset');?>"/></td><td><input type="submit" value="<?php echo $this->lang->line('create_build');?>"/></td></tr>
				   </table>
				</form>

			</div>
		
		<!-- content-wrap ends here -->	
		</div>