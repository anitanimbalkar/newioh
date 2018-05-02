window.bootstrap = function () {
    angular.bootstrap(document, ['ngConsultation']);
}

window.init = function () {
    window.bootstrap();
}

$(document).ready(function () {
	window.init();
});