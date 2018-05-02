Ext.define('Ayushman.view.cdm.DrillDownFiltersContainerView', {
    extend: 'Ayushman.common.baseclasses.view.BaseView',
    xtype: 'drilldownfilterscontainer',
    
    config: {
		cls: 'container',
		style: 'background-color: rgba(25, 237, 60, 0.31);',
		itemId: 'drillDownFiltersContainerComponentId',
        items: 
		[
				
        ]
    },
	
	destroy: function()
	{
		console.log("Destroy of DrillDownFiltersContainerView has been called!");
		this.callParent();
	}
});
