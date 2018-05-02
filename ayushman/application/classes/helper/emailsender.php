<?php defined('SYSPATH') or die('No direct script access.');
class helper_emailsender  {
	public static function sendemail($array_notication)
	{
		try
		{
			$obj_user=ORM::factory('user')->where('id','=',$array_notication['id'])->find();
			if(($obj_user->id != null) && ($obj_user->email != "" ))
			{	
				
				$email = $obj_user->email;
				$arr_email =Kohana::$config->load('email');//take email details from config file
				$templateName = $array_notication['template'];
				$variable = Kohana::message('email',$templateName.'.variable');
				$mailbody = Kohana::message('email',$templateName.'.mailbody');
				$subject = Kohana::message('email',$templateName.'.subject');
				$returnVarible;
				foreach($variable as $val)
				{
					if (array_key_exists($val , $array_notication) == "true")//check for user given all required values.
					{	
						$$val = $array_notication[$val]; 
						$mailbody =str_replace ('$'.$val, $$val , $mailbody );
					}
					else 
					{
						throw new Exception("Complete Information is not provided for email ".$val);
					}
				}
				$emailtxt="<html>
								<head>
								</head>
								<body>
									<table>
										<tr>
											<td style='width:100%;height:82px;'><img src='https://www.indiaonlinehealth.com/ayushman/assets/images/bgtop.png' /></td>
										</tr>
  									</table>
									<div  style='font-family:Verdana, Arial, Helvetica, sans-serif;font-size:9pt;line-height:14pt;color:#333333;text-align:left;padding-top:5px;padding-left: 12px;'>
										".$mailbody."
									<table>
										<tr valign='top'>
        									<td  colspan='7' align='left' style='font-family:Verdana, Arial, Helvetica, sans-serif;font-size:9pt;line-height:14pt;color:#333333;text-align:left;padding-top:5px;padding-left: 0px;' >Team <strong><i>IndiaOnlineHealth</i></strong></td>
        									<td width='20'>&nbsp;</td>
    									</tr>
										<tr valign='top'>
    										<td  style='align:left;font-family:Verdana, Arial, Helvetica, sans-serif;font-size:9pt;line-height:14pt;color:#333333;text-align:left;padding-top:5px;padding-left: 0px;'><a>support@indiaonlinehealth.com</a></td>                
										</tr>
									</table>
										<p style='font-family: Helvetica Neue,Arial,Helvetica,sans-serif; font-size: 13px; line-height: 18px; border-bottom: 1px solid rgb(25,25,112); padding-bottom: 10px; margin: 0pt 0pt 10px;'><div></div>
										</p>		
										<p style='font-family: Helvetica Neue,Arial,Helvetica,sans-serif; margin-top: 5px; font-size: 10px; color: rgb(136, 136, 136);'></p>
										<p style='font-family: Helvetica Neue,Arial,Helvetica,sans-serif; margin-top: 5px; font-size: 10px; color: rgb(136, 136, 136);'>
												If you received this message in error click  
											<a target='_blank' href='#'>not my account</a>.
										</p>
										<p style='font-family:Helvetica Neue,Arial,Helvetica,sans-serif; margin-top: 5px; font-size: 10px; color: rgb(136, 136, 136);'>
											Please do not reply to this message. It was sent from an unmonitored email address. This message is a service email related to your use of IndiaonlineHealth. For general inquiries please visit our home page.
										</p>
									</body>
								</html>";
				
				if (array_key_exists("attachment", $array_notication) == "true")//check for email with attachment
				{
					if (array_key_exists("attachmentpath", $array_notication) == "true")//check for attachment path is given or not
					{
						$returnVarible = email::sendwithattachment($email, $arr_email['options']['username'],$subject, $emailtxt, TRUE,$array_notication["attachmentpath"]);//send email with attachment
					}
					else 
					{
						throw new Exception("Complete Information is not provided for email attachment path");
					}
				}
				else//send email without attachment
				{
					if(isset($array_notication['replyto'])){
						$returnVarible = email::send($email, $arr_email['options']['username'],$subject, $emailtxt, TRUE,$array_notication['replyto']);				
					}else{
						$returnVarible = email::send($email, $arr_email['options']['username'],$subject, $emailtxt, TRUE);
					
					}
				}
				return $returnVarible;
			}
			else//email id not found for that id
			{
				throw new Exception("User emailId is not found");
			}
		}
		catch(Exception $e1)
		{
			return $e1->getMessage();
		}
	}
	public static function sendemailtoaid($array_notication,$email)
	{
		try
		{
			
				
				
				//$email = $obj_user->email;
				$arr_email =Kohana::$config->load('email');//take email details from config file
				$templateName = $array_notication['template'];
				$variable = Kohana::message('email',$templateName.'.variable');
				$mailbody = Kohana::message('email',$templateName.'.mailbody');
				$subject = Kohana::message('email',$templateName.'.subject');
				$returnVarible;
				foreach($variable as $val)
				{
					if (array_key_exists($val , $array_notication) == "true")//check for user given all required values.
					{	
						$$val = $array_notication[$val]; 
						$mailbody =str_replace ('$'.$val, $$val , $mailbody );
					}
					else 
					{
						throw new Exception("Complete Information is not provided for email ".$val);
					}
				}
				$emailtxt="<html>
								<head>
								</head>
								<body>
									<table>
										<tr>
											<td style='width:100%;height:82px;'><img src='https://www.indiaonlinehealth.com/ayushman/assets/images/bgtop.png' /></td>
										</tr>
  									</table>
									<div  style='font-family:Verdana, Arial, Helvetica, sans-serif;font-size:9pt;line-height:14pt;color:#333333;text-align:left;padding-top:5px;padding-left: 12px;'>
										".$mailbody."
									<table>
										<tr valign='top'>
        									<td  colspan='7' align='left' style='font-family:Verdana, Arial, Helvetica, sans-serif;font-size:9pt;line-height:14pt;color:#333333;text-align:left;padding-top:5px;padding-left: 0px;' >Team <strong><i>IndiaOnlineHealth</i></strong></td>
        									<td width='20'>&nbsp;</td>
    									</tr>
										<tr valign='top'>
    										<td  style='align:left;font-family:Verdana, Arial, Helvetica, sans-serif;font-size:9pt;line-height:14pt;color:#333333;text-align:left;padding-top:5px;padding-left: 0px;'><a>support@indiaonlinehealth.com</a></td>                
										</tr>
									</table>
										<p style='font-family: Helvetica Neue,Arial,Helvetica,sans-serif; font-size: 13px; line-height: 18px; border-bottom: 1px solid rgb(25,25,112); padding-bottom: 10px; margin: 0pt 0pt 10px;'><div></div>
										</p>		
										<p style='font-family: Helvetica Neue,Arial,Helvetica,sans-serif; margin-top: 5px; font-size: 10px; color: rgb(136, 136, 136);'></p>
										<p style='font-family: Helvetica Neue,Arial,Helvetica,sans-serif; margin-top: 5px; font-size: 10px; color: rgb(136, 136, 136);'>
												If you received this message in error click  
											<a target='_blank' href='#'>not my account</a>.
										</p>
										<p style='font-family:Helvetica Neue,Arial,Helvetica,sans-serif; margin-top: 5px; font-size: 10px; color: rgb(136, 136, 136);'>
											Please do not reply to this message. It was sent from an unmonitored email address. This message is a service email related to your use of IndiaonlineHealth. For general inquiries please visit our home page.
										</p>
									</body>
								</html>";
				
				if (array_key_exists("attachment", $array_notication) == "true")//check for email with attachment
				{
					if (array_key_exists("attachmentpath", $array_notication) == "true")//check for attachment path is given or not
					{
						$returnVarible = email::sendwithattachment($email, $arr_email['options']['username'],$subject, $emailtxt, TRUE,$array_notication["attachmentpath"]);//send email with attachment
					}
					else 
					{
						throw new Exception("Complete Information is not provided for email attachment path");
					}
				}
				else//send email without attachment
				{
					if(isset($array_notication['replyto'])){
						$returnVarible = email::send($email, $arr_email['options']['username'],$subject, $emailtxt, TRUE,$array_notication['replyto']);				
					}else{
						$returnVarible = email::send($email, $arr_email['options']['username'],$subject, $emailtxt, TRUE);

					}
				}
				return $returnVarible;
			
		}
		catch(Exception $e1)
		{
			return $e1->getMessage();
		}
	}
}
