<?php

class Gui_vmin extends Model {

	function Gui_vmin()
	{
		parent::Model();	
	}
	
        function set_cookie($name,$value){
                   $name = $name;
                   $value = $value;
                   $expire = "86500";
                   $domain = "192.168.70.248";
                   $path = "/";
                   $prefix = "";

         set_cookie($name, $value, $expire, $domain, $path, $prefix);
	}
        function cek_login($user,$pass){
        $user_vmin = $this->config->item('user_vmin');
        $pass_vmin = $this->config->item('pass_vmin');
           if ( $user==$user_vmin && $pass==$pass_vmin ){
                  $newdata = array(
                      'user'  => $user,
                      'pass'     => $pass,
                      );
                  $this->session->set_userdata($newdata);
                 return 1;
              } else if ( $user==$user_vmin && $pass==$pass_vmin ) {
                 return 0;
            }
         }
        function cek_session($before){
         $user = $this->session->userdata('user');
         $pass = $this->session->userdata('pass');
         $user_vmin = $this->config->item('user_vmin');
         $pass_vmin = $this->config->item('pass_vmin');
            if ($user!=$user_vmin && $pass!=$pass_vmin){
              redirect("vmin/login/$before");
            }else if ($user==$user_vmin && $pass==$pass_vmin){
              return 1;
            }

        }
        
       function get_user_list(){
       $this->db->reconnect();
       $data = $this->db->query("select * from user");
       return $data;
       }
       
       function get_message_list($name){
       if ($name == "all"){
       $sql = "select rowid,sender,message,date,status,id from admin_message";
       }else if ($name != "all"){
       $sql = "select rowid,sender,message,date,status,id from admin_message where sender like '$name'";
       }
       $this->db->reconnect();
       $data = $this->db->query($sql);
       return $data;
       }
       
       function change_message($user,$id){
       $this->db->reconnect();
       $data = $this->db->query("update admin_message set status='Readed' where sender like '$user' and rowid = $id");
       }
       
       function del_message($user,$id){
       $this->db->reconnect();
       $data = $this->db->query("delete from admin_message where sender like '$user' and id = $id");
       }
       
       function get_user_detail($name){
       $this->db->reconnect();
       $data = $this->db->query("select * from user where user like '$name'");
       $row = $data->row(); 
       $info['name'] = $row->name;
       $info['email'] = $row->email;
       $info['phone'] = $row->phone;
       $info['address'] = $row->address;
       return $info;
       }
       function del_user($name){
       $this->db->reconnect();
       $data = $this->db->query("delete from user where user like '$name'");
       }
       
       function send_user_message($user,$message){
       $this->db->reconnect();
       $data = $this->db->query("insert into user_message (user,message,date) values('$user','$message',datetime('now'))");
       }
       
       function get_user_vps($user){
        $this->db->reconnect();
        $uvpanel = site_url();
        $list = $this->db->query("select * from vps where user like '$user'");
        $i = 1;
        foreach ($list->result_array() as $row)
        {
        $context = $row['context'];
        $name = $row['vps_name'];
        $stat = $row['status'];
        
        if ($i % 2 == 1){
        $class = "row-b";
        }else if ($i % 2 == 0){
        $class = "row-a";
        }
        
        echo "<tr  class=\"$class\"><td><a href=\"";
        echo "$uvpanel/uvpanel/home/$context";
        echo "\">";
        echo $name ;
        echo "</a></td><td>";
        echo $row['memory'];
        echo "</td><td>";
        echo $context;
        echo "</td><td>";
        echo $stat;
        echo "</td></tr>\n";
        $i++;
        }
        }
}
?>
