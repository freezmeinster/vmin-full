<?php
class Lib_vmin extends Controller {
	function Lib_vmin()
	{
		parent::Controller();	
		$lang = get_cookie('lang');
		$this->lang->load('link', $lang);
		$this->lang->load('content', $lang);
	}

	function set_lang(){
	$lang = $this->uri->segment(3);
	$before = $this->uri->segment(4);
                   $name = "lang";
                   $value = $lang;
                   $expire = "86500";
                   $domain = "192.168.70.248";
                   $path = "/";
                   $prefix = "";

         set_cookie($name, $value, $expire, $domain, $path, $prefix);
	 redirect("vmin/$before");
	}

	function create(){
	$name = $this->input->post('name');
	$mem = $this->input->post('mem');
	$ip = $this->input->post('ip');
	$pass1 = $this->input->post('pass1');
	$pass2 = $this->input->post('pass2');
	 if ($pass1 == $pass2){
	    $pass = $pass1;
	 } else redirect('vmin/create');
            $this->build_vmin->create($name,$mem,$ip,$pass);
         redirect('vmin/reg');
	 }

	function change(){
	$name = $this->input->post('name');
	$mem = $this->input->post('mem');
	$ip = $this->input->post('ip');
	$old_ip = $this->input->post('old_ip');
	$old_mem = $this->input->post('old_mem');
	$pass1 = $this->input->post('pass1');
	$pass2 = $this->input->post('pass2');
	if ($pass1 == $pass2 && $pass1 != "default" && $pass2 != "default"){
            $pass = $pass1;	
	   }
	else if ($pass1 == "default" && $pass2 == "default"){
	     $pass = "0";
	   }
	$this->mod_vmin->edit_vmin($name,$mem,$old_mem,$ip,$old_ip,$pass);
	redirect("vmin/reg");
	}	

	function delete(){
	$name = $this->uri->segment(3);
	$this->mod_vmin->destroy_vmin($name);
	redirect("vmin/reg");
	}
	
	function check(){
	$pass= $this->input->post('pass');
	$user= $this->input->post('user');
	$before = $this->input->post('asal');
        $valid = $this->gui_vmin->cek_login($user,$pass);
             if ($valid == "1"){
             redirect("vmin/$before");
               }else if ($valid == "0"){
                redirect("vmin/login/$before");
              }else redirect("vmin/login/$before");
	}

        function logout(){
         $this->session->sess_destroy();
         redirect('vmin');
         }
	
	function start(){
	$name = $this->uri->segment(3);
	$this->mod_vmin->start_vmin($name);
	$this->db->reconnect();
        $this->db->query("update vps set status='Running' where vps_name like '$name' ");
        $this->db->reconnect();
        $data = $this->db->query("select user from vps where vps_name like '$name'");
        $raw = $data->row_array();
        $user = $raw['user'];
        $this->gui_vmin->send_user_message($user,"Your VPS with name $name has been Started");
	redirect("vmin/run");
	}	

        function restart(){
        $name = $this->uri->segment(3);
        $this->mod_vmin->stop_vmin($name);
	$this->mod_vmin->start_vmin($name);
	$this->db->reconnect();
        $this->db->query("update vps set status='Running' where vps_name like '$name' ");
        $this->db->reconnect();
        $data = $this->db->query("select user from vps where vps_name like '$name'");
        $raw = $data->row_array();
        $user = $raw['user'];
        $this->gui_vmin->send_user_message($user,"Your VPS with name $name has been Restarted");
        redirect("vmin/run");
        }
     
        function template(){
        $template = $this->input->post('service');
        $hidSubmit = $this->input->post('hidSubmit');
         if(isset($hidSubmit)){
         $count=count($template);
            for($i=0;$i<$count;$i++){
                  echo "$template[$i]\n";
               }
         } 
        }

	function stop(){
	$name = $this->uri->segment(3);
	$this->mod_vmin->stop_vmin($name);
	$this->db->reconnect();
        $this->db->query("update vps set status='Stoped' where vps_name like '$name' ");
        $data = $this->db->query("select user from vps where vps_name like '$name'");
        $raw = $data->row_array();
        $user = $raw['user'];
        $this->gui_vmin->send_user_message($user,"Your VPS with name $name has been Stopped");
	redirect("vmin/run");
	}	
          
        function user($name){
        $log = $this->gui_vmin->cek_session('user');
        if ($log=="1"){
        $data['name']= $name;
        $this->load->view('lib/detail_user', $data);
        }
        }  
         
        function user_edit($name){
         $log = $this->gui_vmin->cek_session('user');
        if ($log=="1"){
         $jenis = $this->input->post('jenis');
         $fullname = $this->input->post('name');
         $email = $this->input->post('email');
         $phone = $this->input->post('phone');
         $address = $this->input->post('address');
         $pass = $this->input->post('pass');
         $encpass = sha1($pass);
         if ($jenis == "0"){
            $this->db->reconnect();
            $this->db->query("update user set name='$fullname' where user like '$name' ");
            $this->db->query("update user set email='$email' where user like '$name' ");
            $this->db->query("update user set phone='$phone' where user like '$name' ");
            $this->db->query("update user set address='$address' where user like '$name' ");
         }else if($jenis == "1"){
            $this->db->reconnect();         
            $this->db->query("update user set pass='$encpass' where user like '$name' ");
         }
         redirect("lib_vmin/user/$name");
         }
        }
        
        function user_delete($name){
        $this->gui_vmin->del_user($name);
        redirect('vmin/user');
        }
        
        function change_mess($name){
        $id = $this->uri->segment('4');
        $this->gui_vmin->change_message($name,$id);
        redirect('vmin/message');
        }
        
        function del_mess($name){
        $id = $this->uri->segment('4');
        $this->gui_vmin->del_message($name,$id);
        redirect('vmin/message');
        }
        
        function vps_for_user($name){
        $vps = $this->uri->segment(5);
        $vps_name = $this->uri->segment(4);
        $this->mod_vmin->vps_for_user($name,$vps,$vps_name);
        redirect('vmin/reg');
        }
        
        function user_reg(){
         $raw=$this->input->post('user');
         $user=trim($raw);
         $pass1=$this->input->post('pass1');
         $pass2=$this->input->post('pass2');

         if ($pass1 != $pass2){
            redirect('vmin/user_reg');
         }else if ($pass1 == $pass2){
            $pass = sha1($pass1);
         }
         
         $name=$this->input->post('name');
         $email=$this->input->post('email');
         $phone=$this->input->post('phone');
         $address=$this->input->post('address');
         $this->db->reconnect();
         $test = $this->db->query("select user from user where user.user like '%$user%'");
         
         if ($test->num_rows() == 0)
           {  
            $this->db->query("insert into user (user,pass,name,email,phone,address) values ('$user','$pass','$name','$email','$phone','$address')");
            $data['pos'] = "user_reg";
            $data['user'] = $user;
            $data['name'] = $name;
            $data['email'] = $email;
            $data['phone'] = $phone;
            $data['address'] = $address;
            $this->load->view('lib/header', $data);                
            $this->load->view('lib/side');
            $this->load->view('lib/reg_success',$data);
            $this->load->view('lib/footer');
           }else if ($test->num_rows() > 0){
            echo "User $user udah ada bang";
           } 

        }
        
}
?>
