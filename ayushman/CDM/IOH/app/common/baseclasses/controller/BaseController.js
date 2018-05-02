Ext.define('Ayushman.common.baseclasses.controller.BaseController', {
 extend : 'Ayushman.common.baseclasses.controller.AbstractBaseController',
 
  config: 
	{
		globalControllerInstance: null		
	},
	 
	createInstanceOfView: function()
	{
		this.callParent();					
	},
		
	destroy: function()
	{
		console.log("Destroy of BaseController for "+ this.self.getName() + " is called!");
		this.callParent();
		this.setGlobalControllerInstance(null);
		console.log("Destroy of BaseController for "+ this.self.getName() + " is Finished!");
	}
});