Ext.define('Ayushman.store.UserCredentials', {
    //extend: 'Ayushman.common.baseclasses.store.BaseLocalStore',
	 extend: 'Ext.data.Store',
	requires: ['Ayushman.model.UserCredentials', 'Ext.data.proxy.LocalStorage'],
    config: 
	{
		storeId: 'UserCredentials',
        model: 'Ayushman.model.UserCredentials',
		autoLoad: true,
		proxy:
		{
			 type:'localstorage',
			 id: 'userid'
		}
    }
});