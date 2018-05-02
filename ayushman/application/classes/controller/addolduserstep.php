<?php defined('SYSPATH') or die('No direct script access.');
class Controller_addolduserstep extends Controller {
	public function action_view(){
		try{
			$doctors = ORM::factory('doctor')->find_all();

			foreach($doctors as $doctor){
				$user = ORM::factory('user')
					->where('id','=',$doctor->refdoctorsid_c)
					->find();
	
				$obj_doctorclinic = ORM::factory('doctorclinic')
						->where('refdoctorclinicdoctorid_c','=',$doctor->id)
						->find_all();
					$obj_doctorclinic_count=$obj_doctorclinic->count();
				
					$obj_doctorcertificate = ORM::factory('doctorcertificate')
						->where('refdoctorid_c','=',$doctor->id)
						->find_all();
					$obj_doctorcertificate_count=$obj_doctorcertificate->count();

				
					$objFees = ORM::factory('Billingdoctorfee')
						->where('ref_doctorid_c','=',$doctor->id)
						->find_all();
					$objFees_count=$objFees->count();

				
					$obj_schedule = ORM::factory('schedule')
						->where('editedby_c','=',$user->id)
						->find_all();
					$obj_schedule_count=$obj_schedule->count();

				
					if($user->DOB_c != "0000-00-00" ){
						$userstep= new Model_Uspstepuser;
						$userstep->refuseruspstepsid_c='2';
						$userstep->refuspuserid_c=$user->id;
						$userstep->save();
					}

					if($obj_doctorclinic_count !='0'){
						$userstep= new Model_Uspstepuser;
						$userstep->refuseruspstepsid_c='3';
						$userstep->refuspuserid_c=$user->id;
						$userstep->save();
					}
					if($obj_doctorcertificate_count !='0'){
						$userstep= new Model_Uspstepuser;
						$userstep->refuseruspstepsid_c='1';
						$userstep->refuspuserid_c=$user->id;
						$userstep->save();
					}
					if($objFees_count !='0'){
						$userstep= new Model_Uspstepuser;
						$userstep->refuseruspstepsid_c='5';
						$userstep->refuspuserid_c=$user->id;
						$userstep->save();
					}
					if($obj_schedule_count !='0'){
						$userstep= new Model_Uspstepuser;
						$userstep->refuseruspstepsid_c='4';
						$userstep->refuspuserid_c=$user->id;
						$userstep->save();
					}
			}
			echo 'done';die;
		}
		catch(Exception $e){var_dump($e);}
	}

	public function action_regprocstatus(){
		try{
			$doctors = ORM::factory('doctor')->find_all();
			foreach($doctors as $doctor){
				$obj_regsteps = ORM::factory('uspstepuser')->where('refuspuserid_c','=',$doctor->refdoctorsid_c)->find_all();
				if($obj_regsteps->count() == 5){
					$user = ORM::factory('user')->where('id', '=', $doctor->refdoctorsid_c)->find();
					if($user->id != null){
						$user->registrationProcess_status = 'completed';
						try{
							$user->update();
						}catch(Exception $e){
							echo 'id = '.$user->id.'</br>';
						}
					}
				}
			}
			echo 'done';die;
		}
	catch(Exception $e){var_dump($e);}
	}

	public function action_migrateallergy(){
		try{
			$old_allergy=ORM::factory('patientallergy')->find_all();
			foreach($old_allergy as $old){
				$allergymaster=ORM::factory('allergymaster')->where('id','=',$old->refpatallergyid_c)->find();
				if($allergymaster->type_c=='Food'){
					$allergyid=1;

				}
				if($allergymaster->type_c=='Drug'){
					$allergyid=2;
				}
				if($allergymaster->type_c=='Plant'){
					$allergyid=3;
				}
				if($allergymaster->type_c=='Animal'){
					$allergyid=4;
				}

				$new_allergy=ORM::factory('allergy')->where('refallergytypeid_c','=',$allergyid)->where('refallergypatientsid_c','=',$old->refpatallergypatientsid_c)->find();

				if($new_allergy->refallergytypeid_c){
					$str=$new_allergy->allergy_c.','.$allergymaster->Allergyname_c;

					$new_allergy->allergy_c=$str;
					$new_allergy->createdon_c=$old->createdon_c;
					$new_allergy->createdby_c=$old->createdby_c;

					$new_allergy->save();
				}
				else{
					$obj_newallergy=new Model_Allergy;

					$obj_newallergy->refallergypatientsid_c=$old->refpatallergypatientsid_c;
					$obj_newallergy->createdon_c=$old->createdon_c;
					$obj_newallergy->createdby_c=$old->createdby_c;

					$obj_newallergy->allergy_c=$allergymaster->Allergyname_c;
					$obj_newallergy->refallergytypeid_c=$allergyid;
					$obj_newallergy->save();
				}

			}

		}
		catch(Exception $e){var_dump($e);}
	}
}