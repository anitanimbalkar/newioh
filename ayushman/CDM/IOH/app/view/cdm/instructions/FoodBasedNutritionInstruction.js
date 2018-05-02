Ext.define('Ayushman.view.cdm.instructions.FoodBasedNutritionInstruction', {
    extend: 'Ext.Container',
	alias: 'widget.FoodBased',
	requires: ['Ext.field.Checkbox'],
	
	config:	
	{		
		//layout: 'hbox',	
		cls: 'container',
		style:	'border: 1px solid white; padding:0.5em; margin-top:0.5em; margin-bottom:0.5em; background-color:rgba(49, 33, 109, 0.42);',
		instructionType: 'FoodBased',
		initializationConfiguration: null,
		items:
		[
			{
				xtype: 'container',
				itemId: 'whatToDoContainer',
				//layout: 'vbox',
				cls: 'col-sm-4 col-md-4 col-lg-4',
				items:
				[
					{
						xtype: 'label',
						html: 'What to do?',
						instructionAttr: 'food_based_nutrition_action',
						cls: 'col-sm-12 col-md-12 col-lg-12',
						style: 'text-align: center;color:white;'
					},
					{
						xtype: 'genericConstantsDD',
						itemId: 'whatToDoValue',
						filterConfig: { property: "param_name", value: "food_based_nutrition_dd_options", exactMatch: true },
						cls: 'col-sm-12 col-md-12 col-lg-12'
					}
				]
				
			},
			{
				xtype: 'container',
				itemId: 'foodItemsOuterContainer',
				cls: 'col-sm-8 col-md-8 col-lg-8',
				items:
				[
					{
						xtype: 'label',
						html: 'Food Items',
						instructionAttr: 'food_based_nutrition_options',
						cls: 'col-sm-12 col-md-12 col-lg-12',
						style: 'text-align: center;color:white;'
					},
					{
						xtype: 'container',
						itemId: 'foodItemsContainer',
						//layout: 'vbox',
						cls: 'col-sm-12 col-md-12 col-lg-12',
						style: 'border: 1px solid white; border-radius: 5px;',
						
						//TODO: remove the following hardcoding.. because food items should be configurable somewhere in the database.
						items:
						[
							{
								xtype: 'container',
								itemId: 'non-vegContainer',
								cls: 'col-sm-12 col-md-12 col-lg-6',
								items:
								[
									{
										xtype: 'checkboxfield',
										itemId: 'non-veg',
										name : 'non-veg',
										value : 'non-veg',
										cls: 'col-sm-3 col-md-3 col-lg-3',
										style: 'min-width:0.5em;'
									},
									{
										xtype: 'label',
										html: 'Non-veg',
										style: 'text-align: center; color:white;margin-top:1em;',
										cls: 'col-sm-9 col-md-9 col-lg-9'
									}
								]
							},
							{
								xtype: 'container',
								itemId: 'coconut-waterContainer',
								cls: 'col-sm-12 col-md-12 col-lg-6',
								items:
								[
									{
										xtype: 'checkboxfield',
										itemId: 'coconut-water',
										name : 'coconut-water',
										value : 'coconut-water',
										cls: 'col-sm-3 col-md-3 col-lg-3',
										style: 'min-width:0.5em;'
									},
									{
										xtype: 'label',
										html: 'Coconut Water',
										style: 'text-align: center; color:white;margin-top:1em;',
										cls: 'col-sm-9 col-md-9 col-lg-9'
									}
								]
							},
							{
								xtype: 'container',
								itemId: 'milkContainer',
								cls: 'col-sm-12 col-md-12 col-lg-6',
								items:
								[
									{
										xtype: 'checkboxfield',
										itemId: 'milk',
										name : 'milk',
										//label: 'Tomato',
										value: 'milk',
										//checked: true,
										cls: 'col-sm-3 col-md-3 col-lg-3',
										style: 'min-width:0.5em;'
									},
									{
										xtype: 'label',
										html: 'Milk',
										style: 'text-align: center; color:white;margin-top:1em;',
										cls: 'col-sm-9 col-md-9 col-lg-9'
									}
								]
							},
							{
								xtype: 'container',
								itemId: 'lemonContainer',
								cls: 'col-sm-12 col-md-12 col-lg-6',
								items:
								[
									{
										xtype: 'checkboxfield',
										itemId: 'lemon',
										name : 'lemon',
										value: 'lemon',
										//checked: true,
										cls: 'col-sm-3 col-md-3 col-lg-3',
										style: 'min-width:0.5em;'
									},
									{
										xtype: 'label',
										html: 'Lemon',
										style: 'text-align: center; color:white;margin-top:1em;',
										cls: 'col-sm-9 col-md-9 col-lg-9'
									}
								]
							},
							{
								xtype: 'container',
								itemId: 'custard-appleContainer',
								cls: 'col-sm-12 col-md-12 col-lg-6',
								items:
								[
									{
										xtype: 'checkboxfield',
										itemId: 'custard-apple',
										name : 'custard-apple',
										value : 'custard-apple',
										cls: 'col-sm-3 col-md-3 col-lg-3',
										style: 'min-width:0.5em;'
									},
									{
										xtype: 'label',
										html: 'Custard Apple',
										style: 'text-align: center; color:white;margin-top:1em;',
										cls: 'col-sm-9 col-md-9 col-lg-9'
									}
								]
							},
							{
								xtype: 'container',
								itemId: 'brown-riceContainer',
								cls: 'col-sm-12 col-md-12 col-lg-6',
								items:
								[
									{
										xtype: 'checkboxfield',
										itemId: 'brown-rice',
										name : 'brown-rice',
										value : 'brown-rice',
										cls: 'col-sm-3 col-md-3 col-lg-3',
										style: 'min-width:0.5em;'
									},
									{
										xtype: 'label',
										html: 'Brown Rice',
										style: 'text-align: center; color:white;margin-top:1em;',
										cls: 'col-sm-9 col-md-9 col-lg-9'
									}
								]
							}	
						]
					}
				]
				
			}
		]
	},
	
	initialize: function() {	
		var initializationConfiguration = this.getInitializationConfiguration();
		if(initializationConfiguration)
		{
			var genericConstantsStore = Ext.getStore('GenericConstants');
			genericConstantsStore.on('load', function(){
				var whatToDoSelectComponent = this.getComponent('whatToDoContainer').getComponent('whatToDoValue');
				var whatToDoSelectFieldStore = whatToDoSelectComponent.getStore();
				var indexOfRecInStore1 = whatToDoSelectFieldStore.findExact('param_value', initializationConfiguration['food_based_nutrition_action']);
				whatToDoSelectComponent.setValue(whatToDoSelectFieldStore.getAt(indexOfRecInStore1));
				
			},this);
			
			var commaSeperatedValuesString = initializationConfiguration['food_based_nutrition_options'];
			var valuesArray = commaSeperatedValuesString.split(",");
			var foodItemsContainer = this.getComponent('foodItemsOuterContainer').getComponent('foodItemsContainer');
			Ext.Array.each(valuesArray, function(value, index, valuesArrayItself) 
			{
				if(value)
				{
					var foodItemCheckBoxField = foodItemsContainer.getComponent(value + "Container").getComponent(value);
					foodItemCheckBoxField.check();
				}
			}, this);
		}
	}
});
