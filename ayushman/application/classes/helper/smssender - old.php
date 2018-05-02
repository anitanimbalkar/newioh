<?php defined('SYSPATH') or die('No direct script access.');
class helper_smssender  {
	public static function sendsms($array_notication)
	{
		try
		{
			
			$obj_user=ORM::factory('user')->where('id','=',$array_notication['id'])->find();
			if($obj_user->mobileno1_c != null)
			{	
				$mobilenumber = $obj_user->mobileno1_c;
				$arr_sms =Kohana::$config->load('sms');//take sms details from config file
				$templateName = $array_notication['template'];
				$user= $arr_sms['user']; 
				$senderID= $arr_sms['senderID'];
				$url = $arr_sms['url'];
				$receipientno=$mobilenumber ;
				$variable = Kohana::message('sms',$templateName.'.variable');
				$msgtxt = Kohana::message('sms',$templateName.'.msgbody');
				foreach($variable as $val)
				{
					if (array_key_exists($val , $array_notication) == "true")//check for user given all required values.
					{	
						$$val = $array_notication[$val]; 
						$msgtxt =str_replace ('$'.$val, $$val , $msgtxt );
					}
					else 
					{
						throw new Exception("Complete Information is not provided for sms ".$val);
					}
				}
				$msgtxt = urlencode ($msgtxt);
				$ch = curl_init();
				curl_setopt($ch,CURLOPT_URL,  $url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, "user=$user&senderID=$senderID&receipientno=$receipientno&msgtxt=$msgtxt");
				$buffer = curl_exec($ch);
				$returnVariable="";
				if(empty ($buffer))
				{ 
					throw new Exception("curl_exec is empty "); ; 
				}
				else
				{ 
					if(strpos($buffer, "Status=0") ===  false )//returns false if the string is not found, and 0 if it is found at the beginning. 
					{
						var_dump($buffer);
						throw new Exception("Sms notification error");
						$returnVariable= "false" ;
					}
					else
					{
						$returnVariable= "true" ;
					}
				} 
				curl_close($ch);
				return $returnVariable;
			}
			else
			{
				throw new Exception("User mobile number is not found");
			}
		}
		catch(Exception $e1)
		{
			return $e1->getMessage();
		}
	}
	
	public static function sendSmsToCdmPatients($array_notification)
	{
		try
		{
				$mobilenumbers = $array_notification['mobilenumbers'];
				$arr_sms =Kohana::$config->load('sms');//take sms details from config file
				$templateName = $array_notification['template'];
				$user= $arr_sms['user']; 
				$senderID= $arr_sms['senderID'];
				$url = $arr_sms['url'];
				$receipientno=$mobilenumbers ;
				$variable = Kohana::message('sms',$templateName.'.variable');
				$msgtxt = Kohana::message('sms',$templateName.'.msgbody');	
				foreach($variable as $val)
				{
					if (array_key_exists($val , $array_notification) == "true")//check for user given all required values.
					{	
						$$val = $array_notification[$val]; 
						$msgtxt =str_replace ('$'.$val, $$val , $msgtxt );
					}
					else 
					{
						throw new Exception("Complete Information is not provided for sms ".$val);
					}
				}
				$msgtxt = urlencode ($msgtxt);
				
				$ch = curl_init();
				curl_setopt($ch,CURLOPT_URL,  $url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, "user=$user&senderID=$senderID&receipientno=$receipientno&msgtxt=$msgtxt");
				
				$buffer = curl_exec($ch);
				$returnVariable="";
				if(empty ($buffer))
				{ 
					throw new Exception("curl_exec is empty "); ; 
				}
				else
				{ 
					if(strpos($buffer, "Status=0") ===  false )//returns false if the string is not found, and 0 if it is found at the beginning. 
					{
						var_dump($buffer);
						throw new Exception("Sms notification error");
						$returnVariable= "false" ;
					}
					else
					{
						$returnVariable= "true" ;
					}
				} 
				curl_close($ch);
				return $returnVariable;
		}
		catch(Exception $e1)
		{
			return $e1->getMessage();
		}
	}
}
