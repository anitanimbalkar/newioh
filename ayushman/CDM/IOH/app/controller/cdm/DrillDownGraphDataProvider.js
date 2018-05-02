Ext.define('Ayushman.controller.cdm.DrillDownGraphDataProvider', {

  config: 
	{
		dimensionId : "2",
		timeframeId : 1,
		patientIdsArray: new Array()
	},
	
	constructor: function(config) {
        this.initConfig(config);
    },
	
	getData: function()
	{
		var dimensionHierarchyLocalStore = Ext.getStore('DimensionHierarchyLocalStore');
		dimensionHierarchyLocalStore.clearFilter();
		var dimensionHierarchyRecord = dimensionHierarchyLocalStore.getById(this.getDimensionId());
		var dimensionName = dimensionHierarchyRecord.get('dimension_name');
		var dimensionwiseScoreCalculatorInstance = Ext.create('Ayushman.controller.cdm.scorecalculators.' + dimensionName + 'wiseScoreCalculator',
																	{
																		dimensionId: this.getDimensionId(),
																		timeframeId: this.getTimeframeId(),
																		patientIdsArray: this.getPatientIdsArray()
																	}
																);
		var patientsScoresArray = dimensionwiseScoreCalculatorInstance.getPatientsScores();
		
		var dividePatientsIntoBucketsHandlerInstance = Ext.create('Ayushman.controller.cdm.DividePatientsIntoBucketsHandler',
																	{
																		dimensionId: this.getDimensionId(),
																		timeframeId: this.getTimeframeId(),
																		patientIdsArray: this.getPatientIdsArray()
																	}
																);
		
		var bucketsContainingPatientsArray = dividePatientsIntoBucketsHandlerInstance.dividePatientsIntoBuckets(patientsScoresArray);
		
		this.updateBucketsWithPatientsStore(bucketsContainingPatientsArray);		
		this.updateDrillDownGraphStore(bucketsContainingPatientsArray, Ext.Object.getSize(patientsScoresArray));
	},
	
	updateDrillDownGraphStore: function(bucketsContainingPatientsArray, totalPatientsCount)
	{
		var drillDownGraphLocalStore = Ext.getStore('DrillDownGraphStore');
		drillDownGraphLocalStore.removeAll();
		
		var drillDownGraphModelsArray = [];
		for (var key in bucketsContainingPatientsArray) 
		{
			var arrayOfPatientIds = bucketsContainingPatientsArray[key].split(",");
			console.log(arrayOfPatientIds);
			var recordsCount = arrayOfPatientIds.length;
			drillDownGraphModelsArray.push( 
												{ 
													groupName : key,
													patientsPercentage: (recordsCount / totalPatientsCount) * 100													
												}
											  );	
		}
		
		drillDownGraphLocalStore.add(drillDownGraphModelsArray);
		drillDownGraphLocalStore.sync();
	},
	
	updateBucketsWithPatientsStore: function(bucketsContainingPatientsArray)
	{
		var bucketsWithPatientsLocalStore = Ext.getStore('BucketsWithPatientsLocalStore');
		bucketsWithPatientsLocalStore.removeAll();
		
		var bucketsWithPatientsModelArray = [];
		for (var key in bucketsContainingPatientsArray) 
		{
			bucketsWithPatientsModelArray.push( 
												{ 
													bucket_name : key, patients_list : bucketsContainingPatientsArray[key] 
												}
											  );	
		}
		
		bucketsWithPatientsLocalStore.add(bucketsWithPatientsModelArray);
		bucketsWithPatientsLocalStore.sync();
	},
	
	destroy: function()
	{
		console.log("Destroy function of DrillDownGraphDataProvider is called!");
		
		this.callParent();
		console.log("Destroy function of DrillDownGraphDataProvider is Finished!");
	}
});