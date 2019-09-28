<?php
  class Admin_model extends CI_Model {
       
      public function __construct(){
          
        $this->load->database();
        
      }
	 
		
	 
 
 
	
 
		  public function add_register($data){

        if($this->db->insert('register', $data)){

           return true;

        }else{

           return false;

        }

    }
	
	 
	
	
	   
	 function get_last_code()
   {
	   $this->db->select('*');
        $this->db->from('register');
        $this->db->order_by('id','desc');
        $this->db->limit(1);
        
        $query = $this->db->get();
         $last_code="";
        if ($query->num_rows() > 0){
			$last_code= $query->row()->userId;
            return ++$last_code;
			 
        }
			
			else
			{
				$last_code="KT001";
				return $last_code;
				
			}
	   
   }
	
		  function check_mobile_exist($mobileNo)
	  {
		$this->db->select('*');
        $this->db->from('register');
         $this->db->where("mobileNo",$mobileNo);
       //  $this->db->where("active_status",1);
		$query = $this->db->get();
		$no_of_rows=$query->num_rows();
         	
         if($no_of_rows > 0){
			 
	   	    return $no_of_rows;
			 }
			 
			 else
			 {
				return 0; 
			 }  
		  
		  
	  } 
	  
	  
	  function check_user_exist($userId)
	  {
		 $this->db->select('*');
        $this->db->from('settings');
         $this->db->where("userId",$userId);
       //  $this->db->where("active_status",1);
		$query = $this->db->get();
		$no_of_rows=$query->num_rows();
         	
         if($no_of_rows > 0){
			 
	   	    return $no_of_rows;
			 }
			 
			 else
			 {
				return 0; 
			 }   
		  
		  
	  }
	  
	
  function check_userexist($userId)
	  {
		 $this->db->select('*');
        $this->db->from('register');
         $this->db->where("userId",$userId);
       //  $this->db->where("active_status",1);
		$query = $this->db->get();
		$no_of_rows=$query->num_rows();
         	
         if($no_of_rows > 0){
			 
	   	    return $no_of_rows;
			 }
			 
			 else
			 {
				return 0; 
			 }   
		  
		  
	  }
	   
	
	  
	  
	  
	  function get_user_details($mobileNo, $data1)
	  {
		    $this->db->where('mobileNo', $mobileNo);

       if($this->db->update('register', $data1)){
		   
		   
		  $this->db->select('*');
         $this->db->from('register');
         $this->db->where("mobileNo",$mobileNo);
       	 $query = $this->db->get();
	 	 return $query->result(); 

         // return true;

        }else{

          return false;

        }
		  
		  
		  
		  
		  
		
		 
		  
		  
	  }
	  
	  
	
	/*function get_last_appointmentNumber()
	{
		$this->db->select('*');
        $this->db->from('register');
        $this->db->order_by('id','desc');
        $this->db->limit(1);
        
        $query = $this->db->get();
         $last_code="";
        if ($query->num_rows() > 0){
			$last_code= $query->row()->appointmentNumber;
            return ++$last_code;
			 
        }
			
			else
			{
				$last_code="APTNO-001";
				return $last_code;
				
			}
		
		
		
	}
	*/
	 
 
  
 
       
  
    
    
	
	 public function verify_register($mobileNo, $data )
	 {
		  $this->db->where('mobileNo', $mobileNo);

       if($this->db->update('register', $data)){

          return true;

        }else{

          return false;

        }

	 }
	 
	 
	   
	  function check_emailid_exist($emailId)
	  {
		$this->db->select('*');
        $this->db->from('register');
         $this->db->where("emailId",$emailId);
		$query = $this->db->get();
		$no_of_rows=$query->num_rows();
         	
         if($no_of_rows > 0){
			 
	   	    return $no_of_rows;
			 }
			 
			 else
			 {
				return 0; 
			 }  
		  
		  
	  }
	  
	  function update_profile($data, $mobileNo,$userId)
	  {
		 $this->db->where('mobileNo', $mobileNo);
		 $this->db->where('userId', $userId);

       if($this->db->update('register', $data)){
		   
	   return true;

        }else{

          return false;

        } 
		  
		  
	  }
	  
	  function update_settings($data, $userId)
	  {
		 
		 $this->db->where('userId', $userId);

       if($this->db->update('settings', $data)){
		   
	   return true;

        }else{

          return false;

        } 
		    
		  
	  }
	  
	  
	  
	  function insert_appointment($data)
	  {
		 if($this->db->insert('appointment', $data)){

           return true;

        }else{

           return false;

        }  
		  
		  
	  }
	  
	  
	  
	  function insert_settings($data)
	  {
		if($this->db->insert('settings', $data)){

           return true;

        }else{

           return false;

        }    
		  
		  
	  }
	  
  
  
  

}