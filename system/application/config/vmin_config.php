<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    $config['vmin_url']	= "http://192.168.70.248/vmin-full/";
    $config['vmin_dev']= "/dev/root";
    $config['vmin_ip']= "192.168.70";
    $config['vmin_pkg']= "/home/bahan";
    $config['vmin_opt']= "/home/optional/service";
    $config['vmin_opt_script'] = "/home/optional/template_script";
    $config['uvpanel_url']= "http://vps.cs.int-upi.edu";
    $config['vmin_home']= shell_exec("/usr/local/sbin/vserver-info system SYSINFO | grep vserver-Rootdir: | awk '{print $2}'");
    $config['vmin_dir']= shell_exec("/usr/local/sbin/vserver-info system SYSINFO | grep prefix: | awk '{print $2}'");    
    $config['user_vmin']="admin";
    $config['pass_vmin']="210789";  
?>
