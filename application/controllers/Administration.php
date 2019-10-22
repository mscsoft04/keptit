<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administration extends CI_Controller {

	
	public $data;
    public $title;	
	public function __construct()
	{
		parent::__construct();
		
		 if (!$this->ion_auth->logged_in()){
            redirect('auth/login');
         }
       $this->load->model(array('Administration_model'=>'administration'));
	   $this->model = $this->administration;


	}
	public function index()
	{
		if ($this->ion_auth->logged_in()==false){
            redirect('auth/login');
         }
		
		$this->data['content'] = $this->load->view('Administration/index',$this->data, true );
		
    	$this->load->view('layout/main', $this->data );
		
	   


	}
	public function ajaxTablelist(){
	   
		
		$list = $this->model->get_datatables();
		
		
       
        
        foreach ($list as $user) {
            
            $row = array();
            
            $row[] = $user->userId;
            $row[] = $user->active_status;
            $row[] = $user->mobileNo;
            $row[] = $user->deviceType;
            
			
		$data[] = $row;
        }
        
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->model->count_all(),
                        "recordsFiltered" => $this->model->count_filtered(),
                        "data" => $data,
                );
       
        echo json_encode($output);
	
	    
	
	}
	
	
	
}
