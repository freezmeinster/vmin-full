<?php
class Remote_vmin extends Controller {
	function Remote_vmin()
	{
		parent::Controller();	
		$lang = get_cookie('lang');
		$this->lang->load('link', $lang);
		$this->lang->load('content', $lang);
	}

        
        function user_rem_check(){
        $user=$this->input->post('user');
        $pass=$this->input->post('pass');
        $this->db->reconnect();
        $test = $this->db->query("select user from user where user like '$user' and pass like '$pass'");
        if ($test->num_rows() == 0 ){
        echo "0";
        }else if ($test->num_rows() > 0 ){
            $row = $test->row();
            if ( $row->user != $user){
                echo "0";
            }else if ($row->user == $user){
                echo "1";
            }
         }
        }
        
        function user_rem_info($field){
        $user=$this->input->post('user');
        $this->db->reconnect();
        $list = $this->db->query("select $field from user where user like '$user'");
        $row = $list->row();
        echo $row->$field;
        }
        
        function user_rem_edit(){
        $user = $this->input->post('user');
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $address = $this->input->post('address');
        $this->db->reconnect();
        $this->db->query("update user set name='$name' where user like '$user'");
        $this->db->query("update user set email='$email' where user like '$user'");
        $this->db->query("update user set phone='$phone' where user like '$user'");
        $this->db->query("update user set address='$address' where user like '$user'");
        }
        
        function user_rem_pass(){
        $user = $this->input->post('user');
        $pass = $this->input->post('pass');
        $this->db->reconnect();
        $this->db->query("update user set pass='$pass' where user like '$user'");
        }
        
        function start_vps($name){
        $this->mod_vmin->start_vmin($name);
	$this->db->reconnect();
        $this->db->query("update vps set status='Running' where vps_name like '$name' ");
        $this->db->reconnect();
        $data = $this->db->query("select user from vps where vps_name like '$name'");
        $raw = $data->row_array();
        $user = $raw['user'];
        $this->gui_vmin->send_user_message($user,"Your VPS with name $name has been Started");
        }
        
        function restart_vps($name){
        $this->mod_vmin->stop_vmin($name);
        $this->mod_vmin->start_vmin($name);
	$this->db->reconnect();
        $this->db->query("update vps set status='Running' where vps_name like '$name' ");
        $this->db->reconnect();
        $data = $this->db->query("select user from vps where vps_name like '$name'");
        $raw = $data->row_array();
        $user = $raw['user'];
        $this->gui_vmin->send_user_message($user,"Your VPS with name $name has been restarted");
        }
        
        function template_vps($name){
        $server = $this->input->post('server');
        $wew = $this->mod_vmin->template_vmin($name,$server);
        echo $wew;
        }
        
        function shutdown_vps($name){
        $this->mod_vmin->stop_vmin($name);
	$this->db->reconnect();
        $this->db->query("update vps set status='Stoped' where vps_name like '$name' ");
        $this->db->reconnect();
        $data = $this->db->query("select user from vps where vps_name like '$name'");
        $raw = $data->row_array();
        $user = $raw['user'];
        $this->gui_vmin->send_user_message($user,"Your VPS with name $name has been Stoped");
        }
        
        function list_vps($user){
        $this->db->reconnect();
        $uvpanel = $this->config->item('uvpanel_url');
        $list = $this->db->query("select * from vps where user like '$user'");
        $i=1;
        foreach ($list->result_array() as $row)
        {
        
        if($i % 2 == 0){
         $th = "row-a";
        }else if($i % 2 == 1){
         $th = "row-b";
        }
        
        $context = $row['context'];
        $name = $row['vps_name'];
        $stat = $row['status'];
        
        if ($stat == "Running"){
          $class = "on";
          $help = "";
        }else if ($stat == "Stoped"){
          $class = "off";
          $mess = $this->lang->line('req_start');
          $help = "<a class=\"help\" href=\"../../index.php/lib_uvpanel/req_start/$name\" title=\"$mess $name\">";
        }
        echo "<tr class=\"$th\"><td><a href=\"$uvpanel/index.php/uvpanel/vps/$context\" >";
        echo $name;
        echo "</a></td><td>";
        echo $row['memory'];
        echo "</td><td>";
        echo $context;
        echo "</td><td class=\"$class\" > $help";
        echo $stat;
        echo "</a></td></tr>\n";
        $i++;
        }
        }
        
