<head>
  <title>
    <?php 
    echo $this->lang->line('user_header');
    $info = $this->gui_vmin->get_user_detail($name);
    ?>
  </title>
  <link type="text/css" href="<?php echo base_url();?>images/vmin/ui-lightness/jquery-ui-1.8.custom.css" rel="stylesheet" />
  <link rel="stylesheet" href="<?php echo base_url();?>images/vmin/Envision.css" type="text/css" />
  <script type="text/javascript" src="<?php echo base_url();?>images/vmin/js/jquery.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>images/vmin/js/jquery-ui-1.8.custom.min.js"></script>
</head>	
<script type="text/javascript" src="<?php echo base_url();?>images/vmin/js/login.js"></script>
<body style="background-color : #CCCCCC; text-align : center;" >
<div align="center">

<div id="user_profile" title="<?php echo $this->lang->line('edit_profile'); ?>">
	<p>
	<form action="<?php echo site_url();?>/lib_vmin/user_edit/<?php echo $name;?>" method="POST">
	 <table>
	         <input type="hidden" name="jenis" value="0">
                 <tr><td><?php echo $this->lang->line('reg_name'); ?></td><td>:</td><td><input type="text" value="<?php echo $info['name'];?>" name="name"></td></tr>
                 <tr><td><?php echo $this->lang->line('reg_email'); ?></td><td>:</td><td><input type="text" value="<?php echo $info['email'];?>" name="email"></td></tr>
                 <tr><td><?php echo $this->lang->line('reg_phone'); ?></td><td>:</td><td><input type="text" value="<?php echo $info['phone'];;?>" name="phone"></td></tr>
                 <tr><td><?php echo $this->lang->line('reg_address'); ?></td><td>:</td><td><textarea name="address"><?php echo $info['address'];?></textarea></td></tr>
                 <tr><td></td><td></td><td><input type="submit" value="<?php echo $this->lang->line('create_edit');?>"></td></tr>
          </table>
         </form>   
	</p>
</div>

<div id="support" style="display: none;" title="<?php echo $this->lang->line('support_header'); ?>">
<p>
<form action="" method="POST">
 <table cellpadding="10" align="center">
  <input type="hidden" name="user" value="<?php echo $this->session->userdata('user');?>">
  <tr><td><?php echo $this->lang->line('support_message'); ?></td></tr>
  <tr><td><textarea style="width: 350px; height:100px; " name="message"></textarea></td></tr>
  <tr><td><input type="submit" value="<?php echo $this->lang->line('support_send');?>"></td></tr>
  </table>
</form>
</p>
</div>

<div id="user_delete" title="<?php echo $this->lang->line('user_delete'); ?>">
  <p>
   <?php echo $this->lang->line('del_warning');?>
  <table cellpadding="10">
                 <tr><td><?php echo $this->lang->line('login_user'); ?></td><td>:</td><td><?php echo $name;?></td></tr>
                 <tr><td><?php echo $this->lang->line('reg_name'); ?></td><td>:</td><td><?php echo $info['name'];?></td></tr>
                 <tr><td><?php echo $this->lang->line('reg_email'); ?></td><td>:</td><td><?php echo $info['email'];?></td></tr>
                 <tr><td><?php echo $this->lang->line('reg_phone'); ?></td><td>:</td><td><?php echo $info['phone'];?></td></tr>
                 <tr><td><?php echo $this->lang->line('reg_address'); ?></td><td>:</td><td><?php echo $info['address'];?></td></tr>
      <tr><td></td><td></td><td><input type="button" value="<?php echo $this->lang->line('reg_accept');?>" onclick="window.location.replace('<?php echo site_url();?>/lib_vmin/user_delete/<?php echo $name;?>')"></td></tr>
    </table>
 </p>
</div>

<div id="user_pass" title="<?php echo $this->lang->line('edit_password'); ?>">
  <p>
    <form action="<?php echo site_url();?>/lib_vmin/user_edit/<?php echo $name;?>" method="POST">
    <table>
      <input type="hidden" name="jenis" value="1">
      <tr><td><?php echo $this->lang->line('login_pass'); ?></td><td>:</td><td><input type="password" name="pass"></td></tr>
      <tr><td></td><td></td><td><input type="submit" value="<?php echo $this->lang->line('create_edit');?>"></td></tr>
    </table>
    </form>
  </p>
