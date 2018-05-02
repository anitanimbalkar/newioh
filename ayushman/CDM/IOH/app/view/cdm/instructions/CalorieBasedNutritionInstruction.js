Ext.define('Ayushman.view.cdm.instructions.CalorieBasedNutritionInstruction', {
    extend: 'Ext.Container',
	alias: 'widget.CalorieBased',
	
	config:	
	{		
		//layout: 'hbox',	
		cls: 'container',
		style:	'border: 1px solid white; padding:0.5em; margin-top:0.5em; margin-bottom:0.5em; background-color:rgba(187, 71, 180, 0.63);',
		instructionType: 'CalorieBased',
		initializationConfiguration: null,
		items:
		[
			{
				xtype: 'container',
				itemId: 'caloriesContainer',
				//layout: 'vbox',
				cls: 'col-sm-6 col-md-6 col-lg-6',
				items:
				[
					{
						xtype: 'label',
						html: 'Calories',
						instructionAttr: 'number_of_calories',
						cls: 'col-sm-12 col-md-12 col-lg-12',
						style: 'text-align: center;color:white;'
					},
					{
						xtype: 'textfield',
						itemId: 'caloriesValue',
						placeHolder: 'Enter Calories',
						cls: 'col-sm-12 col-md-12 col-lg-12',
					}
				]
				
			},
			{
				xtype: 'container',
				itemId: 'mealtimeContainer',
				//layout: 'vbox',
				cls: 'col-sm-6 col-md-6 col-lg-6',
				items:
				[
					{
						xtype: 'label',
						html: 'Mealtime',
						instructionAttr: 'mealtime',
						cls: 'col-sm-12 col-md-12 col-lg-12',
						style: 'text-align: center;color:white;'
					},
					{
						xtype: 'genericConstantsDD',
						itemId: 'mealtimeValue',
						filterConfig: { property: "param_name", value: "mealtimes", exactMatch: true },
						cls: 'col-sm-12 col-md-12 col-lg-12',
					}
				]
				
			}
		]
	},
	
	initialize: function() {	
		var initializationConfiguration = this.getInitializationConfiguration();
		if(initializationConfiguration)
		{
			var caloriesTextFieldComponent = this.getComponent('caloriesContainer').getComponent('caloriesValue');
			caloriesTextFieldComponent.setValue(initializationConfiguration['number_of_calories']);
			
			var genericConstantsStore = Ext.getStore('GenericConstants');
			genericConstantsStore.on('load', function(){
				var mealtimeSelectComponent = this.getComponent('mealtimeContainer').getComponent('mealtimeValue');
				var mealtimeSelectFieldStore = mealtimeSelectComponent.getStore();
				var indexOfRecInStore1 = mealtimeSelectFieldStore.findExact('param_value', initializationConfiguration['mealtime']);
				mealtimeSelectComponent.setValue(mealtimeSelectFieldStore.getAt(indexOfRecInStore1));
				
			},this);
		}
	}
});
