<?php
return array(
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
		)		
);
