Ext.define("Ayushman.model.cdm.PatientsPlanDetailsModel", {
	extend: "Ayushman.common.baseclasses.model.BaseModel",
	config:
	{
		fields: 
		[
			{name: 'id', type: 'number'},
			{name: 'plan_id', type: 'number'},
			{name: 'instruction_id', type: 'number'},
			{name: 'instruction_type_id', type: 'number'},
			{name: 'instruction_number', type: 'number'},
			{name: 'instruction_attribute', type: 'string'},
			{name: 'instruction_attribute_value', type: 'string'}			
		]
	}
});
