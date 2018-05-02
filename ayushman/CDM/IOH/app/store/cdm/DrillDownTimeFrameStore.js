Ext.define('Ayushman.store.cdm.DrillDownTimeFrameStore', {
	extend: 'Ayushman.common.baseclasses.store.BaseRemoteStore',
	requires: ['Ayushman.model.cdm.DrillDownTimeFrameModel'],
	
	config:
	{
		storeId: 'DrillDownTimeFrameStore',
		model: 'Ayushman.model.cdm.DrillDownTimeFrameModel',
		serverSideController: 'crudoperationscontroller',
		serverSideModel: 'drilldowntimeframe'
	}
	
});