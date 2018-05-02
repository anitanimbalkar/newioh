Ext.define('Ayushman.view.cdm.SelectPeriodAndGoalForRegimenView', {
    extend: 'Ayushman.common.baseclasses.view.BaseView',
    xtype: 'selectperiodandgoalforregimenview',
    
    config:
	{
		layout: 'vbox',
		scrollable: true,
		addViewToViewStack: true,
			items: [
				{
					xtype : 'toolbar',
					docked: 'top',
					title: 'Create Plan Page - I',
					//style: 'background-color:#E5B227'
					style: 'background-color:cadetblue;',
				},
				{
					xtype: 'container',				
					cls: 'container',
					itemId: 'patientsDetailsMainContainer',
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
									html: 'Select Period',
									cls: 'col-sm-12 col-md-12 col-lg-12',
									style: 'text-align:center; color: white; font-size: 1.2em; margin-top: 0.3em; margin-bottom: 0.3em;'
								}
							]
						},
						{
							xtype: 'container',
							cls: 'container equalHeightRow',
							itemId: 'selectStartingDateSection',
							style: 'padding-left: 0px; padding-right:0px; border: 1px solid green; margin-top: .5em; margin-bottom: .5em;',
							items:
							[
								{
									xtype: 'label',
									html: 'Starting Date',
									cls: 'col-sm-12 col-md-6 col-lg-6',
									style: 'text-align:center; color: black; font-size: 1.2em; padding-top: 0.8em; padding-bottom: 0.9em; background-color:rgba(230, 190, 93, 0.93);'
								},
								{
									xtype: 'datepickerfield',
									name: 'birthDate',
									itemId: 'startingDate',
									cls: 'col-sm-12 col-md-6 col-lg-6',
									value: new Date(),
									picker: {
										cancelButton: 'Clear',
										yearFrom: 2014, 
										yearTo: 2025
									}
																		
								}
							]
						},
						{
							xtype: 'container',
							cls: 'container equalHeightRow',
							itemId: 'selectDurationSection',
							style: 'padding-left: 0px; padding-right:0px; border: 1px solid green; margin-top: .5em; margin-bottom: .5em;',
							items:
							[
								{
									xtype: 'label',
									html: 'Duration',
									cls: 'col-sm-12 col-md-6 col-lg-6',
									style: 'text-align:center; color: black; font-size: 1.2em; padding-top: 0.8em; padding-bottom: 0.9em; background-color:rgba(230, 190, 93, 0.93);'
								},
								{
									xtype: 'genericConstantsDD',
									cls: 'col-sm-12 col-md-6 col-lg-6',
									valueField: 'id',
									displayField: 'timeframe',
									entity: 'DrillDownTimeFrameStore',
									filterConfig: '',
									sorterConfig: '',
									//style: 'background-color: rgb(208, 211, 109);'
							   }
							]
						},
						/* {
							xtype: 'container',
							cls: 'col-sm-12 col-md-12 col-lg-12',
							style: 'background-color:#337ab7; margin-top:1em; border-top-right-radius: 0.4em; border-top-left-radius: 0.4em;',
							items:
							[
								{
									xtype: 'label',
									html: 'Select Goal',
									cls: 'col-sm-12 col-md-12 col-lg-12',
									style: 'text-align:center; color: white; font-size: 1.2em; margin-top: 0.3em; margin-bottom: 0.3em;'
								}
							]
						},
						{
							xtype: 'container',
							cls: 'container equalHeightRow',
							itemId: 'selectGoalSection',
							style: 'border: 2px solid green; margin-top: .5em; margin-bottom: .5em; padding-left:0px; padding-right:0px;',
							items:
							[
								{
									xtype: 'HealthParamBased',
									cls: 'col-sm-12 col-md-12 col-lg-12'
								}
							]
						}, */
						{
							xtype: 'container',
							cls: 'col-sm-12 col-md-12 col-lg-12',
							style: 'margin-top:1em;',
							items:
							[
								{
									xtype: 'button',
									html: 'Next',
									itemId: 'nextButtonOnSelectPeriodAndGoalPage',
									cls: 'col-sm-offset-3 col-sm-6 col-md-offset-4 col-md-4 col-lg-offset-4 col-lg-4',		
									pressedCls: 'createRegimenButtonPressed',
									style: 'color: white; font-size: 1.2em; margin-top: 0.1em; margin-bottom: 0.1em;'
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
		/* var patientsGeneralDetailsStore = Ext.getStore('PatientsGeneralDetailsStore');
		var patientGeneralInfo = patientsGeneralDetailsStore.getById(myControllerRef.getPatientId()); */
		
	},
	
	destroy: function()
	{
		console.log("Destroy of SelectPeriodAndGoalForRegimenView has been called!");
		this.callParent();
		console.log("Destroy of SelectPeriodAndGoalForRegimenView has been finished!");
	}
});
