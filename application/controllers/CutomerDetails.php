<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CutomerDetails extends CI_Controller {

	public $data; 
	public $title;
	public function __construct()
	{
		parent::__construct();
		
		 if (!$this->ion_auth->logged_in()){
            redirect('auth/login');
         }
        //print_r($this->session->userdata);


	}
	public function index()
	{
		if ($this->ion_auth->logged_in()==false){
            redirect('auth/login');
         }
		
		$this->data['content'] = $this->load->view('cutomerdetails/index',$this->data, true );
		
    	$this->load->view('layout/main', $this->data );
		
	   


	}
	
}
