Ext.define('Ayushman.controller.cdm.DividePatientsIntoBucketsHandler', {

  config: 
	{
		dimensionId  : null,
		timeframeId  : null,
		patientIdsArray : null,
	},
	
	constructor: function(config) {
        this.initConfig(config);
    },
	
	dividePatientsIntoBuckets: function(patientsScoresArray)
	{
		var bucketsContainingPatientsArray = {};
		var dimensionBucketsStore = Ext.getStore('DimensionBucketsLocalStore');
		dimensionBucketsStore.load();
		dimensionBucketsStore.clearFilter();
		dimensionBucketsStore.filter([ { property: 'dimension_hierarchy_id', value: this.getDimensionId() } ]);
		
		
		for (var key in patientsScoresArray) 
		{
			var patientsScore = patientsScoresArray[key];
			dimensionBucketsStore.each(function (record, index, length) {
				if((patientsScore >= record.get('min_value')) && (patientsScore <= record.get('max_value')))
				{
					var alreadyExistingPatientsIds = bucketsContainingPatientsArray[record.get('bucket_name')]; 
					if(alreadyExistingPatientsIds)
					{
						bucketsContainingPatientsArray[record.get('bucket_name')] = alreadyExistingPatientsIds + "," + key;
					}
					else
					{
						bucketsContainingPatientsArray[record.get('bucket_name')] = key;
					}
				}
			},this);
		}
		
	/* 	var bucketsContainingPatientsArray =  	
									{
										"0-25%":"384,385,386,387,388",
										"26-50%":"389,390,391,392,393,394,395",
										"51-75%":"396,397,398,399,400",
										"76-100%":"401,402,403"
									}; */
		return bucketsContainingPatientsArray;
		
	},
	
	/* getBucketsForDimension(dimensionId)
	{
		var dimensionBucketsStore = Ext.getStore('DimensionBucketsLocalStore');
		dimensionBucketsStore.load();
		dimensionBucketsStore.filter([ { property: 'dimension_hierarchy_id', value: dimensionId } ]);
	
		var dimensionBucketsWithTheirIdsArray = [];
		dimensionBucketsStore.each(function (record, index, length) {
			dimensionBucketsWithTheirIdsArray[record.get('bucket_name')] = record.get('id');
		});
		
		return dimensionBucketsArray;
	}, */
	
	destroy: function()
	{
		console.log("Destroy function of DividePatientsIntoBucketsHandler is called!");
		
		this.callParent();
		console.log("Destroy function of DividePatientsIntoBucketsHandler is Finished!");
	}
});