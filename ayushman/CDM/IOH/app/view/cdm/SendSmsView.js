Ext.define('Ayushman.view.cdm.SendSmsView', {
    extend: 'Ayushman.common.baseclasses.view.BaseView',
    xtype: 'sendsms',
    
    config:
	{
		layout: 'vbox',
		scrollable: true,
		addViewToViewStack: true,
			items: 
			[
				{
					xtype: 'container',				
					cls: 'container',
					itemId: 'sendSmsMainContainer',
					items:
					[
						{
							xtype: 'container',
							cls: 'col-sm-12 col-md-12 col-lg-12',
							style: 'background-color:#337ab7; margin-top:1em; border-top-right-radius: 0.4em; border-top-left-radius: 0.4em;',
							items:
							[
								{
									xtype: 'label',
									html: 'Send Message To Group',
									cls: 'col-sm-12 col-md-12 col-lg-12',
									style: 'text-align:center; color: white; font-size: 1.2em; margin-top: 0.3em; margin-bottom: 0.3em;'
								}
							]
						},
						{
							xtype: 'container',
							cls  : 'container',	
							itemId: 'textAreaContainer',
							style: 'padding-left: 0.5em; padding-right:0.5em; border: 2px solid green; margin-top: .5em; margin-bottom: .5em;',
							items:
							[
								{
									xtype: 'container',
									itemId: 'toTextAreaContainer',
									cls: 'col-sm-12 col-md-12 col-lg-12 equalHeightRow',
									style: 'padding-left: 0px; padding-right:0px; border: 1px solid green; margin-top: .5em; margin-bottom: .5em;',
									items:
									[
										{
											xtype: 'label',
											html: 'To',
											cls: 'col-sm-12 col-md-12 col-lg-12',
											style: 'text-align:center; color: black; font-size: 1em; padding-top: 1.2em; padding-bottom: 1.2em; background-color:rgba(230, 190, 93, 0.93);'
										},
										{
											xtype: 'textareafield',
											itemId: 'toTextAreaItemId',
											placeHolder: 'Enter Mobile numbers here.',
											cls: 'col-sm-12 col-md-12 col-lg-12',
											
										}
									]
								},
								{
									xtype: 'container',
									itemId: 'messageTextAreaContainer',
									cls: 'col-sm-12 col-md-12 col-lg-12 equalHeightRow',
									style: 'padding-left: 0px; padding-right:0px; border: 1px solid green; margin-top: .5em; margin-bottom: .5em;',
									items:
									[
										{
											xtype: 'label',
											html: 'Message',
											maxRows: 3,
											cls: 'col-sm-12 col-md-12 col-lg-12',
											style: 'text-align:center; color: black; font-size: 1em; padding-top: 1.2em; padding-bottom: 1.2em; background-color:rgba(230, 190, 93, 0.93);'
										},
										{
											xtype: 'textareafield',
											itemId: 'messageTextAreaItemId',
											placeHolder: 'Enter the message here.',
											maxRows: 8,
											cls: 'col-sm-12 col-md-12 col-lg-12',
											
										}
									]
								}
							]
						},
						{
									xtype: 'container',
									cls: 'col-sm-12 col-md-12 col-lg-12',
									style: 'margin-top:1em;',
									items:
									[
										{
											xtype: 'button',
											html: 'Send',
											itemId: 'sendSmsButton',
											cls: 'col-sm-offset-3 col-sm-6 col-md-offset-4 col-md-4 col-lg-offset-4 col-lg-4',
											pressedCls: 'createRegimenButtonPressed',											
											style: 'color: white; font-size: 1.2em; margin-top: 0.1em; margin-bottom: 0.1em;'
										}
									]
						}
					]
				}
			   
			]
    },
	
	destroy: function()
	{
		console.log("Destroy of SendSmsView has been called!");
		this.callParent();
		console.log("Destroy of SendSmsView has been finished!");
	}
});
