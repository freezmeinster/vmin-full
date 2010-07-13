<?php
class Sysinfo extends Model {

    function Sysinfo()
    {
        parent::Model();
    }
    function system(){
             $vs_dev=$this->config->item('vmin_dev');
             $data['total_mem'] = shell_exec("free -m | grep Mem | awk '{ print $2 }'");
             $data['free_mem'] = shell_exec("free -m | grep Mem | awk '{ print $4 }'");
             $data['usage_mem'] = shell_exec("free -m | grep Mem | awk '{ print $3 }'");
             $fmem = $data['free_mem'];
             $tmem = $data['total_mem'];
             $umem = $data['usage_mem'];
             $data['perfree'] = floor(($fmem * 100) / $tmem);
             $data['perusage'] = floor(($umem * 100) / $tmem);
             $data['vs_free'] = shell_exec("df -h | grep $vs_dev | awk '{print $4}'");
             $data['vs_dir'] = shell_exec("vserver-info system SYSINFO | grep vserver-Rootdir | awk '{print $2}'");
             $data['vs_cap'] = shell_exec("df -h | grep $vs_dev | awk '{print $2}'");
             $freedsk=shell_exec("df -m | grep $vs_dev | awk '{print $4}'");
             $data['vs_max'] = floor($freedsk / 500);
             $lang = get_cookie('lang');
             if ( $lang == "" ){
                  $lang = "english";
             }
                   if ( $lang == "english"){
                      if (floor(($fmem * 100) / $tmem) <= 50){
                          $data['stat'] = "Server is dying !!";
                      } else if (floor(($fmem * 100) / $tmem) >= 50 ){
                          $data['stat'] = "Server is health";
                      }  
                   } else if ($lang == "indonesia"){
                      if (floor(($fmem * 100) / $tmem) <= 50){
                          $data['stat'] = "Server sekarat !!";
                      } else if (floor(($fmem * 100) / $tmem) >= 50 ){
                          $data['stat'] = "Server sehat";
                      } 
                   }
             return $data;
        
    }
    
    function reg_list(){
    $conf_dir = $this->config->item('vmin_dir');
    $clean = trim($conf_dir);
    $dir = "$clean/etc/vservers";
    $ava = scandir($dir);
    $i=1;
    foreach ($ava as $wew) {
         if ($wew != "." && $wew != ".." && $wew != ".defaults" && $wew != ".distributions"){ 
              $context = shell_exec("cat $dir/$wew/context");
              $ip = shell_exec("cat $dir/$wew/interfaces/0/ip");
              $mem_pure = shell_exec("cat $dir/$wew/rlimits/rss.hard");
              $mem = floor($mem_pure/250);
              $site = site_url();
              $this->db->reconnect();
              $query = $this->db->query("select * from vps where context like $context ");
              $row = $query->row();
              $nguk = $row->user;
              if ($nguk != "no-user"){
                 $user = "<a href=\"../lib_vmin/user/$nguk\">$nguk</a>"; 
              }else if ($nguk == "no-user"){
                 $user = $nguk; 
              }
              if($i % 2 == 0){
                $class = "row-a";
              }else if($i % 2 == 1){
                $class = "row-b";
              }
	      echo "<tr class=\"$class\"><td>";
	      echo "$wew\n" ;
	      echo "</td><td>";
	      echo $user;
	      echo "</td><td>";
	      echo "$context\n" ;
	      echo "</td><td>";
	      echo "$ip\n" ;
	      echo "</td><td>";
	      echo "$mem Mb\n";
	      echo "</td><td>";
	      echo "<a href=\"$site/vmin/edit/$wew\">Edit</a> <a href=\"$site/uvpanel/home/$wew\">Uvpanel</a> <a href=\"$site/lib_vmin/delete/$wew\">Delete</a>" ;
	      echo "</tr>";
	   }
	   $i++;
      }
      
    }
    
