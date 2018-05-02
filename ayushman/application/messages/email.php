<?php
return array(
	'NewYearMessage' => array(
		'variable'=>array('name'),
        'subject' => 'New year messages',
        'mailbody' => 'Dear $name,<br/>Wishing you a very Happy, Healthy and Prosperous new year.</br> Regards, AyushCare </br> Your Partner in Healthy Living'
	),
	'RepublicMessage' => array(
		'variable'=>array('name'),
        'subject' => 'Republic messages',
        'mailbody' => 'Dear $name,<br/>Wishing you a very Happy Republic Day.</br> Regards, AyushCare, Your Partner in Healthy Living Call- 7263924405.'
	),
	'newchemistorder' => array(
		'variable'=>array('username','usernumber','ordernumber','name'),
        'subject' => 'New order to your store',
        'mailbody'=> 'Dear $name,<br/>IOH user $username contact num $usernumber has sent PO $ordernumber . Log into your IOH account for order and e-Rx details. www.indiaonlinehealth.com <br/>Thanks and regards,'
	),
	'setvaccinationreminder'=> array(
		'variable'=>array('duedate','Drname','clinic','agegroup','previousagegroup','previousdate'),
        'subject' => 'Vaccination Reminder',
        'mailbody'=> 'Your child was given inoculation on $previousdate, normally given at $previousagegroup and next inoculation is due on $duedate, normally given at $agegroup. You may fix an appointment by logging on IndiaOnlineHealth or call my clinic at $clinic.<br/>
		Please ignore this message if you have already booked the appointment or made alternate arrangement.
		Best wishes,
		Dr. $Drname'
	),
	'datauploadalert' => array(
		'variable'=>array('organizationhead','name'),
        'subject' => 'Report upload status On India Online Health',
        'mailbody'=> 'Dear $name,<br/>Your prescription and report have been uploaded on www.IndiaOnlineHealth.com. You may log-in and view them. $organizationhead. <br/>  - $organizationhead .<br/>Thanks and regards,'
	),
	
	'corporatemembersregistration' => array(
    	'variable'=>array('uname','password','iohid','organizationname','organizationhead','name'),
        'subject' => 'Registration on India Online Health',
        'mailbody'=> 'Dear $name,<br/>Your $organizationname has registered you on www.IndiaOnlineHealth.com. Your IOH Id $iohid , username $uname and password $password . Change your password on first log-in. <br/>  - $organizationhead .<br/>Thanks and regards,',
    ),
	'newresetpassword' => array(
    	'variable'=>array('password'),
        'subject' => 'India Online Health Password',
        'mailbody'=> 'Dear Consumer,<br/>As per your request, administrator has reset your password to $password on www.IndiaOnlineHealth.com . Please log-in and change password.<br/>Thanks and regards,',
    ),
	'registrationandassociation' => array(
    	'variable'=>array('uname','password'),
        'subject' => 'India Online Health Registration Information',
        'mailbody'=> 'Dear Consumer,<br/>Your organization has registered you on www.IndiaOnlineHealth.com and associated you to their corporate plan. Your user name $uname and password $password . Please log-in and change password on first log-in<br/>Thanks and regards,',
    ),
	'dissociation' => array(
    	'variable'=>array(),
        'subject' => 'Dissociation of India Online Health Corporate plan',
        'mailbody'=> 'Dear Consumer,<br/>You have been dissociated from corporate plan on www.IndiaOnlineHealth.com under advice from your organization. You can log-in and subscribe to any available plan through Choose Plan link on your dashboard<br/>Thanks and regards,',
    ),
	'failedassociation' => array(
    	'variable'=>array(),
        'subject' => 'Associate to a new India Online Health Corporate plan',
        'mailbody'=> 'Dear Consumer,<br/>Your organization has subscribed to a corporate plan on www.IndiaOnlineHealth.com You can log-in and associate with this plan through Choose Plan link on your dashboard<br/>Thanks and regards,',
    ),
	'firsttimeusernamepass' => array(
    	'variable'=>array('uname','password'),
        'subject' => 'India Online Health Registration Information',
        'mailbody'=> 'Dear Consumer,<br/>On your Company request we have registered you on www.IndiaOnlineHealth.com. Your Username $uname & PW $password. Change PW on first Log-in & complete Medical History<br/>Thanks and regards,',
    ),
	'registrationinfobystaff' => array(
    	'variable'=>array('doctorname','uname', 'userid','password'),
        'subject' => 'India Online Health Registration Information',
        'mailbody'=> 'Dear Consumer,<br/>Dr. $doctorname has registered you on www.indiaonlinehealth.com. Your IOH ID $userid . Username $uname & PW $password . Log-in to view your medical record<br/>Thanks and regards,<br/>Team IndiaOnlineHealth',
    ),
	'usagesummary' => array(
    	'variable'=>array('name'),
        'subject' => 'Usage summary for the last month',
        'mailbody'=> 'Dear $name,<br/>Usage summary for the last month is attached to this mail. You can also login to www.indiaonlinehealth.com and view usage summary.<br/>Thanks and regards,<br/>Team IndiaOnlineHealth',
    ),
	'registrationinfo' => array(
    	'variable'=>array('name','username', 'place','password'),
        'subject' => 'Registration information for Health Camp organized by CoEP',
        'mailbody'=> 'Dear $name,<br/>As you are aware, we have been retained by your organization to conduct a medical camp consisting of basic pathology tests and examination by a Doctor. The pathology reports and consultation data will be uploaded in your Electronic Medical Record (EMR) on IndiaOnlineHealth Platform (www.indiaonlinehealth.com), which you can access anytime from anywhere. While your EMR is confidential, you may allow its access to your doctors and relatives. EMR is a key to continuity in healthcare and proves very useful during emergency situation.<br/>The Camp is being organized at administrative building of College of Engineering, Pune on 6th and 7th Dec, 2013. Your appointment will be intimated to you through mail and SMS. <br/>You have now been registered on IndiaOnlineHealth Platform (www.indiaonlinehealth.com). Your log-in credentials are as follows:<br/>Username:    $username<br/>Password:    $password<br/>Please change your password on your first log-in on the portal.<br/>To ensure smooth running of the camp, we are circulating blank Medical History Form which you may collect from your department. You may bring this form on the day of appointment. Alternately, you may fill the same on the portal by logging in and updating Profile and Medical History sections under "My Account" section.<br/>This Medical History will be useful when you consult with the Doctor during the camp. To help you prepare this data, our staff will be available at the campus between 26th Nov `13 and 3rd Dec `13 and can be reached on 9970196189.<br/>Thanks and regards,<br/>Team IndiaOnlineHealth',
    ),
	 'subscription_alert' => array(
    	'variable'=>array('date','username','amount'),
        'subject' => 'Reminder for plan renewal',
        'mailbody'=> 'Dear $username , <br/>Thank you for using IndiaOnlineHealth. Your annual subscription will expire on $date . Renewal charges are Rs $amount under your current plan. Please maintain sufficient balance in your account for automatic renewal.',
    ),
    'registration' => array(
    	'variable'=>array('username','code'),
        'subject' => 'Thanks for registering with IndiaOnlineHealth',
        'mailbody'=> 'Hi $username, 
<br/>Thank you for registering on IndiaOnlineHealth platform. We need to verify that this is your emailId. 
<br/>Use following code to verify your account:
<br/>code: $code</a>',
    ),
	'relativeregistration' => array(
    	'variable'=>array('username','website_url'),
        'subject' => 'Thanks for registering with IndiaOnlineHealth',
        'mailbody'=> 'Hi $username, 
<br/>Thank you for registering on IndiaOnlineHealth platform. We need to verify that this is your emailId. 
<br/>Use following link to verify your account:
<br/><a target="_blank" href="$website_url">$website_url</a>',
    ),
    'doctorformrejected'=> array(
    	'variable'=>array('username','website_url'),
    	'subject'=>'Your Doctor registration has been rejected',
    	'mailbody'=>'Dear Dr. $username,<br/>
Thank you for your interest in registering with IndiaOnlineHealth as Doctor. Your application has been reviewed and following deficiency. We request you to correct the same and resubmit the Registration Form:
<br/>To resubmit the Registration Form please click on following URL:
<br/><a target="_blank" href="$website_url">$website_url</a>
<br/>&nbsp;&bull;Your Registration information does not match with records of MCI with whom you are registered.  
<br/>&nbsp;&bull;Your Clinic address proof does not match with document supplied by you.
<br/>&nbsp;&bull;Your Hospital has not been able to confirm your attachment with them.
<br/>We look forward to receiving your revised form at the earliest.',
    ),
    'pathologistformrejected'=> array(
    	'variable'=>array('username','website_url'),
    	'subject'=>'Your Diagnostic Center registration has been rejected',
    	'mailbody'=>'Dear $username ,<br/>
Thank you for your interest in registering with IndiaOnlineHealth as Diagnostic Center. Your application has been reviewed and following deficiency. We request you to correct the same and resubmit the Registration Form:
<br/>To resubmit the Registration Form please click on following URL:
<br/><a target="_blank" href="$website_url">$website_url</a>
<br/>&nbsp;&bull;Your Registration information does not match with records of Shop Act Licence and FDA licence.   
<br/>&nbsp;&bull;Your Diagnostic Center address proof does not match with document supplied by you.
<br/>We look forward to receiving your revised form at the earliest.',
    ),
    'chemistformrejected'=> array(
    	'variable'=>array('username','website_url'),
    	'subject'=>'Your Medical Store registration has been rejected',
    	'mailbody'=>'Dear $username ,<br/>
Thank you for your interest in registering with IndiaOnlineHealth as Medical Store. Your application has been reviewed and following deficiency. We request you to correct the same and resubmit the Registration Form:
<br/>To resubmit the Registration Form please click on following URL:
<br/><a target="_blank" href="$website_url">$website_url</a>
<br/>&nbsp;&bull;Your Registration information does not match with records of Shop Act Licence and FDA licence.  
<br/>&nbsp;&bull;Your Medical Store address proof does not match with document supplied by you.
<br/>We look forward to receiving your revised form at the earliest.',
    ),
    'doctorformaccepted'=> array(
    	'variable'=>array('username'),
    	'subject'=>'Your Doctor registration has been accepted',
    	'mailbody'=>'<p>Dear Dr. $username, <br/>
<p>Congratulations! Your Doctor registration has been accepted.</p>
<p>We encourage you to log-in at your earliest and go through “How to Use Platform by Doctors”. When you log-in, you will see your dashboard, containing links to different sections relevant for you. </p>
<p>Here are some useful tips for taking full benefit of your On-line presence:</p>
<p>•	Log-in to your account as soon as possible and update your profile, if necessary. Your brief profile will now be visible to all the members on IndiaOnlineHealth. It is useful to periodically review the profile and keep it up-to-date.</p>
<p>•	Declare your On-line Calendar. If you are likely to be absent or on vacation, do make sure you declare it in your schedule.</p> 
<p>•	Your patients will be able to schedule appointment from your calendar for On-line consulting. Do make sure you log-in at least 5 minutes before the appointment, as your patient may be anxiously waiting for you.</p>
<p>•	Review patient’s EMR before the consultation. This will help you to discuss, diagnose and conclude the call   effectively and efficiently.</p>
<p>•	If you are   compelled to cancel/reschedule the appointment due to any unavoidable circumstances, please make it a point to follow the procedure laid out by IndiaOnlineHealth. </p>
<p>You are all set to step into On-line Consulting paradigm and explore host of benefits for you and your patients. Together we can change the Health care landscape in the country.</p>
<p>Our support staff is on "standby" to support you all the way. Call, email, phone ….</p>
<br>

Thanking you and with warm regards,<br>',
    ),
    'chemistformaccepted'=> array(
    	'variable'=>array('username'),
    	'subject'=>'Your Medical Store registration has been accepted',
    	'mailbody'=>'<p>Dear  $username, </p>
<p>Congratulations! Your Medical Store registration has been accepted.</p>
<p>We encourage you to log-in at your earliest and go through “How to Use Platform by Medical Store. When you log-in, you will see your dashboard, containing links to different sections relevant for you. </p>
<p>Here are some useful tips for taking full benefit of your On-line presence:</p>
<p>•	Log-in to your account as soon as possible and update your profile, if necessary. Your brief profile will now be visible to all the members on IndiaOnlineHealth. It is useful to periodically review the profile and keep it up-to-date.</p>

<br>

Thanking you and with warm regards,<br>',
    ),
    'pathologistformaccepted'=> array(
    	'variable'=>array('username'),
    	'subject'=>'Your Diagnostic Center registration has been accepted',
    	'mailbody'=>'<p>Dear $username, </p>
<p>Congratulations! Your Diagnostic Center registration has been accepted.</p>
<p>We encourage you to log-in at your earliest and go through “How to Use Platform by Diagnostic Centers”. When you log-in, you will see your dashboard, containing links to different sections relevant for you. </p>
<p>Here are some useful tips for taking full benefit of your On-line presence:</p>
<p>•	Log-in to your account as soon as possible and update your profile, if necessary. Your brief profile will now be visible to all the members on IndiaOnlineHealth. It is useful to periodically review the profile and keep it up-to-date.</p>
Thanking you and with warm regards,<br>',
    ),
    'forgotpassword'=> array(
    	'variable'=>array('username','code'),
    	'subject'=>'Reset Password',
    	'mailbody'=>'Hi $username,
						<br/>We have received a request from you for reset password of your <strong><i>IndiaOnlineHealth</i></strong> account.
						Use following code to reset password of your account.
						<br/>code: $code<br/>If you have received this mail in error, it is likely that another user entered your email address by mistake while trying to reset a password.<br/> If you did not initiate the request, you do not need to take any further action and can safely disregard this email.
						<br/>If you need any assistance, please feel free to contact us.',
    ),
    'doctorregistrationsubmit_drmail'=> array(
    	'variable'=>array('username'),
    	'subject'=>'Thanks for filling doctor registration form',
    	'mailbody'=>'<p>Dear Dr. $username,  </p><p>Thank you for filling Doctor Registration form on <b><i>IndiaOnlineHealth</i></b> platform. We will initiate the validation process and if we need any clarification or further details, we will get in touch with you.  This procedure may take a few days and we request you to bear with us till then. We will inform you as soon the process is complete.</p><p>Thank you once again for choosing <b><i>IndiaOnlineHealth</i></b> as your preferred On-line practice platform. We look forward to a mutually beneficial relationship.</p>',
    ),
    'doctorregistrationsubmit_adminmail'=> array(
    	'variable'=>array('username','date'),
    	'subject'=>'Doctor is awaiting for authentication',
    	'mailbody'=>'<p>Doctor $username has filled his Doctor Registration Form on $date. Kindly complete the validation expeditiously. If credentials are valid, kindly send registration complete message to the doctor. If there is any deficiency, please inform the doctor accordingly</p><br>support@indiaonlinehealth.com',
    ),
    'pathologistregistrationsubmit_pathomail'=> array(
    	'variable'=>array('username'),
    	'subject'=>'Thanks for filling Diagnostic Center registration form',
    	'mailbody'=>'<p>Dear Dr. $username,  </p><p>Thank you for filling Medical Store Registration form on <b><i>IndiaOnlineHealth</i></b> platform. We will initiate the validation process and if we need any clarification or further details, we will get in touch with you.  This procedure may take a few days and we request you to bear with us till then. We will inform you as soon the process is complete.</p><p>Thank you once again for choosing <b><i>IndiaOnlineHealth</i></b> as your preferred On-line practice platform. We look forward to a mutually beneficial relationship.</p>',
    ),
    'pathologistregistrationsubmit_adminmail'=> array(
    	'variable'=>array('username','date'),
    	'subject'=>'Pathologist is awaiting for authentication',
    	'mailbody'=>'<p><p><b> Dr. $username</b>  has filled his  Diagnostic Center  Registration Form on $date. Kindly complete the validation expeditiously. If credentials are valid, kindly send registration complete message to the  Diagnostic Center . If there is any deficiency, please inform the  Diagnostic Center  accordingly</p><br>support@indiaonlinehealth.com',
    ),
    'chemistregistrationsubmit_chemistmail'=> array(
    	'variable'=>array('username'),
    	'subject'=>'Thanks for filling Medical Store registration form',
    	'mailbody'=>'<p>Dear Dr. $username,  </p><p>Thank you for filling Medical Store Registration form on <b><i>IndiaOnlineHealth</i></b> platform. We will initiate the validation process and if we need any clarification or further details, we will get in touch with you.  This procedure may take a few days and we request you to bear with us till then. We will inform you as soon the process is complete.</p><p>Thank you once again for choosing <b><i>IndiaOnlineHealth</i></b> as your preferred On-line practice platform. We look forward to a mutually beneficial relationship.</p>',
    ),
    'chemistregistrationsubmit_adminmail'=> array(
    	'variable'=>array('username','date'),
    	'subject'=>'Medical Store is awaiting for authentication',
    	'mailbody'=>'<p><p><b> Dr. $username</b>  has filled his Medical Store Registration Form on $date. Kindly complete the validation expeditiously. If credentials are valid, kindly send registration complete message to the chemist. If there is any deficiency, please inform the chemist accordingly</p><br>support@indiaonlinehealth.com',
    ),
    'appointmentcancel_bydoctor'=> array(
    	'variable'=>array('username','drfullname','appointmentdate','appointmenttime'),
    	'subject'=>'Appointment Canceled',
    	'mailbody'=>'Hi $username,<br/>This has reference to your following appointment with your doctor. <br/>
Name of Doctor:Dr. $drfullname
<br/>Date and Time of your appointment: $appointmentdate. at $appointmenttime  hrs (IST)
<br/>We regret to inform you that due to unavoidable situation, your doctor will not be able to keep your appointment. Therefore it is being cancelled and charges deducted, if any, will be credited back into your account. 
<br/>You are requested to take a fresh appointment. Please note that your doctor has waived his <u>consultation charges</u> for this re-scheduled appointment as per policy.',
    ),
    'appointmentcancel_bypatient'=> array(
    	'variable'=>array('patientfullname','drname','appointmentdate','appointmenttime'),
    	'subject'=>'Appointment Canceled',
    	'mailbody'=>'Hi Dr. $drname ,<br/>Your appointment with the following patient has been cancelled<br/>
Name of Patient: $patientfullname
<br/>Date and Time of your appointment: $appointmentdate at $appointmenttime hrs (IST)
<br/>If this appointment is cancelled more than 24 hours before the scheduled start time of the appointment, there will be no cancellation charges applicable. 
	If this appointment is cancelled within 24 hours from scheduled appointment, patient will be charged your Consultation fees and the same will be credited to your account.',
	  ),
	  'disassociatecorporate'=> array(
    	'variable'=>array('username','companyname'),
    	'subject'=>'Disassociated from corporate account',
    	'mailbody'=>'Hi $username ,<br/>You are Disassociated from $companyname corporate account. You will not be able to use plans application to the same corporate account
		',
	  ),
	  'others_account_charged'=> array(
    	'variable'=>array('username','beneficiaryname', 'creditedamount'),
    	'subject'=>'Recharge successful',
    	'mailbody'=>'Hi $username ,<br/>$beneficiaryname `s account has been credited successfuly with Rs. $creditedamount.
		',
	  ),
	   'needhelpfor'=> array(
    	'variable'=>array('username','needhelpfor','comments', 'contactnumber','useremail'),
    	'subject'=>'Need help to site Visitor',
    	'mailbody'=>'Our site Visitor <bold> $username</bold> ,<br/>Needs help for  : $needhelpfor <br/> <br/> Contact details: <br/>1. Emailid: $useremail <br/>2. Contact Number:$contactnumber<br/> <br/>Message :<br/> <strong>$comments</strong>
		<br/>',
	  ),
	  'feedbackemail'=> array(
    	'variable'=>array('username','comments', 'contactnumber','useremail'),
    	'subject'=>'Feedback from Visitor',
    	'mailbody'=>'Our site Visitor<bold> $username</bold> , <br/> Visitor details: <br/>1. Username: $username <br/>2. Emailid: $useremail <br/>3. Contact Number:$contactnumber <br/><br/>Visiter send feedback as below <br/> <strong>$comments</strong>
		<br/>',
	  ),
	  'blanktemplate'=> array(
    	'variable'=>array('message'),
    	'subject'=>'Invitation to IndiaOnlineHealth',
    	'mailbody'=>'$message',
	  ),
	  'patient_registartion_bystaff'=> array(
    	'variable'=>array('username','email','password', 'website_url'),                                                                                         
    	'subject'=>'Thanks for registering with IndiaOnlineHealth',
    	'mailbody'=>'Hi $username ,<br/>Your username is :$email <br/>password: $password <br/>Use following link to verify your account:
<br/><a target="_blank" href="$website_url">$website_url</a>
		',
	  ),
		'coep_username_change'=>array(
			'variable'=>array('mis'),
			'subject'=>'change in username due to MIS Number change',
			'mailbody' =>'Due to change in your MIS number your user name has been changed to $mis .Your password is not changed in this process'
		),
		'coep_username_reset'=>array(
			'variable'=>array('mis'),
			'subject'=>'Resetting your username to identify your MIS',
			'mailbody' =>'Your college requires that your username should be identified by your MIS number. Accordingly, we have reset your user name as $mis . You will be able to change it when you move out of CoEP plan.Your password is not changed in this process'
		),
		'notifyappointmenttime'=>array(
			'variable'=>array('time','date','venue','name'),
			'subject'=>'Your appointment with doctor for Health check up camp organized by CoEP',
			'mailbody' =>'Dear $name,<br/>As you are aware, your college has retained us to conduct a medical camp at college campus for all the staff. The camp will consist of sample collection for pathology tests and examination by a doctor. Accordingly, your appointment is fixed as follows:<br/><br/>
							Time & Date:    $time on $date<br/>
							Venue:               CoEP Main Building, Ground Floor<br/><br/>
							- Please ensure that you do not come empty stomach for camp. You should eat normal breakfast / lunch. <br/>
							- Please also bring all your past medical records including pathology / diagnostic reports for doctor`s review. <br/>
							- Please come 10 minutes before your appointed time.<br/><br/>

							Thanks,
						'
		),
		'coep_appointment_date_time'=>array(
			'variable'=>array('time','date','venue','name'),
			'subject'=>'Your appointment with doctor for Health check up camp organized by CoEP',
			'mailbody' =>'Dear $name,<br/>As you are aware, your college has retained us to conduct a medical camp at college campus for all the student/staff. The camp will consist of sample collection for pathology tests and examination by a doctor. Accordingly, your appointment is fixed as follows:<br/><br/>
							Time & Date:    $time on $date<br/>
							Venue:               CoEP Main Building, Ground Floor<br/><br/>
							- Please ensure that you do not come empty stomach for camp. You should eat normal breakfast / lunch. <br/>
							- Please also bring all your past medical records including pathology / diagnostic reports for doctor`s review. <br/>
							- Please come 10 minutes before your appointed time.<br/><br/>

							Thanks,
						'
		),
		'followup_camp'=>array(
			'variable'=>array('recent','datetime','beforetime','organizationhead','name'),
			'subject'=>'Your follow up appointment with doctor at CoEP',
			'mailbody' =>'Dear $name,<br/> Subsequent to $recent check up, you are required to come for a follow up consultation with specialist. Your appointment is fixed as follows:<br/><br/>
							Time & Date:    $datetime<br/>
							Venue:               CoEP Main Building, Ground Floor<br/><br/>
							- Please also bring all your past medical records including pathology / diagnostic reports for doctor`s review. <br/>
							- Please come $beforetime minutes before your appointed time.<br/><br/>

							Thanks,
						'
	),
	'receiptmail' => array(
    	'variable'=>array('name','rcptno','amt'),
    	'subject'=>'Receipt acknowledgement',
        'mailbody' => 'Dear $name,
						</br> Your receipt.no is : $rcptno of amount Rs. $amt . 
						</br> </br>Thank you 
						</br>AyushCare.',
    ),
	'onetimepasswd' => array(
    	'variable'=>array('name','code'),
    	'subject'=>'One time password',
        'mailbody' => 'Dear $name, 
						</br>This is your one time password $code. 
						</br></br>Thank you 
						</br>AyushCare.',		
    ),
	'rcptconfirmation' => array(
    	'variable'=>array('csename','amount','acctmgrname'),
    	'subject'=>'Receipt confirmation',
        'mailbody' => 'Dear $csename, 
						</br>Your transaction is approved of amount Rs. $amount.
						</br></br>Thank you 
						</br>$acctmgrname.',		
    ),
	'pathtestreminder'=> array(
    	'variable'=>array('name'),
    	'subject'=>'Reminder for tests',
    	'mailbody'=> 'Dear $name, Time for your scheduled Blood Glucose Fasting and PP tests. Please do the tests and visit your Doctor for further queries, if any.'
	),
	'pathappointment'=> array(
		'variable'=>array('consumername','datetime'),
    	'subject'=>'Test schedule with pathologist',
    	'mailbody'=> 'Dear $consumername, Your test was scheduled on $datetime, how did it go? Did you visit your doctor for further queries, if any'
	),
	'reviewreport'=> array(
		'variable'=>array('name'),
    	'subject'=>'Doctor visit for queries',
    	'mailbody'=> 'Dear $name, we hope you have had a chance to review your report consult your doctor for queries, if any.'
	),
	'Marathi-reviewreport'=> array(
		'variable'=>array('name'),
    	'subject'=>'Doctor visit for queries -Marathi',
    	'mailbody'=> 'प्रिय  $name ,आपल्या चाचणीची वेळ निश्चित करण्यात आली आहे, ते कसे केले? पुढील प्रश्नांसाठी आपण आपल्या डॉक्टरांशी भेट दिली का?'
	),
	'loginmsg'=> array(
		'variable'=>array('name'),
    	'subject'=>'Log into system',
    	'mailbody'=> 'Dear $name, log in to www.indiaonlinehealth.com to read the latest newsletter with amazing tips and information regarding your body.'
	),
	'Marathi-loginmsg'=> array(
		'variable'=>array('name'),
    	'subject'=>'Log into system -Marathi',
    	'mailbody'=> 'प्रिय $name, आपल्या शरीराबाबत आश्चर्यकारक टिपा आणि माहितीसह नवीनतम वृत्तपत्र वाचण्यासाठी www.indiaonlinehealth.com वर लॉग इन करा.'
	),
	'clinicvisit'=> array(
		'variable'=>array('name','clinicplace','datetime'),
    	'subject'=>'Appointment schedule with doctor',
    	'mailbody'=> 'Dear $name, Your monthly checkup is scheduled at $clinicplace at $datetime . Please be present at the clinic 10 mins before your appointment time.'
	),
	'Marathi-clinicvisit'=> array(
		'variable'=>array('name','clinicplace','datetime'),
    	'subject'=>'Appointment schedule with doctor -Marathi',
    	'mailbody'=> 'प्रिय $name, आपले मासिक तपासणी $clinicplace वर $datetime वर नियोजित आहे. कृपया आपल्या भेटीच्या वेळेपूर्वी 10 मिनिटे क्लिनिकमध्ये उपस्थित रहा'
	),
	'adveating'=> array(
		'variable'=>array('consumername'),
    	'subject'=>'Eating habits',
    	'mailbody'=> 'Dear $consumername, Eating at regular times during the day helps burn calories at a faster rate.'
	),
	'Marathi-adveating'=> array(
		'variable'=>array('consumername'),
    	'subject'=>'Eating habits -Marathi',
    	'mailbody'=> 'प्रिय  $consumername, दर रोज सन्तुलित आहर सेवन केल्यने जलदरीत्या कॅलरीज बर्न करण्यास मदत करते.'
	),
	'advdataentry'=> array(
		'variable'=>array('consumername'),
    	'subject'=>'Advice for recording data',
    	'mailbody'=> 'Dear $consumername, Looks like you have not entered any data into the system, please do so as it will help you to set better goals.'
	),
	'Marathi-advdataentry'=> array(
		'variable'=>array('consumername'),
    	'subject'=>'Advice for recording data -Marathi',
    	'mailbody'=> 'प्रिय  $consumername, असे दिसते की आपण सिस्टममध्ये डेटा प्रविष्ट केला नाही, कृपया तसे करा कारण ते आपल्याला चांगले उद्दीष्ट निश्चित करण्यासाठी मदत करतील'
	),
	'advoncalorieintake'=> array(
		'variable'=>array(),
    	'subject'=>'Health advice on calorie intake',
    	'mailbody'=> '1 piece of gulab jamun contains 150 calories. Dancing for 30 minutes at a moderate speed will ensure burning the calories gained with each piece of gulab jamun.'
	),
	'Marathi-advoncalorieintake'=> array(
		'variable'=>array('name'),
    	'subject'=>'Heath advice on calorie intake -Marathi',
    	'mailbody'=> '1 गुलाब जामुनचा 1 तुकडा 150 कॅलरीज आहे. मध्यम गतीने 30 मिनिटे नृत्य केल्यास प्रत्येक तुकड्यात गुलाब जामुनसह मिळणारी कॅलरी बर्न होईल.'
	),
	'advonhealthyliving'=> array(
		'variable'=>array('name'),
    	'subject'=>'Healthy living',
    	'mailbody'=> 'Dear $name, Healthy eating = Healthy living, dont give up on your good eating habits.'
	),
	'Marathi-advonhealthyliving'=> array(
		'variable'=>array(),
    	'subject'=>'Healthy living -Marathi',
    	'mailbody'=> 'निरोगी खाणे = सुखी राहणे, आपल्या चांगल्या खाण्याच्या सवयींवर सोडू नका'
	),
	'advonhealthyweight'=> array(
		'variable'=>array(),
    	'subject'=>'Health advice on weight',
    	'mailbody'=> 'Being obese may go along with having blood pressure and diabetes, but losing and maintaining weight may help in controlling it.'
	),
	'Marathi-advonhealthyweight'=> array(
		'variable'=>array(),
    	'subject'=>'Health advice on weight -Marathi',
    	'mailbody'=> 'लठ्ठपणा मुले रक्तदाब आणि मधुमेह असण्याची शक्यता आहे,परंतु वजन कमी करणे त्याचे नियंत्रण करण्यास मदत करू शकते.'
	),
	'advonexercisegoals'=> array(
		'variable'=>array('name'),
    	'subject'=>'Set exercise goals',
    	'mailbody'=> 'Dear $name, Set goals with a friend who can go along, for a walk or a swim (it can be anyone friends, children etc). Goals are easier to attain with a friend.'
	),
	'Marathi-advonexercisegoals'=> array(
		'variable'=>array('name'),
    	'subject'=>'Set exercise goals -Marathi',
    	'mailbody'=> 'प्रिय $name, एखाद्या मैत्रिणीसह बाजूने गोल सेट करा जो चालासाठी किंवा एखाद्या जलतरणापर्यंत (ते कोणाही मित्र, मुले इत्यादी असू शकतात) एका मित्रासह लक्ष्य प्राप्त करणे सोपे आहे.'
	),
	'scheduleapp'=> array(
		'variable'=>array('name','datetime'),
    	'subject'=>'Appoinment schedule',
    	'mailbody'=> 'Dear $name, Your last appointment happened on $datetime. Your appointment is due please schedule your appointment and meet your doctor.'
	),
	'Marathi-scheduleapp'=> array(
		'variable'=>array('name','datetime'),
    	'subject'=>'Appoinment schedule -Marathi',
    	'mailbody'=> 'प्रिय $name, आपली अंतिम नियुक्ती $datetime वर झाली आपली नियुक्ती योग्य आहे कृपया आपली नेमणूक शेड्यूल करा आणि आपल्या डॉक्टरांशी संपर्क साधा.'
	),
	'scheduletest'=> array(
		'variable'=>array('name','datetime'),
    	'subject'=>'Test schedule',
    	'mailbody'=> 'Dear $name, You did your last test on $datetime. Your test is due please schedule your appointment and complete your test to know and manage your condition parameters better.'
	),
	'Marathi-scheduletest'=> array(
		'variable'=>array('name','datetime'),
    	'subject'=>'Test schedule -Marathi',
    	'mailbody'=> 'प्रिय $name, आपण आपली शेवटची चाचणी $datetime केली. आपली चाचणी योग्य आहे कृपया आपली नेमणूक शेड्यूल करा आणि आपल्या परिस्थितिची मापदंड अधिक चांगली '
	),
	'AyushCare_Dental_service'=> array(
		'variable'=>array('name'),
		'subject'=>'Dental service',
    	'mailbody'=> 'Dear $name , Greetings from AyushCare @Doorsteps, Your Trusted Partner for Healthy Living. Launching: Dental Service @Home Call us on 7263924405 to avail our Mouth SPA offers. Regards, AyushCare.'
	),
	'AyushCare_Home_service'=> array(
		'variable'=>array('name'),
		'subject'=>'Home service',
    	'mailbody'=> 'Dear $name , AyushCare brings to you quality home healthcare services in Pune for Yourself, Parents & Grandparents. Call us on 7263924405 to know more. Regards, AyushCare.'
	),
	'AyushCare_Annual_checkup'=> array(
		'variable'=>array('name'),
		'subject'=>'Annual checkup',
    	'mailbody'=> 'Dear $name , Is your Annual Health Checkup due? Call us 7263924405 for home blood collection. Regards AyushCare, Your Partner for Healthy Living.'
	),
	'AyushCare_DiwaliWishes'=> array(
		'variable'=>array('name'),
		'subject'=>'Diwali Greetings',
    	'mailbody'=> 'Dear $name , Wish you a very Happy & Healthy Diwali and a Prosperous New Year. Regards AyushCare, Your Partner in Healthy Living. Contact:7263924405.'
	),
	'DM1'=> array(
    	'variable'=>array('name'),
    	'subject'=>'Control your Blood sugar',
    	'mailbody'=> 'Dear $name, Always keep your blood sugar under control. Remember, a well-controlled sugar means a normal lifespan.'
	),
	'Marathi-DM1'=> array(
    	'variable'=>array('name'),
    	'subject'=>'Control your Blood sugar-M',
    	'mailbody'=> 'प्रिय  $name, नेहमी आपल्या रक्तातील साखर नियंत्रणात ठेवा. लक्षात ठेवा नियंत्रित साखर एक साधारण वयोमान आहे'
	),
	'DM2'=> array(
    	'variable'=>array('name'),
    	'subject'=>'Eating habits',
    	'mailbody'=> 'Dear $name, Be regular about your food intake. Remember, type and timing of food as far as possible should be same.'
	),
	'Marathi-DM2'=> array(
    	'variable'=>array('name'),
    	'subject'=>'Eating habits-M',
    	'mailbody'=> 'प्रिय  $name, आपल्या अन्न सेवन बद्दल नियमित रहा लक्षात ठेवा, टाइप आणि टाईपिंगचे शक्य तेवढे असणे आवश्यक आहे.'
	),
	'DM3'=> array(
    	'variable'=>array('name'),
    	'subject'=>'Eat your greens',
    	'mailbody'=> 'Dear $name, Remember to consume enough greens in the form of salads, sprouts, juices and in cooked form.'
	),
	'Marathi-DM3'=> array(
    	'variable'=>array('name'),
    	'subject'=>'Eat your greens-M',
    	'mailbody'=> 'प्रिय  $name, सॅलड्स, स्प्राउट्स, रस आणि शिजवलेल्या स्वरूपात पुरेशी हिरव्या भाज्या वापरण्याचे लक्षात ठेवा.'
	),
	'DM4'=> array(
    	'variable'=>array('name'),
    	'subject'=>'Sugar free',
    	'mailbody'=> 'Dear $name, You can eat sugar free sweets with Stevia, raisins, dates and figs occasionally.'
	),
	'Marathi-DM4'=> array(
    	'variable'=>array('name'),
    	'subject'=>'Sugar free-M',
    	'mailbody'=> 'प्रिय  $name, आपण कधीकधी Stevia, मनुका, तारखा आणि अंजीर सह साखर मोफत गोड खाऊ शकता.'
	),
	'DM5'=> array(
    	'variable'=>array('name'),
    	'subject'=>'Exercise regularly',
    	'mailbody'=> 'Dear $name, Have you exercised today? Remember exercise is a part of your treatment. Never skip it!'
	),
	'Marathi-DM5'=> array(
    	'variable'=>array('name'),
    	'subject'=>'Exercise regularly-M',
    	'mailbody'=> 'प्रिय  $name, आपण आज वापर केला आहे का? लक्षात ठेवा व्यायाम हा आपल्या उपचारांचा एक भाग आहे. कधीही वगळू नका!'
	),
	'DM6'=> array(
    	'variable'=>array('name'),
    	'subject'=>'Sleep well',
    	'mailbody'=> 'Dear $name, Are you getting enough sleep? If not let me know. Sleep is important for Diabetes control.'
	),
	'Marathi-DM6'=> array(
    	'variable'=>array('name'),
    	'subject'=>'Sleep well-M',
    	'mailbody'=> 'प्रिय  $name, आपल्याला पुरेसे झोप मिळत आहे का? मला कळू नका तर मधुमेह नियंत्रणासाठी झोप आवश्यक आहे.'
	),
	'DM7'=> array(
    	'variable'=>array('name'),
    	'subject'=>'Be Happy',
    	'mailbody'=> 'Dear $name, Try to remain happy and stress free for better sugar control.'
	),
	'Marathi-DM7'=> array(
    	'variable'=>array('name'),
    	'subject'=>'Be Happy-M',
    	'mailbody'=> 'प्रिय  $name, चांगले साखर नियंत्रण यासाठी आनंदी आणि तणावमुक्त राहण्याचा प्रयत्न करा.'
	),
	'DM8'=> array(
    	'variable'=>array('name'),
    	'subject'=>'Dont skip your medication',
    	'mailbody'=> 'Dear $name, Be regular about your medication –skipping doses leads to loss of control.'
	),
	'Marathi-DM8'=> array(
    	'variable'=>array('name'),
    	'subject'=>'Dont skip your medication-M',
    	'mailbody'=> 'प्रिय  $name, आपली औषधोपचार नियमित करा - उघड्या डोस झाल्यामुळे नियंत्रण कमी होते'
	),
	'DM9'=> array(
    	'variable'=>array('name'),
    	'subject'=>'Feet care',
    	'mailbody'=> 'Dear $name, Did you wash, inspect and cream your feet today? Remember to always keep them covered!'
	),
	'Marathi-DM9'=> array(
    	'variable'=>array('name'),
    	'subject'=>'Feet care-M',
    	'mailbody'=> 'प्रिय  $name, आज आपण आपले पाय धुवा, तपासणी आणि मलई केली होती का? नेहमी झाकून ठेवण्याचे लक्षात ठेवा!'
	),
	'DM10'=> array(
    	'variable'=>array('name'),
    	'subject'=>'Check your blood sugar',
    	'mailbody'=> 'Dear $name, Have you checked your blood sugar on your glucometer? Remember to do it twice a week.'
	),
	'Marathi-DM10'=> array(
    	'variable'=>array('name'),
    	'subject'=>'Check your blood sugar-M',
    	'mailbody'=> 'प्रिय  $name, आपण आपल्या ग्लुकोमीटरवर आपल्या रक्तातील साखरची तपासणी केली आहे का? आठवड्यातून दोनदा ते करायला विसरू नका'
	),
	'DM11'=> array(
    	'variable'=>array('name'),
    	'subject'=>'3 monthly test',
    	'mailbody'=> 'Dear $name, Remember a three-monthly sugar test in lab is compulsory.'
	),
	'Marathi-DM11'=> array(
    	'variable'=>array('name'),
    	'subject'=>'3 monthly test-M',
    	'mailbody'=> 'प्रिय  $name, लॅबमध्ये तीन-महिन्याच्या साखरेची चाचणी अनिवार्य आहे हे लक्षात ठेवा.'
	),
	'DM12'=> array(
    	'variable'=>array('name'),
    	'subject'=>'Weight & BP',
    	'mailbody'=> 'Dear $name, Keep your weight and Blood pressure in check—this is important in a Diabetic.'
	),
	'Marathi-DM12'=> array(
    	'variable'=>array('name'),
    	'subject'=>'Weight & BP -M',
    	'mailbody'=> 'प्रिय  $name, आपले वजन आणि रक्तदाब तपासण्यामध्ये ठेवा - हे मधुमेहामध्ये महत्वाचे आहे.'
	),
	'DM13'=> array(
    	'variable'=>array('name'),
    	'subject'=>'Levels under control',
    	'mailbody'=> 'Dear $name, Make sure your lipids, uric acid and urine microalbumin are under control!'
	),
	'Marathi-DM13'=> array(
    	'variable'=>array('name'),
    	'subject'=>'Levels under control-M',
    	'mailbody'=> 'प्रिय  $name, आपल्या लिपिडस्, यूरिक ऍसिड आणि मूत्र मायक्रोबल्बिनचे नियंत्रण आहे हे निश्चित करा!'
	),
	'DM14'=> array(
    	'variable'=>array('name'),
    	'subject'=>'Tests once a year',
    	'mailbody'=> 'Dear $name, Make sure you have an ECG, eye and retina test once a year.'
	),
	'Marathi-DM14'=> array(
    	'variable'=>array('name'),
    	'subject'=>'Tests once a year -M',
    	'mailbody'=> 'प्रिय  $name, वर्षातून एकदा आपली ईसीजी, डोळ्यांची व डोळयाची चाचणी घ्या.'
	),
		'DM15'=> array(
    	'variable'=>array('name'),
    	'subject'=>'What is Diabetes',
    	'mailbody'=> 'Dear $name, Diabetes is a condition in which the level of sugar (glucose) in the blood is high. Glucose comes from the foods you eat. Insulin is a hormone that helps the glucose get into your cells to give them energy.'
	),
	'Marathi-DM15'=> array(
    	'variable'=>array('name'),
    	'subject'=>'What is Diabetes',
    	'mailbody'=> 'प्रिय $name, मधुमेह ही अशी स्थिती आहे ज्यामध्ये रक्तातील साखर (ग्लुकोज) उच्च असते. ग्लूकोज तुमच्या जे खाद्यपदार्थ खातो ते येते. इन्सुलिन हा हार्मोन आहे ज्यामुळे ग्लुकोज आपल्या पेशींमध्ये ऊर्जा मिळविण्यास मदत करतो.  '
	),
	'DM16'=> array(
    	'variable'=>array('name'),
    	'subject'=>'Diabetes I',
    	'mailbody'=> 'Dear $name, With type 1 diabetes or insulin-dependent diabetes, your body does not make insulin, an insulin therapy is essential for controlling and maintenance of good health.'
	),
	'Marathi-DM16'=> array(
    	'variable'=>array('name'),
    	'subject'=>'Diabetes I -M',
    	'mailbody'=> 'प्रिय $name, प्रकार 1 मधुमेह किंवा मधुमेहावरील रामबाण-आवरित डायबिटीजसह, तुमचे शरीर इंसुलिन तयार करत नाही, चांगले आरोग्य राखण्यासाठी आणि त्याची काळजी घेण्याकरता एक इंसुलिन थेरपी आवश्यक आहे.'
	),
	'DM17'=> array(
    	'variable'=>array('name'),
    	'subject'=>'Diabetes II',
    	'mailbody'=> 'Dear $name, With type 2 diabetes, the more common type, your body does not make or use insulin well. Without enough insulin, the glucose stays in your blood. Type 2 diabetes can be prevented or delayed by reducing the risk factors that may lead to its development and adopting healthier lifestyles.'
	),
	'Marathi-DM17'=> array(
    	'variable'=>array('name'),
    	'subject'=>'Diabetes II-M',
    	'mailbody'=> 'प्रिय $name, टाइप 2 मधुमेह, अधिक सामान्य प्रकार, आपले शरीर इंसुलिनची चांगली निर्मिती किंवा उपयोग करत नाही पुरेशी इंसुलिन शिवाय ग्लुकोज तुमच्या रक्तामध्ये टिकतो.  टाईप 2 मधुमेह टाळता येऊ शकतो किंवा कमी होण्यास कारणीभूत ठरू शकते ज्यामुळे त्याच्या विकासासाठी आणि निरोगी जीवनशैलीचा अवलंब करता येईल.'
	),
	'DM18'=> array(
    	'variable'=>array('name'),
    	'subject'=>'Problems in Diabetes',
    	'mailbody'=> 'Dear $name, If left untreated or uncontrolled, diabetes can lead to serious problems, such as heart disease, stroke, blindness, kidney failure, among others.  Simple lifestyle changes can help in the preventing or delaying the onset of type 2 diabetes.'
	),
	'Marathi-DM18'=> array(
    	'variable'=>array('name'),
    	'subject'=>'Problems in Diabetes-M',
    	'mailbody'=> 'प्रिय $name, जर उपचार न करता किंवा अनियंत्रित सोडले तर मधुमेह गंभीर आजारांमुळे होऊ शकतो, जसे की हृदयरोग, स्ट्रोक, अंधत्व, मूत्रपिंड निकामी, इतरांदरम्यान साधारण जीवनशैलीतील बदल टाईप 2 मधुमेहाची सुरुवात करण्यास किंवा विलंब करण्यास मदत करतात. '
	),
	'DM19'=> array(
		'code'=> 'DM19',
    	'variable'=>array('name'),
    	'subject'=>'Prevention & Control',
    	'mailbody'=> 'Dear $name, Prevention & Control diabetes;
1 Achieve and maintain a healthy body weight.
2 Do exercise daily
3 Eat a healthy diet. Reduce the intake of sugar, salt and saturated fats.
4 Avoid tobacco use and harmful use of alcohol.
5 Manage stress.
6 Test the blood glucose and HbA1c levels regularly.'
	),
	'Marathi-DM19'=> array(
    	'variable'=>array('name'),
    	'subject'=>'Prevention & Control-M',
    	'mailbody'=> 'प्रिय $name, प्रतिबंध आणि नियंत्रण मधुमेह;
1 एक निरोगी शरीराचे वजन साध्य आणि राखणे.
2 दररोज व्यायाम करा
3 एक आरोग्यपूर्ण आहार घ्या. साखर, मीठ आणि चरबी सेवन कमी करा.
4 मद्यपान आणि तंबाखू सेवन टाळा.
5 ताण व्यवस्थापित करा
6 नियमितपणे रक्तातील ग्लुकोज आणि HbA1c चाचणी घ्या. '
	),
	'DM20'=> array(
    	'variable'=>array('name'),
    	'subject'=>'Fit after 60',
    	'mailbody'=> 'Dear $name Greetings!! Introducing our new program "Fit after 60" & you are amongst the first to aboard this program. Thank you AyushCare.'
	),
	'Marathi-DM20'=> array(
    	'variable'=>array('name'),
    	'subject'=>'Fit after 60',
    	'mailbody'=> 'प्रिय $name, आम्ही आपल्या साठी "Fit after 60" हा खास आरोग्यदायी कार्यक्रम आयोजित केला असून, ह्या मधे आपले स्वागत आहे. धन्यवाद, आयुषकेअर'
	),
	'DM21'=> array(
    	'variable'=>array('name'),
    	'subject'=>'Medication and Lifestyle changes',
    	'mailbody'=> 'Dear $name , Medication is not always the answer. The key to improved health & reduced medication is by making change to your lifestyle. We can help you improve your health & lead a happier life. Thank you, AyushCare, 7263924405.'
	),
	'Marathi-DM21'=> array(
    	'variable'=>array('name'),
    	'subject'=>'Medication and Lifestyle changes',
    	'mailbody'=> 'प्रिय $name, आजारा वर औषध हेच उत्तर नसून ज़र काळजी घेतली तर तुम्ही तुमचे आरोग्य अजुन चांगले बनवू शकता आणि औषधाचे प्रमाण कमी करु शकता, यासाठी आम्ही मदत करू शकतो. धन्यवाद, आयुषकेअर'
	),
	'DM22'=> array(
    	'variable'=>array(),
    	'subject'=>'Message',
    	'mailbody'=> 'We will connect with you with further details or feel free to calll Ms. Pranita at 91 - 7263924405. Thank you, AyushCare'
	),
	'Marathi-DM22'=> array(
    	'variable'=>array('name'),
    	'subject'=>'Message',
    	'mailbody'=> 'प्रिय $name,आमच्याशी जोडण्यासाठी किवा अधिक माहितीसाठी या नंबर वर संपर्क साधावा ७२६३९२४४०५. धन्यवाद, आयुषकेअर'
	),	
);
