<?php defined('SYSPATH') or die('No direct script access.');
include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/transaction.php');
include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/controller/catjob.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/notificationsender.php');
class Controller_Cappointment extends Controller_Ctemplatewithmenu{
	public function action_finalize(){
		try{
			$staff_flag = false;
			$object_user = Auth::instance()->get_user();
			if (!($object_user)){
				Request::current()->redirect('cuser/login');
			}
			$object_patient = $object_user;
			if($object_user->has('roles', ORM::factory('role', array('name' => 'staff')))){
				$session = Session::instance();
				$patient_id = $session->get('patient_id');
				$object_patient = ORM::factory('user')->where('id','=',$patient_id)->find();
				$staff_flag = true;
			}
			$appointment_details = $_POST;
			$doctor_id = $appointment_details['doctor_id'];
			$clinic_id = $appointment_details['clinic_id'];
			$charge_type = $appointment_details['charge_type'];
			$clinic_name = $appointment_details['clinic_name'];
			$start_time = str_replace(',',' ',$appointment_details['start_time']);
			$end_time = str_replace(',',' ',$appointment_details['end_time']);
			$search_doctor_object = ORM::factory('searchdoctors')->where('doctorid', '=', $doctor_id)->find();
			$clinic_address_object = ORM::factory('address')->where('id', '=', $clinic_id)->find();
			$mode = ORM::factory('doctorclinic')->where('refdoctorclinicdoctorid_c', '=', $doctor_id)->where('refclinicaddressid_c','=', $clinic_id)->find()->mode_c;
			$object_incidents = ORM::factory('incident')
				->join('appointments')
				->on('appointments.refincidentid_c','=','incident.id')
				->where('refappfromid_c','=',$object_patient->id)
				->where('refappointmentstatusesid_c','=',1)
				->find_all();

			$object_individual_plans = new Model_Billingindividualplan;
			$user_plan_id = $object_individual_plans->where('refusersid_c','=', $object_patient->id)->where('status_c','=', 'active')->find()->refplanid_c;
			$user_plan_charges = ORM::factory('billingplancharge')->where('ref_planid_c','=',$user_plan_id)->find();
			$charges_array = array('Standard'=>1, 'Premium'=>2, 'Concessional'=>3, 'Free'=>1);
			$object_fees = ORM::factory('Billingdoctorfee')->where('ref_doctorid_c','=',$doctor_id)->where('status_c','=','active')->where('ref_slottypeid_c','=',$charges_array[$charge_type])->find();
			$user_account_balance = ORM::factory('billingaccount')->where('refaccountuserid_c', '=', $object_patient->id)->find()->netbalance_c;
			$urole = 'patient';
			if($staff_flag == true){
				$urole = 'staff';
			}
			
			$array_taxes = Kohana::$config->load('taxes');

			$content = View::factory('/vuser/vpatient/vfinalizeappointment');
			$content->bind('user_net_balance', $user_account_balance);
			$content->bind('user_plan_charges', $user_plan_charges);
			$content->bind('object_fees',$object_fees);
			$content->bind('search_doctor_object', $search_doctor_object);
			$content->bind('clinic_address_object', $clinic_address_object);
			$content->bind('clinic_name', $clinic_name);
			$content->bind('start_time', $start_time);
			$content->bind('end_time', $end_time);
			$content->bind('charge_type', $charge_type);
			$content->bind('appointment_type', $appointment_details['appointment_type']);
			$content->bind('display_time', $appointment_details['display_time']);
			$content->bind('object_incidents', $object_incidents);
			$content->bind('mode', $mode);
			$content->bind('role', $urole);
			$content->bind('servicetax', $array_taxes['servicetax']);
			$this->template->breadcrumb = ">>Home";
			$this->template->content = $content;
			$this->template->user = $object_user;
			$this->template->urole = $urole;
		}
		catch(Exception $e) { throw new Exception($e); }
	}
	public function action_book(){
		try{
			$staff_flag = false;
			$object_user = Auth::instance()->get_user();
			if (!($object_user)){
				Request::current()->redirect('cuser/login');
			}
			$object_patient = $object_user;

			//if booking by staff, get patient object from session
			if($object_user->has('roles', ORM::factory('role', array('name' => 'staff')))){
				$session = Session::instance();
				$patient_id = $session->get_once('patient_id');
				$object_patient = ORM::factory('user')->where('id','=',$patient_id)->find();
				$staff_flag = true;
			}

			//if coming back from redirect, get appointment details from session
			$session = Session::instance();
			if(($appointment_details = $session->get_once('appointment_details')) != null){
			}
			else{
				if(isset($_POST['doctor_id']))
				$appointment_details = $_POST;
				else
				//var_dump("here"); die;
				Request::current()->redirect('cpatientdashboard/view');
			}

			$doctor_id = $appointment_details['doctor_id'];
			//get incident id
			$visit_type = $appointment_details['visit_type'];
			$appointment_type = $appointment_details['appointment_type'];
			if($visit_type == 'First Time'){
				$incident_object = ORM::factory('incident');
				$incident_object->incidentsname_c = $appointment_details['incident'];
				$incident_object->incidentdate_c =	$appointment_details['display_time'];
				$incident_id = $incident_object->save()->id;
			}
			else if($visit_type == 'Follow-up'){
				$incident_id = $appointment_details['incident'];
			}
			//var_dump($incident_id);die();
			//end of get incident id
			
			$reschedule_flag = false;
			$reschedule_appointment_id = null;
			$session = Session::instance();
			if(($reschedule_appointment_id = $session->get_once('reschedule_appointment_id')) != null){
				$reschedule_flag = true;
				$reschedule_appointment_object = ORM::factory('appointment')->where('id', '=', $reschedule_appointment_id)->find();
				$reschedule_appointment_id = $reschedule_appointment_object->id;
			}
			$clinic_object = ORM::factory('doctorclinic')->where('refdoctorclinicdoctorid_c', '=', $doctor_id)->where('refclinicaddressid_c','=', $appointment_details['clinic_id'])->find();
			$object_individual_plans = new Model_Billingindividualplan;
			$user_plan_id = $object_individual_plans->where('refusersid_c','=', $object_patient->id)->where('status_c','=', 'active')->find()->refplanid_c;
			$planid = $user_plan_id;
			$user_plan_charges = ORM::factory('billingplancharge')->where('ref_planid_c','=',$user_plan_id)->find();
			$charges_array = array('Standard'=>1, 'Premium'=>2, 'Concessional'=>3, 'Free'=>1);
			$object_fees = ORM::factory('Billingdoctorfee')->where('ref_doctorid_c','=',$doctor_id)->where('status_c','=','active')->where('ref_slottypeid_c','=',$charges_array[$appointment_details['charge_type']])->find();
			$user_account_object = ORM::factory('billingaccount')->where('refaccountuserid_c', '=', $object_patient->id)->find();
			$user_account_balance = $user_account_object->netbalance_c;
			
			$total_service_charges = $this->get_ayushman_charges($user_plan_charges, $clinic_object->mode_c);
			
			$array_taxes = Kohana::$config->load('taxes');
			$servicetaxonayushmancharges = $total_service_charges * $array_taxes['servicetax'] / 100;

			$doctor_fees = $this->get_doctor_fees($visit_type,$clinic_object->mode_c, $object_fees);
			$servicetaxondoctorfees = $doctor_fees * $array_taxes['doctorservicetax'] /100;
			$arr_accounts = include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/config/accounts.php');

			$usagecharges = $total_service_charges - $user_plan_charges->servicecharges_c;

			//if reschedule flag is set, cancel prev appointment irrespective of role
			if($reschedule_flag == true){
				$reschedule_appointment_object->refappointmentstatusesid_c='3';
				$reschedule_appointment_object->save();
				catjob::cancelAppointmentRemider($reschedule_appointment_object->id);
				if($reschedule_appointment_object->paid_c == 1){
					$result = transaction::transfer(ORM::factory('billingaccount')->where('refaccountuserid_c','=',$arr_accounts['provisionaccountuserid'])->find()->accountcode_c,$user_account_object->accountcode_c,1, ($reschedule_appointment_object->rate_c),7);
					$servicetaxresult = transaction::transfer(ORM::factory('billingaccount')->where('refaccountuserid_c','=',$arr_accounts['provisionaccountuserid'])->find()->accountcode_c,$user_account_object->accountcode_c,1, $servicetaxondoctorfees,14);
					$return = transaction::savedetails($result,$planid,$reschedule_appointment_object->rate_c,orm::factory('doctor')->where('id','=',$reschedule_appointment_object->refappwithid_c)->find()->refdoctorsid_c,$object_patient->id,$servicetaxondoctorfees,$array_taxes['doctorservicetax'],$servicetaxresult);

					$result = transaction::transfer(ORM::factory('billingaccount')->where('refaccountuserid_c','=',$arr_accounts['provisionaccountuserid'])->find()->accountcode_c,$user_account_object->accountcode_c,1, ($reschedule_appointment_object->usagecharges_c),16);
					$servicetaxresult = transaction::transfer(ORM::factory('billingaccount')->where('refaccountuserid_c','=',$arr_accounts['provisionaccountuserid'])->find()->accountcode_c,$user_account_object->accountcode_c,1, ($reschedule_appointment_object->usagecharges_c * $array_taxes['servicetax']/100),17);
					$return = transaction::savedetails($result,$planid,($reschedule_appointment_object->usagecharges_c),orm::factory('doctor')->where('id','=',$reschedule_appointment_object->refappwithid_c)->find()->refdoctorsid_c,$object_patient->id,($reschedule_appointment_object->usagecharges_c * $array_taxes['servicetax']/100),$array_taxes['servicetax'],$servicetaxresult);
					

					if($return != 'success'){
						throw new exception($return);
					}			

					if($result['type']== 'error'){
						throw new Exception;
					}
				}
			}
			//end of cancel prev appointment
			$payment_mode = $appointment_details['payment_mode'];
			if($staff_flag == false){
				//transfer money from patient's account to ayushman account if patient takes appointment

				if($payment_mode == 1){
					if($user_account_balance >= ($doctor_fees + $total_service_charges + $servicetaxonayushmancharges + $servicetaxondoctorfees)){
						$result = transaction::transfer($user_account_object->accountcode_c,ORM::factory('billingaccount')->where('refaccountuserid_c','=',$arr_accounts['provisionaccountuserid'])->find()->accountcode_c,1, ($doctor_fees),2);
						$servicetaxresult = transaction::transfer($user_account_object->accountcode_c,ORM::factory('billingaccount')->where('refaccountuserid_c','=',$arr_accounts['provisionaccountuserid'])->find()->accountcode_c,1, ($servicetaxondoctorfees),14);
						$return = transaction::savedetails($result,$planid,$doctor_fees,$object_patient->id,orm::factory('doctor')->where('id','=',$doctor_id)->find()->refdoctorsid_c,$servicetaxondoctorfees,$array_taxes['doctorservicetax'],$servicetaxresult);
						if($return != 'success'){
							throw new exception($return);
						}

						if($result['type'] == 'error'){
							echo 'error while transfer doctor fees';die();
						}
					}
					else{
						echo 'Insufficient Balance for doctor fees';die();
					}
				}
				if($user_account_balance >= $total_service_charges){
					$result = transaction::transfer($user_account_object->accountcode_c,ORM::factory('billingaccount')->where('refaccountuserid_c','=',$arr_accounts['ayushmanincomeuserid'])->find()->accountcode_c,1, ($user_plan_charges->servicecharges_c),1);
					$servicetaxresult = transaction::transfer($user_account_object->accountcode_c,ORM::factory('billingaccount')->where('refaccountuserid_c','=',$arr_accounts['ayushmanincomeuserid'])->find()->accountcode_c,1, (($user_plan_charges->servicecharges_c)* $array_taxes['servicetax'] / 100),12);
					$return = transaction::savedetails($result,$planid,$user_plan_charges->servicecharges_c,$object_patient->id,orm::factory('doctor')->where('id','=',$doctor_id)->find()->refdoctorsid_c,(($user_plan_charges->servicecharges_c)* $array_taxes['servicetax'] / 100),$array_taxes['servicetax'],$servicetaxresult);
					
					$result = transaction::transfer($user_account_object->accountcode_c,ORM::factory('billingaccount')->where('refaccountuserid_c','=',$arr_accounts['provisionaccountuserid'])->find()->accountcode_c,1, ($total_service_charges - $user_plan_charges->servicecharges_c),10);
					$servicetaxresult = transaction::transfer($user_account_object->accountcode_c,ORM::factory('billingaccount')->where('refaccountuserid_c','=',$arr_accounts['provisionaccountuserid'])->find()->accountcode_c,1, (($total_service_charges - $user_plan_charges->servicecharges_c)* $array_taxes['servicetax'] / 100),20);
					$return = transaction::savedetails($result,$planid,($total_service_charges - $user_plan_charges->servicecharges_c),$object_patient->id,orm::factory('doctor')->where('id','=',$doctor_id)->find()->refdoctorsid_c,(($total_service_charges - $user_plan_charges->servicecharges_c)* $array_taxes['servicetax'] / 100),$array_taxes['servicetax'],$servicetaxresult);
					
					

					if($result['type'] == 'error'){
						echo 'error while tranfer ayushman charges';die();
					}
				}
				else{
					echo 'Insufficient balance for ayushman charges';die();
				}
			}

			//insert into appointments table
			if($appointment_type == 'S'){
				$booked_appointment = ORM::factory('appointment')->where('refappwithid_c','=',$doctor_id)->where('scheduledstarttime_c','=',$appointment_details['start_time'])->where('refappointmentstatusesid_c','=',2)->find();
				if($booked_appointment->loaded()){
					echo 'Sorry but the appointment is already booked. Please choose another slot.';
					die();
				}
			}
			$modes_array = array('Online'=>1, 'In-clinic'=>3);
			$appointment_object = ORM::factory('appointment');
			$appointment_object->refappfromid_c = $object_patient->id;
			$appointment_object->refappwithid_c = $doctor_id;
			$appointment_object->scheduledstarttime_c = $appointment_details['start_time'];
			$appointment_object->scheduledendtime_c = $appointment_details['end_time'];
			$appointment_object->displaytime_c = $appointment_details['display_time'];
			$appointment_object->refincidentid_c = $incident_id;
			$appointment_object->reasonsymptom_c = $appointment_details['descriptions'];
			$appointment_object->refmode_c = $modes_array[$clinic_object->mode_c];
			$appointment_object->clinicid_c = $appointment_details['clinic_id'];
			$appointment_object->consultationmode_c = $clinic_object->mode_c;
			$appointment_object->rate_c						= $doctor_fees;
			$appointment_object->refappointmentstatusesid_c = 2;
			$appointment_object->status_c					= "fromsystem";
			$appointment_object->paid_c           = $payment_mode;
			$appointment_object->usagecharges_c = $usagecharges;
			$appointment_object->appointmenttype_c = $appointment_type;
			$appointment_id = $appointment_object->save()->id;
			//end of insert into appointments table

			//send notification to patient
			$doctor_object = ORM::factory('doctor')->where('id', '=', $doctor_id)->find();
			$doctor_user_object = ORM::factory('user')->where('id' ,'=', $doctor_object->refdoctorsid_c)->find();
			$doctor_name = $doctor_user_object->Firstname_c.' '.$doctor_user_object->lastname_c;
			$time = date('H:i',strtotime($appointment_details['display_time']));
			$date = date('d M Y',strtotime($appointment_details['display_time']));
			if($reschedule_flag == true){
				$notification['id']=$appointment_object->refappfromid_c;
				$notification['template']='rescheduled_appointment';
				$notification['sms']='true';
				$notification['drname']=$doctor_name;
				$notification['timeafter']=$time;
				$notification['dateafter']=$date;
				$notification['beforeresheduletime']=date('H:i',strtotime($reschedule_appointment_object->displaytime_c));
				$notification['beforeresheduledate']=date('d M Y', strtotime($reschedule_appointment_object->displaytime_c));
				$notification['modebefore']=$reschedule_appointment_object->consultationmode_c;
				$notification['modeafter']=$appointment_object->consultationmode_c;
			}
			else{
				$notification=  array();
				$notification['id']=$appointment_object->refappfromid_c;
				$notification['template']='take_appointment_patientmsg';
				$notification['sms']='true';
				$notification['drname']=$doctor_name;
				$notification['time']=$time;
				$notification['date']=$date;
				$notification['mode']=$appointment_object->consultationmode_c;
			}
			helper_notificationsender::sendnotification($notification);
			//end of send notification to patient

			//send notification to doctor
			if($clinic_object->sendnotification_c == 1){
				if($reschedule_flag == true){
					$notification = array();
					$notification['id']=$doctor_user_object->id;
					$notification['template']='reschedule_appointment_msg_for_doc';
					$notification['sms']='true';
					$notification['patient_name']=$object_patient->Firstname_c.' '.$object_patient->lastname_c;
					$notification['new_time']=$time;
					$notification['new_date']=$date;
					$notification['old_time']=date('H:i',strtotime($reschedule_appointment_object->displaytime_c));
					$notification['old_date']=date('d M Y', strtotime($reschedule_appointment_object->displaytime_c));
					$notification['old_mode']=$reschedule_appointment_object->consultationmode_c;
					$notification['new_mode']=$appointment_object->consultationmode_c;
				}
				else{
					$notification=  array();
					$notification['id']=$doctor_user_object->id;
					$notification['template']='take_appointment_msg_for_doc';
					$notification['sms']='true';
					$notification['patient_name']=$object_patient->Firstname_c.' '.$object_patient->lastname_c;
					$notification['time']=$time;
					$notification['date']=$date;
					$notification['mode']=$appointment_object->consultationmode_c;
				}
				helper_notificationsender::sendnotification($notification);
			}
			//end of send notification to doctor
			$clinicadd=$appointment_details['clinic_id'];
			$appdate = date('d M Y H:i',strtotime($appointment_details['display_time']));
			catjob::setAppointmentRemider($appdate,$appointment_id);
			Request::current()->redirect("cfixedappwithdoc/fixedappointmet/get?doctorid=$doctor_id&appdate=$appdate&id=$reschedule_appointment_id&clinicaddressid=$clinicadd");
		}
		catch(Exception $e) { throw new Exception($e); }
	}
	public function action_redirect(){
		$session = Session::instance();
		$session->set('appointment_details', $_POST);
		$session->set('followlink', 'cappointment/book');
		$session->set('cancellink', 'callearliestappointment/view');
		
		$object_user = Auth::instance()->get_user();
		$doctor_id = $_POST['doctor_id'];

		//get current balance
		$user_account_object = ORM::factory('billingaccount')->where('refaccountuserid_c', '=', $object_user->id)->find();
		$user_account_balance = $user_account_object->netbalance_c;

		//get doctor fees
		$clinic_object = ORM::factory('doctorclinic')->where('refdoctorclinicdoctorid_c', '=', $doctor_id)->where('refclinicaddressid_c','=', $_POST['clinic_id'])->find();
		$doctor_fees = 0;
		if($_POST['payment_mode'] == 1){
			$charges_array = array('Standard'=>1, 'Premium'=>2, 'Concessional'=>3, 'Free'=>1);
			$object_fees = ORM::factory('Billingdoctorfee')->where('ref_doctorid_c','=',$doctor_id)->where('status_c','=','active')->where('ref_slottypeid_c','=',$charges_array[$_POST['charge_type']])->find();
			$doctor_fees = $this->get_doctor_fees($_POST['visit_type'],$clinic_object->mode_c,$object_fees);
		}

		//get service charges
		$object_individual_plans = new Model_Billingindividualplan;
		$user_plan_id = $object_individual_plans->where('refusersid_c','=', $object_user->id)->where('status_c','=', 'active')->find()->refplanid_c;
		$user_plan_charges = ORM::factory('billingplancharge')->where('ref_planid_c','=',$user_plan_id)->find();
		$ayushman_fees = $this->get_ayushman_charges($user_plan_charges, $clinic_object->mode_c);
		$array_taxes = Kohana::$config->load('taxes');
		$ayushman_fees = $ayushman_fees +( $ayushman_fees * $array_taxes['servicetax'] / 100);

		//redirect
		$required_balance = $ayushman_fees + $doctor_fees;
		Request::current()->redirect("/crecharge/displayinsufficientbalance?curbalance=$user_account_balance&reqbalance=$required_balance");
	}
	private function get_doctor_fees($visit_type, $mode, $object_fees){
		if($visit_type == 'First Time'){
			if($mode == 'In-clinic'){
				$doctor_fees = $object_fees->firsttimefeesinclinic_c;
			}
			else{
				$doctor_fees = $object_fees->firsttimefees_c;
			}
		}
		else if($visit_type == 'Follow-up'){
			if($mode == 'In-clinic'){
				$doctor_fees = $object_fees->followupfeesinclinic_c;
			}
			else{
				$doctor_fees = $object_fees->followupfees_c;
			}
		}
		return $doctor_fees;
	}
	private function get_ayushman_charges($user_plan_charges, $mode){

		$booking_charges = $user_plan_charges->servicecharges_c;
		if($mode == 'Online'){
			$usage_charges = $user_plan_charges->usagechargesonline_c;
		}
		else if($mode == 'In-clinic'){
			$usage_charges = $user_plan_charges->usagechargesinclinic;
		}
		$total_service_charges = $booking_charges + $usage_charges;
		
		return $total_service_charges;
	}
}
