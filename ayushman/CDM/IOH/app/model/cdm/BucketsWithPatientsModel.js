Ext.define("Ayushman.model.cdm.BucketsWithPatientsModel", {
	extend: "Ext.data.Model",
	requires: [
        'Ext.data.Field',
        'Ext.data.identifier.Uuid'
    ],
	config:
	{
		identifier: {
            type: 'uuid'
        },
		
		fields: 
		[
			{name: 'id', type: 'number'},
			{name: 'bucket_name', type: 'string'},
			{name: 'patients_list', type: 'string'}
		]
	}
});
