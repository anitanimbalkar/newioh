Ext.define('Ayushman.view.cdm.CreateRegimenFinishedPageView', {
    extend: 'Ayushman.common.baseclasses.view.BaseView',
    xtype: 'createregimenfinishedpageview',
	requires: ['Ext.field.Radio'],
    
    config:
	{
		layout: 'vbox',
		scrollable: true,
		addViewToViewStack: true,
			items: [
				{
					xtype : 'toolbar',
					docked: 'top',
					title: 'Create Plan Finished',
					//style: 'background-color:#E5B227'
					style: 'background-color:cadetblue;',
				},
				{
					xtype: 'container',				
					cls: 'container',
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
									html: 'Plan created succesfully!',
									cls: 'col-sm-12 col-md-12 col-lg-12',
									style: 'text-align:center; color: white; font-size: 1.2em; margin-top: 0.3em; margin-bottom: 0.3em;'
								}
							]
						},
						{
							xtype: 'container',
							cls: 'container equalHeightRow',
							itemId: 'selectOptionSection',
							style: 'padding-left: 0px; padding-right:0px; border: 1px solid green; margin-top: .5em; margin-bottom: .5em;',
							items:
							[
								{
									xtype: 'label',
									html: 'Plan saved succesfully. Do you want to create one more plan for next period?',
									cls: 'col-sm-12 col-md-12 col-lg-12',
									style: 'text-align:center; color: black; font-size: 1.2em; padding-top: 0.8em; padding-bottom: 0.9em; background-color:rgba(230, 190, 93, 0.93);'
								},
								{
									xtype: 'container',
									cls: 'col-sm-12 col-md-12 col-lg-12 equalHeightRow',
									style: 'padding-right:0px; padding-left:0px;',
									items:
									[
										{
											xtype: 'radiofield',
											itemId: 'createOneMorePlan',
											name: 'createOnMorePlanRadioGroup',
											cls: 'col-sm-6 col-md-6 col-lg-6 equalHeightCol',
											style:'background-color:rgba(144, 208, 173, 0.54);',
											value: 'yes',
										},
										{
											xtype: 'label',
											html: 'Yes',
											cls: 'col-sm-6 col-md-6 col-lg-6 equalHeightCol',
											style: 'text-align:left; color: black; font-size: 1.2em; padding-top: 0.8em; padding-bottom: 0.9em; background-color:rgba(144, 208, 173, 0.54);'
										}
									]
									
								},
								{
									xtype: 'container',
									cls: 'col-sm-12 col-md-12 col-lg-12 equalHeightRow',
									style: 'padding-right:0px; padding-left:0px;',
									items:
									[
										{
											xtype: 'radiofield',
											name: 'createOnMorePlanRadioGroup',
											itemId: 'doNotCeateOneMorePlan',
											cls: 'col-sm-6 col-md-6 col-lg-6 equalHeightCol',
											style: 'background-color:rgba(146, 162, 237, 0.68);',
											value: 'no',
										},
										{
											xtype: 'label',
											html: 'No',
											cls: 'col-sm-6 col-md-6 col-lg-6 equalHeightCol',
											style: 'text-align:left; color: black; font-size: 1.2em; padding-top: 0.8em; padding-bottom: 0.9em; background-color:rgba(146, 162, 237, 0.68);'
										}
									]
								}
							]
						}
						
					]
				}
			   
			]
    },
	
	 initialize: function() {
		this.callParent();

		var myControllerRef = this.getController();
		
	},
	
	destroy: function()
	{
		console.log("Destroy of CreateRegimenFinishedPageView has been called!");
		this.callParent();
		console.log("Destroy of CreateRegimenFinishedPageView has been finished!");
	}
});
