Ext.define('Ayushman.common.baseclasses.store.BaseRemoteStore', {
	extend: 'Ayushman.common.baseclasses.store.BaseStore',
	requires: ['Ayushman.common.baseclasses.model.BaseModel'],
	
	config:
	{
		model: 'Ayushman.common.baseclasses.model.BaseModel',
		createActionName: 'create',
		readActionName: 'read',
		updateActionName: 'update',
		destroyActionName: 'destroy',
		serverSideController: null,
		proxyType: 'ajax',
		proxyReader: { type: 'json', rootProperty: 'data' },
		
		proxy: { 
			type: 'ajax', 
			api: {
					create: null,
					read: null,
					update: null,
					destroy: null
				}
		},
		
		autoLoad: false
	},
	
	/* updateConfiguration: function()
	{
		this.getProxy().type = this.getProxyType();
		this.getProxy().reader = this.getProxyReader();
		this.getProxy().getApi().create = Ayushman.util.Config.getBaseUrlPrefix() + 'ws/' + this.getServerSideController() + "/index.json?action=" + this.getCreateActionName();
		this.getProxy().getApi().read = Ayushman.util.Config.getBaseUrlPrefix() + 'ws/' + this.getServerSideController() + "/index.json?action=" + this.getReadActionName();
		this.getProxy().getApi().update = Ayushman.util.Config.getBaseUrlPrefix() + 'ws/' + this.getServerSideController() + "/index.json?action=" + this.getUpdateActionName();
		this.getProxy().getApi().destroy = Ayushman.util.Config.getBaseUrlPrefix() + 'ws/' + this.getServerSideController() + "/index.json?action=" + this.getDestroyActionName();
	}, */
	
	updateConfiguration: function()
	{
		this.getProxy().type = this.getProxyType();
		this.getProxy().reader = this.getProxyReader();
		this.getProxy().getApi().create = Ayushman.util.Config.getBaseUrlPrefix() + 'ws/' + this.getServerSideController() + "/create/index.json?model=" + this.getServerSideModel();
		this.getProxy().getApi().read = Ayushman.util.Config.getBaseUrlPrefix() + 'ws/' + this.getServerSideController() + "/read/index.json?model=" + this.getServerSideModel();
		this.getProxy().getApi().update = Ayushman.util.Config.getBaseUrlPrefix() + 'ws/' + this.getServerSideController() + "/update/index.json?model=" + this.getServerSideModel();
		this.getProxy().getApi().destroy = Ayushman.util.Config.getBaseUrlPrefix() + 'ws/' + this.getServerSideController() + "/delete/index.json?model=" + this.getServerSideModel();
	},
	
	initialize: function()
	{
		this.callParent();
		this.updateConfiguration();
		console.log(this.self.getName());
	}
	
	
	
});