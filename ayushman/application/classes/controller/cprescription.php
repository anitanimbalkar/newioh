<?php defined('SYSPATH') or die('No direct script access.');
include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/transaction.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/export.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/mailfile.php');

class Controller_Cprescription extends Controller_Ctemplatewithmenu  {

public function action_savePresPdfForMail(){
		$htmlfile = $_POST['htmlfile'];		
		$htmlfile = str_replace('/ayushman/assets/',$_SERVER['DOCUMENT_ROOT'].'/ayushman/assets/',$htmlfile);
		$email = $_POST['emailid'];
	//	$email = "";
		
		$objHtml 	= new simple_html_dom();
		$objHtml->load($htmlfile);
		$files = new helper_Files();
		$temp=$files->savePdfFile($objHtml);
		$file = $temp["file"];	
		$id = $_POST['patid'];
		if($email == "")
		{
			// If email is not sent from page then email from users 
			// data is fetched and mail is sent to ths email
			$objuser=ORM::factory('user')->where('id','=',$id)->find();
			$email = $objuser->email;					
		}
			$notification=  array();
			$notification['template']='blanktemplate';
			$notification['sms']='false'; 
			$notification['email']='true';
			$notification['message']='Please find attach Prescription';					
			$notification['attachment']='true';
			$notification["attachmentpath"] = $file;
		echo $email;
//		$email_sender = new helper_emailsender();
//		$var = $email_sender->sendemailtoaid($notification,$email);
/////////////////////////////////////////////////////////////////////////////

/*$to = "anita.nimbalkar@indiaonliehealth.com";
$subject = "Your password with attachment test";
$from = "inhlth@indiaonlinehealth.com";
$headers = "From: $from\r\n";
$headers .= "MIME-Version: 1.0\r\n"."Content-Type: multipart/mixed; boundary=\"1a2a3a\"";
 
$message = "If you can see this MIME than your client doesn't accept MIME types!\r\n"
  ."--1a2a3a\r\n";
 
$message .= "Content-Type: text/html; charset=\"iso-8859-1\"\r\n"
  ."Content-Transfer-Encoding: 7bit\r\n\r\n"
  ."hey my <b>good</b> friend here is a picture of me"
  ."<p>Your password is : <span style='color:red'><b>User@1$#!</b></span></p> \r\n"
  ."--1a2a3a\r\n";
 
//$file = file_get_contents("c:/wamp/www/ayushman/assets/images/bar_graph.png");
 $file = file_get_contents("/var/www/testbed/index.php");
$message .= "Content-Type: multipart/related; name=\"index.php\"\r\n"
  ."Content-Transfer-Encoding: base64\r\n"
  ."Content-disposition: attachment; file=\"/var/www/testbed/index.php\"\r\n"
  ."\r\n"
  .chunk_split(base64_encode($file))
  ."--1a2a3a--";
 // Send email
 
$success = mail($to,$subject,$message,$headers);
   if (!$success) {
  echo "Mail to " . $to . " failed .";
   }else {
  echo "Success : Mail was send to " . $to ;
   }*/
/////////////////////////////////////////////////////////////////////////////////   
	//	echo $var ;
	
	/*	$t = Array("N"=>"Text","H"=>"HTML","HI"=>"HTML with images");
		$subject = "Please find attach file";
		$MailTo = "anita.nimbalkar@indiaonlinehealth.com";
		$Message = "Prescription file";
		$from = "inhlth@indiaonlinehealth.com";
		$file[0]['tmp_name'] = $temp["file"];	
		$file[0]['name'] = $temp['filename'];
		$file[0]['type'] = 'application/pdf';
		$file[0]['error'] = UPLOAD_ERR_OK;
		
		//echo $temp;
		$parms = Array("bcc"=>$MailTo,"subject"=>$subject,"mailto"=>$MailTo,"message"=>$Message,"from"=>$from,"files"=>$file);
		echo mail::sendMailParms($parms);*/
		
		// email stuff (change data below)
		//$to = "anita.nimbalkar@indiaonlinehealth.com";
		$to = $email;
		$from = "inhlth@indiaonlinehealth.com";
		$subject = "send email with pdf attachment"; 
		$message = "<p>Please see the attachment.</p>";

		// a random hash will be necessary to send mixed content
		$separator = md5(time());

		// carriage return type (we use a PHP end of line constant)
		$eol = PHP_EOL;

		// attachment name
		$filename = $temp['filename'];

		// encode data (puts attachment in proper format)
		//$pdfdoc = $pdf->Output("", "S");
		
		$file = file_get_contents($temp['file']);
		//$attachment = chunk_split(base64_encode($pdfdoc));
		$attachment = chunk_split(base64_encode($file));

		// main header
		$headers  = "From: ".$from.$eol;
		$headers .= "MIME-Version: 1.0".$eol; 
		$headers .= "Content-Type: multipart/mixed; boundary=\"".$separator."\"";

		// no more headers after this, we start the body! //
		$body = "--".$separator.$eol;
		$body .= "Content-Transfer-Encoding: 7bit".$eol.$eol;
		$body .= "This is a MIME encoded message.".$eol;

		// message
		$body .= "--".$separator.$eol;
		$body .= "Content-Type: text/html; charset=\"iso-8859-1\"".$eol;
		$body .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
		$body .= $message.$eol;

		// attachment
		$body .= "--".$separator.$eol;
		$body .= "Content-Type: application/octet-stream; name=\"".$filename."\"".$eol; 
		$body .= "Content-Transfer-Encoding: base64".$eol;
		$body .= "Content-Disposition: attachment".$eol.$eol;
		$body .= $attachment.$eol;
		$body .= "--".$separator."--";

		// send message
		mail($to, $subject, $body, $headers);
		die();
	}
}