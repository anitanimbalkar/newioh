Ext.define('Ayushman.store.cdm.InstructionTypes', {
	extend: 'Ayushman.common.baseclasses.store.BaseRemoteStore',
	requires: ['Ayushman.model.cdm.InstructionType'],
	
	config:
	{
		storeId: 'InstructionTypes',
		model: 'Ayushman.model.cdm.InstructionType',
		serverSideController: 'crudoperationscontroller',
		serverSideModel: 'categorywithinstructiontypes',
		//remoteFilter: true,		
		reader: {
            type: 'json',
            rootProperty: 'data'           
        },
        writer: {
            type: 'json'
        }
		/* serverSideController: 'mobileservices',
		readActionName: 'categorywithinstructiontypes',  // value should be 'readinstructiontypes'.. ToDo: Do the server side change and then do the change here
		createActionName: 'createinstructiontypes',
		updateActionName: 'updateinstructiontypes',
		destroyActionName: 'destroyinstructiontypes', */
	}
	
});