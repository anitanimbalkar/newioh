Ext.define('Ayushman.store.cdm.DrillDownRawDataStore', {
	extend: 'Ayushman.common.baseclasses.store.BaseRemoteStore',
	requires: ['Ayushman.model.cdm.DrillDownRawDataModel'],
	
	config:
	{
		storeId: 'DrillDownRawDataStore',
		model: 'Ayushman.model.cdm.DrillDownRawDataModel',
		serverSideController: 'crudoperationscontroller',
		serverSideModel: 'drilldownrawdata',
		//remoteFilter: true
	}
	
});