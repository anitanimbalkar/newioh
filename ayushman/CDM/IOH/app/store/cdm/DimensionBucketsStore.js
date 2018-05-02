Ext.define('Ayushman.store.cdm.DimensionBucketsStore', {
	extend: 'Ayushman.common.baseclasses.store.BaseRemoteStore',
	requires: ['Ayushman.model.cdm.DimensionBucketsModel'],
	
	config:
	{
		storeId: 'DimensionBucketsStore',
		model: 'Ayushman.model.cdm.DimensionBucketsModel',
		serverSideController: 'crudoperationscontroller',
		serverSideModel: 'dimensionbuckets'
	}
	
});