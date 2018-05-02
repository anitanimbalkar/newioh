Ext.define("Ayushman.model.cdm.DrillDownConfigurationModel", {
	extend: "Ayushman.common.baseclasses.model.BaseModel",
	config:
	{
		fields: 
		[
			{name: 'id', type: 'number'},
			{name: 'dimension_id', type: 'number'},
			{name: 'group_name', type: 'string' }
		]
	}
});
