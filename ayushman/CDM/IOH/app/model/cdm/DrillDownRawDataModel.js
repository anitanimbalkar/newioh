Ext.define("Ayushman.model.cdm.DrillDownRawDataModel", {
	extend: "Ayushman.common.baseclasses.model.BaseModel",
	config:
	{
		fields: 
		[
			{name: 'id', type: 'number'},
			{name: 'patient_id', type: 'number'},
			{name: 'doctor_id', type: 'number'},
			{name: 'dimension_id', type: 'number'},
			{name: 'date', type: 'string'},
			{name: 'min_value', type: 'number'},
			{name: 'max_value', type: 'number'},
			{name: 'expected_value', type: 'number'},
			{name: 'recorded_value', type: 'number'}
		]
	}
});
