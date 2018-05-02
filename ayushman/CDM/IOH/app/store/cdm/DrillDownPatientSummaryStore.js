Ext.define('Ayushman.store.cdm.DrillDownPatientSummaryStore', {
	extend: 'Ayushman.common.baseclasses.store.BaseRemoteStore',
	requires: ['Ayushman.model.cdm.DrillDownPatientSummaryModel'],
	
	config:
	{
		storeId: 'DrillDownPatientSummaryStore',
		model: 'Ayushman.model.cdm.DrillDownPatientSummaryModel',
		serverSideController: 'crudoperationscontroller',
		serverSideModel: 'drilldownpatientsummary',
		//remoteFilter: true
	}
	
});