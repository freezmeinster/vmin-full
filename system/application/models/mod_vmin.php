<?php
class Mod_vmin extends Model {

    function Mod_vmin()
    {
        parent::Model();
    }
    function destroy_vmin($name){
    $hah = $this->config->item('vmin_dir');
    $hih = $this->config->item('vmin_home');
    $vhome = trim($hih);
    $vdir = trim($hah);
    shell_exec ("sudo /usr/local/sbin/vserver --silent $name delete ");
    }
    function start_vmin($name){
    shell_exec("sudo /usr/local/sbin/vserver $name start");
    }
    
    function remote_change_pass($name,$pass){
    $vdir = $this->config->item('vmin_dir');
    $vhome = $this->config->item('vmin_home');
    $home = trim($vhome);
    $en_pass = shell_exec("/usr/bin/openssl passwd $pass");
    $lah = trim($en_pass);
    $beb  = shell_exec("sudo /bin/chroot $home/$name /usr/sbin/usermod -p \"$lah\" root");
    }
    
    function remote_change_mem($name,$mem){
    $vdir = $this->config->item('vmin_dir');
    $vhome = $this->config->item('vmin_home');
    $home = trim($vhome);
    $old_mem = shell_exec("cat /usr/local/etc/vservers/$name/rlimits/rss.hard");
    $new_mem = $mem*250;
    if ($old_mem == $new_mem){
    return 0;
    }else if($old_mem != $new_mem){
    shell_exec("sudo /usr/local/etc/script/edit_vps 1 $new_mem $name");
    $this->db->reconnect();
    $this->db->query("update vps set memory = '$mem' where vps_name like $mem");
    return 1;
    }
    }
    
    function edit_vmin($name,$mem,$old_mem,$ip,$old_ip,$pass){
    $vdir = $this->config->item('vmin_dir');
    $vhome = $this->config->item('vmin_home');
    $home = trim($vhome);
    $memory = $mem*250;
    
    if ($pass != "0"){
         $en_pass = shell_exec("/usr/bin/openssl passwd $pass");
         $lah = trim($en_pass);
         shell_exec ("sudo /bin/chroot $home/$name/ /usr/sbin/usermod -p \"$lah\" root");     
    } 
    
    if ($old_mem != $mem){
    shell_exec("sudo /usr/local/etc/script/edit_vps 1 $memory $name");
    }
    
    if ($old_ip != $ip) {
    shell_exec("sudo /usr/local/etc/script/edit_vps 2 $ip $old_ip $name");
    }
    }
    
    function stop_vmin($name){
    shell_exec("sudo /usr/local/sbin/vserver --silent $name stop &");
    shell_exec("sudo exit");
    }
    
    function vps_for_user($name,$vps,$vps_name){
    $this->db->reconnect();
    $this->db->query("update vps set user = '$name' where context like $vps"); 
    $this->db->query("update pesan set status = 'Created' where user like '$name' and order_vps_name like '$vps_name'");
    }
    
     function list_order($user){
        if ($user == "all"){
        $nguk = $this->db->query("select * from pesan ");
        }else $nguk = $this->db->query("select * from pesan where user like '$user'");
        $i=1;
        foreach ($nguk->result_array() as $row){
        if ($i % 2 == 0){
          $class = "row-a";
        }else if ($i % 2 == 1){
         $class = "row-b";
        }
        
        if ($user == "all"){
        $ngik = $row['user'];
        $hi = "<a href=\"../lib_vmin/user/$ngik\">$ngik</a></td><td>";
        }else{
        $hi = "" ;
        $ngik = $user;
        }
        
        $status = $row['status'];
        if ($status == "Pending"){
          $stat = "<a href=\"../lib_vmin/user/$ngik#tabs-2\">Pending</a></td>";
        } else $stat = "$status</td>";
        
        if ($user == "all"){
        $ngik = $row['user'];
        $hi = "<a href=\"../lib_vmin/user/$ngik\">$ngik</a></td><td>";
        }else $hi = "";
        
        echo "<tr class=\"$class\"><td>";
        echo $row["order_vps_name"];
        echo "</td><td>";
        echo $hi;
        echo $row['order_vps_memory'];
        echo "</td><td>";
        echo $stat;
        echo "</tr>";
        $i++;
        }
       }
       function template_vmin($name,$server){
       $vdir = $this->config->item('vmin_dir');
       $vopt = $this->config->item('vmin_opt');
       $vscript = $this->config->item('vmin_opt_script');
       $vhome = $this->config->item('vmin_home');
       $script = trim($vscript);
       $opt = trim($vopt);
       $home = trim($vhome);
       $ip = shell_exec("cat /usr/local/etc/vservers/$name/interfaces/0/ip");
       if ($server == "apache"){
       shell_exec("$script/apache $home/$name $opt");
       }else  if ($server == "proftpd"){
       shell_exec("$script/proftpd $home/$name $opt");
       }
       }
}
?>
