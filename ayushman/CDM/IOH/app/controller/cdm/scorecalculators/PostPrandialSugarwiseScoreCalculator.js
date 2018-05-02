Ext.define('Ayushman.controller.cdm.scorecalculators.PostPrandialSugarwiseScoreCalculator', {
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
		console.log("Destroy function of PostPrandialSugarwiseScoreCalculator is called!");
		
		this.callParent();
		console.log("Destroy function of PostPrandialSugarwiseScoreCalculator is Finished!");
	}
});