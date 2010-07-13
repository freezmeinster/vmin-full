		
								
			</div>				
			
		<!-- content-wrap starts here -->
		
				
			<div id="main">
				<h2><?php echo $this->lang->line('template_header');?> <?php echo $name;?></h2>
			<p>
			   <h1>Service Template</h1>
			   
                            <?php 
                            $attributes = array('name' => 'myform');
                            echo form_open('lib_vmin/template',$attributes);
                            ?>
                            
                            <input type="hidden" value="<?php echo $name;?>" name="vps">
                            <input type="hidden" value="<?php echo $name;?>" name="hidSubmit">
                            <table>
                             <tr>
                                <td>
                                 <fieldset>
                                   <legend align="center"><strong>HTTP Service</strong></legend>
                                   <table>
                                      <tr><td><input type="checkbox" name="service[]" value="apache"></td><td>Apache</td></tr>
                                      <tr><td><input type="checkbox" name="service[]" value="php"></td><td>PHP</td></tr>
                                   </table>
                                 </fieldset>
                                </td>
                                <td>
                                 <fieldset>
                                   <legend align="center"><strong>Database Service</strong></legend>
                                   <table>
                                      <tr><td><input type="checkbox" name="service[]" value="mysqld"></td><td>Mysqld</td></tr>
                                   </table>
                                 </fieldset>
                                </td>
                                <td>
                                 <fieldset>
                                   <legend align="center"><strong>Ftp Service</strong></legend>
                                   <table>
                                      <tr><td><input type="checkbox" name="service[]" value="lftp"></td><td>Lftp client</td></tr>
                                      <tr><td><input type="checkbox" name="service[]" value="proftpd"></td><td>Proftpd</td></tr>
                                      <tr><td><input type="checkbox" name="service[]" value="vsftpd"></td><td>Vsftpd</td></tr>
                                   </table>
                                 </fieldset>
                                </td>
                             </tr>
                             <tr>
                               <td>
                                 <fieldset>
                                   <legend align="center"><strong>Multimedia Service</strong></legend>
                                   <table>
                                      <tr><td><input type="checkbox" name="service[]" value="openfire"></td><td>Openfire</td></tr>
                                   </table>
                                 </fieldset>
                                </td>
                                 <td>
                                 <fieldset>
                                   <legend align="center"><strong>Directory Service</strong></legend>
                                   <table>
                                      <tr><td><input type="checkbox" name="service[]" value="samba"></td><td>SAMBA</td></tr>
                                      <tr><td><input type="checkbox" name="service[]" value="ldap"></td><td>LDAP</td></tr>
                                   </table>
                                 </fieldset>
                                </td>
                                <td>
                                 <fieldset>
                                   <legend align="center"><strong>Monitoring</strong></legend>
                                   <table>
                                      <tr><td><input type="checkbox" name="service[]" value="sysinfo"></td><td>PHP Sysinfo</td></tr>
                                   </table>
                                 </fieldset>
                                </td>
                             </tr>
                             <tr><td colspan="3"><input type="reset" value="Reset"> <input type="submit" value="Install"></td></tr>
                            </table>			    
                            </form>
				</p>	
		
			</div>
		
		<!-- content-wrap ends here -->	
		</div>