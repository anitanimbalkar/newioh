Ext.define("Ayushman.model.cdm.InstructionType", {
	extend: "Ayushman.common.baseclasses.model.BaseModel",
	config:
	{
		fields: 
		[
			{name: 'id', type: 'number'},
			{name: 'category', type: 'string'},
			{name: 'instruction_type', type: 'string'},
			{name: 'instruction_type_value', type: 'string'}
		]
	}
});
