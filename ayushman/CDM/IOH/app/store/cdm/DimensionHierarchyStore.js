Ext.define('Ayushman.store.cdm.DimensionHierarchyStore', {
	extend: 'Ayushman.common.baseclasses.store.BaseRemoteStore',
	requires: ['Ayushman.model.cdm.DimensionHierarchyModel'],
	
	config:
	{
		storeId: 'DimensionHierarchyStore',
		model: 'Ayushman.model.cdm.DimensionHierarchyModel',
		serverSideController: 'crudoperationscontroller',
		serverSideModel: 'dimensionhierarchy'
	}
	
});