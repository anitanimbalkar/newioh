Ext.define('Ayushman.view.cdm.CdmPatientsListView', {
    extend: 'Ayushman.common.baseclasses.view.BaseView',
    xtype: 'cdmpatientslist',
    
    config:
	{
		layout: 'vbox',
		scrollable: true,
		addViewToViewStack: true,
			items: [
				{
							xtype: 'container',
							cls: 'col-sm-12 col-md-12 col-lg-12',
							style: 'margin-top:1em;',
							items:
							[
								{
									xtype: 'button',
									html: 'Send Message',
									itemId: 'goToSendSmsViewButton',
									//cls: 'col-sm-offset-3 col-sm-6 col-md-offset-4 col-md-4 col-lg-offset-4 col-lg-4',		
									cls: ' col-sm-6 col-md-4 col-lg-4',
									pressedCls: 'createRegimenButtonPressed',
									//style: 'width:4em;height:4em; padding:0.3em 0.3em; border: 1px solid green; border-radius: 50%; background-color: rgb(240, 248, 255); background-image:url("touch/resources/images/message2.png");  background-repeat:round;'
									style: 'color: white; font-size: 1.2em; margin-top: 0.1em; margin-bottom: 0.1em;'
								}
							]
				},
				{
					xtype: 'container',				
					cls: 'container',
					itemId: 'patientsListContainer',
					items:
					[
						{
							xtype: 'container',
							cls: 'col-sm-12 col-md-12 col-lg-12',
							style: 'background-color:#337ab7; margin-top:1em; border-top-right-radius: 0.4em; border-top-left-radius: 0.4em;',
							items:
							[
								{
									xtype: 'label',
									html: 'Patients List',
									cls: 'col-sm-12 col-md-12 col-lg-12',
									style: 'text-align:center; color: white; font-size: 1.2em; margin-top: 0.3em; margin-bottom: 0.3em;'
								}
							]
						}
					]
				}
			   
			]
    },
	
	destroy: function()
	{
		console.log("Destroy of CdmPatientsListView has been called!");
		this.callParent();
		console.log("Destroy of CdmPatientsListView has been finished!");
	}
});
