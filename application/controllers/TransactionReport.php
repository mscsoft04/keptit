<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TransactionReport extends CI_Controller {

	
	public $data;
    public $title='Report';	
	public function __construct()
	{
		parent::__construct();
		
		 if (!$this->ion_auth->logged_in()){
            redirect('/');
         }
        //print_r($this->session->userdata);


	}
	public function index()
	{
		if ($this->ion_auth->logged_in()==false){
            redirect('auth/login');
         }
		
		$this->data['content'] = $this->load->view('transaction-report/index',$this->data, true );
		
    	$this->load->view('layout/main', $this->data );
		
	   


	}
	
}
