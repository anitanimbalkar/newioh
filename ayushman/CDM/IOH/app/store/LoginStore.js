Ext.define('Ayushman.store.UserCredentials', {
    extend: 'Ayushman.common.baseclasses.store.BaseRemoteStore',
    alias: 'usercredentials',
	requires: ['Ayushman.model.UserCredentials'],
    config: 
	{
		storeId: 'UserCredentials',
        model: 'Ayushman.model.UserCredentials',
		serverSideController: 'crudoperationscontroller',
		serverSideModel: 'users',
    }
});