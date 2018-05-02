Ext.define('Ayushman.view.ioh.PatientIohHomeView', {
    extend: 'Ayushman.common.baseclasses.view.BaseView',
    xtype: 'doctoriohhome',
    
    config: {
	//layout: 'vbox',
	fullscreen:true,					
			 cls: 'container',
			 scrollable: {
				direction: 'vertical',
				directionLock: true
			},
	addViewToViewStack: true,
        items: [
            {
                xtype: 'titlebar',
				docked: 'top',
				title: 'Patients Home',
				style: 'background-color:cadetblue;'
            },
			
			{
				xtype: 'container',
				cls: 'row',				
				items:
				[
					{
						xtype: 'container',					
						style: 'background-color:cadetblue;',
						cls: 'col-sm-6 col-md-6 col-lg-6',
						items:
						[
							{
								xtype: 'button',
								html: 'Upload Reports',
								style: 'background-color:purple;border-radius:0px; padding:5.3em .6em 5.3em .6em;',
								cls: 'col-sm-12 col-md-12 col-lg-12',
							}
						]
					},
					{
						xtype: 'container',					
						style: 'background-color:cadetblue;',
						cls: 'col-sm-6 col-md-6 col-lg-6',
						items:
						[
							{
								xtype: 'button',
								html: 'Upload Prescription',
								style: 'background-color:#4D3ABF;border-radius:0px; padding:5.3em .6em 5.3em .6em;',
								cls: 'col-sm-12 col-md-12 col-lg-12',
							}
						]
					},
					{
						xtype: 'container',					
						style: 'background-color:cadetblue;',
						cls: 'col-sm-6 col-md-6 col-lg-6',
						items:
						[
							{
								xtype: 'button',								
								html: 'Search Doctors',
								style: 'background-color:rgb(22, 186, 22);border-radius:0px; padding:5.3em .6em 5.3em .6em;',
								cls: 'col-sm-12 col-md-12 col-lg-12',
							}
						]
					},
					{
						xtype: 'container',				
						style: 'background-color:cadetblue;',
						cls: 'col-sm-6 col-md-6 col-lg-6',
						items:
						[
							{
								xtype: 'button',
								//itemId: 'switchToCdmButton',
								html: 'Switch To CDM View',
								style: 'background-color:chocolate;border-radius:0px; padding:5.3em .6em 5.3em .6em;',
								cls: 'col-sm-12 col-md-12 col-lg-12',
							}
						]
					}
					
				]
			}
           
        ]
    },
	
	destroy: function()
	{
		console.log("Destroy of PatientIohHomeView has been called!");
		this.callParent();
	}
});
