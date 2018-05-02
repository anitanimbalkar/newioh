<?php
return array(
	'pathtestreminder'=> array(
		'code'=> 'pathtestreminder',
    	'variable'=>array('name'),
    	'subject'=>'Reminder for tests',
    	'mailbody'=> 'Dear $name, Time for your scheduled Blood Glucose Fasting and PP tests. Please do the tests and visit your Doctor for further queries, if any.'
	),
	'pathappointment'=> array(
		'code'=> 'pathappointment',
    	'variable'=>array('consumername','datetime'),
    	'subject'=>'Test schedule with pathologist',
    	'mailbody'=> 'Dear $consumername, Your test was scheduled on $datetime, how did it go? Did you visit your doctor for further queries, if any'
	),
	'reviewreport'=> array(
		'code'=> 'reviewreport',
    	'variable'=>array('name'),
    	'subject'=>'Doctor visit for queries',
    	'mailbody'=> 'Dear $name, we hope you have had a chance to review your report consult your doctor for queries, if any.'
	),
	'Marathi-reviewreport'=> array(
		'code'=> 'Marathi-reviewreport',
    	'variable'=>array('name'),
    	'subject'=>'Doctor visit for queries -Marathi',
    	'mailbody'=> 'प्रिय  $name ,आपल्या चाचणीची वेळ निश्चित करण्यात आली आहे, ते कसे केले? पुढील प्रश्नांसाठी आपण आपल्या डॉक्टरांशी भेट दिली का?'
	),
	'loginmsg'=> array(
		'code'=> 'loginmsg',
    	'variable'=>array('name'),
    	'subject'=>'Log into system',
    	'mailbody'=> 'Dear $name, log in to www.indiaonlinehealth.com to read the latest newsletter with amazing tips and information regarding your body.'
	),
	'Marathi-loginmsg'=> array(
		'code'=> 'Marathi-loginmsg',
    	'variable'=>array('name'),
    	'subject'=>'Log into system -Marathi',
    	'mailbody'=> 'प्रिय $name, आपल्या शरीराबाबत आश्चर्यकारक टिपा आणि माहितीसह नवीनतम वृत्तपत्र वाचण्यासाठी www.indiaonlinehealth.com वर लॉग इन करा.'
	),
	'clinicvisit'=> array(
		'code'=> 'clinicvisit',
    	'variable'=>array('name','clinicplace','datetime'),
    	'subject'=>'Appointment schedule with doctor',
    	'mailbody'=> 'Dear $name, Your monthly checkup is scheduled at $clinicplace at $datetime . Please be present at the clinic 10 mins before your appointment time.'
	),
	'Marathi-clinicvisit'=> array(
		'code'=> 'Marathi-clinicvisit',
    	'variable'=>array('name','clinicplace','datetime'),
    	'subject'=>'Appointment schedule with doctor -Marathi',
    	'mailbody'=> 'प्रिय $name, आपले मासिक तपासणी $clinicplace वर $datetime वर नियोजित आहे. कृपया आपल्या भेटीच्या वेळेपूर्वी 10 मिनिटे क्लिनिकमध्ये उपस्थित रहा'
	),
	'adveating'=> array(
		'code'=> 'adveating',
    	'variable'=>array('consumername'),
    	'subject'=>'Eating habits',
    	'mailbody'=> 'Dear $consumername, Eating at regular times during the day helps burn calories at a faster rate.'
	),
	'Marathi-adveating'=> array(
		'code'=> 'Marathi-adveating',
    	'variable'=>array('consumername'),
    	'subject'=>'Eating habits -Marathi',
    	'mailbody'=> 'प्रिय  $consumername, दर रोज सन्तुलित आहर सेवन केल्यने जलदरीत्या कॅलरीज बर्न करण्यास मदत करते.'
	),
	'advdataentry'=> array(
		'code'=> 'advdataentry',
    	'variable'=>array('consumername'),
    	'subject'=>'Advice for recording data',
    	'mailbody'=> 'Dear $consumername, Looks like you have not entered any data into the system, please do so as it will help you to set better goals.'
	),
	'Marathi-advdataentry'=> array(
		'code'=> 'Marathi-advdataentry',
    	'variable'=>array('consumername'),
    	'subject'=>'Advice for recording data -Marathi',
    	'mailbody'=> 'प्रिय  $consumername, असे दिसते की आपण सिस्टममध्ये डेटा प्रविष्ट केला नाही, कृपया तसे करा कारण ते आपल्याला चांगले उद्दीष्ट निश्चित करण्यासाठी मदत करतील'
	),
	'advoncalorieintake'=> array(
		'code'=> 'advoncalorieintake',
    	'variable'=>array(),
    	'subject'=>'Health advice on calorie intake',
    	'mailbody'=> '1 piece of gulab jamun contains 150 calories. Dancing for 30 minutes at a moderate speed will ensure burning the calories gained with each piece of gulab jamun.'
	),
	'Marathi-advoncalorieintake'=> array(
		'code'=> 'Marathi-advoncalorieintake',
    	'variable'=>array('name'),
    	'subject'=>'Heath advice on calorie intake -Marathi',
    	'mailbody'=> '1 गुलाब जामुनचा 1 तुकडा 150 कॅलरीज आहे. मध्यम गतीने 30 मिनिटे नृत्य केल्यास प्रत्येक तुकड्यात गुलाब जामुनसह मिळणारी कॅलरी बर्न होईल.'
	),
	'advonhealthyliving'=> array(
		'code'=> 'advonhealthyliving',
    	'variable'=>array('name'),
    	'subject'=>'Healthy living',
    	'mailbody'=> 'Dear $name, Healthy eating = Healthy living, dont give up on your good eating habits.'
	),
	'Marathi-advonhealthyliving'=> array(
		'code'=> 'Marathi-advonhealthyliving',
    	'variable'=>array(),
    	'subject'=>'Healthy living -Marathi',
    	'mailbody'=> 'निरोगी खाणे = सुखी राहणे, आपल्या चांगल्या खाण्याच्या सवयींवर सोडू नका'
	),
	'advonhealthyweight'=> array(
		'code'=> 'advonhealthyweight',
    	'variable'=>array(),
    	'subject'=>'Health advice on weight',
    	'mailbody'=> 'Being obese may go along with having blood pressure and diabetes, but losing and maintaining weight may help in controlling it.'
	),
	'Marathi-advonhealthyweight'=> array(
		'code'=> 'Marathi-advonhealthyweight',
    	'variable'=>array(),
    	'subject'=>'Health advice on weight -Marathi',
    	'mailbody'=> 'लठ्ठपणा मुले रक्तदाब आणि मधुमेह असण्याची शक्यता आहे,परंतु वजन कमी करणे त्याचे नियंत्रण करण्यास मदत करू शकते.'
	),
	'advonexercisegoals'=> array(
		'code'=> 'advonexercisegoals',
    	'variable'=>array('name'),
    	'subject'=>'Set exercise goals',
    	'mailbody'=> 'Dear $name, Set goals with a friend who can go along, for a walk or a swim (it can be anyone friends, children etc). Goals are easier to attain with a friend.'
	),
	'Marathi-advonexercisegoals'=> array(
		'code'=> 'Marathi-advonexercisegoals',
    	'variable'=>array('name'),
    	'subject'=>'Set exercise goals -Marathi',
    	'mailbody'=> 'प्रिय $name, एखाद्या मैत्रिणीसह बाजूने गोल सेट करा जो चालासाठी किंवा एखाद्या जलतरणापर्यंत (ते कोणाही मित्र, मुले इत्यादी असू शकतात) एका मित्रासह लक्ष्य प्राप्त करणे सोपे आहे.'
	),
	'scheduleapp'=> array(
		'code'=> 'scheduleapp',
    	'variable'=>array('name','datetime'),
    	'subject'=>'Appoinment schedule',
    	'mailbody'=> 'Dear $name, Your last appointment happened on $datetime. Your appointment is due please schedule your appointment and meet your doctor.'
	),
	'Marathi-scheduleapp'=> array(
		'code'=> 'Marathi-scheduleapp',
    	'variable'=>array('name','datetime'),
    	'subject'=>'Appoinment schedule -Marathi',
    	'mailbody'=> 'प्रिय $name, आपली अंतिम नियुक्ती $datetime वर झाली आपली नियुक्ती योग्य आहे कृपया आपली नेमणूक शेड्यूल करा आणि आपल्या डॉक्टरांशी संपर्क साधा.'
	),
	'scheduletest'=> array(
		'code'=> 'scheduletest',
    	'variable'=>array('name','datetime'),
    	'subject'=>'Test schedule',
    	'mailbody'=> 'Dear $name, You did your last test on $datetime. Your test is due please schedule your appointment and complete your test to know and manage your condition parameters better.'
	),
	'Marathi-scheduletest'=> array(
		'code'=> 'Marathi-scheduletest',
    	'variable'=>array('name','datetime'),
    	'subject'=>'Test schedule -Marathi',
    	'mailbody'=> 'प्रिय $name, आपण आपली शेवटची चाचणी $datetime केली. आपली चाचणी योग्य आहे कृपया आपली नेमणूक शेड्यूल करा आणि आपल्या परिस्थितिची मापदंड अधिक चांगली '
	),
	'DM1'=> array(
		'code'=> 'DM1',
    	'variable'=>array('name'),
    	'subject'=>'DM1',
    	'mailbody'=> 'Dear $name, Always keep your blood sugar under control. Remember, a well-controlled sugar means a normal lifespan.'
	),
	'Marathi-DM1'=> array(
		'code'=> 'Marathi-DM1',
    	'variable'=>array('name'),
    	'subject'=>'Marathi-DM1',
    	'mailbody'=> 'प्रिय  $name, नेहमी आपल्या रक्तातील साखर नियंत्रणात ठेवा. लक्षात ठेवा नियंत्रित साखर एक साधारण वयोमान आहे'
	),
	'DM2'=> array(
		'code'=> 'DM2',
    	'variable'=>array('name'),
    	'subject'=>'DM2',
    	'mailbody'=> 'Dear $name, Be regular about your food intake. Remember, type and timing of food as far as possible should be same.'
	),
	'Marathi-DM2'=> array(
		'code'=> 'Marathi-DM2',
    	'variable'=>array('name'),
    	'subject'=>'Marathi-DM2',
    	'mailbody'=> 'प्रिय  $name, आपल्या अन्न सेवन बद्दल नियमित रहा लक्षात ठेवा, टाइप आणि टाईपिंगचे शक्य तेवढे असणे आवश्यक आहे.'
	),
	'DM3'=> array(
		'code'=> 'DM3',
    	'variable'=>array('name'),
    	'subject'=>'DM3',
    	'mailbody'=> 'Dear $name, Remember to consume enough greens in the form of salads, sprouts, juices and in cooked form.'
	),
	'Marathi-DM3'=> array(
		'code'=> 'Marathi-DM3',
    	'variable'=>array('name'),
    	'subject'=>'Marathi-DM3',
    	'mailbody'=> 'प्रिय  $name, सॅलड्स, स्प्राउट्स, रस आणि शिजवलेल्या स्वरूपात पुरेशी हिरव्या भाज्या वापरण्याचे लक्षात ठेवा.'
	),
	'DM4'=> array(
		'code'=> 'DM4',
    	'variable'=>array('name'),
    	'subject'=>'DM4',
    	'mailbody'=> 'Dear $name, You can eat sugar free sweets with Stevia, raisins, dates and figs occasionally.'
	),
	'Marathi-DM4'=> array(
		'code'=> 'Marathi-DM4',
    	'variable'=>array('name'),
    	'subject'=>'Marathi-DM4',
    	'mailbody'=> 'प्रिय  $name, आपण कधीकधी Stevia, मनुका, तारखा आणि अंजीर सह साखर मोफत गोड खाऊ शकता.'
	),
	'DM5'=> array(
		'code'=> 'DM5',
    	'variable'=>array('name'),
    	'subject'=>'DM5',
    	'mailbody'=> 'Dear $name, Have you exercised today? Remember exercise is a part of your treatment. Never skip it!'
	),
	'Marathi-DM5'=> array(
		'code'=> 'Marathi-DM5',
    	'variable'=>array('name'),
    	'subject'=>'Marathi-DM5',
    	'mailbody'=> 'प्रिय  $name, आपण आज वापर केला आहे का? लक्षात ठेवा व्यायाम हा आपल्या उपचारांचा एक भाग आहे. कधीही वगळू नका!'
	),
	'DM6'=> array(
		'code'=> 'DM6',
    	'variable'=>array('name'),
    	'subject'=>'DM6',
    	'mailbody'=> 'Dear $name, Are you getting enough sleep? If not let me know. Sleep is important for Diabetes control.'
	),
	'Marathi-DM6'=> array(
		'code'=> 'Marathi-DM6',
    	'variable'=>array('name'),
    	'subject'=>'Marathi-DM6',
    	'mailbody'=> 'प्रिय  $name, आपल्याला पुरेसे झोप मिळत आहे का? मला कळू नका तर मधुमेह नियंत्रणासाठी झोप आवश्यक आहे.'
	),
	'DM7'=> array(
		'code'=> 'DM7',
    	'variable'=>array('name'),
    	'subject'=>'DM7',
    	'mailbody'=> 'Dear $name, Try to remain happy and stress free for better sugar control.'
	),
	'Marathi-DM7'=> array(
		'code'=> 'Marathi-DM7',
    	'variable'=>array('name'),
    	'subject'=>'Marathi-DM7',
    	'mailbody'=> 'प्रिय  $name, चांगले साखर नियंत्रण यासाठी आनंदी आणि तणावमुक्त राहण्याचा प्रयत्न करा.'
	),
	'DM8'=> array(
		'code'=> 'DM8',
    	'variable'=>array('name'),
    	'subject'=>'DM8',
    	'mailbody'=> 'Dear $name, Be regular about your medication –skipping doses leads to loss of control.'
	),
	'Marathi-DM8'=> array(
		'code'=> 'Marathi-DM8',
    	'variable'=>array('name'),
    	'subject'=>'Marathi-DM8',
    	'mailbody'=> 'प्रिय  $name, आपली औषधोपचार नियमित करा - उघड्या डोस झाल्यामुळे नियंत्रण कमी होते'
	),
	'DM9'=> array(
		'code'=> 'DM9',
    	'variable'=>array('name'),
    	'subject'=>'DM9',
    	'mailbody'=> 'Dear $name, Did you wash, inspect and cream your feet today? Remember to always keep them covered!'
	),
	'Marathi-DM9'=> array(
		'code'=> 'Marathi-DM9',
    	'variable'=>array('name'),
    	'subject'=>'Marathi-DM9',
    	'mailbody'=> 'प्रिय  $name, आज आपण आपले पाय धुवा, तपासणी आणि मलई केली होती का? नेहमी झाकून ठेवण्याचे लक्षात ठेवा!'
	),
	'DM10'=> array(
		'code'=> 'DM10',
    	'variable'=>array('name'),
    	'subject'=>'DM10',
    	'mailbody'=> 'Dear $name, Have you checked your blood sugar on your glucometer? Remember to do it twice a week.'
	),
	'Marathi-DM10'=> array(
		'code'=> 'Marathi-DM10',
    	'variable'=>array('name'),
    	'subject'=>'Marathi-DM10',
    	'mailbody'=> 'प्रिय  $name, आपण आपल्या ग्लुकोमीटरवर आपल्या रक्तातील साखरची तपासणी केली आहे का? आठवड्यातून दोनदा ते करायला विसरू नका'
	),
	'DM11'=> array(
		'code'=> 'DM11',
    	'variable'=>array('name'),
    	'subject'=>'DM11',
    	'mailbody'=> 'Dear $name, Remember a three-monthly sugar test in lab is compulsory.'
	),
	'Marathi-DM11'=> array(
		'code'=> 'Marathi-DM11',
    	'variable'=>array('name'),
    	'subject'=>'Marathi-DM11',
    	'mailbody'=> 'प्रिय  $name, लॅबमध्ये तीन-महिन्याच्या साखरेची चाचणी अनिवार्य आहे हे लक्षात ठेवा.'
	),
	'DM12'=> array(
		'code'=> 'DM12',
    	'variable'=>array('name'),
    	'subject'=>'DM12',
    	'mailbody'=> 'Dear $name, Keep your weight and Blood pressure in check—this is important in a Diabetic.'
	),
	'Marathi-DM12'=> array(
		'code'=> 'Marathi-DM12',
    	'variable'=>array('name'),
    	'subject'=>'Marathi-DM12',
    	'mailbody'=> 'प्रिय  $name, आपले वजन आणि रक्तदाब तपासण्यामध्ये ठेवा - हे मधुमेहामध्ये महत्वाचे आहे.'
	),
	'DM13'=> array(
		'code'=> 'DM13',
    	'variable'=>array('name'),
    	'subject'=>'DM13',
    	'mailbody'=> 'Dear $name, Make sure your lipids, uric acid and urine microalbumin are under control!'
	),
	'Marathi-DM13'=> array(
		'code'=> 'Marathi-DM13',
    	'variable'=>array('name'),
    	'subject'=>'Marathi-DM13',
    	'mailbody'=> 'प्रिय  $name, आपल्या लिपिडस्, यूरिक ऍसिड आणि मूत्र मायक्रोबल्बिनचे नियंत्रण आहे हे निश्चित करा!'
	),
	'DM14'=> array(
		'code'=> 'DM14',
    	'variable'=>array('name'),
    	'subject'=>'DM14',
    	'mailbody'=> 'Dear $name, Make sure you have an ECG, eye and retina test once a year.'
	),
	'Marathi-DM14'=> array(
		'code'=> 'Marathi-DM14',
    	'variable'=>array('name'),
    	'subject'=>'Marathi-DM14',
    	'mailbody'=> 'प्रिय  $name, वर्षातून एकदा आपली ईसीजी, डोळ्यांची व डोळयाची चाचणी घ्या.'
	),
	'DM15'=> array(
		'code'=> 'DM15',
    	'variable'=>array('name'),
    	'subject'=>'DM15',
    	'mailbody'=> 'Dear $name, Diabetes is a condition in which the level of sugar (glucose) in the blood is high. Glucose comes from the foods you eat. Insulin is a hormone that helps the glucose get into your cells to give them energy.'
	),
	'Marathi-DM15'=> array(
		'code'=> 'Marathi-DM15',
    	'variable'=>array('name'),
    	'subject'=>'Marathi-DM15',
    	'mailbody'=> 'प्रिय $name, मधुमेह ही अशी स्थिती आहे ज्यामध्ये रक्तातील साखर (ग्लुकोज) उच्च असते. ग्लूकोज तुमच्या जे खाद्यपदार्थ खातो ते येते. इन्सुलिन हा हार्मोन आहे ज्यामुळे ग्लुकोज आपल्या पेशींमध्ये ऊर्जा मिळविण्यास मदत करतो.  '
	),
	'DM16'=> array(
		'code'=> 'DM16',
    	'variable'=>array('name'),
    	'subject'=>'DM16',
    	'mailbody'=> 'Dear $name, With type 1 diabetes or insulin-dependent diabetes, your body does not make insulin, an insulin therapy is essential for controlling and maintenance of good health.'
	),
	'Marathi-DM16'=> array(
		'code'=> 'Marathi-DM16',
    	'variable'=>array('name'),
    	'subject'=>'Marathi-DM16',
    	'mailbody'=> 'प्रिय $name, प्रकार 1 मधुमेह किंवा मधुमेहावरील रामबाण-आवरित डायबिटीजसह, तुमचे शरीर इंसुलिन तयार करत नाही, चांगले आरोग्य राखण्यासाठी आणि त्याची काळजी घेण्याकरता एक इंसुलिन थेरपी आवश्यक आहे.'
	),
	'DM17'=> array(
		'code'=> 'DM17',
    	'variable'=>array('name'),
    	'subject'=>'DM17',
    	'mailbody'=> 'Dear $name, With type 2 diabetes, the more common type, your body does not make or use insulin well. Without enough insulin, the glucose stays in your blood. Type 2 diabetes can be prevented or delayed by reducing the risk factors that may lead to its development and adopting healthier lifestyles.'
	),
	'Marathi-DM17'=> array(
		'code'=> 'Marathi-DM17',
    	'variable'=>array('name'),
    	'subject'=>'Marathi-DM17',
    	'mailbody'=> 'प्रिय $name, टाइप 2 मधुमेह, अधिक सामान्य प्रकार, आपले शरीर इंसुलिनची चांगली निर्मिती किंवा उपयोग करत नाही पुरेशी इंसुलिन शिवाय ग्लुकोज तुमच्या रक्तामध्ये टिकतो.  टाईप 2 मधुमेह टाळता येऊ शकतो किंवा कमी होण्यास कारणीभूत ठरू शकते ज्यामुळे त्याच्या विकासासाठी आणि निरोगी जीवनशैलीचा अवलंब करता येईल.'
	),
	'DM18'=> array(
		'code'=> 'DM18',
    	'variable'=>array('name'),
    	'subject'=>'DM18',
    	'mailbody'=> 'Dear $name, If left untreated or uncontrolled, diabetes can lead to serious problems, such as heart disease, stroke, blindness, kidney failure, among others.  Simple lifestyle changes can help in the preventing or delaying the onset of type 2 diabetes.'
	),
	'Marathi-DM18'=> array(
		'code'=> 'Marathi-DM18',
    	'variable'=>array('name'),
    	'subject'=>'Marathi-DM18',
    	'mailbody'=> 'प्रिय $name, जर उपचार न करता किंवा अनियंत्रित सोडले तर मधुमेह गंभीर आजारांमुळे होऊ शकतो, जसे की हृदयरोग, स्ट्रोक, अंधत्व, मूत्रपिंड निकामी, इतरांदरम्यान साधारण जीवनशैलीतील बदल टाईप 2 मधुमेहाची सुरुवात करण्यास किंवा विलंब करण्यास मदत करतात. '
	),
	'DM19'=> array(
		'code'=> 'DM19',
    	'variable'=>array('name'),
    	'subject'=>'DM19',
    	'mailbody'=> 'Dear $name, Prevention & Control diabetes;
• Achieve and maintain a healthy body weight.
• Do exercise daily
• Eat a healthy diet. Reduce the intake of sugar, salt and saturated fats.
• Avoid tobacco use and harmful use of alcohol.
• Manage stress.
• Test the blood glucose and HbA1c levels regularly.'
	),
	'Marathi-DM19'=> array(
		'code'=> 'Marathi-DM19',
    	'variable'=>array('name'),
    	'subject'=>'Marathi-DM19',
    	'mailbody'=> 'प्रिय $name, प्रतिबंध आणि नियंत्रण मधुमेह;
• एक निरोगी शरीराचे वजन साध्य आणि राखणे.
• दररोज व्यायाम करा
• एक आरोग्यपूर्ण आहार घ्या. साखर, मीठ आणि चरबी सेवन कमी करा.
• मद्यपान आणि तंबाखू सेवन टाळा.
• ताण व्यवस्थापित करा
• नियमितपणे रक्तातील ग्लुकोज आणि HbA1c चाचणी घ्या. '
	),
);
