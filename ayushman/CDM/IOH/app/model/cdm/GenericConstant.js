Ext.define("Ayushman.model.cdm.GenericConstant", {
	extend: "Ayushman.common.baseclasses.model.BaseModel",
	config:
	{
		fields: 
		[
			{name: 'id', type: 'number'},
			{name: 'param_name', type: 'string'},
			{name: 'param_value', type: 'string'}		
		]
	}
});
