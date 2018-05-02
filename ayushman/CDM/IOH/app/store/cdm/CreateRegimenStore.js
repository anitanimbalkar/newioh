Ext.define('Ayushman.store.cdm.CreateRegimenStore', {
	extend: 'Ayushman.common.baseclasses.store.BaseRemoteStore',
	requires: ['Ayushman.model.cdm.CreateRegimenModel'],
	
	/* config:
	{
		storeId: 'CreateRegimenStore',
		model: 'Ayushman.model.cdm.CreateRegimenModel',
		serverSideController: 'mobileservices',
		readActionName: 'readregimen',  
		createActionName: 'createregimen',
		updateActionName: 'updateregimen',
		destroyActionName: 'destroyregimen',
		remoteFilter: true,
		
		reader: {
            type: 'json',
            rootProperty: 'data'           
        },
        writer: {
            type: 'json'
        }
	} */
	
	config:
	{
		storeId: 'CreateRegimenStore',
		model: 'Ayushman.model.cdm.CreateRegimenModel',
		serverSideController: 'crudoperationscontroller',
		serverSideModel: 'patientplan',
		remoteFilter: true,		
		reader: {
            type: 'json',
            rootProperty: 'data'           
        },
        writer: {
            type: 'json'
        }
	}
	
});