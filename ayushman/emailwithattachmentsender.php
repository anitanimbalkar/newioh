<?php
var_dump($_SERVER['argv']);
 # Is the OS Windows or Mac or Linux 
if (strtoupper(substr(PHP_OS,0,3)=='WIN')) { 
  $eol="\r\n"; 
} elseif (strtoupper(substr(PHP_OS,0,3)=='MAC')) { 
  $eol="\r"; 
} else { 
  $eol="\n"; 
}  
 
# File for Attachment 
$letter=substr($_SERVER['argv']['4'], 10);
echo $letter;
$f_name="/var/www/testbed/ayushman/".$_SERVER['argv']['4'];    // use relative path OR ELSE big headaches. $letter is my file for attaching. 
$handle=fopen($f_name, 'rb'); 
$f_contents=fread($handle, filesize($f_name)); 
$f_contents=chunk_split(base64_encode($f_contents));    //Encode The Data For Transition using base64_encode(); 
$f_type=filetype($f_name); 
fclose($handle); 
# To Email Address 
$emailaddress=$_SERVER['argv']['3']; 
# Message Subject 
$emailsubject="Appointment"; 
# Message Body 
$body="hi";
# Common Headers 
$headers ="";
$headers .= 'From: noreply@indiaonlinehealth.com'.$eol; 
$headers .= 'Reply-To: noreply@indiaonlinehealth.com'.$eol; 
$headers .= 'Return-Path: noreply@indiaonlinehealth.com'.$eol;     // these two to set reply address 
$headers .= "Message-ID:<noreply@indiaonlinehealth.com".$eol; 
$headers .= "X-Mailer: PHP v".phpversion().$eol;           // These two to help avoid spam-filters 
# Boundry for marking the split & Multitype Headers 
$mime_boundary=md5(time()); 
$headers .= 'MIME-Version: 1.0'.$eol; 
$headers .= "Content-Type: multipart/related; boundary=\"".$mime_boundary."\"".$eol; 
$msg = ""; 

# Attachment 
$msg .= "--".$mime_boundary.$eol; 
$msg .= "Content-Type: application/pdf; name=\"".$letter."\"".$eol;   // sometimes i have to send MS Word, use 'msword' instead of 'pdf' 
$msg .= "Content-Transfer-Encoding: base64".$eol; 
$msg .= "Content-Disposition: attachment; filename=\"".$letter."\"".$eol.$eol; // !! This line needs TWO end of lines !! IMPORTANT !! 
$msg .= $f_contents.$eol.$eol; 

# Finished 
$msg .= "--".$mime_boundary."--".$eol.$eol;   // finish with two eol's for better security. see Injection. 

# SEND THE EMAIL 
 mail($emailaddress, $emailsubject, $msg, $headers); 
?> 