    function order_reg_list($user){
    $conf_dir = $this->config->item('vmin_dir');
    $clean = trim($conf_dir);
    $dir = "$clean/etc/vservers";
    $ava = scandir($dir);
    $i=1;
    foreach ($ava as $wew) {
         
         if ($wew != "." && $wew != ".." && $wew != ".defaults" && $wew != ".distributions"){ 
              $this->db->reconnect();
              $query = $this->db->query("select * from vps where user not like 'no-user' and vps_name like '$wew' ");
              if ($query->num_rows() > 0){
              $row = $query->row_array();
              $nguk = $row['vps_name'];
              }else if($query->num_rows() == 0){
              $nguk = "";
              }
              if ($wew != $nguk){
              $context = shell_exec("cat $dir/$wew/context");
              $ip = shell_exec("cat $dir/$wew/interfaces/0/ip");
              $mem_pure = shell_exec("cat $dir/$wew/rlimits/rss.hard");
              $mem = floor($mem_pure/250);
              $site = site_url();
              if($i % 2 == 0){
                $class = "row-a";
              }else if($i % 2 == 1){
                $class = "row-b";
              }
	      echo "<tr class=\"$class\"><td>";
	      echo "$wew\n" ;
	      echo "</td><td>";
	      echo "$context\n" ;
	      echo "</td><td>";
	      echo "$ip\n" ;
	      echo "</td><td>";
	      echo "$mem Mb\n";
	      echo "</td><td>";
	      echo "<a href=\"$site/lib_vmin/vps_for_user/$user/$wew/$context\">Select</a> " ;
	      echo "</tr>";
	   } }
	   $i++;
      }

    }
    
       function start_list(){
    $conf_dir = $this->config->item('vmin_dir');
    $clean = trim($conf_dir);
    $dir = "$clean/etc/vservers";
    $ava = scandir($dir);
    $i=1;
    foreach ($ava as $wew) {
         if ($wew != "." && $wew != ".." && $wew != ".defaults" && $wew != ".distributions"){ 
              $context = shell_exec("cat $dir/$wew/context");
              $ip = shell_exec("cat $dir/$wew/interfaces/0/ip");
              $mem_pure = shell_exec("cat $dir/$wew/rlimits/rss.hard");
              $up = shell_exec("sudo /usr/local/sbin/vserver-stat | grep $wew");
              $mem = floor($mem_pure/250);
              $site = site_url();
              
              if ( $up == ""){
              $running = "Stopped";
              $link = "<a href=\"$site/lib_vmin/start/$wew\">Start</a> ";
              }else if ( $up != "" ){
              $running = "Running ";
              $link = "Started ";
              }
              
              if($i % 2 == 0){
                $class = "row-a";
              }else if($i % 2 == 1){
                $class = "row-b";
              }
	      echo "<tr class=\"$class\"><td>";
	      echo "$wew\n" ;
	      echo "</td><td>";
	      echo "$context\n" ;
	      echo "</td><td>";
	      echo "$ip\n" ;
	      echo "</td><td>";
	      echo "$mem Mb\n";
	      echo "</td><td>";
	      echo "$running \n";
	      echo "</td><td>";
	      echo "$link" ;
	      echo "</tr>";
	   }
	   $i++;
      }
      
    }
    
     function run_list(){
    $conf_dir = $this->config->item('vmin_dir');
    $clean = trim($conf_dir);
    $dir = "$clean/var/run/vservers";
    $ava = scandir($dir);
    $i=1;
    foreach ($ava as $wew) {
         if ($wew != "." && $wew != ".." && $wew != ".defaults" && $wew != ".distributions"){ 
              $context = shell_exec("cat $dir/$wew");
              $ip = shell_exec("cat $dir/../../../etc/vservers/$wew/interfaces/0/ip");
              $mem_pure = shell_exec("cat $dir/../../../etc/vservers/$wew/rlimits/rss.hard");
              $total_mem = floor($mem_pure/250);
              $site = site_url();
              $vps_mem = shell_exec("sudo /usr/local/sbin/vserver-stat | grep $wew | awk '{ print $4}' | cut -dM -f 1 | cut -d. -f 1");
              $up = shell_exec("sudo /usr/local/sbin/vserver-stat | grep $wew | awk '{ print $7}'");
              $mem = $total_mem-$vps_mem;
              if($i % 2 == 0){
                $class = "row-a";
              }else if($i % 2 == 1){
                $class = "row-b";
              }
	      echo "<tr class=\"$class\"><td>";
	      echo "$wew\n" ;
	      echo "</td><td>";
	      echo "$context\n" ;
	      echo "</td><td>";
	      echo "$ip\n" ;
	      echo "</td><td>";
	      echo "$mem Mb\n";
	      echo "</td><td>";
	      echo "$up\n";
	      echo "</td><td>";
	      echo "<a href=\"$site/lib_vmin/stop/$wew\">Stop</a> <a href=\"$site/lib_vmin/restart/$wew\">Restart</a>" ;
	      echo "</tr>";
	   }
	   $i++;
      }
      
    }

