Ext.define("Ayushman.model.cdm.DrillDownDimensionModel", {
	extend: "Ayushman.common.baseclasses.model.BaseModel",
	config:
	{
		fields: 
		[
			{name: 'id', type: 'number'},
			{name: 'dimension_name', type: 'string'}	
		]
	}
});
