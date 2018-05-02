Ext.define("Ayushman.model.LoginModel", {
	extend: 'Ayushman.common.baseclasses.model.BaseModel',
	config:
	{
		fields: 
		[
			{name: 'id', type: 'number'},
			{name: 'plan_id', type: 'number'},
			{name: 'instruction_type_value', type: 'string'},
			{name: 'instruction_number', type: 'number'},
			{name: 'instruction_attribute', type: 'string'},
			{name: 'instruction_attribute_value', type: 'string'}		
		]
	},
	
	initialize: function()
	{
		this.callParent();
		console.log("Login model is initialized!");
	}
});