Ext.define('Ayushman.store.cdm.localstores.DimensionBucketsLocalStore', {
    extend: 'Ext.data.Store',
    alias: 'store.dimensionBucketsLocalStore',
 
    requires: [
        'Ayushman.model.cdm.DimensionBucketsModel',
        'Ext.data.proxy.LocalStorage'
    ],
 
    config: {
 
        autoLoad: true,
        model: 'Ayushman.model.cdm.DimensionBucketsModel',
        storeId: 'DimensionBucketsLocalStore',
 
        proxy: {
            type: 'localstorage',
            id: 'dimensionBucketsLocalStorage'
        }
    }
});