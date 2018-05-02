/**
 * Created by chetan on 11/11/13.
 */
window.angular.module('app.services')
	 .factory('parameterApi', ['$resource', function($resource) {
		return $resource(
			'/ayushman/cnewtracksheet/saveparametervalue/',
			{},
			{}
		);
    }])
		 // .factory('servicesApi', ['$resource', function($resource) {
		// return $resource(
		// 	'/ayushman/cipdbills/showdocservices/',
		// 	{},
		// 	{}
		// );
  //   }])
	.factory('admittedpatientsApi', ['$resource', function($resource) {
	return $resource(
	    '/ayushman/cipdwardpatient/admittedpatients/',
	    {},
	    {});
    }])
    .factory('orderservicesApi', ['$resource', function($resource) {
	return $resource(
	    '/ayushman/cipdwardpatient/orderservices/',
	    {},
	    {});
    }])
	.factory('orderipdservicesApi', ['$resource', function($resource) {
	return $resource(
	    '/ayushman/ccashierdashboard/orderipdservices/',
	    {},
	    {});
    }])
	.factory('directoryofservicesApi', ['$resource', function($resource) {
	return $resource(
	    '/ayushman/cdirectoryofservices/showdocservices/',
	    {},
	    {});
    }])
	.factory('getdataApi', ['$resource', function($resource) {
		return $resource(
			'/ayushman/newcemrdashboard/getAppData/',
			{},
			{}
		);
    }])
	.factory('examinationAllAppApi', ['$resource', function($resource) {
		return $resource(
			'/ayushman/newcemrdashboard/getExaminationsummary/',
			{},
			{}
		);
    }])
	.factory('loginuserApi', ['$resource', function($resource) {
		return $resource(
			'/ayushman/cconsultation/loginuser',
			{},
			{}
		);
    }])
	.factory('prescripApi', ['$resource', function($resource) {
		return $resource(
			'/ayushman/cpatienthistory/putstatus/',
			{},
			{}
		);
    }])
	 .factory('bookingApi', ['$resource', function($resource) {
		return $resource(
			'/ayushman/cappointmenteditor/bookfollowup/',
			{},
			{}
		);
    }])
	.factory('universaltrackerApi', ['$resource', function($resource) {
		return $resource(
			'/ayushman/cnewtracksheet/universaltracker/',
			{},
			{}
		);
    }])
	 .factory('specialityformApi', ['$resource', function($resource) {
	return $resource(
	    '/ayushman/rest/doctors/specforms.json',
	    {},
	    {});
    }])
    .factory('specialityApi', ['$resource', function($resource) {
	return $resource(
	    '/ayushman/rest/doctors/allspecialities.json',
	    {},
	    {});
    }])
	.factory('specialityformsApi', ['$resource', function($resource) {
	return $resource(
	    '/ayushman/rest/doctors/specialityforms.json/',
	    {},
	    {});
    }])
	.factory('personalizationApi', ['$resource', function($resource) {
		return $resource(
			'/ayushman/rest/doctors/saveselectedforms.json/',
			{},
			{}
		);
    }])
	.factory('historyApi', ['$resource', function($resource) {
		return $resource(
	    '/ayushman/rest/doctors/history.json',
	    {},
	    {});
    }])
	.factory('examApi', ['$resource', function($resource) {
		return $resource(
	    '/ayushman/rest/doctors/examination.json',
	    {},
	    {});
    }])
	.factory('allhistoryApi', ['$resource', function($resource) {
		return $resource(
	    '/ayushman/rest/doctors/allhistory.json',
	    {},
	    {});
    }])
	
	.factory('historyselectApi', ['$resource', function($resource) {
		return $resource(
	    '/ayushman/rest/doctors/historyselectform.json',
	    {},
	    {});
    }])
	
	.factory('personalizationApia', ['$resource', function($resource) {
		return $resource(
			'/ayushman/rest/doctors/saveselectedformsa.json/',
			{},
			{}
		);
    }])

	.factory('medicalProfileApi', ['$resource', function($resource) {
	return $resource(
	    '/ayushman/cpatienthistory/getEmrSnapshot/',
	    {},
	    {});
    }])
    .factory('appointmentInfoApi',['$resource', function($resource) {
		return $resource(
			'/ayushman/cconsultation/getappointmentinfo/',
			{},
			{}
		);
    }])
	.factory('dashboardApi',['$resource', function($resource) {
		return $resource(
			'/ayushman/cconsultation/getpatient/',
			{},
			{}
		);
    }])
    .factory('billdataApi',['$resource', function($resource) {
		return $resource(
			'/ayushman/cconsultation/getbilldata/',
			{},
			{}
		);
    }])
	.factory('myprofileApi',['$resource', function($resource) {
	return $resource(
	    '/ayushman/cconsultation/getmyprofile/',
	    {},
	    {}
	);
    }])
	.factory('docprofileApi',['$resource', function($resource) {
	return $resource(
	    '/ayushman/cconsultation/getdocprofile/',
	    {},
	    {}
	);
    }])
	.factory('myclinicsApi',['$resource', function($resource) {
	return $resource(
	    '/ayushman/cconsultation/getmyclinics/',
	    {},
	    {}
	);
    }])
	.factory('mytemplatesApi',['$resource', function($resource) {
	return $resource(
	    '/ayushman/cconsultation/getmytemplates/',
	    {},
	    {}
	);
    }])
	.factory('inappointmentsApi',['$resource', function($resource) {
	return $resource(
	    '/ayushman/cconsultation/getincompleteappointments/',
	    [{}],
	    [{}]
	);
    }])
	.factory('appointmentsApi',['$resource', function($resource) {
	return $resource(
	    '/ayushman/cconsultation/getappointments/',
	    [{}],
	    [{}]
	);
    }])
	.factory('pastpatappointmentsApi',['$resource', function($resource) {
	return $resource(
	    '/ayushman/cdoctorpastappointments/getdoctorpastappointmentdata/',
	    [{}],
	    [{}]
	);
    }])
	.factory('pastappointmentsApi',['$resource', function($resource) {
	return $resource(
	    '/ayushman/cdoctorpastappointments/getdoctorpastappointments/',
	    [{}],
	    [{}]
	);
    }])
    .factory('notesApi', ['$resource', function($resource) {
	return $resource(
	    '/ayushman/cconsultation/notes/',
	    {},
	    {}
	);
    }])
    .factory('appointmentApi', ['$resource', function($resource) {
	return $resource(
	    '/ayushman/cpatienthistory/appointments/',
	    {},
	    {}
	);
    }])
    .factory('reportApi', ['$resource', function($resource) {
	return $resource(
	    '/ayushman/cpatienthistory/reports/',
	    {},
	    {}
	);
    }])
    .factory('reportDetailsApi', ['$resource', function($resource) {
	return $resource(
	    '/ayushman/cuploadpastvisit/getreportdetails/',
	    {},
	    {}
	);
    }])
    .factory('reportDetailsApiFS', ['$resource', function($resource) {
	return $resource(
	    '/ayushman/cpastreportbysystem/getreportdetails/',
	    {},
	    {}
	);
    }])
    .factory('reportDetailsApiFSForReport', ['$resource', function($resource) {
	return $resource(
	    '/ayushman/cpastreportbysystem/getreportdetailsbyreport/',
	    {},
	    {}
	);
    }])
    .factory('pastAppApi', ['$resource', function($resource) {
	return $resource(
	    '/ayushman/newcemrdashboard/getPastData/',
	    {},
	    {}
	);
    }])
	.factory('PastprescriptionApi', ['$resource', function($resource) {
	return $resource(
	    '/ayushman/newcemrdashboard/getPastprescription/',
	    {},
	    {}
	);
    }])
	.factory('profileApi', ['$resource', function($resource) {
		return $resource(
			'/ayushman/cpatienthistory/profile/',
			{},
			{}
		);
    }])
	.factory('pastAllIncidenceApi', ['$resource', function($resource) {
	return $resource(
	    '/ayushman/newcemrdashboard/getPastAllIncidenceData/',
	    {},
	    {}
	);
    }])
	.factory('pastAllAppApi', ['$resource', function($resource) {
	return $resource(
	    '/ayushman/newcemrdashboard/getPastAllData/',
	    {},
	    {}
	);
    }])
    .factory('formApi', ['$resource', function($resource) {
	return $resource(
	    '/ayushman/cform/getFormData/',
	    {},
	    {}
	);
    }])
		
	.factory('formApia', ['$resource', function($resource) {
	return $resource(
	    '/ayushman/cform/getFormDataa/',
	    {},
	    {}
	);
    }])
	
    .factory('altFormApi', ['$resource', function($resource) {
	return $resource(
	    '/ayushman/assets/forms/examinations/vitals.json',
	    {},
	    {}
	);
    }])
    .factory('examReqApi', ['$resource', function($resource) {
	return $resource(
	    '/ayushman/cconsultation/consultationRequisite/',
	    {},
	    {}
	);
    }])
    .factory('saveExamApi', ['$resource', function($resource) {
	return $resource(
	    '/ayushman/cconsultation/generateSummary/',
	    {},
	    {}
	);
    }])
    .factory('prescriptionApi', ['$resource', function($resource) {
	return $resource(
	    '/ayushman/cpatienthistory/appointmentSummary/',
	    {},
	    {}
	);
    }])
    .factory('dosageApi', ['$resource', function($resource) {
	return $resource(
	    '/ayushman/cconsultation/dosage/',
	    {},
	    {}
	);
    }])
    .factory('trackerApi', ['$resource', function($resource) {
	return $resource(
	    '/ayushman/cnewtracksheet/view/',
	    {},
	    {}
	);
    }])
    .factory('patienttrackerApi', ['$resource', function($resource) {
	return $resource(
	    '/ayushman/cnewtracksheet/patientview/',
	    {},
	    {}
	);
    }])
	.factory('trackerheaderApi', ['$resource', function($resource) {
	return $resource(
	    '/ayushman/cnewtracksheet/gettrackerheader/',
	    {},
	    {}
	);
    }])
    .factory('trackerTemplateApi', ['$resource', function($resource) {
	return $resource(
	    '/ayushman/cnewtracksheet/template/',
	    {},
	    {}
	);
    }])
    .factory('trackerListApi', ['$resource', function($resource) {
	return $resource(
	    '/ayushman/ctracksheet/trackerList/',
	    {},
	    {}
	);
    }])
    .factory('riskApi', ['$resource', function($resource) {
	return $resource(
	    '/ayushman/cpatienthistory/risk/',
	    {},
	    {}
	);
    }])
    .factory('allergyApi', ['$resource', function($resource) {
	return $resource(
	    '/ayushman/cpatienthistory/allergy/',
	    {},
	    {}
	);
    }])
   .factory('socialhabitsApi', ['$resource', function($resource) {
	return $resource(
	    '/ayushman/cpatienthistory/socialhabits/',
	    {},
	    {}
	);
    }])
   .factory('pastdiseasesApi', ['$resource', function($resource) {
	return $resource(
	    '/ayushman/cpatienthistory/pastdiseases/',
	    {},
	    {}
	);
    }])
  .factory('immunizationApi', ['$resource', function($resource) {
	return $resource(
	    '/ayushman/cpatienthistory/immunization/',
	    {},
	    {}
	);
    }])
  .factory('othermedobservApi', ['$resource', function($resource) {
	return $resource(
	    '/ayushman/cpatienthistory/othermedobserv/',
	    {},
	    {}
	);
    }])
  .factory('healthinfoApi', ['$resource', function($resource) {
	return $resource(
	    '/ayushman/cpatienthistory/healthinfo/',
	    {},
	    {}
	);
    }])

    .factory('onlineApi', ['$resource', function($resource) {
	return $resource(
	    '/ayushman/cemrdashboard/connect/',
	    {},
	    {}
	);
    }])	
	.factory('mybilltemplatesApi', ['$resource', function($resource) {
	return $resource(
	    '/ayushman/cconsultation/getmybillTemplate/',
	    {},
	    {}
	);
    }])	
	.factory('doctorbilltemplatesApi', ['$resource', function($resource) {
	return $resource(
	    '/ayushman/cconsultation/getdoctorbillTemplate/',
	    {},
	    {}
	);
    }])	
	.factory('regularpatientsApi',['$resource', function($resource) {
	return $resource(
	    '/ayushman/cconsultation/getregularpatients/',
	    [{}],
	    [{}]
	);
    }]) 
	// Get favourite doctors list 
	.factory('favDoctorsApi',['$resource', function($resource) {
	return $resource(
	    '/ayushman/cpatientbookingapp/getfavdoctors/',
	    [{}],
	    [{}]
	);
    }])
	.factory('timeSlotsApi',['$resource', function($resource) {
	return $resource(
	    '/ayushman/cpatientbookingapp/getallslots/',
	    [{}],
	    [{}]
	);
    }])
	.factory('doctorsClinicApi',['$resource', function($resource) {
	return $resource(
	    '/ayushman/cpatientbookingapp/getclinics/',
	    [{}],
	    [{}]
	);
    }])	.factory('patientIncidentApi',['$resource', function($resource) {
	return $resource(
	    '/ayushman/cpatientbookingapp/getincidents/',
	    [{}],
	    [{}]
	);
    }]);
