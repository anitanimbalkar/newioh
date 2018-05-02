Ext.define('Ayushman.common.baseclasses.store.BaseStore', {
	extend: 'Ext.data.Store',
	requires: ['Ayushman.common.baseclasses.model.BaseModel'],
	
	config:
	{
		model: 'Ayushman.common.baseclasses.model.BaseModel',
		proxyReader: { type: 'json', rootProperty: 'data' },
		
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