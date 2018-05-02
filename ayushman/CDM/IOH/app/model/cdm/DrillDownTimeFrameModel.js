Ext.define("Ayushman.model.cdm.DrillDownTimeFrameModel", {
	extend: "Ayushman.common.baseclasses.model.BaseModel",
	config:
	{
		fields: 
		[
			{name: 'id', type: 'number'},
			{name: 'timeframe', type: 'string'}	
		]
	}
});
