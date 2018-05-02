Ext.define('Ayushman.view.cdm.components.DrillDownBarChartComponent', {
    extend: 'Ext.chart.CartesianChart',
    alias: 'widget.categorybarchart',
 
   // xtype: 'categorybarchart',
 
    requires: [
        'Ext.chart.series.Bar',
        'Ext.chart.axis.Numeric',
        'Ext.chart.axis.Category',
        'Ext.chart.CartesianChart',
		'Ext.chart.interactions.ItemHighlight',
		'Ext.chart.interactions.PanZoom',
		'Ext.chart.interactions.ItemInfo',
		//'Ayushman.view.ColorPatterns',
		'Ayushman.view.cdm.components.DrillDownContextMenuView'
    ],
 
    config: {
 
        layout: {
            type: "fit"
        },
		
		isChartFresh: true,
		startingDimensionId: null,
		
        xtype: "chart",
        width: '100%',
        height: '100%',
        store: 'DrillDownGraphStore',
        flipXY: true,
        animate: true,
        shadow: true,
		interactions: [
			/* {
				type: 'panzoom'
			}, */
			//'itemhighlight',
			/* {
				 type: 'itemhighlight',
				 gesture:'doubletap'
			}, */
			{
				type: 'iteminfo',
				gesture:'itemtap',
				panel: {
					modal: true,
					centered: true,
					width: 250,
					height: 300,
					styleHtmlContent: true,
					scrollable: false,
					hideOnMaskTap: true,
					fullscreen: false,
					hidden: true,
					zIndex: 30,
						layout : {
							type  : 'vbox',
							align : 'stretch'
						},
					cls: 'drillDownContextMenu',					
					items: [
					
					],
					listeners:
					{
						hide: function(me, eOpts)
						{
								console.log("Hide is getting called for DrillDownContextMenuPanel!");	
								Ext.getStore('DimensionHierarchyLocalStore').clearFilter();
						},
						
						show: function(me, eOpts)
						{
							console.log("Show is getting called for DrillDownContextMenuPanel!");
							if(me.getInnerItems().length > 0)
							{
								me.getInnerItems()[0].getController().handleContextMenuShowEvent(me, eOpts);
							}
							
						}
					}
				},
				
				listeners: {
					show: function(me, item, panel) {
						if(panel.getInnerItems().length === 0)
						{
							var drillDownContextMenuControllerInstance = Ext.create('Ayushman.controller.cdm.components.DrillDownContextMenuController', 
																	{ globalControllerInstance : this.getChart().getParent().getParent().getController().getGlobalControllerInstance(),
																	  drillDownChartInstance: this.getChart()
																	});
							var contextMenuViewInstance= drillDownContextMenuControllerInstance.getViewInstance();
							contextMenuViewInstance.setSelectedBar(item);
							panel.add(contextMenuViewInstance);
						}
						else
						{
							panel.getInnerItems()[0].setSelectedBar(item);
						}
					}
				}
			}
		],
        /* legend: {
            //docked: Ext.os.is.Phone ? 'right' : 'bottom'
			docked: 'bottom'
        }, */
 
        axes: [{
           type: 'numeric',
            position: 'bottom',
            fields: ['patientsPercentage'],
 
            title: {
                text: 'Patients(%)',
                fontSize: 18,
                fontWeight: 'bold',
				color: 'white'
            },
			
            grid: false,
            minimum: 0,
        }, {
            type: 'category',
            position: 'left',
            fields: ['groupName'],
 
            title: {
                text: 'Regularity',
                fontSize: 18,
                fontWeight: 'bold',
				color: 'white'
            },
 
            label: {
                rotate: {
                    degrees: 315
                }
            }
        }],
 
        series: [{
            type: 'bar',
            axis: 'bottom',
            xField: 'groupName',
            yField: ['patientsPercentage'],
			 highlightCfg: {
                            strokeStyle: 'yellow',
                            lineWidth: 2
                        },
           subStyle: {
                fill: ['pink', 'red']
            },
 
            style: {
                maxBarWidth: 50
            },
			
			renderer: function(sprite, record, attributes, index, store) 
			{
					var colors = ['rgb(228, 92, 130)', 'rgb(202, 118, 233)', 'rgb(208, 211, 109)', 'rgb(84, 157, 14)', 'rgb(28, 164, 250)'];
                    attributes.fill = colors[index % colors.length];
                    return attributes;
            },
			
			listeners: 
			{
				'itemtap': function(series, item, event, eOpts) 
				{					
					console.log('Hurray...itemtap is getting called!');							
				}
			},
 
            /* interactions: [{
                type: 'itemhighlight',
                gesture: 'doubletap'
            }], */
			
			/* interactions: [{
                type: 'iteminfo',
                			gesture:'tap',
							onGesture : function(a) { 
								//var item = this.getItemForEvent(a);
							}
            }], */
			
           /*  label: {
                field: ['patientsPercentage'],
                display: 'insideStart'
				orientation: 'horizontal',
            }, */			
			 
        }]
    }
});