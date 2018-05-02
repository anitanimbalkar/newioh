Ext.define('Ayushman.controller.cdm.scorecalculators.AbstractScoreCalculator', {

  config: 
	{
		applicableDimensionIdsArray  : new Array(),
		dimensionId : null,
		timeframeId  : null,
		patientIdsArray: new Array()
	},
	
	constructor: function(config) {
        this.initConfig(config);
    },
	
	getPatientsScores: function()
	{		
		this.makeDrillDownRawDataStoreReady();
				
		var drillDownRawDataLocalStore = Ext.getStore('DrillDownRawDataLocalStore');
		var patientIdsArray = this.getDistinctPatientIds();		
		var patientsScoresArray = {};
		Ext.Array.each(patientIdsArray, function(patientId, index, patientIdsArrayItSelf) {
		
			drillDownRawDataLocalStore.filter([{ property: 'patient_id', value: patientId }]);
			
			patientsScoresArray = this.calculateScore(patientsScoresArray,patientId);
			
			drillDownRawDataLocalStore.data.removeFilters('patient_id');
			var data = drillDownRawDataLocalStore.data;
			drillDownRawDataLocalStore.fireEvent('filter', drillDownRawDataLocalStore, data, data.getFilters());		
			drillDownRawDataLocalStore.fireEvent('refresh', drillDownRawDataLocalStore, data);			
			
		}, this);
		
		// get back the store to fresh state by removing all the filters
		drillDownRawDataLocalStore.clearFilter();
		return patientsScoresArray;
		
	},
	
	makeDrillDownRawDataStoreReady: function()
	{
		var dimensionHierarchyLocalStore = Ext.getStore('DimensionHierarchyLocalStore');
		dimensionHierarchyLocalStore.load();
		dimensionHierarchyLocalStore.clearFilter();
		dimensionHierarchyLocalStore.filterBy(this.filterStoreByDimensionId, this);
		var applicableDimensionIds = [];
		dimensionHierarchyLocalStore.each(function (record, index, length) {
			applicableDimensionIds.push(record.get('id'));
		});
		this.setApplicableDimensionIdsArray(applicableDimensionIds);
		dimensionHierarchyLocalStore.clearFilter();
		
		var drillDownRawDataLocalStore = Ext.getStore('DrillDownRawDataLocalStore');
		drillDownRawDataLocalStore.load();
		drillDownRawDataLocalStore.clearFilter();
		drillDownRawDataLocalStore.filterBy(this.filterStoreByDimensionHierarchy, this);
		if(((this.getPatientIdsArray().length) !== 0))
		{
			drillDownRawDataLocalStore.filterBy(this.filterStoreByPatientIds, this);
		}
	},
	
	getDistinctPatientIds: function()
	{
		var distinctPatientIdsArray = [];
		var drillDownRawDataLocalStore = Ext.getStore('DrillDownRawDataLocalStore');
		drillDownRawDataLocalStore.each(function (record, index, length) {			
			if((distinctPatientIdsArray.indexOf(record.get('patient_id'))) === -1)
			{
				distinctPatientIdsArray.push(record.get('patient_id'));
			}
		});
		return distinctPatientIdsArray;
	},
	
	filterStoreByDimensionId: function(record,id)
	{
		if(((record.get('id') == this.getDimensionId()) || (record.get('parent_id') == this.getDimensionId())))
		{
			return true;
		}
		else 
			return false;
	},
	
	filterStoreByDimensionHierarchy: function(record,id)
	{	
		if((this.getApplicableDimensionIdsArray().indexOf("" + record.get('dimension_id'))) === -1)
		{
			return false;
		}
		else 
			return true;
	},
	
	filterStoreByPatientIds: function(record,id)
	{	
		if((this.getPatientIdsArray().indexOf("" + record.get('patient_id'))) === -1)
		{
			return false;
		}
		else 
			return true;
	},
	
	destroy: function()
	{
		console.log("Destroy function of ExercisewiseScoreCalculator is called!");
		
		this.callParent();
		console.log("Destroy function of ExercisewiseScoreCalculator is Finished!");
	}
});