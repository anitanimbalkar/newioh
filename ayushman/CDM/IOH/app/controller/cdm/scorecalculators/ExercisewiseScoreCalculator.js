Ext.define('Ayushman.controller.cdm.scorecalculators.ExercisewiseScoreCalculator', {
extend: 'Ayushman.controller.cdm.scorecalculators.AbstractScoreCalculator',
  config: 
	{
		//applicableDimensionIdsArray  : new Array(),
		//dimensionId : null,
		//timeframeId  : null,
		//patientIdsArray: new Array()
	},
	
	constructor: function(config) {
        this.initConfig(config);
    },
	
	calculateScore: function(patientsScoresArray,patientId)
	{	
			var drillDownRawDataLocalStore = Ext.getStore('DrillDownRawDataLocalStore');
			var sumOfExpectedValue = drillDownRawDataLocalStore.sum('expected_value');
			var sumOfRecordedValue = drillDownRawDataLocalStore.sum('recorded_value');
			var patientsPercentageScore = ((sumOfRecordedValue + 0.00001) / (sumOfExpectedValue + 0.00001) * 100);
			console.log( "Patients percentage score is :" + patientsPercentageScore);
			patientsScoresArray[patientId] = Math.round(patientsPercentageScore);
			return patientsScoresArray;
	},
	
	destroy: function()
	{
		console.log("Destroy function of ExercisewiseScoreCalculator is called!");
		
		this.callParent();
		console.log("Destroy function of ExercisewiseScoreCalculator is Finished!");
	}
});