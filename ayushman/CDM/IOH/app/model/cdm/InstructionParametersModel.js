Ext.define("Ayushman.model.cdm.InstructionParametersModel", {
	extend: "Ayushman.common.baseclasses.model.BaseModel",
	config:
	{
		idProperty: 'id',
		fields: 
		[
			{name: 'id', type: 'number'},
			{name: 'plan_instruction_id', type: 'number'},
			{name: 'instruction_attribute', type: 'string'},
			{name: 'instruction_attribute_value', type: 'string'}
		]
	}
});
