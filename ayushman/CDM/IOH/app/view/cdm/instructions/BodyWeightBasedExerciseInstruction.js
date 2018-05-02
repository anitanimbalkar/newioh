Ext.define('Ayushman.view.cdm.instructions.BodyWeightBasedExerciseInstruction', {
    extend: 'Ext.Container',
	alias: 'widget.BodyWeightBased',
	config:
	{		
		//layout: 'hbox',	
		cls: 'container',
		style:	'border: 1px solid black; padding: .5em; margin-top: 0.5em; margin-bottom: 0.5em; background-color: rgba(176, 168, 231, 0.74);',
		instructionType: 'BodyWeightBased',
		initializationConfiguration: null,
		items:
		[
			{
				xtype: 'container',
				itemId: 'exerciseNameContainer',
				cls: 'col-sm-6 col-md-6 col-lg-4',
				//layout: 'vbox',
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
						cls: 'col-sm-12 col-md-12 col-lg-12',
						filterConfig: { property: "param_name", value: "body_weight_exercise", exactMatch: true }
					}
				]
				
			},
			{
				xtype: 'container',
				itemId: 'repetitionsContainer',
				cls: 'col-sm-6 col-md-6 col-lg-4',
				//layout: 'vbox',
				items:
				[
					{
						xtype: 'label',
						html: 'Repetitions',
						instructionAttr: 'repetitions',
						cls: 'col-sm-12 col-md-12 col-lg-12',
						style: 'text-align: center;color:white;'
					},
					{
						xtype: 'textfield',
						itemId: 'repetitionsValue',
						placeHolder: 'Enter Repetitions',
						cls: 'col-sm-12 col-md-12 col-lg-12',
						//width: '150px'
						/* xtype: 'genericConstantsDD',
						filterConfig: { property: "param_name", value: "repetitions", exactMatch: true } */
					}
				]
				
			},
			{
				xtype: 'container',
				itemId: 'setsContainer',
				cls: 'col-sm-12 col-md-12 col-lg-4',
				//layout: 'vbox',
				items:
				[
					{
						xtype: 'label',
						html: 'Sets',
						instructionAttr: 'sets',
						cls: 'col-sm-12 col-md-12 col-lg-12',
						style: 'text-align: center;color:white;'
					},
					{
						xtype: 'genericConstantsDD',
						itemId: 'setsValue',
						cls: 'col-sm-12 col-md-12 col-lg-12',
						filterConfig: { property: "param_name", value: "sets", exactMatch: true }
					}
				]
				
			}
		]
	},

	initialize: function() {	
		this.callParent();
		var initializationConfiguration = this.getInitializationConfiguration();
		if(initializationConfiguration)
		{
			var genericConstantsStore = Ext.getStore('GenericConstants');
			genericConstantsStore.on('load', function(){
				var exerciseTypeSelectComponent = this.getComponent('exerciseNameContainer').getComponent('exerciseTypeValue');	
				var exerciseSelectFieldStore = exerciseTypeSelectComponent.getStore();
				var indexOfRecInStore1 = exerciseSelectFieldStore.findExact('param_value', initializationConfiguration['exercise_name']);
				exerciseTypeSelectComponent.setValue(exerciseSelectFieldStore.getAt(indexOfRecInStore1));
				
				var repetitionsTextFieldComponent = this.getComponent('repetitionsContainer').getComponent('repetitionsValue');
				repetitionsTextFieldComponent.setValue(initializationConfiguration['repetitions']);
				
				var setsSelectComponent = this.getComponent('setsContainer').getComponent('setsValue');
				var setsSelectFieldStore = setsSelectComponent.getStore();
				var indexOfRecInStore2 = setsSelectFieldStore.findExact('param_value', initializationConfiguration['sets']);
				setsSelectComponent.setValue(setsSelectFieldStore.getAt(indexOfRecInStore2));
				
			},this);
		}
	},
	
	onPainted: function()
	{
		console.log("Inside the paint event");
		
	}
});
