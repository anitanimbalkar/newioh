Ext.define('Ayushman.store.cdm.InstructionParametersStore', {
	extend: 'Ayushman.common.baseclasses.store.BaseRemoteStore',
	requires: ['Ayushman.model.cdm.InstructionParametersModel'],
	
	config:
	{
		storeId: 'InstructionParametersStore',
		model: 'Ayushman.model.cdm.InstructionParametersModel',
		serverSideController: 'crudoperationscontroller',
		serverSideModel: 'patientsdetailplan',
		
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