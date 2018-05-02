Ext.define('Ayushman.view.cdm.instructions.WeightBasedExerciseInstruction', {
    extend: 'Ext.Container',
	alias: 'widget.WeightBased',
	config:
	{		
		//layout: 'hbox',
		cls: 'container',
		style:	'border:1px solid white; padding:0.5em; margin-top:0.5em; margin-bottom:0.5em; background-color:rgba(47, 140, 219, 0.62);',
		instructionType: 'WeightBased',
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
						itemId: 'exerciseNameValue',
						filterConfig: { property: "param_name", value: "weight_based_exercise", exactMatch: true },
						cls: 'col-sm-12 col-md-12 col-lg-12',
					}
				]
				
			},
			{
				xtype: 'container',
				itemId: 'weightContainer',
				//layout: 'vbox',
				cls: 'col-sm-6 col-md-6 col-lg-3',
				items:
				[
					{
						xtype: 'label',
						html: 'Weight (Kgs)',
						instructionAttr: 'weight_in_kgs',
						style: 'text-align: center;color:white;'
					},
					{
						xtype: 'genericConstantsDD',
						itemId: 'weightValue',
						filterConfig: { property: "param_name", value: "duration", exactMatch: true }
					}
				]
				
			},
			{
				xtype: 'container',
				itemId: 'repetitionsContainer',
				//layout: 'vbox',
				cls: 'col-sm-6 col-md-6 col-lg-3',
				items:
				[
					{
						xtype: 'label',
						html: 'Repetitions',
						instructionAttr: 'repetitions',
						style: 'text-align: center;color:white;'
					},
					{
						xtype: 'genericConstantsDD',
						itemId: 'repetitionsValue',
						filterConfig: { property: "param_name", value: "repetitions", exactMatch: true }
					}
				]
				
			},
			{
				xtype: 'container',
				itemId: 'setsContainer',
				//layout: 'vbox',
				cls: 'col-sm-6 col-md-6 col-lg-3',
				items:
				[
					{
						xtype: 'label',
						html: 'Sets',
						instructionAttr: 'sets',
						style: 'text-align: center;color:white;'
					},
					{
						xtype: 'genericConstantsDD',
						itemId: 'setsValue',
						filterConfig: { property: "param_name", value: "sets", exactMatch: true }
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
			
				var exerciseTypeSelectComponent = this.getComponent('exerciseNameContainer').getComponent('exerciseNameValue');					
				var exerciseTypeSelectFieldStore = exerciseTypeSelectComponent.getStore();
				var indexOfRecInStore1 = exerciseTypeSelectFieldStore.findExact('param_value', initializationConfiguration['exercise_name']);
				exerciseTypeSelectComponent.setValue(exerciseTypeSelectFieldStore.getAt(indexOfRecInStore1));
				
				var weightSelectComponent = this.getComponent('weightContainer').getComponent('weightValue');					
				var weightSelectFieldStore = weightSelectComponent.getStore();
				var indexOfRecInStore2 = weightSelectFieldStore.findExact('param_value', initializationConfiguration['weight_in_kgs']);
				weightSelectComponent.setValue(weightSelectFieldStore.getAt(indexOfRecInStore2));
				
				var setsSelectComponent = this.getComponent('setsContainer').getComponent('setsValue');					
				var setsSelectFieldStore = setsSelectComponent.getStore();
				var indexOfRecInStore3 = setsSelectFieldStore.findExact('param_value', initializationConfiguration['sets']);
				setsSelectComponent.setValue(setsSelectFieldStore.getAt(indexOfRecInStore3));
			
			},this);
			
			var repetitionsTextFieldComponent = this.getComponent('repetitionsContainer').getComponent('repetitionsValue');
			repetitionsTextFieldComponent.setValue(initializationConfiguration['repetitions']);
			
		}
	}
});
