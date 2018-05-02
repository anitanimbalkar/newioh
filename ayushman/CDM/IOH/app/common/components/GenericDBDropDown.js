Ext.define('Ayushman.common.components.GenericDBDropDown', {
	extend: 'Ayushman.common.components.DBDropdown',
    alias: 'widget.genericConstantsDD',
	
	config:
	{
		displayField:'param_value',
		valueField:'param_value',
		entity: 'GenericConstants',
		filterConfig: { property: "param_name", value: /exercise_name/ },
		sorterConfig: { property: "param_value", direction: "ASC" }
	},
	
	
	initialize: function() {	
    	Ext.apply(this, {
			entity: this.getEntity(),
			filterConfig : this.getFilterConfig(),
			sorterConfig : this.getSorterConfig(),
			displayField : this.getDisplayField(),
			valueField : this.getValueField()
		});
		console.log("Hello     " +this.getFilterConfig());
        this.callParent();
    }
	
});