</div>

<div id="vps" title="<?php echo $this->lang->line('order_vps_reg'); ?> <?php echo $name;?>">
  <p>
   <table>
				<?php 
				echo"<tr><th>";
				echo $this->lang->line('create_name');
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
				$this->sysinfo->order_reg_list($name);
				?>
                               </table> 
  </p>
</div>

<div id="tabs" class="ui-tabs ui-widget ui-widget-content ui-corner-all" style="width : 600px;">
	<ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all">
		<li><a href="#tabs-1"><?php echo $this->lang->line('reg_user'); ?></a></li>
		<li><a href="#tabs-2"><?php echo $this->lang->line('reg_system'); ?></a></li>
		<li><a href="#tabs-3"><?php echo $this->lang->line('order&message'); ?></a></li>
		<li><a href="#back" onclick="window.location.replace('<?php echo site_url();?>/vmin/user')"><?php echo $this->lang->line('login_back'); ?></a></li>
	</ul>
	<form action="<?php echo $this->config->item('vmin_path');?>index.php/vmin/user_reg" method="POST">
	<div id="tabs-1">
	       
		<p>
                 <table cellpadding="10">
                 <tr><td><?php echo $this->lang->line('login_user'); ?></td><td>:</td><td><?php echo $name;?></td></tr>
                 <tr><td><?php echo $this->lang->line('reg_name'); ?></td><td>:</td><td><?php echo $info['name'];?></td></tr>
                 <tr><td><?php echo $this->lang->line('reg_email'); ?></td><td>:</td><td><?php echo $info['email'];?></td></tr>
                 <tr><td><?php echo $this->lang->line('reg_phone'); ?></td><td>:</td><td><?php echo $info['phone'];?></td></tr>
                 <tr><td><?php echo $this->lang->line('reg_address'); ?></td><td>:</td><td><?php echo $info['address'];?></td></tr>
                 </table>
                 <input type="button" id="edit-delete" value="<?php echo $this->lang->line('user_delete'); ?>">
                 <input type="button" id="edit-user" value="<?php echo $this->lang->line('edit_profile'); ?>">
                 <input type="button" id="edit-pass" value="<?php echo $this->lang->line('edit_password'); ?>">
		</p>
	</div>
	<div id="tabs-2">
		<p>
		 <h1>Virtual Private Server</h1>
		 <table>
		 <tr><th><?php echo $this->lang->line('reg_vps_name'); ?></th><th><?php echo $this->lang->line('side_mem'); ?></th><th>Context</th><th>Status</th></tr>
                 <?php $this->gui_vmin->get_user_vps($name);?>
                 </table>
                  <input type="button" id="order-vps" value="<?php echo $this->lang->line('order_vps_reg');?> <?php echo $name;?>">
                 </p>
	</div>
	<div id="tabs-3">
	        <p>
	        <h1><?php echo $this->lang->line('order_vps'); ?></h1>
		 <table>
		 <tr><th><?php echo $this->lang->line('reg_vps_name'); ?></th><th><?php echo $this->lang->line('side_mem'); ?></th><th>Status</th></tr>
		 <?php $this->mod_vmin->list_order($name);?>
                 </table>
	        </p>
	        <p>
	        <h1><?php echo $this->lang->line('support_header'); ?></h1>
		 <table>
		 <tr><th><?php echo $this->lang->line('support_message'); ?></th><th>Status</th><th><?php echo $this->lang->line('reg_option'); ?></th></tr>
                 <?php
			$user = $this->gui_vmin->get_message_list($name);
			$i = 1;
			foreach ($user->result_array() as $row)
                        {
                        $user = $row['sender'];
                        $id = $row['rowid'];
                        if ( $i % 2 == 0 ){
                          $class = "row-a";
                        }else if ( $i % 2 == 1 ){
                          $class = "row-b";
                        }
                        echo "<tr class=\"$class\"><td>";
                        echo $row['message'];
                        echo "</td><td>";
                        echo $row['status'];
                        echo "</td><td><a href=\"../lib_vmin/change_mess/$user/$id\">Change</a> ";
                        echo "</td>";
                        $i++;
                        }
			?>
                 </table>
	        </p>
	</div>
	</form>
</div>
</div>
</body>
</html>