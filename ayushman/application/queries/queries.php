<?php
return array(
	"selecteddoctorbypatient" => array(
    		"variables"=>array("id"),
        	"query"=> 'select 
						doctorid,
						patientid,
						patientuserid,
						photo,
						gender,
						mobilenumber,
						patientname,
						city_c,
						location_c,
						date,
						age,
						if(ISNULL(corporatename_c),"My Patients",corporatename_c) as corporatename_c

						 from (SELECT distinct `favoritedocterbypatients`.`reffavdocbypatdoctorsid_c` AS `doctorid`,
							   `favoritedocterbypatients`.`reffavdocbypatpatientsid_c` AS `patientid`,
							   `patients`.`repatientsuserid_c` AS `patientuserid`,
							   `users`.`photo_c` AS `photo`,
							   `users`.`gender_c` AS `gender`,concat(`users`.`isdmobileno1_c`," ",`users`.`mobileno1_c`) AS `mobilenumber`,concat(trim(`users`.`Firstname_c`)," ",trim(`users`.`lastname_c`)) AS `patientname`,
							   (date_format(from_days((to_days(now()) - to_days(`users`.`DOB_c`))),"%Y") + 0) AS `age`,
							   `address`.`city_c` AS `city_c`,
							   `address`.`location_c` AS `location_c`,
							(select coalesce(date_format(max(`appointments`.`scheduledstarttime_c`),"%d %b %Y  %H:%i"),"Not Yet Set")
							FROM (`appointments` join `appointmentstatuses` on((`appointmentstatuses`.`id` = `appointments`.`refappointmentstatusesid_c`))) where ((`appointments`.`refappwithid_c` = `doctorid`) and (`appointments`.`refappfromid_c` = `patientuserid`) and (`appointmentstatuses`.`appointmentstatuses_c` = "completed"))) AS `date` 
							from (((`favoritedocterbypatients` join `patients` on((`patients`.`id` = `favoritedocterbypatients`.`reffavdocbypatpatientsid_c`))) join `users` on((`users`.`id` = `patients`.`repatientsuserid_c`))) left join `address` on((`users`.`refaddresshome1_c` = `address`.`id`)))
							where `favoritedocterbypatients`.`reffavdocbypatdoctorsid_c` = $id) as tbl
						left join corporatemembers on corporatemembers.iohid_c = tbl.patientuserid
						left join corporates on corporatemembers.refcorporateid_c = corporates.id
						ORDER BY corporatename_c desc'
	),
    "patientappointments" => array(
    		"variables"=>array("puserid","whereclause"),
        	"query"=> 'select * from (select distinct `appointments`.`id` AS `id`,`appointments`.`refappfromid_c` AS `userid`,concat(ucase(left(`appointments`.`consultationmode_c`,1)),substr(`appointments`.`consultationmode_c`,2)) AS `mode`,(case lcase(`appointments`.`consultationmode_c`) when "online" then "Home" else concat(ucase(left(`appointments`.`consultationmode_c`,1)),substr(`appointments`.`consultationmode_c`,2)) end) AS `Place`,`appointments`.`refappwithid_c` AS `refappwithid_c`,`doctors`.`refdoctorsid_c` AS `druserid_c`,`appointments`.`scheduledstarttime_c` AS `dateandtime_dateformate`,date_format(`appointments`.`scheduledstarttime_c`,"%d %b %Y %H:%i") AS `DateAndTime`,`appointments`.`status_c` AS `status`,coalesce((select `address`.`phone_c` from `address` where (`address`.`id` = (select `doctorclinics`.`refclinicaddressid_c` from `doctorclinics` where (`doctorclinics`.`refdoctorclinicdoctorid_c` = `appointments`.`refappwithid_c`) limit 1)) limit 1),"No Information provided") AS `doctornumber`,(case `appointments`.`refappwithid_c` when -(1) then (select concat("Dr. ",`outsidedoctors`.`name_c`) from `outsidedoctors` where (`outsidedoctors`.`refappointment_c` = `appointments`.`id`)) else (select concat("Dr. ",trim(`users`.`Firstname_c`)," ",trim(`users`.`lastname_c`)) from `users` where (`users`.`id` = (select `doctors`.`refdoctorsid_c` from `doctors` where (`doctors`.`id` = `appointments`.`refappwithid_c`)))) end) AS `docnm`,(select `appointmentstatuses`.`appointmentstatuses_c` from `appointmentstatuses` where (`appointmentstatuses`.`id` = `appointments`.`refappointmentstatusesid_c`)) AS `Appointmentstatus`,`incidents`.`incidentsname_c` AS `incidentsname_c`,"Home" AS `appointmnetplace`,coalesce(`patientprescriptionsnapshots`.`pdfpath_c`,"Informationnotyetfilled") AS `archiveprescriptionpath`,coalesce(`patientarchivereportsspanshots`.`path_c`,"Informationnotyetfilled") AS `reportpath` from (((((`appointments` join `incidents` on((`appointments`.`refincidentid_c` = `incidents`.`id`))) left join `doctors` on((`appointments`.`refappwithid_c` = `doctors`.`id`))) left join `billingconsultationmodes` on((`billingconsultationmodes`.`id` = `appointments`.`refmode_c`))) left join `patientprescriptionsnapshots` on((`patientprescriptionsnapshots`.`refappointmentidforprescriptionsnapshots_c` = `appointments`.`id`))) left join `patientarchivereportsspanshots` on((`patientarchivereportsspanshots`.`refarchiveappointmentid_c` = `appointments`.`id`))) where appointments.refappfromid_c = $puserid) as tbl '
	),
	"completedtestbydiagnosticlab" =>array(
		"variables" => array("puserid"),
		"query" => 'select distinct(`selforderedtests`.`requisitionno`) AS `requisitionno`,
				coalesce(concat("Dr. ", users.Firstname_c," ",users.lastname_c), `selforderedtests`.`doctorname`) AS `doctorname`,
				`selforderedtests`.`centername` AS `centername`,
				`selforderedtests`.`patientuserid` AS `patientsuserid`,
				`patients`.`id` AS `patientid`,
				`selforderedtests`.`date` AS `date`,
				`selforderedtests`.`pathologistname` AS `pathologistname`,
				`selforderedtests`.`status` AS `status`,
				`selforderedtests`.`deliverydate` AS `deliverydate`,
				`selforderedtests`.`pname` AS `pname`,
				`selforderedtests`.`tests` AS `tests`,
				`selforderedtests`.`appid` AS `appid`,
				`selforderedtests`.`rejectreason` AS `rejectreason` 
				from ((select distinct(`ot`.`diagnosticlabsorderid_c`) AS `requisitionno`,
				     coalesce(`tests`(`ot`.`diagnosticlabsorderid_c`),"Not Found") AS `tests`,
				    concat(`u`.`Firstname_c`," ",`u`.`lastname_c`) AS `pname`,
				    `u`.`id` AS `patientuserid`,"Self" AS `doctorname`,
				    coalesce(`p`.`nameofcenter_c`,"NA") AS `centername`,
				    coalesce(`p`.`nameofcenter_c`,"NA") AS `pathologistname`,
				    coalesce(date_format(`do`.`orderdate_c`,"%d-%m-%Y"),"NA") AS `date`,
				    coalesce(`do`.`status_c`,"NA") AS `status`,
				    coalesce(date_format(`do`.`deliverydate_c`,"%d-%m-%Y"),"Not Set") AS `deliverydate`,
				    "Not Found" AS `appid`,
				    coalesce(`do`.`rejectreason_c`,"Not specified") AS `rejectreason` 
				    from (((`orderedtests` `ot` 
				    join `users` `u` on((`ot`.`customeruserid_c` = `u`.`id`))) 
				    join `diagnosticlabsorders` `do` on((`ot`.`diagnosticlabsorderid_c` = `do`.`id`))) 
				    join `pathologists` `p` on((`do`.`refdiaglabsorderspathologistsid_c` = `p`.`id`))) where u.id = $puserid) as `selforderedtests` 
				join `patients` on((`patients`.`repatientsuserid_c` = `selforderedtests`.`patientuserid`))) 
       left join recommendedtests on refrecomtestdiaglabsordersid_c = `selforderedtests`.`requisitionno`
       left join appointments on recommendedtests.refrecomtestappointmentsid_c = appointments.id
       left join doctors on appointments.refappwithid_c = doctors.id
       left join users on doctors.refdoctorsid_c = users.id
       '
	),
	"diagnosticorders" =>array(
		"variables" => array("puserid","status"),
		"query" => 'select * from (select `selforderedtests`.`requisitionno` AS `requisitionno`,
				`selforderedtests`.`doctorname` AS `doctorname`,
				`selforderedtests`.`centername` AS `centername`,
				`selforderedtests`.`patientuserid` AS `patientsuserid`,
				`patients`.`id` AS `patientid`,
				`selforderedtests`.`date` AS `date`,
				`selforderedtests`.`pathologistname` AS `pathologistname`,
				`selforderedtests`.`status` AS `status`,
				`selforderedtests`.`deliverydate` AS `deliverydate`,
				`selforderedtests`.`pname` AS `pname`,
				`selforderedtests`.`tests` AS `tests`,
				`selforderedtests`.`appid` AS `appid`,
				`selforderedtests`.`rejectreason` AS `rejectreason` 
				from ((select `ot`.`diagnosticlabsorderid_c` AS `requisitionno`,
				     coalesce(`tests`(`ot`.`diagnosticlabsorderid_c`),"Not Found") AS `tests`,
				    concat(`u`.`Firstname_c`," ",`u`.`lastname_c`) AS `pname`,
				    `u`.`id` AS `patientuserid`,"Self" AS `doctorname`,
				    coalesce(`ot`.`testid_c`,"NA") AS `testid`,
				    coalesce(`p`.`nameofcenter_c`,"NA") AS `centername`,
				    coalesce(`p`.`nameofcenter_c`,"NA") AS `pathologistname`,
				    coalesce(date_format(`do`.`orderdate_c`,"%d-%m-%Y"),"NA") AS `date`,
				    coalesce(`do`.`status_c`,"NA") AS `status`,
				    coalesce(date_format(`do`.`deliverydate_c`,"%d-%m-%Y"),"Not Set") AS `deliverydate`,
				    "Not Found" AS `appid`,
				    coalesce(`do`.`rejectreason_c`,"Not specified") AS `rejectreason` 
				    from (((`orderedtests` `ot` 
				    join `users` `u` on((`ot`.`customeruserid_c` = `u`.`id`))) 
				    join `diagnosticlabsorders` `do` on((`ot`.`diagnosticlabsorderid_c` = `do`.`id`))) 
				    join `pathologists` `p` on((`do`.`refdiaglabsorderspathologistsid_c` = `p`.`id`))) where u.id = $puserid) as `selforderedtests` 
				join `patients` on((`patients`.`repatientsuserid_c` = `selforderedtests`.`patientuserid`))) 
				union 
				select `recommendedorders`.`requisitionno` AS `requisitionno`,
				coalesce(`recommendedorders`.`doctorname`,"Not Found") AS `doctorname`,
				coalesce(`recommendedorders`.`centername`,"Not found") AS `centername`,
						`recommendedorders`.`patientuserid` AS `patientsuserid`,
						`patients`.`id` AS `patientid`,
				coalesce(`recommendedorders`.`date`,"Not specified") AS `date`,
				`recommendedorders`.`pathologistname` AS `pathologistname`,
				coalesce(`recommendedorders`.`status`,"Not specified") AS `status`,
				coalesce(`recommendedorders`.`deliverydate`,"Not specified") AS `deliverydate`,				
				`recommendedorders`.`pname` AS `pname`,
				coalesce(`recommendedorders`.`tests`,"Not found") AS `tests`,
				`recommendedorders`.`appid` AS `appid`,
				coalesce(`recommendedorders`.`rejectreason`,"Not Specified") AS `rejectreason` 
				from ((select `rt`.`refrecomtestdiaglabsordersid_c` AS `requisitionno`,
				    `tests`(`rt`.`refrecomtestdiaglabsordersid_c`) AS `tests`,
				    `patientappointments`.`pname` AS `pname`,
				    `patientappointments`.`puid` AS `patientuserid`,
				    concat(`dusers`.`Firstname_c`," ",`dusers`.`lastname_c`) AS `doctorname`,
				    `rt`.`refrecomtestrecommtestid_c` AS `testid`,
				    `pth`.`nameofcenter_c` AS `centername`,
				    `pth`.`nameofcenter_c` AS `pathologistname`,
				    date_format(`do`.`orderdate_c`,"%d-%m-%Y") AS `date`,
				    `do`.`status_c` AS `status`,
				    date_format(`do`.`deliverydate_c`,"%d-%m-%Y") AS `deliverydate`,
				    `patientappointments`.`paid` AS `appid`,
				    `do`.`rejectreason_c` AS `rejectreason` 
				    from ((((((select `patients`.`id` AS `puid`,
					`ap`.`id` AS `paid`,
					`ap`.`refappwithid_c` AS `did`,
					concat(`patients`.`Firstname_c`," ",`patients`.`lastname_c`) AS `pname` 
					from (`appointments` `ap` 
					join `users` `patients` on((`ap`.`refappfromid_c` = `patients`.`id`))) where patients.id = $puserid)as `patientappointments` 
				    join `doctors` on((`patientappointments`.`did` = `doctors`.`id`))) 
				    join `users` `dusers` on((`dusers`.`id` = `doctors`.`refdoctorsid_c`))) 
				    join `recommendedtests` `rt` on((`rt`.`refrecomtestappointmentsid_c` = `patientappointments`.`paid`))) 
				    join `diagnosticlabsorders` `do` on((`do`.`id` = `rt`.`refrecomtestdiaglabsordersid_c`))) 
				    join `pathologists` `pth` on((`pth`.`id` = `do`.`refdiaglabsorderspathologistsid_c`)))) as `recommendedorders` 
				join `patients` on((`patients`.`repatientsuserid_c` = `recommendedorders`.`patientuserid`)))) as tbl where status in ($status) '
	),
	"adminpathologisttest" =>array(
		"variables" => array("status","where"),
		"query" => 'select distinct date as date,
				`patients`.`id` AS `patientid`,
				concat(CONCAT(UCASE(LEFT(`users`.`Firstname_c`, 1)),LCASE(SUBSTRING(`users`.`Firstname_c`, 2)))," ",CONCAT(UCASE(LEFT(`users`.`lastname_c`, 1)),LCASE(SUBSTRING(`users`.`lastname_c`, 2)))) AS `patientname`,
				coalesce(`users`.`mobileno1_c`,"NA") AS `patientmobilenumber`,
				`users`.`id` AS `patientuserid`,
				requisitionno,
				coalesce((select concat("Dr. ", `path`.`Firstname_c`," ",`path`.`lastname_c`) from users as `path` where id = (select distinct(`orderedtests`.`refdoctoruserid_c`) limit 1)),"Self") as `DoctorName`,
				"normal" AS `priorityrequest`,
				(select concat(CONCAT(UCASE(LEFT(`users`.`Firstname_c`, 1)),LCASE(SUBSTRING(`users`.`Firstname_c`, 2)))," ",CONCAT(UCASE(LEFT(`users`.`lastname_c`, 1)),LCASE(SUBSTRING(`users`.`lastname_c`, 2)))) from users where id = (select refpathologistsuserid_c from pathologists where id = pathologistid)) as lab, 
				`tests`,
				`pathologistid`,
				coalesce(`status`,"Not Specified") as status,
				coalesce(`deliverydate`,"Not Specified") as deliverydate,
				coalesce(`rejectreason`,"NA") as rejectreason 
				 from (select 
						distinct date_format(`diagnosticlabsorders`.`orderdate_c`,"%d %b %Y") AS `date`,  
						diagnosticlabsorders.id as requisitionno,  
						`diagnosticlabsorders`.`refdiaglabsorderspathologistsid_c` AS `pathologistid`,
						coalesce(`orderedtestsname`(`diagnosticlabsorders`.`id`),"NA") AS `tests`,
						date_format(`diagnosticlabsorders`.`deliverydate_c`,"%a %d %M %Y") AS `deliverydate`,
						`diagnosticlabsorders`.`rejectreason_c` AS `rejectreason` ,
						diagnosticlabsorders.status_c as status
						from diagnosticlabsorders
						join pathologists on pathologists.id = diagnosticlabsorders.refdiaglabsorderspathologistsid_c
						join users on users.id = pathologists.refpathologistsuserid_c
						where activationstatus_c = "active" and diagnosticlabsorders.status_c in ($status) $where ) as orders
				join `orderedtests` on `orderedtests`.`diagnosticlabsorderid_c` = `orders`.`requisitionno`
				join `users` on `users`.`id` = `orderedtests`.`customeruserid_c`
				join `patients` on `patients`.`repatientsuserid_c` = `users`.`id`

				order by requisitionno  desc'
	),
	"pathologisttestReqRej" =>array(
		"variables" => array("pid","status"),
		"query" => 'select distinct date as date,
				`patients`.`id` AS `patientid`,
				concat(`users`.`Firstname_c`," ",`users`.`lastname_c`) AS `patientname`,
				coalesce(`users`.`mobileno1_c`,"NA") AS `patientmobilenumber`,
				`users`.`id` AS `patientuserid`,
				requisitionno,
				coalesce((select concat("Dr. ", `path`.`Firstname_c`," ",`path`.`lastname_c`) from users as `path` where id = (select distinct(`orderedtests`.`refdoctoruserid_c`) limit 1)),"Self") as `DoctorName`,
				"normal" AS `priorityrequest`,
				concat("---- Ord Date   :",coalesce(date," "),"---- Requested :",coalesce(reqdate,"")) AS alldates,
				concat("----",`users`.`Firstname_c`," ",`users`.`lastname_c`,"----",coalesce((select concat("Dr. ", `path`.`Firstname_c`," ",`path`.`lastname_c`) from users as `path` where id = (select distinct(`orderedtests`.`refdoctoruserid_c`) limit 1)),"Self") ) as names,
				cashflag AS cashflag,
				`tests`,
				`ordervalue`,
				`pathologistid`,
				coalesce(`status`,"Not Specified") as status,
				coalesce(`deliverydate`,"Not Specified") as deliverydate,
				coalesce(`editreason`,"NA") as editreason,
				coalesce(`rejectreason`,"NA") as rejectreason 
				 from (select 
				    date_format(`diagnosticlabsorders`.`orderdate_c`,"%d %b %Y") AS `date`,  
					date_format(`diagnosticlabsorders`.`orderrequestdate_c`,"%d %b %Y") AS `reqdate`,
					date_format(`diagnosticlabsorders`.`sampleCollectionDate_c`,"%d %b %Y") AS `sampledate`,
					date_format(`diagnosticlabsorders`.`orderexecutiondate_c`,"%d %b %Y") AS `execdate`,
					diagnosticlabsorders.id as requisitionno,  
				   `diagnosticlabsorders`.`refdiaglabsorderspathologistsid_c` AS `pathologistid`,
				    coalesce(`orderedtestsname`(`diagnosticlabsorders`.`id`,`diagnosticlabsorders`.`refdiaglabsorderspathologistsid_c`),"NA") AS `tests`,
					coalesce(`orderedtestvalue`(`diagnosticlabsorders`.`id`),"NA") AS `ordervalue`,
				    date_format(`diagnosticlabsorders`.`deliverydate_c`,"%d %b %Y") AS `deliverydate`,
				    `diagnosticlabsorders`.`rejectreason_c` AS `rejectreason` ,
				    `diagnosticlabsorders`.`editreason_c` AS `editreason` ,
					`diagnosticlabsorders`.`cashpaymentflag_c` AS `cashflag`,
				    diagnosticlabsorders.status_c as status
				from diagnosticlabsorders where diagnosticlabsorders.refdiaglabsorderspathologistsid_c = $pid and diagnosticlabsorders.status_c in ($status) ) as orders
				join `orderedtests` on `orderedtests`.`diagnosticlabsorderid_c` = `orders`.`requisitionno`
				join `users` on `users`.`id` = `orderedtests`.`customeruserid_c`
				join `patients` on `patients`.`repatientsuserid_c` = `users`.`id`'
	),
	"pathologisttestInprocEdit" =>array(
		"variables" => array("pid","status"),
		"query" => 'select distinct date as date,
				`patients`.`id` AS `patientid`,
				concat(`users`.`Firstname_c`," ",`users`.`lastname_c`) AS `patientname`,
				coalesce(`users`.`mobileno1_c`,"NA") AS `patientmobilenumber`,
				`users`.`id` AS `patientuserid`,
				requisitionno,
				coalesce((select concat("Dr. ", `path`.`Firstname_c`," ",`path`.`lastname_c`) from users as `path` where id = (select distinct(`orderedtests`.`refdoctoruserid_c`) limit 1)),"Self") as `DoctorName`,
				"normal" AS `priorityrequest`,
				concat("---- Ord Date  :",coalesce(date," "),"---- Acpt Date :",coalesce(reqdate,"")) AS alldates,
				concat("----",`users`.`Firstname_c`," ",`users`.`lastname_c`,"----",coalesce((select concat("Dr. ", `path`.`Firstname_c`," ",`path`.`lastname_c`) from users as `path` where id = (select distinct(`orderedtests`.`refdoctoruserid_c`) limit 1)),"Self") ) as names,
				cashflag AS cashflag,
				`tests`,
				`ordervalue`,
				`pathologistid`,
				coalesce(`status`,"Not Specified") as status,
				coalesce(`deliverydate`,"Not Specified") as deliverydate,
				coalesce(`editreason`,"NA") as editreason,
				coalesce(`rejectreason`,"NA") as rejectreason 
				 from (select 
				    date_format(`diagnosticlabsorders`.`orderdate_c`,"%d %b %Y") AS `date`,  
					date_format(`diagnosticlabsorders`.`orderrequestdate_c`,"%d %b %Y") AS `reqdate`,
					date_format(`diagnosticlabsorders`.`sampleCollectionDate_c`,"%d %b %Y") AS `sampledate`,
					date_format(`diagnosticlabsorders`.`orderexecutiondate_c`,"%d %b %Y") AS `execdate`,
					diagnosticlabsorders.id as requisitionno,  
				   `diagnosticlabsorders`.`refdiaglabsorderspathologistsid_c` AS `pathologistid`,
				    coalesce(`orderedtestsname`(`diagnosticlabsorders`.`id`,`diagnosticlabsorders`.`refdiaglabsorderspathologistsid_c`),"NA") AS `tests`,
					coalesce(`orderedtestvalue`(`diagnosticlabsorders`.`id`),"NA") AS `ordervalue`,
				    date_format(`diagnosticlabsorders`.`deliverydate_c`,"%d %b %Y") AS `deliverydate`,
				    `diagnosticlabsorders`.`rejectreason_c` AS `rejectreason` ,
				    `diagnosticlabsorders`.`editreason_c` AS `editreason` ,
					`diagnosticlabsorders`.`cashpaymentflag_c` AS `cashflag`,
				    diagnosticlabsorders.status_c as status
				from diagnosticlabsorders where diagnosticlabsorders.refdiaglabsorderspathologistsid_c = $pid and diagnosticlabsorders.status_c in ($status) ) as orders
				join `orderedtests` on `orderedtests`.`diagnosticlabsorderid_c` = `orders`.`requisitionno`
				join `users` on `users`.`id` = `orderedtests`.`customeruserid_c`
				join `patients` on `patients`.`repatientsuserid_c` = `users`.`id`'
	),
	"pathologisttestComp" =>array(
		"variables" => array("pid","status"),
		"query" => 'select distinct date as date,
				`patients`.`id` AS `patientid`,
				concat(`users`.`Firstname_c`," ",`users`.`lastname_c`) AS `patientname`,
				coalesce(`users`.`mobileno1_c`,"NA") AS `patientmobilenumber`,
				`users`.`id` AS `patientuserid`,
				requisitionno,
				coalesce((select concat("Dr. ", `path`.`Firstname_c`," ",`path`.`lastname_c`) from users as `path` where id = (select distinct(`orderedtests`.`refdoctoruserid_c`) limit 1)),"Self") as `DoctorName`,
				"normal" AS `priorityrequest`,
				concat("---- Ord Date :",coalesce(date," "),"---- Acpt Date :",coalesce(reqdate,""),"---- Sample Collection :",coalesce(sampledate,""),"---- Execution :",coalesce(execdate,"")) AS alldates,
				concat("----",`users`.`Firstname_c`," ",`users`.`lastname_c`,"----",coalesce((select concat("Dr. ", `path`.`Firstname_c`," ",`path`.`lastname_c`) from users as `path` where id = (select distinct(`orderedtests`.`refdoctoruserid_c`) limit 1)),"Self") ) as names,
				cashflag AS cashflag,
				`tests`,
				`ordervalue`,
				`pathologistid`,
				coalesce(`status`,"Not Specified") as status,
				coalesce(`deliverydate`,"Not Specified") as deliverydate,
				coalesce(`editreason`,"NA") as editreason,
				coalesce(`rejectreason`,"NA") as rejectreason 
				 from (select 
				    date_format(`diagnosticlabsorders`.`orderdate_c`,"%d %b %Y") AS `date`,  
					date_format(`diagnosticlabsorders`.`orderrequestdate_c`,"%d %b %Y") AS `reqdate`,
					date_format(`diagnosticlabsorders`.`sampleCollectionDate_c`,"%d %b %Y") AS `sampledate`,
					date_format(`diagnosticlabsorders`.`orderexecutiondate_c`,"%d %b %Y") AS `execdate`,
					diagnosticlabsorders.id as requisitionno,  
				   `diagnosticlabsorders`.`refdiaglabsorderspathologistsid_c` AS `pathologistid`,
				    coalesce(`orderedtestsname`(`diagnosticlabsorders`.`id`,`diagnosticlabsorders`.`refdiaglabsorderspathologistsid_c`),"NA") AS `tests`,
					coalesce(`orderedtestvalue`(`diagnosticlabsorders`.`id`),"NA") AS `ordervalue`,
				    date_format(`diagnosticlabsorders`.`deliverydate_c`,"%d %b %Y") AS `deliverydate`,
				    `diagnosticlabsorders`.`rejectreason_c` AS `rejectreason` ,
				    `diagnosticlabsorders`.`editreason_c` AS `editreason` ,
					`diagnosticlabsorders`.`cashpaymentflag_c` AS `cashflag`,
				    diagnosticlabsorders.status_c as status
				from diagnosticlabsorders where diagnosticlabsorders.refdiaglabsorderspathologistsid_c = $pid and diagnosticlabsorders.status_c in ($status) ) as orders
				join `orderedtests` on `orderedtests`.`diagnosticlabsorderid_c` = `orders`.`requisitionno`
				join `users` on `users`.`id` = `orderedtests`.`customeruserid_c`
				join `patients` on `patients`.`repatientsuserid_c` = `users`.`id`
				order by requisitionno desc'
	),
	"orderstosync" =>array(
		"variables" => array("pathid","status"),
		"query" => 'select 
					distinct(orderid),
					date,
					status,
					pathid,
					customeruserid_c as userid
					from 
					(
						select 
							id as orderid,
							orderdate_c as date, 
							status_c as status,
							refdiaglabsorderspathologistsid_c as pathid
						from 
						diagnosticlabsorders where status_c in ("requested") and issynched_c=0
					) as orders
					join orderedtests on orders.orderid = orderedtests.diagnosticlabsorderid_c
					where pathid = $pathid'
	),
	"IPDpatientsService" =>array(
		"variables" => array("caseno","admitdate","dischargedate","patid"),
		"query" => 'select C.patid as patid,C.amt as amt,C.tdate as tdate,C.testname as testname,C.refid as refid,C.rcptno as rcptno,C.pdffilename as pdffilename,C.quantity as quantity, C.totalamt as totalamt,C.flag as flag,C.sortdate as sortdate, C.sortdatetime as sortdatetime,C.testid as testid,C.wardid as wardid 
					from (
							select receipts.refRCPTuserid_c as patid, 
									receipts.amount_c as amt,
									date_format(receipts.createdon_c,"%d %b %Y") as tdate,
									receipts.extradesc_c as testname,
									receipts.caseregno_c as refid,
									receipts.rcptid_c as rcptno,
									files.filename_c as pdffilename,
									1 as quantity,
									receipts.amount_c as totalamt,
									"RCPT" as flag,
									STR_TO_DATE(receipts.createdon_c,"%Y-%m-%d %H:%i:%s") as sortdate ,
									STR_TO_DATE(receipts.createdon_c,"%Y-%m-%d %H:%i:%s") as sortdatetime,
									"" as testid,
									"" as wardid		
							from receipts left join files on (receipts.reffileid_c = files.id)
							where receipts.caseregno_c = "$caseno" and
								receipts.refRCPTuserid_c = $patid 
							Union
							select  orderedtests.customeruserid_c as patid,
								orderedtests.rate_c as amt,
								date_format(orderedtests.createdon_c,"%d %b %Y") as tdate,
								testmasters.testname_c  as testname,
								"" as refid,
								"" as rcptno,
								"" as pdffilename,
								1 as quantity,
								orderedtests.rate_c as totalamt,
								"CHARGE" as flag,
								STR_TO_DATE(orderedtests.createdon_c,"%Y-%m-%d %H:%i:%s") as sortdate,
								STR_TO_DATE(orderedtests.createdon_c,"%Y-%m-%d %H:%i:%s") as sortdatetime,
								"" as testid,
								"" as wardid												
							from orderedtests,testmasters
							where orderedtests.testid_c = testmasters.id and
								orderedtests.caseregno_c = "$caseno" and
								orderedtests.customeruserid_c = $patid
							Union
							select ipdwardcharges.refpatientuserid_c as patid,
									ipdwardcharges.rate_c as amt,
									ipdwardcharges.chrgdate_c as tdate,
									testmasters.testname_c as testname,
									"" as refid,
									"" as rcptno,
									"" as pdffilename,
									ipdwardcharges.quantity_c as quantity,
									ipdwardcharges.amount_c as totalamt,
									"CHARGE" as flag,
									STR_TO_DATE(ipdwardcharges.chrgdate_c,"%d %b %Y") as sortdate ,
									STR_TO_DATE(ipdwardcharges.createdon_c,"%Y-%m-%d %H:%i:%s") as sortdatetime,
									ipdwardcharges.reftestid_c as testid,
									ipdwardcharges.refwardsid_c as wardid
							from ipdwardcharges,testmasters
							where ipdwardcharges.reftestid_c =testmasters.id and
								ipdwardcharges.refpatientuserid_c = $patid and 
								ipdwardcharges.caseregno_c = "$caseno"
							) as C
							order by C.sortdate,C.sortdatetime Asc'
		),
		"hospbillrcpt" =>array(
		"variables" => array("caseno","patientuserid","hospitaluserid","staffid"),
		"query" => 'select A.accountcode as accountcode, A.accountuserid as accountuserid,A.accountuseridto as accountuseridto,
							A.statementcode as statementcode, A.transdate as transdate, A.amount as amount,A.credit as credit,A.debit as debit,
							A.transtype as transtype,A.billno as billno,A.bedid as bedid,A.billcaseno as billcaseno, A.rcptno as rcptno,
							A.rcptcaseno as rcptcaseno, A.cashflag as cashflag, A.rcptpdffilename as rcptpdffilename,
							A.billpdffilename as billpdffilename, A.sortdatetime as sortdatetime
					from
					(	select accountcode_c as accountcode,
						accountuserid_c as accountuserid,
						accountuseridto_c as accountuseridto,
						"Running" as statementcode,
						ipdpatients.admitdate_c AS transdate,
						"-" AS amount,
						creditedamount_c as credit, 
						debitedamount_c as debit,
						"IPD" as transtype,
						"Running" as billno,
						ipdpatients.refbedid_c as bedid,
						"-" as billcaseno,
						"-" as rcptno,
						"-" as rcptcaseno,
						1 as cashflag,
						" " as rcptpdffilename,
						" " as billpdffilename,
						STR_TO_DATE(now(),"%Y-%m-%d %H:%i:%s") as sortdatetime
					from cashaccounts,ipdpatients
					where  cashaccounts.accountuserid_c = ipdpatients.refpatientuserid_c and 
							ipdpatients.status_c = "admitted" and
							cashaccounts.accountuserid_c = $patientuserid and 
							cashaccounts.caseregno_c = "$caseno" and 
							cashaccounts.accountuseridto_c = $hospitaluserid and active_c = 1
					UNION
					select billingstatements.accountcode_c AS accountcode,
						billingstatements.accountuserid_c AS accountuserid,
						"" as accountuseridto,
						billingstatements.statementcode_c AS statementcode,
						DATE_FORMAT(billingstatements.updateddate_c,"%d %b %Y") AS transdate,
						billingstatements.ammount_c AS amount,
						billingstatements.credit_c AS credit,
						billingstatements.debit_c AS debit,
						"Others" AS transtype,
						"-" AS billno,
						"-" as bedid,						
						"-" as billcaseno,
						receipts.rcptid_c rcptno,
						receipts.caseregno_c as rcptcaseno,
						billingstatements.cashpaymentflag_c AS cashflag	,
						files.filename_c as rcptpdffilename,
						files.filename_c as billpdffilename,
						STR_TO_DATE(billingstatements.createdon_c,"%Y-%m-%d %H:%i:%s") as sortdatetime
					from ((billingstatements left join receipts on (receipts.refRCPTuserid_c= billingstatements.accountuserid_c  and
									receipts.statementcode_c = billingstatements.statementcode_c))
						left join files on (receipts.reffileid_c =files.id))
					where receipts.caseregno_c = "OTHER0000000000" and
							billingstatements.accountuserid_c = $patientuserid
					UNION
					select billingstatements.accountcode_c AS accountcode,
						billingstatements.accountuserid_c AS accountuserid,
						"" as accountuseridto,
						billingstatements.statementcode_c AS statementcode,
						DATE_FORMAT(billingstatements.updateddate_c,"%d %b %Y") AS transdate,
						billingstatements.ammount_c AS amount,
						billingstatements.credit_c AS credit,
						billingstatements.debit_c AS debit,
						"IPD" AS transtype,
						"-" AS billno,
						"-" as bedid,						
						"-" as billcaseno,
						receipts.rcptid_c rcptno,
						receipts.caseregno_c as rcptcaseno,
						billingstatements.cashpaymentflag_c AS cashflag	,
						files.filename_c as rcptpdffilename,
						files.filename_c as billpdffilename,
						STR_TO_DATE(billingstatements.createdon_c,"%Y-%m-%d %H:%i:%s") as sortdatetime
					from ((billingstatements left join receipts on (receipts.refRCPTuserid_c= billingstatements.accountuserid_c  and
									receipts.statementcode_c = billingstatements.statementcode_c))
						left join files on (receipts.reffileid_c =files.id))
					where receipts.caseregno_c != "OTHER0000000000" and
							billingstatements.accountuserid_c = $patientuserid
					UNION
					select billingstatements.accountcode_c AS accountcode,
						billingstatements.accountuserid_c AS accountuserid,
						"" as accountuseridto,
						billingstatements.statementcode_c AS statementcode,
						DATE_FORMAT(billingstatements.updateddate_c,"%d %b %Y") AS transdate,
						billingstatements.ammount_c AS amount,
						billingstatements.credit_c AS credit,
						billingstatements.debit_c AS debit,
						"IPD" AS transtype,
						bills.billid_c AS billno,
						"-" as bedid,						
						bills.caseregno_c as billcaseno,
						"-" as rcptno,
						"-" as rcptcaseno,
						billingstatements.cashpaymentflag_c AS cashflag	,
						files.filename_c as rcptpdffilename,
						files.filename_c as billpdffilename,
						STR_TO_DATE(billingstatements.createdon_c,"%Y-%m-%d %H:%i:%s") as sortdatetime
					from ((billingstatements left join bills on (bills.refpatuserid_c = billingstatements.accountuserid_c  and
									bills.statementcode_c = billingstatements.statementcode_c))
						left join files on (bills.reffileid_c =files.id))
					where bills.caseregno_c != "$caseno" and
							billingstatements.accountuserid_c = $patientuserid
					UNION
					select billingstatements.accountcode_c AS accountcode,
						billingstatements.accountuserid_c AS accountuserid,
						bills.refbillsuserid_c as accountuseridto,						
						billingstatements.statementcode_c AS statementcode,
						DATE_FORMAT(billingstatements.updateddate_c,"%d %b %Y") AS transdate,
						billingstatements.ammount_c AS amount,
						billingstatements.credit_c AS credit,
						receipts.amount_c AS debit,
						"OPD" AS transtype,
						IFNULL(bills.billid_c,"-") billno,
						"-" as bedid,						
						IFNULL(bills.caseregno_c,"-") as billcaseno,
						IFNULL(receipts.rcptid_c,"-") rcptno,
						IFNULL(receipts.caseregno_c,"-") as rcptcaseno,
						billingstatements.cashpaymentflag_c AS cashflag	,
						(select files.filename_c from files where files.id = receipts.reffileid_c) as rcptpdffilename,
						files.filename_c as billpdffilename,
						STR_TO_DATE(bills.createdon_c,"%Y-%m-%d %H:%i:%s") as sortdatetime
					from ((bills left join billingstatements on 
						( bills.refpatuserid_c = billingstatements.accountuserid_c   and
							bills.statementcode_c = billingstatements.statementcode_c))
						left join receipts on (receipts.billstatementcode_c= billingstatements.statementcode_c))
						left join files on (bills.reffileid_c = files.id)
					where ISNULL(receipts.caseregno_c) and
							ISNULL(bills.caseregno_c) and
							billingstatements.accountuserid_c = $patientuserid and 
							billingstatements.accountcodefrom_c in (
								select billingaccounts.accountcode_c
								from billingaccounts,favoritestaffbydoctors,doctors
								where  billingaccounts.refaccountuserid_c = doctors.refdoctorsid_c and 
										doctors.id = favoritestaffbydoctors.reffavdoctorid and
										favoritestaffbydoctors.reffavstaffid = $staffid )) as A
					order by A.sortdatetime Desc'
		)
);
