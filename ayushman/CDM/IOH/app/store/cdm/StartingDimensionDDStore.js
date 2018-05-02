Ext.define('Ayushman.store.cdm.StartingDimensionDDStore', {
	extend: 'Ayushman.common.baseclasses.store.BaseRemoteStore',
	requires: ['Ayushman.model.cdm.DrillDownDimensionModel'],
	
	config:
	{
		storeId: 'StartingDimensionDDStore',
		model: 'Ayushman.model.cdm.DrillDownDimensionModel',
		serverSideController: 'crudoperationscontroller',
		serverSideModel: 'drilldowndimension'
	}
	
});