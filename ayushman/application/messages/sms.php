<?php
return array(
	'NewYearMessage' => array(
		'variable'=>array('name'),
        'msgbody' => 'Dear $name , Wishing you a very Happy, Healthy and Prosperous new year. Regards, AyushCare, Your Partner in Healthy Living'
	),
	'RepublicMessage' => array(
		'variable'=>array('name'),
        'msgbody' => 'Dear $name , Wishing you a very Happy Republic Day. Regards, AyushCare, Your Partner in Healthy Living Call- 7263924405.'
	),
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
        'msgbody' => 'Your appointment for diagnostic test on $labname has been fixed for $date. For further details contact $contactnumber',
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
    ), 
   'receiptmail' => array(
    	'variable'=>array('name','rcptno','amt'),
        'msgbody' => 'Dear $name , Your receipt.no is : $rcptno of amount Rs. $amt . Thank you AyushCare.',
    ),
	'onetimepasswd' => array(
    	'variable'=>array('name','code'),
        'msgbody' => 'Dear $name , This is your one time password $code . Thank you AyushCare',		
    ),
	'rcptconfirmation' => array(
    	'variable'=>array('csename','amount','acctmgrname'),
        'msgbody' => 'Dear $csename , Your transaction is approved of amount Rs. $amount . Thank you $acctmgrname .',		
    ),
	'pathtestreminder'=> array(
		'variable'=>array('name'),
    	'msgbody'=> 'Dear $name , Time for your scheduled Blood Glucose Fasting and PP tests. Please do the tests and visit your Doctor for further queries, if any.'
	),
	'pathappointment'=> array(
		'variable'=>array('consumername','datetime'),
    	'msgbody'=> 'Dear $consumername , Your test was scheduled on $datetime , how did it go? Did you visit your doctor for further queries, if any'
	),
	'reviewreport'=> array(
		'variable'=>array('name'),
    	'msgbody'=> 'Dear $name , we hope you have had a chance to review your report consult your doctor for queries, if any.'
	),
	'Marathi-reviewreport'=> array(
		'variable'=>array('name'),
    	'msgbody'=> 'प्रिय  $name ,आपल्या चाचणीची वेळ निश्चित करण्यात आली आहे, ते कसे केले? पुढील प्रश्नांसाठी आपण आपल्या डॉक्टरांशी भेट दिली का?'
	),
	'loginmsg'=> array(
		'variable'=>array('name'),
    	'msgbody'=> 'Dear $name , log in to www.indiaonlinehealth.com to read the latest newsletter with amazing tips and information regarding your body.'
	),
	'Marathi-loginmsg'=> array(
		'variable'=>array('name'),
    	'msgbody'=> 'प्रिय $name , आपल्या शरीराबाबत आश्चर्यकारक टिपा आणि माहितीसह नवीनतम वृत्तपत्र वाचण्यासाठी www.indiaonlinehealth.com वर लॉग इन करा.'
	),
	'clinicvisit'=> array(
		'variable'=>array('name','clinicplace','datetime'),
    	'msgbody'=> 'Dear $name , Your monthly checkup is scheduled at $clinicplace at $datetime . Please be present at the clinic 10 mins before your appointment time.'
	),
	'Marathi-clinicvisit'=> array(
		'variable'=>array('name','clinicplace','datetime'),
    	'msgbody'=> 'प्रिय $name , आपले मासिक तपासणी $clinicplace वर $datetime वर नियोजित आहे. कृपया आपल्या भेटीच्या वेळेपूर्वी 10 मिनिटे क्लिनिकमध्ये उपस्थित रहा'
	),
	'adveating'=> array(
		'variable'=>array('consumername'),
    	'msgbody'=> 'Dear $consumername , Eating at regular times during the day helps burn calories at a faster rate.'
	),
	'Marathi-adveating'=> array(
		'variable'=>array('consumername'),
    	'msgbody'=> 'प्रिय  $consumername , दर रोज सन्तुलित आहर सेवन केल्यने जलदरीत्या कॅलरीज बर्न करण्यास मदत करते.'
	),
	'advdataentry'=> array(
		'variable'=>array('consumername'),
    	'msgbody'=> 'Dear $consumername , Looks like you have not entered any data into the system, please do so as it will help you to set better goals.'
	),
	'Marathi-advdataentry'=> array(
		'variable'=>array('consumername'),
    	'msgbody'=> 'प्रिय  $consumername , असे दिसते की आपण सिस्टममध्ये डेटा प्रविष्ट केला नाही, कृपया तसे करा कारण ते आपल्याला चांगले उद्दीष्ट निश्चित करण्यासाठी मदत करतील'
	),
	'advoncalorieintake'=> array(
		'variable'=>array(),
    	'msgbody'=> '1 piece of gulab jamun contains 150 calories. Dancing for 30 minutes at a moderate speed will ensure burning the calories gained with each piece of gulab jamun.'
	),
	'Marathi-advoncalorieintake'=> array(
		'variable'=>array('name'),
    	'msgbody'=> '1 गुलाब जामुनचा 1 तुकडा 150 कॅलरीज आहे. मध्यम गतीने 30 मिनिटे नृत्य केल्यास प्रत्येक तुकड्यात गुलाब जामुनसह मिळणारी कॅलरी बर्न होईल.'
	),
	'advonhealthyliving'=> array(
		'variable'=>array('name'),
    	'msgbody'=> 'Dear $name , Healthy eating = Healthy living, dont give up on your good eating habits.'
	),
	'Marathi-advonhealthyliving'=> array(
		'variable'=>array(),
    	'msgbody'=> 'निरोगी खाणे = सुखी राहणे, आपल्या चांगल्या खाण्याच्या सवयींवर सोडू नका'
	),
	'advonhealthyweight'=> array(
		'variable'=>array(),
    	'msgbody'=> 'Being obese may go along with having blood pressure and diabetes, but losing and maintaining weight may help in controlling it.'
	),
	'Marathi-advonhealthyweight'=> array(
		'variable'=>array(),
    	'msgbody'=> 'लठ्ठपणा मुले रक्तदाब आणि मधुमेह असण्याची शक्यता आहे,परंतु वजन कमी करणे त्याचे नियंत्रण करण्यास मदत करू शकते.'
	),
	'advonexercisegoals'=> array(
		'variable'=>array('name'),
    	'msgbody'=> 'Dear $name , Set goals with a friend who can go along, for a walk or a swim (it can be anyone friends, children etc). Goals are easier to attain with a friend.'
	),
	'Marathi-advonexercisegoals'=> array(
		'variable'=>array('name'),
    	'msgbody'=> 'प्रिय $name , एखाद्या मैत्रिणीसह बाजूने गोल सेट करा जो चालासाठी किंवा एखाद्या जलतरणापर्यंत (ते कोणाही मित्र, मुले इत्यादी असू शकतात) एका मित्रासह लक्ष्य प्राप्त करणे सोपे आहे.'
	),
	'scheduleapp'=> array(
		'variable'=>array('name','datetime'),
    	'msgbody'=> 'Dear $name , Your last appointment happened on $datetime. Your appointment is due please schedule your appointment and meet your doctor.'
	),
	'Marathi-scheduleapp'=> array(
		'variable'=>array('name','datetime'),
    	'msgbody'=> 'प्रिय $name , आपली अंतिम नियुक्ती $datetime वर झाली आपली नियुक्ती योग्य आहे कृपया आपली नेमणूक शेड्यूल करा आणि आपल्या डॉक्टरांशी संपर्क साधा.'
	),
	'scheduletest'=> array(
		'variable'=>array('name','datetime'),
    	'msgbody'=> 'Dear $name , You did your last test on $datetime. Your test is due please schedule your appointment and complete your test to know and manage your condition parameters better.'
	),
	'Marathi-scheduletest'=> array(
		'variable'=>array('name','datetime'),
    	'msgbody'=> 'प्रिय $name , आपण आपली शेवटची चाचणी $datetime केली. आपली चाचणी योग्य आहे कृपया आपली नेमणूक शेड्यूल करा आणि आपल्या परिस्थितिची मापदंड अधिक चांगली '
	),
	'AyushCare_Dental_service'=> array(
		'variable'=>array('name'),
    	'msgbody'=> 'Dear $name , Greetings from AyushCare @Doorsteps, Your Trusted Partner for Healthy Living. Launching: Dental Service @Home Call us on 7263924405 to avail our Mouth SPA offers. Regards, AyushCare.'
	),
	'AyushCare_Home_service'=> array(
		'variable'=>array('name'),
    	'msgbody'=> 'Dear $name , AyushCare brings to you quality home healthcare services in Pune for Yourself, Parents & Grandparents. Call us on 7263924405 to know more. Regards, AyushCare.'
	),
	'AyushCare_Annual_checkup'=> array(
		'variable'=>array('name'),
    	'msgbody'=> 'Dear $name , Is your Annual Health Checkup due? Call us 7263924405 for home blood collection. Regards AyushCare, Your Partner for Healthy Living.'
	),
	'AyushCare_DiwaliWishes'=> array(
		'variable'=>array('name'),
    	'msgbody'=> 'Dear $name , Wish you a very Happy & Healthy Diwali and a Prosperous New Year. Regards AyushCare, Your Partner in Healthy Living. Contact:7263924405.'
	),
	'DM1'=> array(
    	'variable'=>array('name'),
    	'msgbody'=> 'Dear $name, Always keep your blood sugar under control. Remember, a well-controlled sugar means a normal lifespan.'
	),
	'Marathi-DM1'=> array(
    	'variable'=>array('name'),
    	'msgbody'=> 'प्रिय  $name, नेहमी आपल्या रक्तातील साखर नियंत्रणात ठेवा. लक्षात ठेवा नियंत्रित साखर एक साधारण वयोमान आहे'
	),
	'DM2'=> array(
    	'variable'=>array('name'),
    	'msgbody'=> 'Dear $name, Be regular about your food intake. Remember, type and timing of food as far as possible should be same.'
	),
	'Marathi-DM2'=> array(
    	'variable'=>array('name'),
    	'msgbody'=> 'प्रिय  $name, आपल्या अन्न सेवन बद्दल नियमित रहा लक्षात ठेवा, टाइप आणि टाईपिंगचे शक्य तेवढे असणे आवश्यक आहे.'
	),
	'DM3'=> array(
    	'variable'=>array('name'),
    	'msgbody'=> 'Dear $name, Remember to consume enough greens in the form of salads, sprouts, juices and in cooked form.'
	),
	'Marathi-DM3'=> array(
    	'variable'=>array('name'),
    	'msgbody'=> 'प्रिय  $name, सॅलड्स, स्प्राउट्स, रस आणि शिजवलेल्या स्वरूपात पुरेशी हिरव्या भाज्या वापरण्याचे लक्षात ठेवा.'
	),
	'DM4'=> array(
    	'variable'=>array('name'),
    	'msgbody'=> 'Dear $name, You can eat sugar free sweets with Stevia, raisins, dates and figs occasionally.'
	),
	'Marathi-DM4'=> array(
    	'variable'=>array('name'),
    	'msgbody'=> 'प्रिय  $name, आपण कधीकधी Stevia, मनुका, तारखा आणि अंजीर सह साखर मोफत गोड खाऊ शकता.'
	),
	'DM5'=> array(
    	'variable'=>array('name'),
    	'msgbody'=> 'Dear $name, Have you exercised today? Remember exercise is a part of your treatment. Never skip it!'
	),
	'Marathi-DM5'=> array(
    	'variable'=>array('name'),
    	'msgbody'=> 'प्रिय  $name, आपण आज वापर केला आहे का? लक्षात ठेवा व्यायाम हा आपल्या उपचारांचा एक भाग आहे. कधीही वगळू नका!'
	),
	'DM6'=> array(
    	'variable'=>array('name'),
    	'msgbody'=> 'Dear $name, Are you getting enough sleep? If not let me know. Sleep is important for Diabetes control.'
	),
	'Marathi-DM6'=> array(
		'variable'=>array('name'),
    	'msgbody'=> 'प्रिय  $name, आपल्याला पुरेसे झोप मिळत आहे का? मला कळू नका तर मधुमेह नियंत्रणासाठी झोप आवश्यक आहे.'
	),
	'DM7'=> array(
		'variable'=>array('name'),
    	'msgbody'=> 'Dear $name, Try to remain happy and stress free for better sugar control.'
	),
	'Marathi-DM7'=> array(
		'variable'=>array('name'),
    	'msgbody'=> 'प्रिय  $name, चांगले साखर नियंत्रण यासाठी आनंदी आणि तणावमुक्त राहण्याचा प्रयत्न करा.'
	),
	'DM8'=> array(
		'variable'=>array('name'),
    	'msgbody'=> 'Dear $name, Be regular about your medication –skipping doses leads to loss of control.'
	),
	'Marathi-DM8'=> array(
		'variable'=>array('name'),
    	'msgbody'=> 'प्रिय  $name, आपली औषधोपचार नियमित करा - उघड्या डोस झाल्यामुळे नियंत्रण कमी होते'
	),
	'DM9'=> array(
		'variable'=>array('name'),
    	'msgbody'=> 'Dear $name, Did you wash, inspect and cream your feet today? Remember to always keep them covered!'
	),
	'Marathi-DM9'=> array(
		'variable'=>array('name'),
    	'msgbody'=> 'प्रिय  $name, आज आपण आपले पाय धुवा, तपासणी आणि मलई केली होती का? नेहमी झाकून ठेवण्याचे लक्षात ठेवा!'
	),
	'DM10'=> array(
		'variable'=>array('name'),
    	'msgbody'=> 'Dear $name, Have you checked your blood sugar on your glucometer? Remember to do it twice a week.'
	),
	'Marathi-DM10'=> array(
		'variable'=>array('name'),
    	'msgbody'=> 'प्रिय  $name, आपण आपल्या ग्लुकोमीटरवर आपल्या रक्तातील साखरची तपासणी केली आहे का? आठवड्यातून दोनदा ते करायला विसरू नका'
	),
	'DM11'=> array(
		'variable'=>array('name'),
    	'msgbody'=> 'Dear $name, Remember a three-monthly sugar test in lab is compulsory.'
	),
	'Marathi-DM11'=> array(
		'variable'=>array('name'),
    	'msgbody'=> 'प्रिय  $name, लॅबमध्ये तीन-महिन्याच्या साखरेची चाचणी अनिवार्य आहे हे लक्षात ठेवा.'
	),
	'DM12'=> array(
		'variable'=>array('name'),
    	'msgbody'=> 'Dear $name, Keep your weight and Blood pressure in check—this is important in a Diabetic.'
	),
	'Marathi-DM12'=> array(
		'variable'=>array('name'),
    	'msgbody'=> 'प्रिय  $name, आपले वजन आणि रक्तदाब तपासण्यामध्ये ठेवा - हे मधुमेहामध्ये महत्वाचे आहे.'
	),
	'DM13'=> array(
		'variable'=>array('name'),
    	'msgbody'=> 'Dear $name, Make sure your lipids, uric acid and urine microalbumin are under control!'
	),
	'Marathi-DM13'=> array(
		'variable'=>array('name'),
    	'msgbody'=> 'प्रिय  $name, आपल्या लिपिडस्, यूरिक ऍसिड आणि मूत्र मायक्रोबल्बिनचे नियंत्रण आहे हे निश्चित करा!'
	),
	'DM14'=> array(
		'variable'=>array('name'),
    	'msgbody'=> 'Dear $name, Make sure you have an ECG, eye and retina test once a year.'
	),
	'Marathi-DM14'=> array(
		'variable'=>array('name'),
    	'msgbody'=> 'प्रिय  $name, वर्षातून एकदा आपली ईसीजी, डोळ्यांची व डोळयाची चाचणी घ्या.'
	),
	'DM15'=> array(
    	'variable'=>array('name'),
    	'msgbody'=> 'Dear $name, Diabetes is a condition in which the level of sugar (glucose) in the blood is high. Glucose comes from the foods you eat. Insulin is a hormone that helps the glucose get into your cells to give them energy.'
	),
	'Marathi-DM15'=> array(
    	'variable'=>array('name'),
    	'msgbody'=> 'प्रिय $name, मधुमेह ही अशी स्थिती आहे ज्यामध्ये रक्तातील साखर (ग्लुकोज) उच्च असते. ग्लूकोज तुमच्या जे खाद्यपदार्थ खातो ते येते. इन्सुलिन हा हार्मोन आहे ज्यामुळे ग्लुकोज आपल्या पेशींमध्ये ऊर्जा मिळविण्यास मदत करतो.  '
	),
	'DM16'=> array(
    	'variable'=>array('name'),
    	'msgbody'=> 'Dear $name, With type 1 diabetes or insulin-dependent diabetes, your body does not make insulin, an insulin therapy is essential for controlling and maintenance of good health.'
	),
	'Marathi-DM16'=> array(
    	'variable'=>array('name'),
    	'msgbody'=> 'प्रिय $name, प्रकार 1 मधुमेह किंवा मधुमेहावरील रामबाण-आवरित डायबिटीजसह, तुमचे शरीर इंसुलिन तयार करत नाही, चांगले आरोग्य राखण्यासाठी आणि त्याची काळजी घेण्याकरता एक इंसुलिन थेरपी आवश्यक आहे.'
	),
	'DM17'=> array(
    	'variable'=>array('name'),
    	'msgbody'=> 'Dear $name, With type 2 diabetes, the more common type, your body does not make or use insulin well. Without enough insulin, the glucose stays in your blood. Type 2 diabetes can be prevented or delayed by reducing the risk factors that may lead to its development and adopting healthier lifestyles.'
	),
	'Marathi-DM17'=> array(
    	'variable'=>array('name'),
    	'msgbody'=> 'प्रिय $name, टाइप 2 मधुमेह, अधिक सामान्य प्रकार, आपले शरीर इंसुलिनची चांगली निर्मिती किंवा उपयोग करत नाही पुरेशी इंसुलिन शिवाय ग्लुकोज तुमच्या रक्तामध्ये टिकतो.  टाईप 2 मधुमेह टाळता येऊ शकतो किंवा कमी होण्यास कारणीभूत ठरू शकते ज्यामुळे त्याच्या विकासासाठी आणि निरोगी जीवनशैलीचा अवलंब करता येईल.'
	),
	'DM18'=> array(
    	'variable'=>array('name'),
    	'msgbody'=> 'Dear $name, If left untreated or uncontrolled, diabetes can lead to serious problems, such as heart disease, stroke, blindness, kidney failure, among others.  Simple lifestyle changes can help in the preventing or delaying the onset of type 2 diabetes.'
	),
	'Marathi-DM18'=> array(
    	'variable'=>array('name'),
    	'msgbody'=> 'प्रिय $name, जर उपचार न करता किंवा अनियंत्रित सोडले तर मधुमेह गंभीर आजारांमुळे होऊ शकतो, जसे की हृदयरोग, स्ट्रोक, अंधत्व, मूत्रपिंड निकामी, इतरांदरम्यान साधारण जीवनशैलीतील बदल टाईप 2 मधुमेहाची सुरुवात करण्यास किंवा विलंब करण्यास मदत करतात. '
	),
	'DM19'=> array(
    	'variable'=>array('name'),
    	'msgbody'=> 'Dear $name, Prevention & Control diabetes;
• Achieve and maintain a healthy body weight.
• Do exercise daily
• Eat a healthy diet. Reduce the intake of sugar, salt and saturated fats.
• Avoid tobacco use and harmful use of alcohol.
• Manage stress.
• Test the blood glucose and HbA1c levels regularly.'
	),
	'Marathi-DM19'=> array(
    	'variable'=>array('name'),
    	'msgbody'=> 'प्रिय $name, प्रतिबंध आणि नियंत्रण मधुमेह;
• एक निरोगी शरीराचे वजन साध्य आणि राखणे.
• दररोज व्यायाम करा
• एक आरोग्यपूर्ण आहार घ्या. साखर, मीठ आणि चरबी सेवन कमी करा.
• मद्यपान आणि तंबाखू सेवन टाळा.
• ताण व्यवस्थापित करा
• नियमितपणे रक्तातील ग्लुकोज आणि HbA1c चाचणी घ्या. '
	),
	'DM20'=> array(
    	'variable'=>array('name'),
    	'msgbody'=> 'Dear $name Greetings!! Introducing our new program "Fit after 60" & you are amongst the first to aboard this program. Thank you AyushCare.'
	),
	'Marathi-DM20'=> array(
    	'variable'=>array('name'),
    	'msgbody'=> 'प्रिय $name, आम्ही आपल्या साठी "Fit after 60" हा खास आरोग्यदायी कार्यक्रम आयोजित केला असून, ह्या मधे आपले स्वागत आहे. धन्यवाद, आयुषकेअर'
	),
	'DM21'=> array(
    	'variable'=>array('name'),
    	'msgbody'=> 'Dear $name , Medication is not always the answer. The key to improved health & reduced medication is by making change to your lifestyle. We can help you improve your health & lead a happier life. Thank you, AyushCare, 7263924405.'
	),
	'Marathi-DM21'=> array(
    	'variable'=>array('name'),
    	'msgbody'=> 'प्रिय $name, आजारा वर औषध हेच उत्तर नसून ज़र काळजी घेतली तर तुम्ही तुमचे आरोग्य अजुन चांगले बनवू शकता आणि औषधाचे प्रमाण कमी करु शकता, यासाठी आम्ही मदत करू शकतो. धन्यवाद, आयुषकेअर'
	),
	'DM22'=> array(
    	'variable'=>array(),
    	'msgbody'=> 'We will connect with you with further details or feel free to calll Ms. Pranita at 91 - 7263924405. Thank you, AyushCare'
	),
	'Marathi-DM22'=> array(
    	'variable'=>array('name'),
    	'msgbody'=> 'प्रिय $name,आमच्याशी जोडण्यासाठी किवा अधिक माहितीसाठी या नंबर वर संपर्क साधावा ७२६३९२४४०५. धन्यवाद, आयुषकेअर'
	),
);
