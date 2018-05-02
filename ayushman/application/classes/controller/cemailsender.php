<?php defined('SYSPATH') or die('No direct script access.');
class Controller_Cemailsender extends Controller {
public function action_sendemail()
	{
		$name=$this->request->post('name');
		$email=$this->request->post('email');
		$emailbody=$this->request->post('emailbody');
		$website_url=$this->request->post('website_url');
        $message = "<html>
<head>
</head>
<body>
<table>
<tr>
    <td style='width:100%;height:82px;'><img src='http://".$_SERVER['HTTP_HOST']."/ayushman/assets/images/bgtop.png' /></td>
  </tr>
  </table>
<div  style='font-family:Verdana, Arial, Helvetica, sans-serif;
	font-size:9pt;
	line-height:14pt;
	color:#333333;
	text-align:left;
	padding-top:5px;
	padding-left: 12px;'>
Hi ".$name.",
<br/>Thank you for registering on <strong><i>IndiaOnlineHealth</i></strong> platform. We need to verify that this is your emailId.
<br/>Use following link to verify your account
<br/><a target='_blank' href=".$website_url.">".$website_url."</a>
</div>
<br/>
<table>
<tr height='13pt' valign='top'>
        
        <td  colspan='7' align='left' style='font-family:Verdana, Arial, Helvetica, sans-serif;
	font-size:9pt;
	line-height:14pt;
	color:#333333;
	text-align:left;
	padding-top:5px;
	padding-left: 0px;' >Team <strong><i>IndiaOnlineHealth</i></strong></td>
        <td width='20'>&nbsp;</td>
    </tr>
<tr height='13pt' valign='top'>
    <td  style='align:left;font-family:Verdana, Arial, Helvetica, sans-serif;
	font-size:9pt;
	line-height:14pt;
	color:#333333;
	text-align:left;
	padding-top:5px;
	padding-left: 0px;'><a>&nbsp;support@indiaonlinehealth.com</a></td>                
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
					Please do not reply to this message. It was sent from an unmonitored email address. This message is a service email related to your use of IndiaonlineHealth. For general inquiries please visit our <a href='http://".$_SERVER['HTTP_HOST']."/ayushman/'>home page</a>.
					</p>
					
					
					</body>
</html>";
	$arr_email =Kohana::$config->load('email');
    email::send($email, $arr_email['options']['username'],'Thanks for registering with IndiaOnlineHealth', $message, TRUE);
	}
	public function action_email()
	{
		$name=$_GET['name'];
		$email=$_GET['email'];
		$subject=$_GET['subject'];
		$emailbody=$_GET['emailbody'];
		$attachments=$_GET['attachment'];
        $message = "<html>
					<head>
					</head>
					<body>
					<div style='padding: 14px; margin-bottom: 4px; background-color: rgb(221,239,254);'>
					".$emailbody."
					</div>
					</body>
					<html>
					<html>";
					$arr_email =Kohana::$config->load('email');
		email::sendwithattachment($email,  $arr_email['options']['username'],$subject, $message, TRUE,$attachments);
	}
	public function action_emailwithoutattachement()
	{
		$name=$this->request->post('name');
		$email=$this->request->post('email');
		$emailbody=$this->request->post('emailbody');
		$subject=$this->request->post('subject');
        $message = "<html>
<head>
</head>
<body>
<table>
<tr>
    <td style='width:100%;height:82px;'><img src='http://".$_SERVER['HTTP_HOST']."/ayushman/assets/images/bgtop.png' /></td>
  </tr>
  </table>
<div  style='font-family:Verdana, Arial, Helvetica, sans-serif;
	font-size:9pt;
	line-height:14pt;
	color:#333333;
	text-align:left;
	padding-top:5px;
	padding-left: 12px;'>
".$emailbody."
<table>
<tr valign='top'>
        
        <td  colspan='7' align='left' style='font-family:Verdana, Arial, Helvetica, sans-serif;
	font-size:9pt;
	line-height:14pt;
	color:#333333;
	text-align:left;
	padding-top:5px;
	padding-left: 0px;' >Team <strong><i>IndiaOnlineHealth</i></strong></td>
        <td width='20'>&nbsp;</td>
    </tr>
<tr valign='top'>
    <td  style='align:left;font-family:Verdana, Arial, Helvetica, sans-serif;
	font-size:9pt;
	line-height:14pt;
	color:#333333;
	text-align:left;
	padding-top:5px;
	padding-left: 0px;'><a>support@indiaonlinehealth.com</a></td>                
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
					.
					</p>
					
					
					</body>
</html>";
		$arr_email =Kohana::$config->load('email');
		email::send($email, $arr_email['options']['username'],$subject, $message, TRUE);
	}
}