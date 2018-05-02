Ext.define("Ayushman.common.baseclasses.view.AbstractBaseView", {
extend : "Ext.Container",

	config:
	{
		controller : null,
	},
	
	constructor: function(config) {
		this.setController(config.controller);
        this.callParent(config);
	},
	
	initialize: function()
	{
		this.callParent();
		console.log("AbstractBaseView for "+ this.self.getName() + " class is being initialized");
	},
	
	destroy: function()
	{
		console.log("AbstractBaseView class for "+ this.self.getName() + " is being destroyed!");
		this.callParent();
		this.getController().destroy();
		this.setController(null);
		console.log("AbstractBaseView class for "+ this.self.getName() + " is destroyed Succesfully!");
	}
	
	
	
});