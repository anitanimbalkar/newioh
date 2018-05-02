Ext.define("Ayushman.view.cdm.components.SingleInstructionContainerView", {
extend : "Ayushman.common.baseclasses.view.BaseView",
alias : 'widget.singleInstrContainer',
requires : ['Ext.field.DatePicker'],


	config:
	{
		//layout:'hbox',
		cls: 'col-sm-12 col-md-12 col-lg-12',
		//style: 'margin-left:2em; margin-bottom:.5em;margin-top:.5em;',
		instructionType: null,
		addViewToViewStack: false,
		items: 
		[
			
		]
	},
		
		
	initialize: function() {
		this.callParent();
		var initializationConfiguration = this.getController().getInitializationConfiguration();
		//if want to show previously created regimen, then dont add 'delete button' to the instruction.
		if(initializationConfiguration)
		{
			this.add( 
				[
					{
						xtype: this.getController().getInstructionType(),
						initializationConfiguration: this.getController().getInitializationConfiguration(),
						cls: 'col-sm-12 col-md-12 col-lg-12',
						//style:	'border: 1px solid white; border-radius: 5px; padding: .5em; width:90%;'
						
					}
				]
			);
		}
		else
		{
			this.add( 
				[
					{
						xtype: this.getController().getInstructionType(),
						cls: 'col-sm-10 col-md-10 col-lg-11',
						//style:	'border: 1px solid white; border-radius: 5px; padding: .5em; width:90%;'
						
					},
					{
						xtype: 'button', 
						itemId: 'deleteSingleInstructionButton',
						cls: 'col-sm-2 col-md-2 col-lg-1',
						iconCls: 'delete',									
						style: 'background-color: rgb(229, 178, 39); height:2.6em; margin-top:0.5em; max-width:3.5em;'					
					}
				]
			);
		}
			
	},
	
	destroy: function()
	{
		console.log("Destroy function of SingleInstructionContainer is called!");
		this.callParent();	
		this.setInstructionType(null);
		console.log("Destroy function of SingleInstructionContainer is finished!");
	}
});

