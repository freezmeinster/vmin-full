		
								
			</div>				
			
		<!-- content-wrap starts here -->
		
				
			<div id="main">
			<table>
			<?php 
				echo"<tr><th>";
				echo $this->lang->line('user_user');
				echo "</th><th>";
				echo $this->lang->line('user_name');
				echo "</th><th>";
				echo $this->lang->line('user_email');
				echo "</th><th>";
				echo $this->lang->line('user_phone');
				echo "</th><th>";
				echo $this->lang->line('user_address');
				echo "</th></tr>";
				;?>
			<?php
			$user = $this->gui_vmin->get_user_list();
			$i = 1;
			foreach ($user->result_array() as $row)
                        {
                        $user = $row['user'];
                        if ( $i % 2 == 0 ){
                          $class = "row-a";
                        }else if ( $i % 2 == 1 ){
                          $class = "row-b";
                        }
                        echo "<tr class=\"$class\"><td><a href=\"../lib_vmin/user/$user\">";
                        echo $user;
                        echo "</td><td>";
                        echo $row['name'];
                        echo "</td><td>";
                        echo $row['email'];
                        echo "</td><td>";
                        echo $row['phone'];
                        echo "</td><td>";
                        echo $row['address'];
                        echo "</td>";
                        $i++;
                        }
			?>
                        </table>
			</div>
		
		<!-- content-wrap ends here -->	
		</div>
