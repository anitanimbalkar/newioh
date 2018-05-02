<?php 
	if(isset($_POST['submit'])){
		$to = "info@indiaonlinehealth.com"; // this is your Email address
		$from = $_POST['email']; // this is the sender's Email address
		$name = $_POST['name'];
		$email = $_POST['email'];
		$contact = $_POST['contact'];
		$message = $_POST['message'];
		$subject = "Get In touch";
						  
		$message =  " Name : " . $name . " " . "\n\n" . " Email id : " . $email. " " . "\n\n" . " Contact : " . $contact." "."\n\n" . " Message : ".$message;
		/* $message = ' Name: '.$name.' Email: '.$email.' \n Contact:'.$contact.'
		Message: '.$message.' <br>'; */
	
		$headers  = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=UTF-8\r\n";
		$headers .= "From:" . $from;
						   
		mail($to,$subject,$message,$headers);
		$msg = "Mail Sent. Thank you " . $name . ", we will contact you shortly.";
		echo "<script type='text/javascript'>alert('$msg');</script>";
		//header("Location: /ayushman/home/Contactus.shtml");
		//die();

		echo '<script type="text/javascript">
				window.location = "/ayushman/home/Contactus.shtml"
			  </script>';
		//Redirect('http://www.google.com/', false);
		}	
 ?>
			