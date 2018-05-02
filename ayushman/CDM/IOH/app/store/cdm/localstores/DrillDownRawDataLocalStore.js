Ext.define('Ayushman.store.cdm.localstores.DrillDownRawDataLocalStore', {
    extend: 'Ext.data.Store',
    alias: 'store.drillDownRawDataLocalStore',
 
    requires: [
        'Ayushman.model.cdm.DrillDownRawDataModel',
        'Ext.data.proxy.LocalStorage'
    ],
 
    config: {
 
        autoLoad: true,
        model: 'Ayushman.model.cdm.DrillDownRawDataModel',
        storeId: 'DrillDownRawDataLocalStore',
 
        proxy: {
            type: 'localstorage',
            id: 'drillDownRawDataLocalStorage'
        }
    }
});