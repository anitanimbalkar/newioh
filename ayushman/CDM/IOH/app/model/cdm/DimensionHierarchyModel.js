Ext.define("Ayushman.model.cdm.DimensionHierarchyModel", {
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
			{name: 'parent_id', type: 'number'},
			{name: 'dimension_name', type: 'string'},
			{name: 'dimension_desc', type: 'string'}		
		]
	}
});
