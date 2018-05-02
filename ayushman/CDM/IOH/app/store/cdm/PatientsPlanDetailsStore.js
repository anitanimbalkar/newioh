Ext.define('Ayushman.store.cdm.PatientsPlanDetailsStore', {
	extend: 'Ayushman.common.baseclasses.store.BaseRemoteStore',
	requires: ['Ayushman.model.cdm.PatientsPlanDetailsModel'],
	
	config:
	{
		storeId: 'PatientsPlanDetailsStore',
		model: 'Ayushman.model.cdm.PatientsPlanDetailsModel',
		serverSideController: 'crudoperationscontroller',
		serverSideModel: 'cdmpatientsplandetails',
		remoteFilter: true
	}
	
});