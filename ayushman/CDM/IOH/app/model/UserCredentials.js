Ext.define('Ayushman.model.UserCredentials', {
    extend: "Ayushman.common.baseclasses.model.BaseModel",
    config: {
	identifier:'uuid', 
     fields: [
				{name: 'userid', type: 'number'},
				{name: 'username', type: 'string'},
				{name: 'password', type: 'string'},	
				{name: 'firstname', type: 'string'},
				{name: 'lastname', type: 'string'},
				{name: 'role', type: 'number'},
				{name: 'roleSpecificId', type: 'number'}
             ]
    }
});