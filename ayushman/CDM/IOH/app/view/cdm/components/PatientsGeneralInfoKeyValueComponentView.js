Ext.define('Ayushman.view.cdm.components.PatientsGeneralInfoKeyValueComponentView', {
    extend: 'Ayushman.common.baseclasses.view.BaseView',
	alias: 'widget.patientsgeneralinfokeyvaluecomponent',
	requires: ['Ext.MessageBox'],
	
	config:
	{		
		filterConfig: '',
		addViewToViewStack: false,
		//scrollable: true,		
		cls: 'col-sm-6 col-md-6 col-lg-4',
		style: 'padding-left: 0.5em; padding-right:0.5em; border: 1px solid black; margin-top: .5em; margin-bottom: .5em;',
		
		items:
		[
			{
				xtype: 'label',
				itemId: 'keyLabel',
				//html: 'Exercise',
				cls: 'col-sm-7 col-md-7 col-lg-7',
				style: 'line-height: 2.5em; text-align: center; padding-right:0px; padding-left:0px; background-color: rgb(111, 199, 228); color:white; font-size: x-small;',				
			},
			{
				xtype: 'label',
				itemId: 'valueLabel',
				//html: '0-25%',
				cls: 'col-sm-5 col-md-5 col-lg-5',
				style: 'line-height: 2.5em; text-align: center; padding-right:0px; padding-left:0px;background-color: rgba(254, 215, 5, 0.62); color:darkblue; font-size: x-small;',				
			}
				
		]
	},
	
	 initialize: function() {
		this.callParent();

		var myControllerRef = this.getController();
		var keyLabelComponent = this.getComponent('keyLabel');
		keyLabelComponent.setHtml(myControllerRef.getKeyLabel());
		
		var valueLabelComponent = this.getComponent('valueLabel');
		valueLabelComponent.setHtml(myControllerRef.getValueLabel());
		
		
	},

	destroy: function()
	{
		console.log("Destroy of PatientGeneralInfoKeyValueComponentView has been called!");
		this.callParent();
		console.log("Destroy of PatientGeneralInfoKeyValueComponentView has been finished!");
	}	
	
});
