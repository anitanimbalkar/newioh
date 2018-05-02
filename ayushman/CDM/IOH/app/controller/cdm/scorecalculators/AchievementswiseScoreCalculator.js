Ext.define('Ayushman.controller.cdm.scorecalculators.AchievementswiseScoreCalculator', {
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
			var patientsScore = 0;
			var isValueRecorded = false;
			drillDownRawDataLocalStore.each(function (record, index, length) {
				if(record.get('recorded_value'))
				{
					if((record.get('recorded_value') >= record.get('min_value')) && (record.get('recorded_value') <= record.get('max_value')))
					{
						patientsScore = patientsScore + 0;
					}
					else
					{
						//if any one records recorded value is out of range then put this patient into 'Out of range' band
						//so, set this patientsScore to 1.
						patientsScore =  1;
					}
					
					isValueRecorded = true;
				}
			});
		
			var patientsFinalScore = 0;
			if(isValueRecorded)
			{
				patientsFinalScore = patientsScore;
			}
			else
			{
				// not a single record for this dimension (including children dimensions) has a value in recorded_value column
				// so, set the patients score to 2 which means that this patient should be put in 'Not recorded any value' band
				patientsFinalScore = 2; 
			}
			
			patientsScoresArray[patientId] = patientsFinalScore;
			return patientsScoresArray;
	},
	
	destroy: function()
	{
		console.log("Destroy function of BloodSugarwiseScoreCalculator is called!");
		
		this.callParent();
		console.log("Destroy function of BloodSugarwiseScoreCalculator is Finished!");
	}
});