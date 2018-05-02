Ext.define("Ayushman.model.cdm.PatientsGeneralDetailsModel", {
	extend: "Ayushman.common.baseclasses.model.BaseModel",
	config:
	{
		fields: 
		[
			{name: 'id', type: 'number'},
			{name: 'doctor_id', type: 'number'},
			{name: 'firstname_c', type: 'string'},
			{name: 'lastname_c', type: 'string'},
			{name: 'gender_c', type: 'string'},
			{name: 'dob_c', type: 'string'},
			{name: 'bloodgroup_c', type: 'string'},
			{name: 'photo_c', type: 'string'},
			{name: 'mobileno_c', type: 'number'},
			{name: 'maritalstatus_c', type: 'string'},
			{name: 'coffe_c', type: 'string'},
			{name: 'tobacco_c', type: 'string'},
			{name: 'alcohol_c', type: 'string'},
			{name: 'smoking_c', type: 'string'},
			{name: 'diet_c', type: 'string'}
		]
	}
});
