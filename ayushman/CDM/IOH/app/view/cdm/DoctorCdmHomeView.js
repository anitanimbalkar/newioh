Ext.define('Ayushman.view.cdm.DoctorCdmHomeView', {
    extend: 'Ayushman.common.baseclasses.view.BaseView',
    xtype: 'doctorcdmhome',
    
    config: {
	layout: 'vbox',
	scrollable: true,
	addViewToViewStack: true,
        items: [
            {
                xtype: 'titlebar',
				docked: 'top',
				title: 'Doctors Home',
				style: 'background-color:cadetblue;'
            },
			{
				xtype: 'container',				
				cls: 'container',
				itemId: 'groupStatisticsContainer',
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
								html: 'Group Statistics',
								cls: 'col-sm-12 col-md-12 col-lg-12',
								style: 'text-align:center; color: white; font-size: 1.2em; margin-top: 0.3em; margin-bottom: 0.3em;'
							}
						]
					},
					{
						xtype: 'container',
						cls: 'col-sm-12 col-md-12 col-lg-12 equalHeightRow',
						style: 'padding-left:0px; padding-right:0px;',
						items:
						[
						   {
								xtype: 'label',
								html: 'Starting Dimension',
								cls: 'col-sm-12 col-md-6 col-lg-3 equalHeightCol',
								style: 'padding-top: 1em; color:white; text-align:center; background-color: rgb(111, 199, 228);'
						   },
						   {
								xtype: 'genericConstantsDD',
								itemId: 'startingDimensionDD',
								cls: 'col-sm-12 col-md-6 col-lg-3 equalHeightCol',
								valueField: 'id',
								value:'7',	// this is default value which is 'Exercise'
								displayField: 'dimension_name',
								entity: 'DimensionHierarchyStore',
								filterConfig: '',
								sorterConfig: '',
								style: 'background-color:rgb(111, 199, 228);'
						   },
						   {
								xtype: 'label',
								html: 'Time Frame',
								cls: 'col-sm-12 col-md-6 col-lg-3 equalHeightCol',
								style: 'padding-top: 1em; color:white; text-align:center; background-color: rgb(208, 211, 109);'
						   },
						   {
								xtype: 'genericConstantsDD',
								cls: 'col-sm-12 col-md-6 col-lg-3 equalHeightCol',
								valueField: 'id',
								displayField: 'timeframe',
								entity: 'DrillDownTimeFrameStore',
								filterConfig: '',
								sorterConfig: '',
								style: 'background-color: rgb(208, 211, 109);'
						   }
						]
						
					}
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
