window.app = angular.module('ngConsultation', ['ngCookies', 'ngResource', 'ui.bootstrap', 'ngRoute','ngff.controllers', 'ngff.directives', 'ngff.services']);

// bundling dependencies
window.angular.module('ngff.controllers', ['ngff.controllers.landingctrl','ngff.controllers.emrctrl','ngff.controllers.examctrl','ngff.controllers.newexamctrl','ngff.controllers.trackerctrl']);
window.angular.module('ngff.services', ['ngff.services.consultationApi','ngff.services.examInfoService','ngff.services.trackerService','ngff.services.emrService','ngff.services.appointmentService','ngff.services.examinationService','ngGrid']);
