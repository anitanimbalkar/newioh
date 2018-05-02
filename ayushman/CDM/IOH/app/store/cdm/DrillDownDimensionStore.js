Ext.define('Ayushman.store.cdm.DrillDownDimensionStore', {
	extend: 'Ayushman.common.baseclasses.store.BaseRemoteStore',
	requires: ['Ayushman.model.cdm.DrillDownDimensionModel'],
	
	config:
	{
		storeId: 'DrillDownDimensionStore',
		model: 'Ayushman.model.cdm.DrillDownDimensionModel',
		serverSideController: 'crudoperationscontroller',
		serverSideModel: 'drilldowndimension'
	}
	
});