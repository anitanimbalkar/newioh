Ext.define('Ayushman.controller.cdm.CreateRegimenFinishedPageController', { extend : 'Ayushman.common.baseclasses.controller.BaseController',   config: 	 {		nameSpacePrefix: 'Ayushman.view.cdm.',		patientId: null	 },	 	createInstanceOfView: function()	{		this.callParent();		},		tap_nextButtonOnSelectPeriodAndGoalPage: function()	{					var createRegimenControllerInstance = Ext.create('Ayushman.controller.cdm.CreateRegimenController', 															{ 																globalControllerInstance: this.getGlobalControllerInstance(), 																patientId: this.getPatientId(),																startDate: startingDateString,																endDate: endDateString 															});		var createRegimenViewInstance = createRegimenControllerInstance.getViewInstance();		this.getGlobalControllerInstance().getViewInstance().getComponent('iohFrameViewInnerContainer').add(createRegimenViewInstance);		this.getGlobalControllerInstance().getViewInstance().getComponent('iohFrameViewInnerContainer').setActiveItem(createRegimenViewInstance);	},		check_createOneMorePlan : function(me, e, eOpts)	{		console.log("Helllllo..... Inside the createOneMorePlan!" +me);		var globalControllerInstance = this.getGlobalControllerInstance();		globalControllerInstance.tap_backButton();		globalControllerInstance.tap_backButton();	},		check_doNotCeateOneMorePlan : function(me, e, eOpts)	{		console.log("hellow..... Inside the doNotCreateOnMorePlan" + e);		var globalControllerInstance = this.getGlobalControllerInstance();		globalControllerInstance.tap_backButton();		globalControllerInstance.tap_backButton();		globalControllerInstance.tap_backButton();	},	destroy: function()	{		// do the cleanup here				this.callParent();				this.setNameSpacePrefix(null);	}	});