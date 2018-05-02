Ext.define('Ayushman.view.cdm.components.DrillDownGraphView', {
    extend: 'Ayushman.common.baseclasses.view.BaseView',
	alias: 'widget.drilldowngraphcomponent',
	requires: ['Ext.MessageBox'],
	
	config:
	{		
		filterConfig: '',
		addViewToViewStack: false,
		//scrollable: true,
		//layout: 'vbox',
		height: 400,
		cls: 'container',
		style: 'padding-left: 0px; padding-right:0px;',
		
		items:
		[
			{
				xtype: 'container',
				itemId: 'drillDownBarChartParentContainer',
				//layout: "fit",
				height: '100%',
				cls: 'col-sm-12 col-md-12 col-lg-12',
				style: 'background-color:rgb(124, 167, 202); padding-right:0px; padding-left:0px;',
				items: [
					{
						xtype: 'categorybarchart'
					} 
				]
			}
				
		]
	},
	
	 initialize: function() {
		this.callParent();		
	},

	destroy: function()
	{
		console.log("Destroy of InstructionHolderView has been called!");
		this.callParent();
		console.log("Destroy of InstructionHolderView has been finished!");
	}	
	
});
