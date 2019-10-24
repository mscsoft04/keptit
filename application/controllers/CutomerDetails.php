<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CutomerDetails extends CI_Controller {

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
		if($this->input->get('id')){
			$id=$this->input->get('id');
		$this->data['row']= $this->db->get_where('register', array('userId' => $id))->row();
		}else{
			$this->data['row']= $this->db->get_where('register')->row();
		}
		

		$this->data['content'] = $this->load->view('cutomerdetails/index',$this->data, true );
		
    	$this->load->view('layout/main', $this->data );
		
	   


	}
	
}
