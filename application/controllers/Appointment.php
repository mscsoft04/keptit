<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Appointment extends CI_Controller {

	
	public $data;
    public $title='Appointment';	
	public function __construct()
	{
		parent::__construct();
		
		 if (!$this->ion_auth->logged_in()){
            redirect('/');
         }
       $this->load->model(array('Appointment_model'=>'appointment'));
	   $this->model = $this->appointment;


	}
	public function index()
	{
		if ($this->ion_auth->logged_in()==false){
            redirect('auth/login');
         }
		
		$this->data['content'] = $this->load->view('appointment/index',$this->data, true );
		
    	$this->load->view('layout/main', $this->data );
		
	   


	}
	public function ajaxTablelist(){
	    
		if (!$this->input->is_ajax_request()) {
          exit('No direct script access allowed');
        }
		
		$appointments = $this->model->get_datatables();
		
		
       $data=array();
        
        foreach ($appointments as $appointment) {
            
            $row = array();
            
            $row[] = $appointment->userId;
			$row[] = $appointment->appointmentId;
			$row[] = $appointment->appointmentName;
			$row[] = $appointment->scheduledDt;
			$row[] = $appointment->scheduleType;
			$row[] = $appointment->mobileNo;
			$row[] = ($appointment->isWeekly==1)? true:false;
			$row[] = ($appointment->isMonthly==1)? true:false;
			$row[] = ($appointment->isYearly==1)? true:false;
			
			
            
			
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
