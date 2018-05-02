Ext.define("Ayushman.model.cdm.CreateRegimenModel", {
	extend: "Ayushman.common.baseclasses.model.BaseModel",
	config:
	{
		idProperty: 'id',
		fields: 
		[
			{name: 'id', type: 'number'},
			{name: 'patient_id', type: 'number'},
			{name: 'doctor_id', type: 'number'},
			{name: 'start_date', type: 'string'},
			{name: 'end_date', type: 'string'}
		]
	}
});
