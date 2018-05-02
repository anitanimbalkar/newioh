Ext.define('Ayushman.view.cdm.components.DrillDownContextMenuView', {
    extend: 'Ayushman.common.baseclasses.view.BaseView',
	alias: 'widget.drilldowncontextmenucomponent',
	
	requires: [ 'Ext.List' ],
	config:
	{
		layout : 
		{
			type  : 'vbox',
			align : 'stretch'
		},
		selectedBar: null,
		flex: 1,
		items:
		[
			{
				xtype: 'button',
				itemId: 'contextMenuViewPatientsButton',
				text: 'View Patients',
				style: 'background-color: rgb(196, 154, 51); padding:1.5em; margin-bottom:0.5em;'
			}, 
			{
				xtype: 'list',
				itemId: 'contextMenuList',
				flex: 1,
				store: 'DimensionHierarchyLocalStore',
				itemTpl: '<div class="contextMenuItem{id}">{dimension_name}</div>'
			}
		]
		
	},
	
	 initialize: function() {
		this.callParent();		
	},

	destroy: function()
	{
		console.log("Destroy of DrillDownContextMenuView has been called!");
		this.callParent();
		this.setSelectedBar(null);
		console.log("Destroy of DrillDownContextMenuView has been finished!");
	}	
	
});
