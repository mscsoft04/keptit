<?php

require(APPPATH . '/libraries/REST_Controller.php');

date_default_timezone_set('Asia/Calcutta');
class Admin extends REST_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('admin_model');
		$this->load->database();
	}




	function logout_post()
	{
		$userId  = $this->post('userId');
		date_default_timezone_set('Asia/Calcutta');
		$logout_date = date('Y-m-d h:i:s');

		if (!$userId) {
			$output = array("status" => false, "msg" => "user id should not be empty");
			$this->response($output, 404);

			exit;
		}

		if ($userId) {
			$check_userid = $this->admin_model->check_userexist($userId);
			if ($check_userid < 1) {

				$output = array("status" => false, "msg" => "Invalid userId");
				$this->response($output, 404);

				exit;
			}
		} else {

			$output = array("status" => true, "msg" => "Logout Successfully");
			$this->response($output, 200);
			exit;
		}
	}

	function  userprofile_post()
	{
		$userId  = $this->post('userId');
		$firstName  = $this->post('firstName');
		$lastName  = $this->post('lastName');
		$emailId  = $this->post('emailId');
		$countryCode  = $this->post('countryCode');
		$mobileNo  = $this->post('mobileNo');
		$dateOfBirth  = $this->post('dateOfBirth');
		$lastUpdatedDate = date('Y-m-d h:i:s');


		if (!$userId) {
			$output = array("status" => false, "msg" => "please enter  User ID");
			$this->response($output, 404);

			exit;
		}

		if ($userId) {
			$check_userid = $this->admin_model->check_userexist($userId);
			if ($check_userid < 1) {

				$output = array("status" => false, "msg" => "Invalid userId");
				$this->response($output, 404);

				exit;
			}
		}

		if (!$firstName) {
			$output = array("status" => false, "msg" => "please enter  First Name");
			$this->response($output, 404);

			exit;
		}


		if (!$lastName) {
			$output = array("status" => false, "msg" => "please enter  Last Name");
			$this->response($output, 404);

			exit;
		}


		if (!$emailId) {
			$output = array("status" => false, "msg" => "please enter  Email ID");
			$this->response($output, 404);

			exit;
		}



		if ($emailId) {

			$res = $this->admin_model->check_emailid_exist($emailId);

			if ($res > 0) {

				$output = array("status" => false, "msg" => "Email ID Already Exists, Please Enter different Email Id");
				$this->response($output, 404);

				exit;
			}
		}



		if (!$countryCode) {
			$output = array("status" => false, "msg" => "please enter Country Code");
			$this->response($output, 404);

			exit;
		}



		if (!$mobileNo) {
			$output = array("status" => false, "msg" => "please enter Mobile Number");
			$this->response($output, 404);

			exit;
		}

		if ($mobileNo) {

			$existing_mobile = $this->admin_model->check_mobile_exist($mobileNo);
			if ($existing_mobile < 1) {

				$output = array("status" => false, "msg" => "Invalid Mobile No");
				$this->response($output, 404);

				exit;
			}
		}

       $data=array();
		$file="";
		$file_path = "uploads/image/";
		if (!is_dir($file_path)) {
    		mkdir($file_path,0777);
		}
	 if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
	    $path = $_FILES['image']['name'];
		$ext = pathinfo($path, PATHINFO_EXTENSION);
		$fileName = time() .'.'.$ext;                     
		$config['upload_path'] = $file_path;                                
		$config['file_name'] = $fileName;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2000;
        $config['max_width'] = 1500;
        $config['max_height'] = 1500;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('image')) {
            $error = array('error' => $this->upload->display_errors());

            $output = array("status" => false, "msg" =>$error);
			$this->response($output, 404);

        } else {
			$file = base_url().$file_path.$fileName;
			$data['Image']=$file;
		}
	}



		$data = array(
			"firstName" => $firstName,
			"lastName" => $lastName,
			"emailId" => $emailId,
			//"countryCode"=>$countryCode,
			"dateOfBirth" => $dateOfBirth,
			"lastUpdatedDt" => $lastUpdatedDate,
			"Image"=>$file
			
		);
		$result = $this->admin_model->update_profile($data, $mobileNo, $userId);
		//$customer_code


		if ($result) {

			$output = array("status" => true, "msg" => "Profile Updated Successfully");
			$this->response($output, 200);
		} else {


			$output = array("status" => false, "msg" => "something went wrong. Please Try again.");
			$this->response($output, 404);
		}
	}



	function  settings_post()
	{
		$userId  = $this->post('userId');
		$isCallReminder  = $this->post('isCallReminder');
		$isTextReminder  = $this->post('isTextReminder');
		$isCallRecordings  = $this->post('isCallRecordings');
		$isViewRecordings  = $this->post('isViewRecordings');
		$isCallTranscriptions  = $this->post('isCallTranscriptions');
		$isCustomizeTTS  = $this->post('isCustomizeTTS');
		$isPushNotification  = $this->post('isPushNotification');
		$isUnlimitedAppts  = $this->post('isUnlimitedAppts');
		$lastUpdatedDate = date('Y-m-d h:i:s');


		if (!$userId) {
			$output = array("status" => false, "msg" => "please enter  User ID");
			$this->response($output, 404);

			exit;
		}

		if ($userId) {
			$check_userid = $this->admin_model->check_userexist($userId);
			if ($check_userid < 1) {

				$output = array("status" => false, "msg" => "Invalid userId");
				$this->response($output, 404);

				exit;
			}
		}


		
		if (isset($isCallReminder) && $isCallReminder == true) {

			$isCallReminder  = 1;
		}else{

			$isCallReminder  = 0;
		}

		if (isset($isTextReminder) &&  $isTextReminder == true) {
			$isTextReminder  = 1;
		}else {
			$isTextReminder  = 0;
		}


		if (isset($isCallRecordings) && $isCallRecordings == true) {
			$isCallRecordings  = 1;
		}else {
			$isCallRecordings  = 0;
		}


		if (isset($isViewRecordings) && $isViewRecordings == true) {
			$isViewRecordings  = 1;
		} else {
			$isViewRecordings  = 0;
		}


		if (isset($isCallTranscriptions) && $isCallTranscriptions == true) {
			$isCallTranscriptions  = 1;
		} else {
			$isCallTranscriptions  = 0;
		}


		if (isset($isCustomizeTTS) && $isCustomizeTTS == true) {
			$isCustomizeTTS  = 1;
		} else {
			$isCustomizeTTS  = 0;
		}


		

		if (isset($isPushNotification) && $isPushNotification == true) {
			$isPushNotification  = 1;
		} else {
			$isPushNotification  = 0;
		}


		if (isset($isUnlimitedAppts) && $isUnlimitedAppts == true) {
			$isUnlimitedAppts  = 1;
		} else {
			$isUnlimitedAppts  = 0;
		}

		$res = $this->admin_model->check_user_exist($userId);

		if ($res > 0) {

			$data = array(
				"isCallReminder" => $isCallReminder,
				"isTextReminder" => $isTextReminder,
				"isCallRecordings" => $isCallRecordings,
				"isViewRecordings" => $isViewRecordings,
				"isCallTranscriptions" => $isCallTranscriptions,
				"isCustomizeTTS" => $isCustomizeTTS,
				"isPushNotification" => $isPushNotification,
				"isUnlimitedAppts" => $isUnlimitedAppts,
				"lastUpdatedDt" => $lastUpdatedDate
			);
			$result = $this->admin_model->update_settings($data, $userId);
			//$customer_code


			if ($result) {

				$output = array("status" => true, "msg" => "Profile Settings Updated");
				$this->response($output, 200);
			} else {


				$output = array("status" => false, "msg" => "something went wrong. Please Try again.");
				$this->response($output, 404);
			}
		} else {
			$data = array(
				"userId" => $userId,
				"isCallReminder" => $isCallReminder,
				"isTextReminder" => $isTextReminder,
				"isCallRecordings" => $isCallRecordings,
				"isViewRecordings" => $isViewRecordings,
				"isCallTranscriptions" => $isCallTranscriptions,
				"isCustomizeTTS" => $isCustomizeTTS,
				"isPushNotification" => $isPushNotification,
				"isUnlimitedAppts" => $isUnlimitedAppts,
				"lastUpdatedDt" => $lastUpdatedDate
			);
			$result = $this->admin_model->insert_settings($data);
			//$customer_code


			if ($result) {

				$output = array("status" => true, "msg" => "Profile Settings Updated");
				$this->response($output, 200);
			} else {


				$output = array("status" => false, "msg" => "something went wrong. Please Try again.");
				$this->response($output, 404);
			}
		}
	}


	function appointment_post()
	{
		$userId  = $this->post('userId');
		$scheduledDt  = $this->post('scheduledDt');
		$appointmentName  = $this->post('appointmentName');
		$scheduleType  = $this->post('scheduleType');
		$countryCode  = $this->post('countryCode');
		$mobileNo  = $this->post('mobileNo');
		$isWeekly  = $this->post('isWeekly');
		$isMonthly  = $this->post('isMonthly');
		$isYearly  = $this->post('isYearly');
		$isOneTime  = $this->post('isOneTime');

		$createdDt = date('Y-m-d h:i:s');



		if (!$userId) {
			$output = array("status" => false, "msg" => "please enter  User ID");
			$this->response($output, 404);

			exit;
		}

		if ($userId) {
			$check_userid = $this->admin_model->check_userexist($userId);
			if ($check_userid < 1) {

				$output = array("status" => false, "msg" => "Invalid userId");
				$this->response($output, 404);

				exit;
			}
		}


		if (!$scheduledDt) {
			$output = array("status" => false, "msg" => "please select Schedule Date");
			$this->response($output, 404);

			exit;
		}

		if (!$appointmentName) {
			$output = array("status" => false, "msg" => "please Enter the Appointment Name");
			$this->response($output, 404);

			exit;
		}

		if (!$scheduleType) {
			$output = array("status" => false, "msg" => "please Enter the schedule Type");
			$this->response($output, 404);

			exit;
		}

		if (!$countryCode) {
			$output = array("status" => false, "msg" => "please Enter the Country Code");
			$this->response($output, 404);

			exit;
		}


		if (!$mobileNo) {
			$output = array("status" => false, "msg" => "please enter  Mobile No ");
			$this->response($output, 404);

			exit;
		}

		if (!$isWeekly) {
			$isWeekly  = 0;
		}

		if (isset($isWeekly) && $isWeekly == true) {
			$isWeekly  = 1;
		}

		if (isset($isWeekly) && $isWeekly == false) {
			$isWeekly  = 0;
		}


		if (!$isMonthly) {
			$isMonthly  = 0;
		}

		if (isset($isMonthly) && $isMonthly == true) {
			$isMonthly  = 1;
		}

		if (isset($isMonthly) && $isMonthly == false) {
			$isMonthly  = 0;
		}

		if (!$isYearly) {
			$isYearly  = 0;
		}
		if (isset($isYearly) && $isYearly == true) {
			$isYearly  = 1;
		}

		if (isset($isYearly) && $isYearly == false) {
			$isYearly  = 0;
		}
        
        if (isset($isOneTime) && $isOneTime == true) {
			$isOneTime  = 1;
		}

		if (isset($isOneTime) && $isOneTime == false) {
			$isOneTime  = 0;
		}

		$appointmentId = md5(uniqid() . mt_rand());

		$data = array(
			"userId" => $userId,
			"scheduledDt" => $scheduledDt,
			"appointmentName" => $appointmentName,
			"scheduleType" => $scheduleType,
			"countryCode" => $countryCode,
			"mobileNo" => $mobileNo,
			"isWeekly" => $isWeekly,
			"isMonthly" => $isMonthly,
			"isYearly" => $isYearly,
			"isOneTime"=>$isOneTime,
			"appointmentId" => $appointmentId,
			"createdDt" => $createdDt
		);
		$result = $this->admin_model->insert_appointment($data);
		//$customer_code


		if ($result) {

			$output = array("status" => true, "msg" => "Appointment Scheduled on  " . date('m/d/Y h:i:s', strtotime($scheduledDt)), "appointment_id" => $appointmentId);
			$this->response($output, 200);
		} else {


			$output = array("status" => false, "msg" => "something went wrong. Please Try again.");
			$this->response($output, 404);
		}
	}




	function register_post()
	{


		//$name  = $this->post('name');
		$mobileNo  = $this->post('mobileNo');
		$countryCode  = $this->post('countryCode');
		$deviceToken  = $this->post('deviceToken');
		$deviceId  = $this->post('deviceId');
		$deviceType  = $this->post('deviceType');
		$password  = $this->post('password');
		date_default_timezone_set('Asia/Calcutta');
		$created_date = date('Y-m-d h:i:s');
		$chars = "123456789";
		$otp = substr(str_shuffle($chars), 0, 4);
		//$otp="1234";
		$appointmentNumber =  "8001231234";


		if (!$countryCode) {
			$output = array("status" => false, "msg" => "please enter country Code");
			$this->response($output, 404);

			exit;
		}


		if (!$mobileNo) {
			$output = array("status" => false, "msg" => "please enter  Mobile No ");
			$this->response($output, 404);

			exit;
		}




		if (!$deviceToken) {
			$output = array("status" => false, "msg" => "Device Token should not empty");
			$this->response($output, 404);

			exit;
		}

		if (!$deviceId) {
			$output = array("status" => false, "msg" => "Device Id should not empty");
			$this->response($output, 404);

			exit;
		}

		if (!$deviceType) {
			$output = array("status" => false, "msg" => "Device Type should not empty");
			$this->response($output, 404);

			exit;
		}

		if ($mobileNo != "") {


			$existing_mobile = $this->admin_model->check_mobile_exist($mobileNo);

			$output = array();

			// echo $existing_mobile;
			if ($existing_mobile > 0) {
				$modified_date = date('Y-m-d h:i:s');
				$data1 = array("otp" => $otp, "modifiedDate" => $modified_date);
				$data = $this->admin_model->get_user_details($mobileNo, $data1);


				$output = array("status" => true, "msg" => "Please verify the OTP sent to your registered mobile number to Login ", "data" => array("userId" => $data[0]->userId, "OTP" => $otp, "appointmentNumber" => $appointmentNumber));
				$this->response($output);

				exit;
			}
		}



		$customer_code = $this->admin_model->get_last_code();
		//$this->admin_model->get_last_appointmentNumber();  

		$data = array(
			"userId" => $customer_code,
			"countryCode" => $countryCode,
			"mobileNo" => $mobileNo,
			"deviceToken" => $deviceToken,
			"deviceType" => $deviceType,
			"deviceId" => $deviceId,
			"otp" => $otp, "appointmentNumber" => $appointmentNumber, "createdDate" => $created_date
		);
		$result = $this->admin_model->add_register($data);
		//$customer_code
		$resdata = array("userId" => $customer_code, "OTP" => $otp, "appointmentNumber" => $appointmentNumber);

		$app_data = array(
			"userId" => $customer_code,
			"isCallReminder" => 0,
			"isTextReminder" => 0,
			"isCallRecordings" =>0,
			"isViewRecordings" => 0,
			"isCallTranscriptions" => 0,
			"isCustomizeTTS" =>0,
			"isPushNotification" =>0,
			"isUnlimitedAppts" => 0,
			
		);
		$this->admin_model->insert_settings($app_data);
		
		
		if ($result) {

			$output = array("status" => true, "msg" => "You have been successfully registered. Please verify the OTP sent to your registered mobile number to login.", "data" => $resdata);
			$this->response($output, 200);
		} else {


			$output = array("status" => false, "msg" => "could not process. Try again.");
			$this->response($output, 404);
		}
	}



	function verify_post()
	{

		$countryCode  = $this->post('countryCode');
		$mobileNo  = $this->post('mobileNo');
		$verificationType  = $this->post('verificationType');
		if ($verificationType == "sms") {
			$verificationType = 1;
		} else if ($verificationType == "call") {
			$verificationType = 2;
		}



		//$otp  = $this->post('otp');	

		/*   if(!$otp){
             $output= array("status"=>"0", "msg"=>"please  Enter OTP");
            $this->response($output, 404);
            exit;
        }
		
		 if(!$countryCode){
             $output= array("status"=>"0", "msg"=>" Invalid  countryCode");
            $this->response($output, 404);

            exit;
        }
 */
		if (!$mobileNo) {
			$output = array("status" => false, "msg" => " Invalid  Mobile No");
			$this->response($output, 404);
			exit;
		}


		if ($mobileNo) {

			$mobile_exist = $this->admin_model->check_mobile_exist($mobileNo);
			if ($mobile_exist < 1) {
				$output = array("status" => false, "msg" => "Sorry, The given Mobile number doesnot exist");
				$this->response($output, 404);
				exit;
			}
		}




		if (!$verificationType) {
			$output = array("status" => false, "msg" => " Please select  Verification Type");
			$this->response($output, 404);

			exit;
		}
		$active_status = 1;

		$chars = "123456789";
		$otp = substr(str_shuffle($chars), 0, 4);

		//$otp="1234"
		$data = array();


		if (!$mobileNo) {
			$output = array("status" => "0", "msg" => "Please enter all fields");
			$this->response($output, 404);
		} else {



			if ($verificationType == 1)  //  by sms
			{

				$data = array("otp" => $otp, "active_status" => $active_status, "verification_method" => 1);
				$result = $this->admin_model->verify_register($mobileNo, $data);

				if ($result === 0) {
					$output = array("status" => false, "msg" => "Something went wrong, Please try again. ");
					$this->response($output, 404);
				} else {

					$output = array("status" => true, "otp" => $otp, "msg" => "OTP sent to your registered mobile number from KEPTIT");
					$this->response($output, 200);
				}
			}

			if ($verificationType == 2) {

				$data = array("otp" => $otp, "active_status" => $active_status, "verification_method" => 2);
				$result = $this->admin_model->verify_register($mobileNo, $data);

				if ($result === 0) {
					$output = array("status" => false, "msg" => "Something went wrong, Please try again. ");
					$this->response($output, 404);
				} else {

					$output = array("status" => true, "otp" => $otp, "msg" => "You will receive a verification call now from KEPTIT");
					$this->response($output, 200);
				}
			}
		}
	}

	
	
	function getsettings_post()
	{
		$userId  = $this->post('userId');
		if (!$userId) {
			$output = array("status" => false, "msg" => "please enter  User ID");
			$this->response($output, 404);

			exit;
		}

		if ($userId) {
			$check_userid = $this->admin_model->check_userexist($userId);
			if ($check_userid < 1) {

				$output = array("status" => false, "msg" => "Invalid userId");
				$this->response($output, 404);

				exit;
			}
		}

		$this->db->select('*');
		$this->db->from('settings');
		$this->db->where("userId", $userId);
		$data = $this->db->get()->result_array();
	  $value="1";
	  $replacement=true;
	  $v=reset($data);
	  unset($v["id"]); 

		$data_v=array_map(function ($v) use ($value, $replacement) {
			if($v == $value){
				return true;
			} else if($v =="0"){
                return false;
			} else{

				return $v;
			}
			
		}, $v);
        
		
		    
		$output = array("status" => true, "msg" => "Success","data"=>$data_v);
		$this->response($output, 200);
		exit;
		exit;
	}

	

	function getuserprofile_post()
	{
		$userId  = $this->post('userId');
		if (!$userId) {
			$output = array("status" => false, "msg" => "please enter  User ID");
			$this->response($output, 404);

			exit;
		}

		if ($userId) {
			$check_userid = $this->admin_model->check_userexist($userId);
			if ($check_userid < 1) {

				$output = array("status" => false, "msg" => "Invalid userId");
				$this->response($output, 404);

				exit;
			}
		}

		$this->db->select('*');
		$this->db->from('register');
		$this->db->where("userId", $userId);
		$data = $this->db->get()->result_array();

		
		$output = array("status" => true, "msg" => "Success","data"=>reset($data));
		$this->response($output, 200);
		exit;
	}
	function getappointment_post()
	{
		$userId  = $this->post('userId');
		if (!$userId) {
			$output = array("status" => false, "msg" => "please enter  User ID");
			$this->response($output, 404);

			exit;
		}

		if ($userId) {
			$check_userid = $this->admin_model->check_userexist($userId);
			if ($check_userid < 1) {

				$output = array("status" => false, "msg" => "Invalid userId");
				$this->response($output, 404);

				exit;
			}
		}

		$this->db->select('*');
		$this->db->from('appointment');
		$this->db->where("userId", $userId);
		$data = $this->db->get()->result_array();

		
		$output = array("status" => true, "msg" => "Success","data"=>($data));
		$this->response($output, 200);
		exit;
	}

	
}
