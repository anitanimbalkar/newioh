Ext.define('Ayushman.view.cdm.components.DrillDownFilterComponentView', {
    extend: 'Ayushman.common.baseclasses.view.BaseView',
	alias: 'widget.drilldownfiltercomponent',
	requires: ['Ext.MessageBox'],
	
	config:
	{		
		filterConfig: '',
		addViewToViewStack: false,
		//scrollable: true,		
		cls: 'col-sm-6 col-md-6 col-lg-4',
		style: 'padding-left: 0.5em; padding-right:0.5em; border: 1px solid black; margin-top: .5em; margin-bottom: .5em;',
		
		items:
		[
			{
				xtype: 'label',
				itemId: 'dimensionFilterLabel',
				html: 'Exercise',
				cls: 'col-sm-7 col-md-7 col-lg-7',
				style: 'line-height: 2.5em; text-align: center; padding-right:0px; padding-left:0px; background-color: rgb(111, 199, 228); color:white; font-size: x-small;',				
			},
			{
				xtype: 'label',
				itemId: 'groupFilterLabel',
				html: '0-25%',
				cls: 'col-sm-5 col-md-5 col-lg-5',
				style: 'line-height: 2.5em; text-align: center; padding-right:0px; padding-left:0px;background-color: rgba(254, 215, 5, 0.62); color:darkblue; font-size: x-small;',				
			}
				
		]
	},
	
	 initialize: function() {
		this.callParent();

		var myControllerRef = this.getController();
		var dimensionFilterLableComponent = this.getComponent('dimensionFilterLabel');
		dimensionFilterLableComponent.setHtml(myControllerRef.getDimensionFilterLabel());
		
		var groupFilterLabelComponent = this.getComponent('groupFilterLabel');
		groupFilterLabelComponent.setHtml(myControllerRef.getGroupFilterLabel());
		
		
	},

	destroy: function()
	{
		console.log("Destroy of DrillDownFilterComponentView has been called!");
		this.callParent();
		console.log("Destroy of DrillDownFilterComponentView has been finished!");
	}	
	
});
