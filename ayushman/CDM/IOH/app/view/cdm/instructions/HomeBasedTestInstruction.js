Ext.define('Ayushman.view.cdm.instructions.HomeBasedTestInstruction', {
    extend: 'Ext.Container',
	alias: 'widget.HomeBased',
	config:
	
	{		
		layout: 'hbox',	
		style:	'border: 1px solid white; border-radius: 5px; padding: .5em;',
		instructionType: 'HomeBased',
		initializationConfiguration: null,
		items:
		[
			{
				xtype: 'container',
				layout: 'vbox',
				items:
				[
					{
						xtype: 'label',
						html: 'Test Name',
						instructionAttr: 'test_name',
						style: 'text-align: center;color:white;'
					},
					{
						xtype: 'textfield',
						placeHolder: 'Enter Test Name'
					}
				]
				
			},
			{
				xtype: 'container',
				layout: 'vbox',
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
						filterConfig: { property: "param_name", value: "frequency", exactMatch: true }
					}
				]
				
			},
			{
				xtype: 'container',
				layout: 'vbox',
				items:
				[
					{
						xtype: 'label',
						html: 'Acceptable Range',
						instructionAttr: 'acceptable_range',
						style: 'text-align: center;color:white;'
					},
					{
						xtype: 'genericConstantsDD',
						filterConfig: { property: "param_name", value: "acceptable_range", exactMatch: true }
					}
				]
				
			}
		]
	}
});
