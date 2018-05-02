Ext.define('Ayushman.controller.cdm.scorecalculators.HbA1cwiseScoreCalculator', {
extend: 'Ayushman.controller.cdm.scorecalculators.BloodSugarwiseScoreCalculator',
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
	
	
	
	destroy: function()
	{
		console.log("Destroy function of HbA1cwiseScoreCalculator is called!");
		
		this.callParent();
		console.log("Destroy function of HbA1cwiseScoreCalculator is Finished!");
	}
});