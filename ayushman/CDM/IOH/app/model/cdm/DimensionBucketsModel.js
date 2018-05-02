Ext.define("Ayushman.model.cdm.DimensionBucketsModel", {
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
			{name: 'dimension_hierarchy_id', type: 'number'},
			{name: 'bucket_name', type: 'string'},
			{name: 'min_value', type: 'number'},
			{name: 'max_value', type: 'number'}		
		]
	}
});
