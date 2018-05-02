<?php defined('SYSPATH') or die('No direct script access.');
class Model_Upcomingappointment extends kohana_Ayushmanorm {
	protected $_table_name = 'upcomingappointments';
}


/*

  delimiter $$

  CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `patientappointments` AS
    select distinct `appointments`.`id` AS `id`,
    `appointments`.`refappfromid_c` AS `userid`,
    concat(ucase(left(`appointments`.`consultationmode_c`,1)),substr(`appointments`.`consultationmode_c`,2)) AS `mode`,
    (case lcase(`appointments`.`consultationmode_c`) when 'online' then 'Home' else concat(ucase(left(`appointments`.`consultationmode_c`,1)),substr(`appointments`.`consultationmode_c`,2)) end) AS `Place`,
    `appointments`.`refappwithid_c` AS `refappwithid_c`,
    `doctors`.`refdoctorsid_c` AS `druserid_c`,
    `appointments`.`displaytime_c` AS `dateandtime_dateformate`,
    date_format(`appointments`.`displaytime_c`,'%d %b %Y %H:%i') AS `DateAndTime`
    ,`appointments`.`status_c` AS `status`,
    coalesce((select `address`.`phone_c` from `address` where
      (`address`.`id` = (select `doctorclinics`.`refclinicaddressid_c` from `doctorclinics`
      where (`doctorclinics`.`refdoctorclinicdoctorid_c` = `appointments`.`refappwithid_c`) limit 1)) limit 1),
      'No Information provided') AS `doctornumber`,
    (case `appointments`.`refappwithid_c` when -(1) then
      (select concat('Dr. ',`outsidedoctors`.`name_c`) from `outsidedoctors` where
      (`outsidedoctors`.`refappointment_c` = `appointments`.`id`))
      else (select concat('Dr. ',trim(`users`.`Firstname_c`),' ',trim(`users`.`lastname_c`)) from `users`
      where (`users`.`id` = (select `doctors`.`refdoctorsid_c` from `doctors` where
      (`doctors`.`id` = `appointments`.`refappwithid_c`)))) end) AS `docnm`,
      (select `appointmentstatuses`.`appointmentstatuses_c` from `appointmentstatuses` where
      (`appointmentstatuses`.`id` = `appointments`.`refappointmentstatusesid_c`)) AS
      `Appointmentstatus`,`incidents`.`incidentsname_c` AS `incidentsname_c`,'Home' AS `appointmnetplace`,
      coalesce(`patientprescriptionsnapshots`.`pdfpath_c`,'Informationnotyetfilled') AS `archiveprescriptionpath`,
      coalesce(`patientarchivereportsspanshots`.`path_c`,'Informationnotyetfilled') AS `reportpath` from
      (((((`appointments` join `incidents` on((`appointments`.`refincidentid_c` = `incidents`.`id`))) left join `doctors` on
      ((`appointments`.`refappwithid_c` = `doctors`.`id`))) left join `billingconsultationmodes` on
      ((`billingconsultationmodes`.`id` = `appointments`.`refmode_c`)))
      left join `patientprescriptionsnapshots`
      on((`patientprescriptionsnapshots`.`refappointmentidforprescriptionsnapshots_c` = `appointments`.`id`)))
      left join `patientarchivereportsspanshots` on
      ((`patientarchivereportsspanshots`.`refarchiveappointmentid_c` = `appointments`.`id`)))$$

*/