        function sysinfo($part){
         $con = $this->input->post('context');
         $vps= trim(shell_exec("sudo /usr/local/sbin/vserver-stat | grep $con | awk '{ print $8}'"));
         $vs_dev=$this->config->item('vmin_dev');
         if($part == "vps_name"){
         echo $vps;
         }else if ($part == "total_memory"){
         $total = shell_exec("cat /usr/local/etc/vservers/$vps/rlimits/rss.hard");
         echo $total;
         }else if ($part == "usage_memory"){
         $usage = shell_exec("sudo /usr/local/sbin/vserver-stat | grep $vps | awk '{ print $4}' | cut -dM -f 1 | cut -d. -f 1");
         echo $usage;
         }else if ($part == "disk_free"){
         $disk = shell_exec("df -h | grep $vs_dev | awk '{print $4}'");
         echo $disk;
         }else if ($part == "disk_cap"){
         $disk = shell_exec("df -h | grep $vs_dev | awk '{print $2}'");
         echo $disk;
         }else if ($part == "disk"){
         $disk = shell_exec("df -m | grep $vs_dev | awk '{print $4}'");
         echo $disk;
         }else if ($part == "total_proc"){
         $disk = shell_exec("sudo /usr/local/sbin/vserver-stat | grep $vps | awk '{print $2}'");
         echo $disk;
         }else if ($part == "most_proc"){
         $disk = shell_exec("sudo /usr/local/sbin/vserver $vps exec ps aux --sort -rss | head -n 2 | grep -v USER | awk '{print $11}'");
         echo $disk;
         }else if ($part == "per_cpu"){
         $cpu = shell_exec("sudo /usr/local/sbin/vserver $vps exec mpstat | grep all | awk '{print $11}' | cut -d. -f1");
         $disk = 100 - $cpu;
         echo $disk;
         }else if ($part == "ip"){
         $ip = shell_exec("cat /usr/local/etc/vservers/$vps/interfaces/0/ip");
         $http = shell_exec("sudo /usr/local/sbin/vserver $vps exec socklist | grep 80 | head -n 1 | awk '{print $2}'");
         
         if ( $http == 80 ){
           $disk = "<a href=\"http://$ip\" target=\"none\">$ip</a>";
         }else $disk = $ip;
        
         echo $disk;
        }
        }
        function create_order($user){
        $vps_name = $this->input->post('vps_name');
        $mem = $this->input->post('memory');
        $this->db->reconnect();
        $this->db->query("insert into pesan (user,order_vps_name,order_vps_memory,status) values('$user','$vps_name','$mem','Pending')");
        }
        
        function list_order($user){
        $nguk = $this->db->query("select * from pesan where user like '$user'");
        $i=1;
        foreach ($nguk->result_array() as $row){
        if($i % 2 == 0){
         $th = "row-a";
        }else if($i % 2 == 1){
         $th = "row-b";
        }
        echo "<tr class=\"$th\"><td>";
        echo $row["order_vps_name"];
        echo "</td><td>";
        echo $row["order_vps_memory"];
        echo "</td><td>";
        echo $row["status"];
        echo "</td></th>";
        $i++;
        }
       }
       
        function list_mess($user){
        $nguk = $this->db->query("select * from user_message where user like '$user'");
        $i=1;
        foreach ($nguk->result_array() as $row){
        if ($i % 2 == 0){
          $class = "row-a";
        }else if ($i % 2 == 1){
          $class = "row-b";
        }
        echo "<tr class=\"$class\"><td>";
        echo $i;
        echo "</td><td>";
        echo $row["message"];
         echo "</td><td>";
        echo $row["date"];
        echo "</td></th>";
        $i++;
        }
        }
        
        function list_mess_out($user){
        $nguk = $this->db->query("select rowid,sender,message,date,status,id from admin_message where sender like '$user'");
        $i=1;
        foreach ($nguk->result_array() as $row){
        if ($i % 2 == 0){
          $class = "row-a";
        }else if ($i % 2 == 1){
          $class = "row-b";
        }
        echo "<tr class=\"$class\"><td>";
        echo $i;
        echo "</td><td>";
        echo $row["message"];
        echo "</td><td>";
        echo $row["status"];
        echo "</td><td>";
        echo $row["date"];
        echo "</td></th>";
        $i++;
        }
        }
        
        function del_mess($user){
        $this->db->reconnect();
        $this->db->query("delete from user_message where user like '$user'");
        }
        
        function user_message($user){
        $mess = $this->input->post('message');
        $this->db->reconnect();
        $this->db->query("insert into admin_message (sender,message,date,status) values('$user','$mess',datetime('now'),'Unread')");
        }
        
        function change_vps_pass(){
        $context = $this->input->post('context');
        $pass = $this->input->post('pass');
        $vhome = $this->config->item('vmin_home');
        $home = trim($vhome);
        $wew  = shell_exec("sudo /usr/local/sbin/vserver-stat | grep $context | awk '{print $8}'");
        $name = trim($wew);
        $this->mod_vmin->remote_change_pass($name,$pass);
        }
        
        function change_vps_mem(){
        $context = $this->input->post('context');
        $mem = $this->input->post('mem');
        $vhome = $this->config->item('vmin_home');
        $home = trim($vhome);
        $wew  = shell_exec("sudo /usr/local/sbin/vserver-stat | grep $context | awk '{print $8}'");
        $name = trim($wew);
        $hah = $this->mod_vmin->remote_change_mem($name,$mem);
        echo $hah;
        }
}
?>
