Ext.define('Ayushman.store.cdm.SingleInstructionContainerStore', {
	extend: 'Ayushman.common.baseclasses.store.BaseRemoteStore',
	requires: ['Ayushman.model.cdm.SingleInstructionContainerModel'],
	
	config:
	{
		storeId: 'SingleInstructionContainerStore',
		model: 'Ayushman.model.cdm.SingleInstructionContainerModel',
		serverSideController: 'crudoperationscontroller',
		serverSideModel: 'planinstruction',
		
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