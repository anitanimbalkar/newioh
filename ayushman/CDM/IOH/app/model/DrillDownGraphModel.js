Ext.define('Ayushman.model.DrillDownGraphModel', {
    extend: 'Ext.data.Model',
    alias: 'model.category',
 
    requires: [
        'Ext.data.Field',
        'Ext.data.identifier.Uuid'
    ],
 
    config: {
 
        identifier: {
            type: 'uuid'
        },
		
		
		 fields: [
            {
                name: 'id',
                type: 'string'
            },
            {
                name: 'groupName',
                type: 'string'
            },
            {
                defaultValue: 0.00,
                name: 'patientsPercentage',
                type: 'float'
            }
        ]
    }
});