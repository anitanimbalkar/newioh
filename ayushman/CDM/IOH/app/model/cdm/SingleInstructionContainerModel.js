Ext.define("Ayushman.model.cdm.SingleInstructionContainerModel", {
	extend: "Ayushman.common.baseclasses.model.BaseModel",
	config:
	{
		idProperty: 'id',
		fields: 
		[
			{name: 'id', type: 'number'},
			{name: 'plan_id', type: 'number'},
			{name: 'instruction_type_id', type: 'number'},
			{name: 'instruction_number', type: 'number'}
		]
	}
});
