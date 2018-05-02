Ext.define('Ayushman.store.DrillDownGraphStore', {
    extend: 'Ext.data.Store',
    alias: 'store.drilldowngraphstore',
 
    requires: [
        'Ayushman.model.DrillDownGraphModel',
        'Ext.data.proxy.LocalStorage'
    ],
 
    config: {
 
        autoLoad: true,
        model: 'Ayushman.model.DrillDownGraphModel',
        storeId: 'DrillDownGraphStore',
 
        proxy: {
            type: 'localstorage',
            id: 'categoryLocalStorage'
        }
    }
});