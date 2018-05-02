Ext.define('Ayushman.store.cdm.localstores.DimensionHierarchyLocalStore', {
    extend: 'Ext.data.Store',
    alias: 'store.dimensionHierarchyLocalStore',
 
    requires: [
        'Ayushman.model.cdm.DimensionHierarchyModel',
        'Ext.data.proxy.LocalStorage'
    ],
 
    config: {
 
        autoLoad: true,
        model: 'Ayushman.model.cdm.DimensionHierarchyModel',
        storeId: 'DimensionHierarchyLocalStore',
 
        proxy: {
            type: 'localstorage',
            id: 'dimensionHierarchyLocalStorage'
        }
    }
});