Ext.define('Ayushman.controller.cdm.CreateRegimenController', { extend : 'Ayushman.common.baseclasses.controller.BaseController',  requires: ['Ext.util.MixedCollection'],  config: 	 {		nameSpacePrefix: 'Ayushman.view.cdm.',		objectsToSave:  null,		patientId: null,		startDate: null,		endDate: null	 },	 	 createInstanceOfView: function()	{		this.callParent();					var newHashMap = new Ext.util.MixedCollection();		this.setObjectsToSave(newHashMap);				var instructionHolderControllerInstance1 = Ext.create('Ayushman.controller.cdm.components.InstructionHolderController', 																{ globalControllerInstance : this.getGlobalControllerInstance(), containerTitle: 'Exercise', filterConfig: { property: "category", value: /Exercise/ } });		var instrHolderViewInstance1 = instructionHolderControllerInstance1.getViewInstance();		this.getViewInstance().getComponent('createRegimenMainContainer').add(instrHolderViewInstance1);		this.getObjectsToSave().add(1, instructionHolderControllerInstance1);				var instructionHolderControllerInstance2 = Ext.create('Ayushman.controller.cdm.components.InstructionHolderController', 																{ globalControllerInstance : this.getGlobalControllerInstance(), containerTitle: 'Nutrition', filterConfig: { property: "category", value: /Nutrition/ } });		var instrHolderViewInstance2 = instructionHolderControllerInstance2.getViewInstance();		this.getViewInstance().getComponent('createRegimenMainContainer').add(instrHolderViewInstance2);		this.getObjectsToSave().add(2, instructionHolderControllerInstance2);				var instructionHolderControllerInstance3 = Ext.create('Ayushman.controller.cdm.components.InstructionHolderController', 																{ globalControllerInstance : this.getGlobalControllerInstance(), containerTitle: 'Tests', filterConfig: { property: "category", value: /Tests/ } });		var instrHolderViewInstance3 = instructionHolderControllerInstance3.getViewInstance();		this.getViewInstance().getComponent('createRegimenMainContainer').add(instrHolderViewInstance3);		this.getObjectsToSave().add(3, instructionHolderControllerInstance3);	}, 			save: function()	{				var store = Ext.getStore('CreateRegimenStore');		var doctorCredentialsStore = Ext.getStore('UserCredentials');		var doctorsDetails = doctorCredentialsStore.getAt(0);		console.log(doctorsDetails.get('roleSpecificId'));			store.filter([				{property: "doctor_id", value: doctorsDetails.get('roleSpecificId')}			]);			store.load(function() {				store.add({ 						patient_id : this.getPatientId(),						doctor_id  : doctorsDetails.get('roleSpecificId'),						start_date : this.getStartDate(),						end_date   : this.getEndDate()					});												store.sync();							}, this);						var planId = null;				store.on('write', this.saveObjectsOnSuccesfulWrite, this);						console.log("Save function of CreateRegimenController is Finished!...");				},		saveObjectsOnSuccesfulWrite: function(storeRef, operation, eOpts)	{		var objectsSaved = 0;				if(operation.getAction() === 'create')				{					var recordsArray = operation.getRecords();					planId = recordsArray[0].getData().id;					console.log("The generated Id at the server side is :" + planId);				}				var objectsToSave = this.getObjectsToSave();				//debugger;								objectsToSave.each(function(object, index, length)				{							object.setPlanId(planId);					object.save();					objectsSaved = 1;				});								if(objectsSaved === 1)				{					var store = Ext.getStore('CreateRegimenStore');					store.un('write', this.saveObjectsOnSuccesfulWrite, this);				}	},	tap_saveRegimenButton: function()	{			this.save();					var createRegimenFinishedPageControllerInstance = Ext.create('Ayushman.controller.cdm.CreateRegimenFinishedPageController', 																{ globalControllerInstance : this.getGlobalControllerInstance()																});		var createRegimenFinishedPageViewInstance = createRegimenFinishedPageControllerInstance.getViewInstance();		this.getGlobalControllerInstance().getViewInstance().getComponent('iohFrameViewInnerContainer').add(createRegimenFinishedPageViewInstance);		this.getGlobalControllerInstance().getViewInstance().getComponent('iohFrameViewInnerContainer').setActiveItem(createRegimenFinishedPageViewInstance);	},				destroy: function()	{		// do the cleanup here				this.callParent();				this.setNameSpacePrefix(null);	}	});