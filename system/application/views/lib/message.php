		
								
			</div>				
			
		<!-- content-wrap starts here -->
		
				
			<div id="main">
			<p>
			<h1><?php echo $this->lang->line('support_header'); ?></h1>
			<table>
			<?php 
				echo"<tr><th>";
				echo $this->lang->line('user_user');
				echo "</th><th>";
				echo $this->lang->line('support_message');
				echo "</th><th>";
				echo $this->lang->line('date');
				echo "</th><th>Status";
				echo "</th><th>Opsi</th>";
				echo "</tr>";
				;?>
			<?php
			$user = $this->gui_vmin->get_message_list('all');
			$i = 1;
			foreach ($user->result_array() as $row)
                        {
                        $user = $row['sender'];
                        $date = $row['date'];
                        $id = $row['id'];
                        $id = $row['rowid'];
                        if ( $i % 2 == 0 ){
                          $class = "row-a";
                        }else if ( $i % 2 == 1 ){
                          $class = "row-b";
                        }
                        echo "<tr class=\"$class\"><td><a href=\"../lib_vmin/user/$user\">";
                        echo $user;
                        echo "</a></td><td>";
                        echo $row['message'];
                        echo "</td><td>";
                        echo $date;
                        echo "</td><td>";
                        echo $row['status'];
                        echo "</td><td><a href=\"../lib_vmin/change_mess/$user/$id\">Change</a> <a href=\"../lib_vmin/del_mess/$user/$id\">Delete</a>";
                        echo "</td>";
                        $i++;
                        }
			?>
                        </table>
                        </p>
                        <p>
                        <h1><?php echo $this->lang->line('order_vps'); ?></h1>
                        <table>
			<?php 
				echo"<tr><th>";
				echo $this->lang->line('reg_vps_name');
				echo "</th><th>";
				echo $this->lang->line('user_user');
				echo "</th><th>";
				echo $this->lang->line('side_mem');
				echo "</th><th>Status</th>";
				echo "</tr>";
				;?>
			<?php $this->mod_vmin->list_order('all');?>
                        </table>
                        </p>
			</div>
		
		<!-- content-wrap ends here -->	
		</div>