    function start_home(){
    $conf_dir = $this->config->item('vmin_dir');
    $clean = trim($conf_dir);
    $dir = "$clean/etc/vservers";
    $ava = scandir($dir);
    $i=1;
    foreach ($ava as $wew) {
         if ($wew != "." && $wew != ".." && $wew != ".defaults" && $wew != ".distributions"){ 
              $context = shell_exec("cat $dir/$wew/context");
              $ip = shell_exec("cat $dir/$wew/interfaces/0/ip");
              $mem_pure = shell_exec("cat $dir/$wew/rlimits/rss.hard");
              $mem = floor($mem_pure/250);
              $site = site_url();
              if($i % 2 == 0){
                $class = "row-a";
              }else if($i % 2 == 1){
                $class = "row-b";
              }
	      echo "<tr class=\"$class\"><td>";
	      echo "$wew\n" ;
	      echo "</td><td>";
	      echo "$context\n" ;
	      echo "</td><td>";
	      echo "$ip\n" ;
	      echo "</td><td>";
	      echo "$mem Mb\n";
	      echo "</tr>";
	   }
	   $i++;
      }
      
    }
    
     function run_home(){
    $conf_dir = $this->config->item('vmin_dir');
    $clean = trim($conf_dir);
    $dir = "$clean/var/run/vservers";
    $ava = scandir($dir);
    $i=1;
    foreach ($ava as $wew) {
         if ($wew != "." && $wew != ".." && $wew != ".defaults" && $wew != ".distributions"){ 
              $context = shell_exec("cat $dir/$wew");
              $ip = shell_exec("cat $dir/../../../etc/vservers/$wew/interfaces/0/ip");
              $mem_pure = shell_exec("cat $dir/../../../etc/vservers/$wew/rlimits/rss.hard");
              $total_mem = floor($mem_pure/250);
              $site = site_url();
              $vps_mem = shell_exec("sudo /usr/local/sbin/vserver-stat | grep $wew | awk '{ print $4}' | cut -dM -f 1 | cut -d. -f 1");
              $up = shell_exec("sudo /usr/local/sbin/vserver-stat | grep $wew | awk '{ print $7}'");
              $mem = $total_mem-$vps_mem;
              if($i % 2 == 0){
                $class = "row-a";
              }else if($i % 2 == 1){
                $class = "row-b";
              }
	      echo "<tr class=\"$class\"><td>";
	      echo "$wew\n" ;
	      echo "</td><td>";
	      echo "$context\n" ;
	      echo "</td><td>";
	      echo "$ip\n" ;
	      echo "</td><td>";
	      echo "$mem Mb\n";
	      echo "</td><td>";
	      echo "$up\n";
	      echo "</tr>";
	   }
	   $i++;
      }
      
    }

    function det_vps($name){
    $conf_dir = $this->config->item('vmin_dir');
    $clean = trim($conf_dir);
    $pure_mem = shell_exec("cat $clean/etc/vservers/$name/rlimits/rss.hard");
    $data['mem'] = floor($pure_mem/250);
    $data['ip'] = shell_exec("cat $clean/etc/vservers/$name/interfaces/0/ip");
    return $data;
    }
    }
?>
