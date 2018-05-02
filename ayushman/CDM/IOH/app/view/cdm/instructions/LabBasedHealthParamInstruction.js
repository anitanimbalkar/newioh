Ext.define('Ayushman.view.cdm.instructions.LabBasedHealthParamInstruction', {
    extend: 'Ext.Container',
	alias: 'widget.LabBased',
	config:
	{		
		//layout: 'hbox',	
		cls: 'container',
		style:	'border: 1px solid white; border-radius: 5px; padding-right:0px; padding-left:0px; margin-top:0.5em; margin-bottom:0.5em;',
		instructionType: 'LabBased',
		initializationConfiguration: null,
		items:
		[
			{
				xtype: 'container',
				itemId: 'healthParamNameContainer',
				cls: 'col-sm-12 col-md-12 col-lg-12',
				style: 'border: 1px solid green; padding-right:0px; padding-left:0px; margin-bottom:0.5em;',
				//layout: 'vbox',
				items:
				[
					{
						xtype: 'label',
						html: 'Health Parameter',
						instructionAttr: 'health_param_name',
						cls: 'col-sm-12 col-md-6 col-lg-6',
						//style: 'text-align: center;color:black; background-color:rgba(230, 190, 93, 0.93);'
						style: 'text-align:center; color: black; font-size: 1em; padding-top: 0.8em; padding-bottom: 1.5em; background-color:rgba(242, 195, 83, 0.55);'
					},
					{
						xtype: 'genericConstantsDD',
						itemId: 'healthParamNameValue',
						cls: 'col-sm-12 col-md-6 col-lg-6',
						filterConfig: { property: "param_name", value: "health_param_name", exactMatch: true }
					}
				]
				
			},
			{
				xtype: 'container',
				itemId: 'minimumValueContainer',
				cls: 'col-sm-12 col-md-12 col-lg-12',
				style: 'border: 1px solid green; padding-right:0px; padding-left:0px; margin-bottom:0.5em;',
				//layout: 'vbox',
				items:
				[
					{
						xtype: 'label',
						html: 'Minimum Value',
						instructionAttr: 'minimum_value',
						cls: 'col-sm-12 col-md-6 col-lg-6',						
						//style: 'text-align:center; color: black; font-size: 1em; padding-top: 0.8em; padding-bottom: 1.5em; background-color:rgba(230, 190, 93, 0.93);'
						style: 'text-align:center; color: black; font-size: 1em; padding-top: 0.8em; padding-bottom: 1.5em; background-color:rgba(242, 195, 83, 0.55);'
					},
					{
						xtype: 'textfield',
						itemId: 'minimumValueValue',
						placeHolder: 'Enter Minimum Value',
						cls: 'col-sm-12 col-md-6 col-lg-6'
					}
				]
				
			},
			{
				xtype: 'container',
				itemId: 'maximumValueContainer',
				cls: 'col-sm-12 col-md-12 col-lg-12',
				style: 'border: 1px solid green; padding-right:0px; padding-left:0px; margin-bottom:0.5em;',
				//layout: 'vbox',
				items:
				[			
					{
						xtype: 'label',
						html: 'Maximum Value',
						instructionAttr: 'maximum_value',
						cls: 'col-sm-12 col-md-6 col-lg-6',
						style: 'text-align:center; color: black; font-size: 1em; padding-top: 0.8em; padding-bottom: 1.5em; background-color:rgba(242, 195, 83, 0.55);'
					},
					{
						xtype: 'textfield',
						itemId: 'maximumValueValue',
						placeHolder: 'Enter Maximum Value',
						cls: 'col-sm-12 col-md-6 col-lg-6',
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
				var healthParamNameSelectComponent = this.getComponent('healthParamNameContainer').getComponent('healthParamNameValue');					
				var healthParamNameSelectFieldStore = healthParamNameSelectComponent.getStore();
				var indexOfRecInStore1 = healthParamNameSelectFieldStore.findExact('param_value', initializationConfiguration['health_param_name']);
				healthParamNameSelectComponent.setValue(healthParamNameSelectFieldStore.getAt(indexOfRecInStore1));
				
			},this);
			
			var minimumValueTextFieldComponent = this.getComponent('minimumValueContainer').getComponent('minimumValueValue');
			minimumValueTextFieldComponent.setValue(initializationConfiguration['minimum_value']);
			
			var maximumValueTextFieldComponent = this.getComponent('maximumValueContainer').getComponent('maximumValueValue');
			maximumValueTextFieldComponent.setValue(initializationConfiguration['maximum_value']);
		}
	}
});
