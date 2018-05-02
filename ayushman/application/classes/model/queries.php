<?php defined('SYSPATH') or die('No direct script access.');
class Model_Queries extends kohana_Ayushmanorm {
	protected $_table_name = 'queries';	

	public function get_messages($appid,$patordocid){
		try{
			$user = Auth::instance()->get_user();
			$messages = array();
			if ($user->has('roles', ORM::factory('role', array('name' => 'doctor')))){
				if($patordocid==$user->id){
					$objmessages = $this->where('refappid_c','=',$appid)->find_all();

					foreach($objmessages as $objmessage){
						$temp = array();
						$user = ORM::factory('user')->where('id','=',$objmessage->sentby_c)->find();
						$temp['name'] = $user->Firstname_c.' '.$user->lastname_c;
						$temp['senderid'] = $user->id;
				
				
						$user = ORM::factory('user')->where('id','=',$objmessage->receivedby_c)->find();
						$temp['to'] = $user->Firstname_c.' '.$user->lastname_c;
						$temp['receiverid'] = $user->id;
				
						$date = new DateTime($objmessage->createdon_c);
						$temp['datetime'] = $date->format('d M Y  H:i:s');
						$temp['query'] = $objmessage->query_c;
						$temp['isread'] = $objmessage->isread_c;
				
						array_push($messages,$temp);
					}
			
					return($messages);
				}
				else{
				$query="select * from queries where refappid_c= ".$appid." and (receivedby_c= ".$user->id." or sentby_c = ".$user->id.")";
					//$objmessages = $this->where('refappid_c','=',$appid)->where('receivedby_c','=',$user->id)->find_all();
				$objmessages = Db::query(Database::SELECT, $query)
				 ->execute()
				  ->as_array();
				}
			}
			if ($user->has('roles', ORM::factory('role', array('name' => 'patient')))){
				$query="select * from queries where refappid_c= ".$appid." and (receivedby_c= ".$patordocid." or sentby_c = ".$patordocid.")";
				//$objmessages = $this->where('refappid_c','=',$appid)->where('receivedby_c','=',$patordocid)->find_all();
				$objmessages = Db::query(Database::SELECT, $query)
				 ->execute()
				  ->as_array();
			}
			foreach($objmessages as $objmessage){
				$temp = array();
				$user = ORM::factory('user')->where('id','=',$objmessage['sentby_c'])->find();
				$temp['name'] = $user->Firstname_c.' '.$user->lastname_c;
				$temp['senderid'] = $user->id;
				
				$user = ORM::factory('user')->where('id','=',$objmessage['receivedby_c'])->find();
				$temp['to'] = $user->Firstname_c.' '.$user->lastname_c;
				$temp['receiverid'] = $user->id;
				
				$date = new DateTime($objmessage['createdon_c']);
				$temp['datetime'] = $date->format('d M Y  H:i:s');
				$temp['query'] = $objmessage['query_c'];
				$temp['isread'] = $objmessage['isread_c'];
				
				array_push($messages,$temp);
			}
			
			return($messages);
		}catch(Exception $e){throw new Exception($e);}
	}
	public function get_receivedmessages($userid){
		try{
			$objmessages = $this->where('receivedby_c','=',$userid)->order_by('id','DESC')->find_all();
			$messages = array();
			foreach($objmessages as $objmessage){
				$temp = array();
				$user = ORM::factory('user')->where('id','=',$objmessage->sentby_c)->find();
				$temp['name'] = $user->Firstname_c.' '.$user->lastname_c;
				
				$user = ORM::factory('user')->where('id','=',$objmessage->receivedby_c)->find();
				$temp['to'] = $user->Firstname_c.' '.$user->lastname_c;
				
				$date = new DateTime($objmessage->createdon_c);
				$temp['datetime'] = $date->format('d M Y  H:i:s');
				$temp['query'] = $objmessage->query_c;
				$temp['appid'] = $objmessage->refappid_c;
				$temp['id'] = $objmessage->id;
				$temp['isread'] = $objmessage->isread_c;

				array_push($messages,$temp);
			}
			
			return($messages);
		}catch(Exception $e){throw new Exception($e);}
	}
	public function get_unreadmessagecount($userid){
		try{
			$count = $this->where('receivedby_c','=',$userid)->where('isread_c','=',0)->count_all();
			return($count);
		}catch(Exception $e){throw new Exception($e);}
	}

}