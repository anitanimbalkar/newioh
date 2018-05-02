Ext.define('Ayushman.view.cdm.components.InstructionHolderView', {
    extend: 'Ayushman.common.baseclasses.view.BaseView',
	alias: 'widget.instructionHolder',
	requires: ['Ext.MessageBox'],
	
	
	
	config:
	{		
		layout: 'vbox',
		containerTitle: '',
		style: 'border:1px solid black; border-top-right-radius: 0.4em; border-top-left-radius: 0.4em; margin:1em;',
		instrCount: 0,
		filterConfig: '',
		addViewToViewStack: false,
		items:
		[
			{
				xtype: 'container',
				//layout: 'vbox',
				itemId: 'instrHolderOuterContainer',
				cls: 'container',
				style: 'padding-right:0px; padding-left:0px;',
				items: [
					{
						xtype: 'toolbar',
						//docked: 'top',
						//id: 'sectionHeaderId',
						cls: 'col-sm-12 col-md-12 col-lg-12',						
						title: 'InstructionHolderComponent',
						style: 'background-color:rgb(51, 122, 183); border-width:0px; height:2.5em; border-top-left-radius:0.4em; border-top-right-radius:0.4em;'
					},
					{
						xtype: 'container',
						itemId: 'instructionsContainer',
						cls: 'col-sm-12 col-md-12 col-lg-12',
						style: 'border: 1px solid green; padding-right:0px; padding-left:0px; margin-top:0.5em;',
						items:
						[
							{
								xtype: 'label',
								html: 'Select Instruction Type',
								itemId: 'selectInstTypeLabel',
								instructionAttr: 'minimum_value',
								cls: 'col-sm-12 col-md-6 col-lg-6',
								//style: 'text-align: center;color:black; background-color:rgba(230, 190, 93, 0.93);'
								style: 'text-align:center; color:white; font-size: 1em; padding-top: 1em; padding-bottom: 1.25em; background-color:rgb(111, 199, 228);'
							},
							{
								xtype: 'genericConstantsDD',
								itemId: 'instructionTypesDD',
								cls: 'col-sm-12 col-md-6 col-lg-6',
								style: 'margin-bottom:1em; background-color:rgba(230, 190, 93, 0.93);',
								valueField: 'instruction_type_value',
								displayField: 'instruction_type',
								entity: 'InstructionTypes',
								filterConfig: '',
								sorterConfig: '',
								scope: this
							}
						]
						
					} 
				],
				scope: this
			}
				
		]
	},
	
	 initialize: function() {
		
		var myControllerRef = this.getController();
		var instrHolderToolbar = this.down('toolbar');
		instrHolderToolbar.setTitle(myControllerRef.getContainerTitle());
		var genericConstantsDDown = this.down('genericConstantsDD');
		genericConstantsDDown.setHidden(myControllerRef.getInstrTypeDDHidden());
		var selectInstTypeLabel = this.getComponent('instrHolderOuterContainer').getComponent('instructionsContainer').getComponent('selectInstTypeLabel');
		selectInstTypeLabel.setHidden(myControllerRef.getInstrTypeDDHidden());
		
		if(myControllerRef.getInstrTypeDDHidden() === false)
		{
			var storeName = genericConstantsDDown.getStore();
			var store = Ext.getStore(storeName);
			//store.load();			
			store.clearFilter();
			store.filter([
					myControllerRef.getFilterConfig() 
				]);
			genericConstantsDDown.setStore(store);
		}	
		this.callParent();		
	},

	destroy: function()
	{
		console.log("Destroy of InstructionHolderView has been called!");
		this.callParent();
		console.log("Destroy of InstructionHolderView has been finished!");
	}	
	
});
