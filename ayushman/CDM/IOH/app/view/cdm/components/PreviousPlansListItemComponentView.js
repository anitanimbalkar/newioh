Ext.define('Ayushman.view.cdm.components.PreviousPlansListItemComponentView', {
    extend: 'Ayushman.common.baseclasses.view.BaseView',
	alias: 'widget.previousplanslistitemcomponent',
	requires: ['Ext.MessageBox'],
	
	config:
	{		
		filterConfig: '',
		addViewToViewStack: false,
		cls: 'container equalHeightRow',		
		style: 'padding-left: 0em; padding-right:0em; border: 1px solid green; margin-top: .5em; margin-bottom: .5em;',
		
		items:
		[
			{
				xtype: 'container',
				itemId: 'previousPlanListItemContainer',
				cls: 'col-sm-12 col-md-12 col-lg-12',
				style: 'line-height: 2.5em; padding-left: 0em; padding-right:0em;',
				items:
				[
					{
						xtype: 'label',
						html: 'Plan Id',
						itemId: 'planId',
						cls: 'col-sm-2 col-md-2 col-lg-2',
						style: 'text-align:center; color: white; font-size: 1em; margin-top: 0.3em; margin-bottom: 0.3em; background-color:rgb(225, 133, 133);'
					},
					{
						xtype: 'label',
						html: 'Start Date',
						itemId: 'startDate',
						cls: 'col-sm-5 col-md-5 col-lg-5',
						style: 'text-align:center; color: white; font-size: 1em; margin-top: 0.3em; margin-bottom: 0.3em; background-color:rgb(111, 199, 228);'
					},
					{
						xtype: 'label',
						html: 'End Date',
						itemId: 'endDate',
						cls: 'col-sm-5 col-md-5 col-lg-5',
						style: 'text-align:center; color: black; font-size: 1em; margin-top: 0.3em; margin-bottom: 0.3em; background-color:rgba(254, 215, 5, 0.619608);'
					}
				]
			}
		]
	},
	
	 initialize: function() {
		this.callParent();

		var myControllerRef = this.getController();
		
		//following listener is added here, because sencha does not have 'tap' event listener on 'container' 
		//so, we need to add this event by getting the element(container) from the dom		
		var containerViewEl = this.element;
		  containerViewEl.on('tap', 
			myControllerRef.tap_listItemContainer, this.getController()
		  );
		  
		
	},

	destroy: function()
	{
		console.log("Destroy of PreviousPlansListItemComponentView has been called!");
		this.callParent();
		console.log("Destroy of PreviousPlansListItemComponentView has been finished!");
	}	
	
});
