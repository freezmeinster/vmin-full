<?php

class Uvpanel extends Controller {
        
	function Uvpanel()
	{
		parent::Controller();
		$lang = get_cookie('lang');
		$this->lang->load('link', $lang);
		$this->lang->load('uvpanel', $lang);
		
	}
	
	function index()
	{
	        
	        $data['pos'] = "vmin";
	        $this->load->view('uvpanel/header');
	        $this->load->view('uvpanel/sidebar');
	        $this->load->view('uvpanel/home'); 
	        $this->load->view('uvpanel/footer'); 
                
	}
	function home($name)
	{
	        
	        $data['pos'] = "vmin";
	        $this->load->view('uvpanel/header');
	        $this->load->view('uvpanel/sidebar');
	        $this->load->view('uvpanel/home'); 
	        $this->load->view('uvpanel/footer'); 
                
	}
}
?>