<?php

class Vpanel extends Controller {
        
	function Vpanel()
	{
		parent::Controller();
		$lang = get_cookie('lang');
		$this->lang->load('link', $lang);
		$this->lang->load('vpanel', $lang);
		
	}
	
	function index()
	{
	        
	        $data['pos'] = "vmin";
	        $this->load->view('vpanel/header');
	        $this->load->view('vpanel/sidebar');
	        $this->load->view('vpanel/home'); 
	        $this->load->view('vpanel/footer'); 
                
	}
}
?>