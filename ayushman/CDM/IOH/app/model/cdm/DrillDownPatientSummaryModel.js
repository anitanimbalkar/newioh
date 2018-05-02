Ext.define("Ayushman.model.cdm.DrillDownPatientSummaryModel", {
	extend: "Ayushman.common.baseclasses.model.BaseModel",
	config:
	{
		fields: 
		[
			{name: 'id', type: 'number'},
			{name: 'patient_id', type: 'number'},
			{name: 'doctor_id', type: 'number'},
			{name: 'timeframe_id', type: 'number'},
			{name: 'dimension_id', type: 'number'},
			{name: 'group_name', type: 'string'}
		]
	}
});
