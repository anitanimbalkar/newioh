Ext.define('Ayushman.view.cdm.components.FilteredPatientListItemComponentView', {
    extend: 'Ayushman.common.baseclasses.view.BaseView',
	alias: 'widget.filteredpatientlistitemcomponent',
	requires: ['Ext.MessageBox'],
	
	config:
	{		
		filterConfig: '',
		addViewToViewStack: false,
		cls: 'container equalHeightRow',		
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
						//src: 'http://192.168.1.169:90/ayushman/assets/userphotos/37.png',
						height: '10em',
						cls: 'col-sm-12 col-md-12 col-lg-12',
						style: 'line-height: 2.5em; text-align: center; padding-right:0px; padding-left:0px; background-color: rgb(111, 199, 228); color:white; font-size: x-small;',				
					},
					{
						xtype: 'label',
						itemId: 'patientsName',
						//html: '',
						cls: 'col-sm-12 col-md-12 col-lg-12',
						style: 'line-height: 2.5em; text-align: center; padding-right:0px; padding-left:0px;background-color: rgba(254, 215, 5, 0.62); color:darkblue; font-size: x-small;',
					}
				]
			},
			
			{
				xtype: 'container',
				itemId: 'patientDetailsContainer',		
				cls: 'col-sm-12 col-md-8 col-lg-9 equalHeightCol',
				style: 'line-height: 2.5em; text-align: center; padding-right:0px; padding-left:0px; color:darkblue; font-size: x-small;',				
				
			}
				
		]
	},
	
	 initialize: function() {
		this.callParent();

		var myControllerRef = this.getController();
		
		//following listeners are added here, because sencha does not have 'tap' event listener on 'container' 
		//so, we need to add this event by getting the element(container) from the dom		
		var containerViewEl = this.element;
		  containerViewEl.on('tap', 
			myControllerRef.tap_listItemContainer, this.getController()
		  );
		  
		
	},

	destroy: function()
	{
		console.log("Destroy of FilteredPatientListItemComponentView has been called!");
		this.callParent();
		console.log("Destroy of FilteredPatientListItemComponentView has been finished!");
	}	
	
});
