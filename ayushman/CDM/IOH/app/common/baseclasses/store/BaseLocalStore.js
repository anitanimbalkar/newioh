Ext.define('Ayushman.common.baseclasses.store.BaseLocalStore', {
	extend: 'Ayushman.common.baseclasses.store.BaseStore',
	requires: [ 'Ayushman.common.baseclasses.model.BaseModel', 'Ext.data.proxy.LocalStorage' ],
	
	config:
	{
		model: 'Ayushman.common.baseclasses.model.BaseModel',
		proxyType: 'localstorage',
		proxyReader: { type: 'json', rootProperty: 'data' },
		
		/* proxy: { 
			type: 'localstorage', 

			reader: {
				type: 'json', 
				rootProperty: 'data'
			}
		}, */
		
		autoLoad: false
	},
	
	updateConfiguration: function()
	{
		this.getProxy().type = this.getProxyType();
		this.getProxy().reader = this.getProxyReader();
	},
	
	initialize: function()
	{
		this.updateConfiguration();
		console.log(this.self.getName());
	}
	
	
	
});