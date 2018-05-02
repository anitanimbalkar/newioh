Ext.define('Ayushman.view.cdm.instructions.DurationBasedInstruction', {
    extend: 'Ext.Container',
	alias: 'widget.DurationBased',
	config:
	{		
		//layout: 'hbox',
		cls: 'container',
		style:	'border:1px solid white; padding:0.5em; margin-top:0.5em; margin-bottom:0.5em; background-color:rgba(106, 61, 61, 0.53);',
		instructionType: 'DurationBased',
		initializationConfiguration: null,
		items:
		[
			{
				xtype: 'container',
				itemId: 'exerciseNameContainer',
				//layout: 'vbox',
				cls: 'col-sm-6 col-md-6 col-lg-3',
				items:
				[
					{
						xtype: 'label',
						html: 'Exercise Type',
						instructionAttr: 'exercise_name',
						cls: 'col-sm-12 col-md-12 col-lg-12',
						style: 'text-align: center;color:white;'
					},
					{
						xtype: 'genericConstantsDD',
						itemId: 'exerciseTypeValue',
						filterConfig: { property: "param_name", value: "exercise_name", exactMatch: true },
						cls: 'col-sm-12 col-md-12 col-lg-12',
					}
				]
				
			},	
			{
				xtype: 'container',
				itemId: 'durationContainer',
				//layout: 'vbox',
				cls: 'col-sm-6 col-md-6 col-lg-3',
				items:
				[
					{
						xtype: 'label',
						html: 'Duration',
						instructionAttr: 'duration',
						style: 'text-align: center;color:white;'
					},
					{
						xtype: 'textfield',
						itemId: 'durationValue',
						placeHolder: 'Enter Duration',
						//width: '150px'	
						//filterConfig: { property: "param_name", value: "duration", exactMatch: true }
					}
				]
				
			},
			{
				xtype: 'container',
				itemId: 'durationUnitContainer',
				//layout: 'vbox',
				cls: 'col-sm-6 col-md-6 col-lg-3',
				items:
				[
					{
						xtype: 'label',
						html: 'Duration Unit',
						instructionAttr: 'duration_unit',
						style: 'text-align: center;color:white;'
					},
					{
						xtype: 'genericConstantsDD',
						itemId: 'durationUnitValue',
						filterConfig: { property: "param_name", value: "duration_units", exactMatch: true }
					}
				]
				
			},
			{
				xtype: 'container',
				itemId: 'frequencyContainer',
				//layout: 'vbox',
				cls: 'col-sm-6 col-md-6 col-lg-3',
				items:
				[
					{
						xtype: 'label',
						html: 'Frequency',
						instructionAttr: 'frequency',
						style: 'text-align: center;color:white;'
					},
					{
						xtype: 'genericConstantsDD',
						itemId: 'frequencyValue',
						filterConfig: { property: "param_name", value: "frequency", exactMatch: true }
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
				var exerciseTypeSelectComponent = this.getComponent('exerciseNameContainer').getComponent('exerciseTypeValue');
				var exerciseTypeSelectFieldStore = exerciseTypeSelectComponent.getStore();
				var indexOfRecInStore1 = exerciseTypeSelectFieldStore.findExact('param_value', initializationConfiguration['exercise_name']);
				exerciseTypeSelectComponent.setValue(exerciseTypeSelectFieldStore.getAt(indexOfRecInStore1));
							
				var durationUnitSelectComponent = this.getComponent('durationUnitContainer').getComponent('durationUnitValue');
				var durationUnitSelectFieldStore = durationUnitSelectComponent.getStore();
				var indexOfRecInStore2 = durationUnitSelectFieldStore.findExact('param_value', initializationConfiguration['duration_unit']);
				durationUnitSelectComponent.setValue(durationUnitSelectFieldStore.getAt(indexOfRecInStore2));
				
				var frequencySelectComponent = this.getComponent('frequencyContainer').getComponent('frequencyValue');
				var frequencySelectFieldStore = frequencySelectComponent.getStore();
				var indexOfRecInStore3 = frequencySelectFieldStore.findExact('param_value', initializationConfiguration['frequency']);
				frequencySelectComponent.setValue(frequencySelectFieldStore.getAt(indexOfRecInStore3));
				
			},this);
			
			var durationTextFieldComponent = this.getComponent('durationContainer').getComponent('durationValue');
			durationTextFieldComponent.setValue(initializationConfiguration['duration']);			
		}
	}
});
