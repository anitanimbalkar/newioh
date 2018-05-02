Ext.define('Ayushman.common.components.DBDropdown', {
    extend: 'Ext.field.Select',
	config:
	{
		entity:"",
		localStore: null,
		filterConfig:'',
		sorterConfig:'',
		displayField: "param_value",
		valueField: "param_value",
		//width: '150px'									
	},
	
	
	 change:function(combo,newval,oldval,eopts){
		//
	}, 
	
	loadStore:function(){		
		//Loading Store from rest server
		this.localStore.load({
				scope: this,
				callback: function(recs){
				} 
			});
	},
	createStore:function(){
		
		this.localStore = Ext.create('Ayushman.store.cdm.'+ this.entity);
		proxy=this.localStore.getProxy();
		//proxy.setExtraParams({action:"genericconstants"});
		this.localStore.setProxy(Ext.clone(proxy));	
		
	},
	initialize: function() {
	
		if(this.localStore == null){
			this.createStore();
			//Loading the store initially so that the defaults values are visible on every form field
			this.loadStore();
			//this.localStore.sort(this.displayField, 'ASC');
			console.log("initialize of parent base dropdown class!" + this.entity);
		}
		
			this.setStore(this.entity);				
			this.getStore().setFilters(this.getFilterConfig());
			this.getStore().setSorters(this.getSorterConfig());
		this.callParent();
	}	
	
});
