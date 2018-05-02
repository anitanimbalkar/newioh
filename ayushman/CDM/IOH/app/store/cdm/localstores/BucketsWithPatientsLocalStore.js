Ext.define('Ayushman.store.cdm.localstores.BucketsWithPatientsLocalStore', {
    extend: 'Ext.data.Store',
    alias: 'store.bucketsWithPatientsLocalStore',
 
    requires: [
        'Ayushman.model.cdm.BucketsWithPatientsModel',
        'Ext.data.proxy.LocalStorage'
    ],
 
    config: {
 
        autoLoad: true,
        model: 'Ayushman.model.cdm.BucketsWithPatientsModel',
        storeId: 'BucketsWithPatientsLocalStore',
 
        proxy: {
            type: 'localstorage',
            id: 'bucketsWithPatientsLocalStorage'
        }
    }
});