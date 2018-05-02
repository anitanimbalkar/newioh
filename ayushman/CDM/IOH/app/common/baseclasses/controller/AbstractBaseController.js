Ext.define('Ayushman.common.baseclasses.controller.AbstractBaseController', {
 
    config: 
	{
		 viewName: null,
		 storeName: null,
		 nameSpacePrefix: 'Ayushman.view.', //default namespace prefix
		 viewInstance: null,
		 mapOfItemIdAndListenerConfig: Ext.create('Ext.util.HashMap')
	},
	 
	constructor: function(config) {
        this.initConfig(config);
		this.createInstanceOfView();
    },
	
	createInstanceOfView: function()
	{
		var splitStringArray = this.self.getName().split(".");
		var viewNamePrefix = splitStringArray[splitStringArray.length-1].slice(0,-10);
		this.setViewName( viewNamePrefix + "View");
		this.setStoreName( viewNamePrefix + "Store");
		this.setViewInstance(Ext.create(this.getNameSpacePrefix() + this.getViewName(),  {controller:this}));
		Ext.Array.forEach(this.getOwnMethods(), this.addItemIdAndMethodNameToMap, this);
		
		this.addListenersToViewComponents(this.getViewInstance());
	},
	
	addItemIdAndMethodNameToMap: function(element, index, array)
	{
		var arrayOfStrings = element.split('_');
		var mapOfItemIdsAndListenerConfig = this.getMapOfItemIdAndListenerConfig();
		//this.getMapOfItemIdAndListenerConfig().add(arrayOfStrings[1], '{ scope : this, ' + 'tap : this.'+ element +  '}');
		var listenerConfigObject = mapOfItemIdsAndListenerConfig.get(arrayOfStrings[1]);
		if( listenerConfigObject === undefined)
		{
			mapOfItemIdsAndListenerConfig.add(arrayOfStrings[1], '{ scope : this, ' + arrayOfStrings[0] + ' : this.'+ element +  '}');
		}
		else
		{	
			// first remove already existing object for key 'arrayOfStrings[1]' because Ext.util.HashMap gives exception if 
			// we try to override the already existing key-value pair
			mapOfItemIdsAndListenerConfig.removeByKey(arrayOfStrings[1]);
			var stringWithoutClosingBrace = listenerConfigObject.slice(0,-1);
			stringWithoutClosingBrace = stringWithoutClosingBrace + ", ";
			var stringWithClosingBrace = stringWithoutClosingBrace + arrayOfStrings[0] + ' : this.' + element + ' }';
			mapOfItemIdsAndListenerConfig.add(arrayOfStrings[1], stringWithClosingBrace);
		}
	},	
	
	addListenersToViewComponents: function(uiComponent)
	{
		if(uiComponent.hasOwnProperty('_itemId'))
		{
				/* uiComponent.on({
					scope: this,
					tap: this.tap_homeButton    // here tap_homeButton is the name of the function which is present in the corresponding 
												// controller class		
					}); */
				var myJSONText = this.getMapOfItemIdAndListenerConfig().get(uiComponent.getItemId());
				if( myJSONText !== undefined)
				{
					console.log(uiComponent.getItemId());
					uiComponent.on(eval('(' + myJSONText + ')'));
				}
		}
		
		var itemsVar = uiComponent.items;
		if(itemsVar === undefined)
		{
			return;
		}
		else
		{
			if(Array.isArray(itemsVar))
			{
				
				for(var i=0; i < itemsVar.length; i++)
				{
					this.addListenersToViewComponents(itemsVar[i]);
				}
				
			}
			else 
			{
				this.addListenersToViewComponents(itemsVar);
			}
		}
	},
	 
	getOwnMethods: function() 
	{
		var methods = [];
		for (var method in this) 
		{
			if (  typeof this[method] == 'function') 
			{
				var arrayOfStrings = method.split('_');
					if(arrayOfStrings.length == 2)
					{
						methods.push(method);
					}
			}
		}
		return methods;
	},
	
	getOwnSetterMethods: function() 
	{
		var setterMethodNames = [];
		for (var method in this) 
		{
			if (  typeof this[method] == 'function') 
			{
				var initialThreeChars = method.substr(0,3);
					if(initialThreeChars == "set")
					{
						
						setterMethodNames.push(method);
					}
			}
		}
		return setterMethodNames;
	},
	
	/* callSetterToNullifyReference: function(element, index, array)
	{
			console.log(element);
			var stringParameter = "null";
			funcCall = element + "('" + stringParameter + "');"; 
			//Call the function
			eval(this.funcCall);
	}, */
	
	destroy: function()
	{
		console.log("Destroy of AbstractBaseIohController for "+ this.self.getName() + " is called!");
		//Ext.Array.forEach(this.getOwnSetterMethods(), this.callSetterToNullifyReference, this);		
		
		this.callParent();
		
		this.setViewName(null);
		this.setStoreName(null);
		this.setViewInstance(null);
		this.setNameSpacePrefix(null);
		this.setMapOfItemIdAndListenerConfig(null);
		
		console.log("Destroy of AbstractBaseIohController for "+ this.self.getName() + " is Finished!");
	}
});