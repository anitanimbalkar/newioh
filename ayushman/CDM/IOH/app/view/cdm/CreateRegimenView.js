Ext.define('Ayushman.view.cdm.CreateRegimenView', {
    extend: 'Ayushman.common.baseclasses.view.BaseView',
	 requires: [  
				  'Ext.MessageBox'
				 ],
	
	config: {
		layout: 'vbox',
		scrollable: true,
		addViewToViewStack: true,
        items: [
			{
				xtype : 'toolbar',
				docked: 'top',
				title: 'Create Plan Page - II',
				//style: 'background-color:#E5B227',
				style: 'background-color:cadetblue;'
			},
			{
				xtype: 'container',
				itemId: 'createRegimenMainContainer',
				cls: 'col-sm-12 col-md-12 col-lg12'
			},
			{
				xtype: 'container',
				cls: 'col-sm-12 col-md-12 col-lg-12',
				style: 'margin-top:1em;',
				items:
				[
					{
						xtype: 'button',
						html: 'Save Regimen',
						itemId: 'saveRegimenButton',
						cls: 'col-sm-offset-3 col-sm-6 col-md-offset-4 col-md-4 col-lg-offset-4 col-lg-4',		
						pressedCls: 'createRegimenButtonPressed',
						style: 'color: white; font-size: 1.2em; margin-top: 0.1em; margin-bottom: 0.1em;'
					}
				]
			},
			
           
        ]
    },
	initialize: function() {
		this.callParent();		
	}	
	
});
