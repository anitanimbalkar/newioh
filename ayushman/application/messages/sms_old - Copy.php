<?php
return array(
	'networkattached' => array(
		'variable'=>array('doctorname','lab','chemist'),
        'msgbody' => 'Dr $doctorname has registered you on www.indiaonlinehealth.com Based on location system has attached $lab Lab and $chemist Chemist in your network They will contact you after consultation If you do not wish to avail this service please ask doctor to dissociate them from your network.'
	),
	
	'newchemistorder' => array(
		'variable'=>array('username','usernumber','ordernumber'),
        'msgbody' => 'IOH user $username contact num $usernumber has sent PO $ordernumber . Log into your IOH account for order and e-Rx details.'
	),	


	'newresetpassword' => array(
		'variable'=>array('password'),
        'msgbody' => 'As per your request administrator has reset your password. Your temporary password is $password . Please log-in and change password'
	),	
	
	'datauploadalert' => array(
		'variable'=>array('organizationhead'),
        'msgbody' => 'Your prescription and report have been uploaded on www.IndiaOnlineHealth.com. You may log-in and view them. $organizationhead'
	),
	'setvaccinationreminder'=> array(
		'variable'=>array('duedate','Drname','clinic','agegroup','previousagegroup','previousdate'),
        'msgbody'=> 'Your child was given inoculation on $previousdate, normally given at $previousagegroup and next inoculation is due on $duedate, normally given at $agegroup. You may fix an appointment by logging on IndiaOnlineHealth or call my clinic at $clinic.<br/>
		Please ignore this message if you have already booked the appointment or made alternate arrangement.
		Best wishes,
		Dr. $Drname'
	),
	'corporatemembersregistration' => array(
		'variable'=>array('uname','password','iohid','organizationname','organizationhead'),
        'msgbody' => 'Your $organizationname has registered you on www.IndiaOnlineHealth.com. Your IOH Id $iohid , username $uname and password $password . Change your password on first log-in. $organizationhead '
	),
	'corporateplanassociation' => array(
		'variable'=>array('organizationname','organizationhead'),
        'msgbody' => 'Your $organizationname has associated you to corporate plan on www.IndiaOnlineHealth.com. You can now enjoy all benefits associated with your corporate plan. $organizationhead'
	),
	'registrationandassociation' => array(
		'variable'=>array('uname','password'),
        'msgbody' => 'Your organization has registered you on www.IndiaOnlineHealth.com and associated you to their corporate plan. Your user name $uname and password $password . Please log-in and change password on first log-in'
	),
	'dissociation' => array(
		'variable'=>array(),
        'msgbody' => 'You have been dissociated from corporate plan on www.IndiaOnlineHealth.com under advice from your organization. You can log-in and subscribe to any available plan through Choose Plan link on your dashboard '
	),
	'failedassociation' => array(
		'variable'=>array(),
        'msgbody' => 'Your organization has subscribed to a corporate plan on www.IndiaOnlineHealth.com You can log-in and associate with this plan through Choose Plan link on your dashboard '
	),
	'firsttimeusernamepass' => array(
		'variable'=>array('uname','password'),
        'msgbody' => 'On your Company request we have registered you on IndiaOnlineHealth. Yr Username $uname & PW $password Change PW on first Log-in & complete Medical History'
	),
	
	'registrationinfobystaff' => array(
    	'variable'=>array('doctorname','userid','uname', 'password'),
        'msgbody' => 'Dr. $doctorname has registered you on www.indiaonlinehealth.com. Your IOH ID $userid . Username $uname & PW $password . Log-in to view your medical record',
    ),
	'registrationinfo' => array(
    	'variable'=>array('name','username', 'place','password'),
        'msgbody' => 'Dear $name , You are registered on www.indiaonlinehealth.com for the health camp organized at $place . Your username $username and password $password . On first log-in, change your password and complete your profile and medical history under My Account.',
    ),
	'subscription_alert' => array(
    	'variable'=>array('date','username','amount'),
        'msgbody' => 'Dear $username , Thank you for using IndiaOnlineHealth. Your annual subscription will expire on $date . Renewal charges are Rs $amount under your current plan. Please maintain sufficient balance in your account for automatic renewal.',
    ),
	
    'registration' => array(
    	'variable'=>array('code'),
        'msgbody' => 'Thank you for registering with IndiaOnlineHealth. Your activation code is $code .',
    ),
  'relativeregistration' => array(
    	'variable'=>array(),
        'msgbody' => 'Thank you for registering with IndiaOnlineHealth. Kindly check your email for account activation',
    ),
     'registartion_activation_link_click' => array(
    	'variable'=>array('iohId'),
        'msgbody' => 'Thank you for registering with IndiaOnlineHealth. Your IOH id is $iohId',
    ),
     'registartion_OTP' => array(
    	'variable'=>array('code'),
        'msgbody' => 'Thank you for registering with IndiaOnlineHealth. Your IOH id is code$code',
    ),
     'forgotpassword' => array(
    	'variable'=>array('code'),
        'msgbody' => 'As per your request, your password recovery code is $code',
    ),
    'rescheduled_appointment' => array(
    	'variable'=>array('drname','beforeresheduletime','timeafter','beforeresheduledate','dateafter','modebefore','modeafter'),
        'msgbody' => 'Your appointment with Dr $drname for $modebefore at $beforeresheduletime hr $beforeresheduledate has been rescheduled for $modeafter at $timeafter hr $dateafter',
    ),
    'reschedule_appointment_by_staff_patientmsg' => array(
    	'variable'=>array('drname','code'),
        'msgbody' => 'Your request for rescheduling your appointment with Dr. $drname has been initiated. To confirm rescheduling please inform Verification code $code',
    ),
    'appointmentcancel_bydoctor' => array(
    	'variable'=>array('drfullname'),
        'msgbody' => 'Ref your appointment with Dr $drfullname . Unfortunately due to emergency, doctor has cancelled this appointment. Please take a fresh appointment',
    ),    
    'cancel_appointment_by_staff_patientmsg' => array(
    	'variable'=>array('drname','code'),
        'msgbody' => 'Your request for cancellation of your appointment with Dr. $drname has been initiated. To confirm cancellation please inform Verification code $code',
    ),  
     'chemist_order_conformation' => array(
    	'variable'=>array('orderId','time','date','contactnumber'),
        'msgbody' => 'Ref your order num $orderId . Your products will be ready for pick up from our store by $time on $date . For directions call $contactnumber',
    ),
    'chemist_order_rejection' => array(
    	'variable'=>array('orderId','chemistname','reason'),
        'msgbody' => 'Ref your order num $orderId . Your request for products has been declined by $chemistname due $reason',
    ),
    'pathologist_order_conformation' => array(
    	'variable'=>array('labname','date','time','contactnumber'),
        'msgbody' => 'Your appointment for diagnostic test on $labname has been fixed for $date at $time hr . For directions to lab call $contactnumber',
    ),
    'pathologist_order_rejection' => array(
    	'variable'=>array('orderId','labname'),
        'msgbody' => 'Ref your order no $orderId . Your request for tests has been declined by $labname',
    ),
    'pathologist_order_uploaded' => array(
    	'variable'=>array('orderId','labname'),
        'msgbody' =>'Ref your order no $orderId . Your reports have now been uploaded into your EMR by $labname . Please review.',
    ),
    'payment_at_clinic' => array(
    	'variable'=>array('drname','date','time'),
        'msgbody' =>'Ref your appointment with Dr $drname for $date at $time hr. Your payment at the clinic has been acknowledged',
    ),
    'account_charged' => array(
    	'variable'=>array('creditedamount','currentbalance'),
        'msgbody' =>'Thank you for using IndiaOnlineHealth. Your account has been credited with Rs $creditedamount . Your new balance is Rs $currentbalance',
    ),
    'end_consultation' => array(
    	'variable'=>array('drname','debitedamount','currentbalance'),
        'msgbody' =>'Your On-line Consultation with Dr $drname concluded successfully. Your account has been debited with Rs $debitedamount . Your new balance is Rs $currentbalance',
    ),
    'end_online_consultation_drmsg' => array(
    	'variable'=>array('username','creditedamount','currentbalance'),
        'msgbody' =>'Your On-line Consultation with patient $username concluded successfully. Your account has been credited with Rs $creditedamount. Your new balance is Rs $currentbalance',
    ),
    'take_appointment_patientmsg' => array(
    	'variable'=>array('drname','time','date','mode'),
        'msgbody' =>'Thank you for using IndiaOnlineHealth. Your appointment with Dr $drname is fixed for $mode at $time hr $date',
    ),
    'appointmentcancel_bypatient'=>array(
    	'variable'=>array('drname','appointmenttime','appointmentdate','mode'),
        'msgbody' =>'Thank you for using IndiaOnlineHealth. Your appointment with Dr $drname for $mode at $appointmenttime $appointmentdate has been cancelled',
    ),
	'disassociatecorporate'=>array(
    	'variable'=>array('companyname'),
        'msgbody' =>'You have been disassociated from $companyname corporate account. You will not be able to use plans application to $companyname',
    ),
    'patientaddedbydoctor'=>array(
    	'variable'=>array('drname','code'),
        'msgbody' =>'Dr $drname would like to be added in your network. Please provide one time confirmation code $code to your doctor.',
    ),
    'take_appointment_msg_for_doc'=>array(
    	'variable'=>array('patient_name','mode', 'time', 'date'),
        'msgbody' =>'$patient_name has taken an appointment for a consultation with you $mode at $time on $date . This has been updated in your upcoming appointments also.',
    ),
    'cancel_appointment_msg_for_doc'=>array(
    	'variable'=>array('patient_name','mode', 'time', 'date'),
        'msgbody' =>'$patient_name has cancelled $mode appointment at $time on $date . This has been updated in your upcoming appointments also.',
    ),
    
    'reschedule_appointment_msg_for_doc'=>array(
    	'variable'=>array('patient_name','old_mode', 'old_time', 'old_date', 'new_mode', 'new_date', 'new_time'),
        'msgbody' =>'Your patient $patient_name has rescheduled $old_mode appointment at $old_time on $old_date . The new appointment is $new_mode at $new_date on $new_time . This has been updated in your upcoming appointment also.',
    ),
    'coep_appointment_date_time'=>array(
    	'variable'=>array('date', 'time'),
        'msgbody' =>'Your Health checkup is scheduled on $date at $time . Attendance is compulsory as a part of your college registration process. Please be present at the camp 5 mins before the specified time. Prof S L Patil. HoD Instrumentation.',
    ),
    'appointment_reminder'=>array(
    	'variable'=>array('drname','mode', 'time', 'date'),
        'msgbody' =>'This is a reminder for your appointment with Dr. $drname for $mode on $date at $time hr.',
    ),
	'coep_username_change'=>array(
    	'variable'=>array('mis'),
        'msgbody' =>'Due to change in your MIS number your user name has been changed to $mis .Your password is not changed in this process',
    ),
	'coep_username_reset'=>array(
    	'variable'=>array('mis'),
        'msgbody' =>'Your college requires that your username should be identified by your MIS number. Accordingly, we have reset your user name as $mis . You will be able to change it when you move out of CoEP plan.Your password is not changed in this process',
    ),
	'notifyappointmenttime'=>array(
    	'variable'=>array('time','date','venue','name'),
        'msgbody' =>'Your Medical checkup is scheduled at $time on $date at $venue . Please be present at the camp 10 mins before your appointment time.',
    ),
	'followup_camp'=>array(
    	'variable'=>array('recent','datetime','beforetime','organizationhead','name'),
        'msgbody' =>'Subsequent to your $recent check-up, you are required to attend a follow-up consultation on $datetime . Please be present at the camp $beforetime mins before specified time.- $organizationhead ',
    )
);
