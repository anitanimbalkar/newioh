Ext.define('Ayushman.view.ioh.DoctorIohHomeView', {
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
				title: 'Doctors Home',
				style: 'background-color:cadetblue;'
            },
			/* {
				xtype: 'container',
				layout: 'vbox',
				width: '100%',
				height: '100%',
				items:
				[
					{
						xtype: 'button',
						html: 'Next',
						itemId: 'doctorCdmNextButton',
					}
				]
			} */
			{
				xtype: 'container',
				cls: 'row',				
				items:
				[
					{
						xtype: 'container',					
						style: 'background-color:cadetblue;',
						cls: 'col-sm-6 col-md-4 col-lg-3',
						items:
						[
							{
								xtype: 'button',
								html: 'View E.M.R.',
								style: 'background-color:purple;border-radius:0px; padding:5.3em .6em 5.3em .6em;',
								cls: 'col-sm-12 col-md-12 col-lg-12',
							}
						]
					},
					{
						xtype: 'container',					
						style: 'background-color:cadetblue;',
						cls: 'col-sm-6 col-md-4 col-lg-3',
						items:
						[
							{
								xtype: 'button',
								html: 'Start Consultation',
								style: 'background-color:#4D3ABF;border-radius:0px; padding:5.3em .6em 5.3em .6em;',
								cls: 'col-sm-12 col-md-12 col-lg-12',
							}
						]
					},
					{
						xtype: 'container',					
						style: 'background-color:cadetblue;',
						cls: 'col-sm-6 col-md-4 col-lg-3',
						items:
						[
							{
								xtype: 'button',
								html: 'View Trackers',
								style: 'background-color:rgb(22, 186, 22);border-radius:0px; padding:5.3em .6em 5.3em .6em;',
								cls: 'col-sm-12 col-md-12 col-lg-12',
							}
						]
					},
					{
						xtype: 'container',				
						style: 'background-color:cadetblue;',
						cls: 'col-sm-6 col-md-12 col-lg-3',
						items:
						[
							{
								xtype: 'button',
								html: 'My Patients',
								style: 'background-color:chocolate;border-radius:0px; padding:5.3em .6em 5.3em .6em;',
								cls: 'col-sm-12 col-md-12 col-lg-12',
							}
						]
					},
					{
						xtype: 'container',					
						style: 'background-color:cadetblue;',
						cls: 'col-sm-6 col-md-4 col-lg-4',
						items:
						[
							{
								xtype: 'button',
								html: 'My Staff',
								style: 'background-color:rgb(144, 132, 232);border-radius:0px; padding:5.3em .6em 5.3em .6em;',
								cls: 'col-sm-12 col-md-12 col-lg-12',
							}
						]
					},
					{
						xtype: 'container',					
						style: 'background-color:cadetblue;',
						cls: 'col-sm-6 col-md-4 col-lg-4',
						items:
						[
							{
								xtype: 'button',
								html: 'My Profile',
								style: 'background-color:rgb(148, 115, 82);border-radius:0px; padding:5.3em .6em 5.3em .6em;',
								cls: 'col-sm-12 col-md-12 col-lg-12',
							}
						]
					},
					{
						xtype: 'container',					
						style: 'background-color:cadetblue;',
						cls: 'col-sm-12 col-md-4 col-lg-4',
						items:
						[
							{
								xtype: 'button',
								itemId: 'switchToCdmButton',
								html: 'Switch To CDM',
								style: 'background-color:brown;border-radius:0px; padding:5.3em .6em 5.3em .6em;',
								cls: 'col-sm-12 col-md-12 col-lg-12',
							}
						]
					},
				]
			}
           
        ]
    },
	
	destroy: function()
	{
		console.log("Destroy of DoctorCdmHomeView has been called!");
		this.callParent();
	}
});
