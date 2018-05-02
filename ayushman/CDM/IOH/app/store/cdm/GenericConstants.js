Ext.define('Ayushman.store.cdm.GenericConstants', {
	extend: 'Ayushman.common.baseclasses.store.BaseRemoteStore',
	requires: ['Ayushman.model.cdm.GenericConstant'],
	
	config:
	{
		storeId: 'GenericConstants',
		model: 'Ayushman.model.cdm.GenericConstant',
		serverSideController: 'crudoperationscontroller',
		serverSideModel: 'genericconstants'
	}
	
});