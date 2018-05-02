Ext.define('Ayushman.view.cdm.PatientDetailsView', {
    extend: 'Ayushman.common.baseclasses.view.BaseView',
    xtype: 'patientdetailsview',
    
    config:
	{
		layout: 'vbox',
		scrollable: true,
		addViewToViewStack: true,
			items: [
				
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
									html: 'General Info',
									cls: 'col-sm-12 col-md-12 col-lg-12',
									style: 'text-align:center; color: white; font-size: 1.2em; margin-top: 0.3em; margin-bottom: 0.3em;'
								}
							]
						},
						{
							xtype: 'container',
							cls: 'container equalHeightRow',
							itemId: 'generalInfoSection',
							style: 'padding-left: 0.5em; padding-right:0.5em; border: 2px solid green; margin-top: .5em; margin-bottom: .5em;',
							items:
							[
								{
									xtype: 'container',
									itemId: 'patientsImageContainer',
									cls: 'col-sm-12 col-md-4 col-lg-3 equalHeightCol',
									items:
									[
										{
											xtype: 'image',
											itemId: 'patientsImage',
											src: 'http://192.168.1.169:90/ayushman/assets/userphotos/37.png',
											height: '10em',
											cls: 'col-sm-12 col-md-12 col-lg-12',
											style: 'line-height: 2.5em; text-align: center; padding-right:0px; padding-left:0px; background-color: rgb(111, 199, 228); color:white; font-size: x-small;',				
										},
										{
											xtype: 'label',
											itemId: 'patientsName',
											html: 'Karan Kumar',
											cls: 'col-sm-12 col-md-12 col-lg-12',
											style: 'line-height: 2.5em; text-align: center; padding-right:0px; padding-left:0px;background-color: rgba(254, 215, 5, 0.62); color:darkblue; font-size: x-small;',
										}
									]
								},
								{
									xtype: 'container',
									itemId: 'patientHabitsDetailsContainer',		
									cls: 'col-sm-12 col-md-8 col-lg-9 equalHeightCol',
									style: 'line-height: 2.5em; text-align: center; padding-right:0px; padding-left:0px; color:darkblue; font-size: x-small;',				
									
								}
							]
						},
						{
							xtype: 'container',
							cls: 'col-sm-12 col-md-12 col-lg-12',
							style: 'background-color:#337ab7; margin-top:1em; border-top-right-radius: 0.4em; border-top-left-radius: 0.4em;',
							items:
							[
								{
									xtype: 'label',
									html: 'Previous Regimens',
									cls: 'col-sm-12 col-md-12 col-lg-12',
									style: 'text-align:center; color: white; font-size: 1.2em; margin-top: 0.3em; margin-bottom: 0.3em;'
								}
							]
						},
						{
							xtype: 'container',
							cls: 'container equalHeightRow',
							itemId: 'previousPlansSection',
							style: 'padding-left: 0.5em; padding-right:0.5em; border: 2px solid green; margin-top: .5em; margin-bottom: .5em;',
							items:
							[	
								{
									xtype: 'container',
									itemId: 'previousPlansHeaderContainer',		
									cls: 'col-sm-12 col-md-12 col-lg-12 equalHeightCol',
									style: 'line-height: 2.5em; text-align: center; padding-right:0px; padding-left:0px; color:darkblue;',				
									
									items:
									[
										{
											xtype: 'label',
											html: 'Plan Id',
											cls: 'col-sm-2 col-md-2 col-lg-2',
											style: 'text-align:center; color: white; font-size: 1.2em; margin-top: 0.3em; margin-bottom: 0.3em; background-color:rgb(225, 133, 133);'
										},
										{
											xtype: 'label',
											html: 'Start Date',
											cls: 'col-sm-5 col-md-5 col-lg-5',
											style: 'text-align:center; color: white; font-size: 1.2em; margin-top: 0.3em; margin-bottom: 0.3em; background-color:rgb(111, 199, 228);'
										},
										{
											xtype: 'label',
											html: 'End Date',
											cls: 'col-sm-5 col-md-5 col-lg-5',
											style: 'text-align:center; color: black; font-size: 1.2em; margin-top: 0.3em; margin-bottom: 0.3em; background-color:rgba(254, 215, 5, 0.619608);'
										}
									]
								}
							]
						},
						{
							xtype: 'container',
							cls: 'col-sm-12 col-md-12 col-lg-12',
							style: 'margin-top:1em;',
							items:
							[
								{
									xtype: 'button',
									html: 'Create Regimen',
									itemId: 'createRegimenButton',
									cls: 'col-sm-offset-3 col-sm-6 col-md-offset-4 col-md-4 col-lg-offset-4 col-lg-4',		
									pressedCls: 'createRegimenButtonPressed',
									style: 'color: white; font-size: 1.2em; margin-top: 0.1em; margin-bottom: 0.1em;'
								}
							]
						},
					]
				}
			   
			]
    },
	
	 initialize: function() {
		this.callParent();

		var myControllerRef = this.getController();		
		var patientsGeneralDetailsStore = Ext.getStore('PatientsGeneralDetailsStore');
		var patientGeneralInfo = patientsGeneralDetailsStore.getById(myControllerRef.getPatientId());
		
		var imageComponent = this.getComponent('patientsDetailsMainContainer').getComponent('generalInfoSection').getComponent('patientsImageContainer').getComponent('patientsImage');
		imageComponent.setSrc(Ayushman.util.Config.getBaseUrlRoot() + patientGeneralInfo.get('photo_c'));
		
		var patientsNameLabelComponent = this.getComponent('patientsDetailsMainContainer').getComponent('generalInfoSection').getComponent('patientsImageContainer').getComponent('patientsName');
		patientsNameLabelComponent.setHtml(patientGeneralInfo.get('firstname_c') + " " + patientGeneralInfo.get('lastname_c'));
		
		
	},
	
	destroy: function()
	{
		console.log("Destroy of PatientDetailsView has been called!");
		this.callParent();
		console.log("Destroy of PatientDetailsView has been finished!");
	}
});
