Ext.define('Ayushman.controller.cdm.scorecalculators.FastingSugarwiseScoreCalculator', {
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
		console.log("Destroy function of FastingSugarwiseScoreCalculator is called!");
		
		this.callParent();
		console.log("Destroy function of FastingSugarwiseScoreCalculator is Finished!");
	}
});