Ext.define('Ayushman.store.cdm.DrillDownConfigurationStore', {
	extend: 'Ayushman.common.baseclasses.store.BaseRemoteStore',
	requires: ['Ayushman.model.cdm.DrillDownConfigurationModel'],
	
	config:
	{
		storeId: 'DrillDownConfigurationStore',
		model: 'Ayushman.model.cdm.DrillDownConfigurationModel',
		serverSideController: 'crudoperationscontroller',
		serverSideModel: 'drilldownconfiguration'
	}
	
});