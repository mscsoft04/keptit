<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administration extends CI_Controller {

	
	public $data;
    public $title='Customer';	
	public function __construct()
	{
		parent::__construct();
		
		 if (!$this->ion_auth->logged_in()){
            redirect('/');
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
	   
	   if (!$this->input->is_ajax_request()) {
          exit('No direct script access allowed');
        }
		
		$list = $this->model->get_datatables();
		
		$data=array();
       
        
        foreach ($list as $user) {
            
            $row = array();
            
            $row[] = $user->userId;
			if($user->active_status==0){
			  $row[] = 'Inactive';	
			}else if($user->active_status==1){
			  $row[] = 'Active';	
			}else if($user->active_status==2){
			  $row[] = 'Block';	
			}
           
            $row[] = $user->mobileNo;
			$row[] ='';
			$row[] ='';
            $row[] = $user->deviceType;
			$row[] ='';
			$row[] ='';
			$row[] ='';
			$row[] ='<a href="'.base_url().'cutomer-details?id='.$user->userId.'" class="edit">Details</a>';
            
			
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
