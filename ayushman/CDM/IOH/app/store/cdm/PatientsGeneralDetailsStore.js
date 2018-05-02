Ext.define('Ayushman.store.cdm.PatientsGeneralDetailsStore', {
	extend: 'Ayushman.common.baseclasses.store.BaseRemoteStore',
	requires: ['Ayushman.model.cdm.PatientsGeneralDetailsModel'],
	
	config:
	{
		storeId: 'PatientsGeneralDetailsStore',
		model: 'Ayushman.model.cdm.PatientsGeneralDetailsModel',
		serverSideController: 'crudoperationscontroller',
		serverSideModel: 'cdmpatientsgeneralinfo',
		remoteFilter: true
	}
	
});