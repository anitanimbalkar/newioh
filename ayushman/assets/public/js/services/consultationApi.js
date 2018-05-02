/**
 * Created by chetan on 11/11/13.
 */
window.angular.module('ngff.services.consultationApi', [])
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
    .factory('pastAppApi', ['$resource', function($resource) {
	return $resource(
	    '/ayushman/newcemrdashboard/getPastData/',
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
    }]);
