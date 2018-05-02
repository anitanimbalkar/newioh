Ext.define('Ayushman.controller.IohFrameController', {
 extend : 'Ayushman.common.baseclasses.controller.AbstractBaseController',
 requires: ['Ext.util.MixedCollection'],
  config: 
	{
	 
		role: null,
		viewStackInstance: new Ext.util.MixedCollection()
		 	
	},
	
	createInstanceOfView: function()
	{
		this.callParent();
		var roleBasedHomeScreenControllerInstance = Ext.create('Ayushman.controller.ioh.'+ this.getRole() + 'HomeController', { globalControllerInstance: this });
		
		this.getViewInstance().getComponent('iohFrameViewInnerContainer').add(roleBasedHomeScreenControllerInstance.getViewInstance());
		
	},
	 
	tap_homeButton: function()
	{
		var viewStackInstance = this.getViewStackInstance();
		var numberOfObjects = viewStackInstance.getCount();
		//first just call the destroy of views (excluding the view at 0th index)
		for(var i = numberOfObjects - 1; i >= 1; i--)
		{
			var topMostViewInstance = viewStackInstance.getAt(i);
			topMostViewInstance.destroy();
		}
		
		// now remove the view objects from viewStackInstance (excluding the view object at the 0th index)
		for(var i = numberOfObjects - 1; i >= 1; i--)
		{
			var topMostViewInstance = viewStackInstance.getAt(i);
			viewStackInstance.removeAt(i);
		}
		viewStackInstance.getAt(0).show();
	},
	
	tap_backButton: function()
	{
		var viewStackInstance = this.getViewStackInstance();
		var numberOfObjects = viewStackInstance.getCount();
		
		if(numberOfObjects > 1)
		{
			var topMostViewInstance = viewStackInstance.getAt(numberOfObjects-1);
			viewStackInstance.removeAt(numberOfObjects-1);
			topMostViewInstance.destroy();
			
			viewStackInstance.getAt(viewStackInstance.getCount()-1).show();
		}
	},
	
	
	tap_logoutButton: function()
	{
		var userCredentials = Ext.getStore('UserCredentials');		 
		 userCredentials.removeAll();
		 userCredentials.sync();
		 
		Ext.Viewport.removeAll(true,true);
		var controllerInstance = Ext.create('Ayushman.controller.LoginController');        
        Ext.Viewport.add(controllerInstance.getViewInstance());
	},
	
	clearViewStack: function()
	{
		this.getViewStackInstance().clear();
	},
	
	destroy: function()
	{
		console.log("Destroy of IohFrameController is called!");
		
		this.callParent();
		
		this.setRole(null);
		this.clearViewStack();
		this.setViewStackInstance(null);
		
		console.log("Destroy of IohFrameController is Finished!");
		
	}
	
	
});