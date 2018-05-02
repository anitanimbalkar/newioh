Ext.define("Ayushman.common.baseclasses.model.BaseModel", {
	extend: "Ext.data.Model",
	config:
	{
		fields: 
		[	
		]
	},
	
	initialize: function()
	{
		this.callParent();
		console.log("Base model is initialized!");
	}
});
