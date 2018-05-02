Ext.define('Ayushman.controller.LoginController', {

 requires: [ 'Ayushman.controller.IohFrameController', 'Ext.MessageBox' ],
  config: 
	{
		 viewName: null,
		 storeName: null,
		 viewInstance: null
	},
	
	constructor: function(config) {
        this.initConfig(config);
		this.createInstanceOfView();
    },
	
	createInstanceOfView: function()
	{
		var splitStringArray = this.self.getName().split(".");
		var viewNamePrefix = splitStringArray[splitStringArray.length-1].slice(0,-10);
		this.setViewName( viewNamePrefix + "View");
		this.setStoreName( viewNamePrefix + "Store");
		var viewInstance = Ext.create("Ayushman.view." + this.getViewName(), {controller:this});
		this.setViewInstance(viewInstance);
		
		var userCredentials = Ext.getStore('UserCredentials');
		var userDetails = userCredentials.getAt(0);
		if(userDetails != undefined)
		{			
			Ext.Ajax.request({
							 url : Ayushman.util.Config.getBaseUrlPrefix() + 'ws/logincontroller/login/index.json', 
							 method:'POST',
							 params : {
								 action:'Login',
								 username: userDetails.get('username'),
								 password: userDetails.get('password'),
								 remember: false
							 },
							 scope : this,
							 //method to call when the request is successful
							 success : this.onLoginSuccess,
							 //method to call when the request is a failure
							 failure : this.onLoginFailure
					  });
		}
	},
	 
	onSignInPressed: function(button,e,eopts)
	{
		this.authenticateUser(button,e,eopts);		
	},
	
	showHomeScreenAccordingToRole: function(roleName)
	{
		var iohFrameControllerInstance = Ext.create('Ayushman.controller.IohFrameController' , {role: roleName});
		var viewInstance = iohFrameControllerInstance.getViewInstance();
		
		//First remove LoginView from the viewport as this login view is not needed anymore in the app.
		//Because when logout button is pressed, at that time we will be creating a new instance of login view and add it to the viewport.
		Ext.Viewport.removeAll(true,true);
        Ext.Viewport.add(viewInstance);
	},
	
	authenticateUser: function(button) 
	{
		console.log(button.up('container'));
		
		 var outerContainer = button.up('container');
		 var userIdField = outerContainer.getComponent('userId');
		 var passwordField = outerContainer.getComponent('password');
		 this.userName = userIdField.getValue();
		 this.password = passwordField.getValue();
		 console.log(userIdField.getValue() + passwordField.getValue());
		 
		 if(userIdField.getValue() && passwordField.getValue())
		 {
       
			  button.setText('Please wait ...');
			  button.setDisabled(true);
		   
					  Ext.Ajax.request({
							 url : Ayushman.util.Config.getBaseUrlPrefix() + 'ws/logincontroller/login/index.json', 
							 method:'POST',
							 params : {
								 action:'Login',
								 username: userIdField.getValue(),
								 password: passwordField.getValue(),
								 remember: false
							 },
							 scope : this,
							 //method to call when the request is successful
							 success : this.onLoginSuccess,
							 //method to call when the request is a failure
							 failure : this.onLoginFailure
					  });
			   
			  passwordField.setValue('');
		   
		 }
		 else 
		 {
				Ext.Msg.alert('', 'Please enter User Id and/or Password', Ext.emptyFn);
		 }
    },
	 
	onLoginSuccess: function(response, opts)
	{
		console.log("Inside the onLoginSuccess function");
		response = Ext.decode(response.responseText);
         if(response.type=="success")
		 {
			this.successfulLogin(response);
         }
         else 
		 {			 
			 var signInFailedLabel = this.getViewInstance().getComponent('signInFailedLabel');
				 signInFailedLabel.setHidden(false);
			 var loginButton = this.getViewInstance().getComponent('loginFieldsetId').getComponent('loginButton');
				 loginButton.setText('SIGN IN');
				 loginButton.setDisabled(false);			 
         }
		 
		 
	},
	
	onLoginFailure: function()
	{
		Ext.Msg.alert('', 'Network problem occured. Check your internet connection or try after some time.', Ext.emptyFn);
			var loginButton = this.getViewInstance().getComponent('loginFieldsetId').getComponent('loginButton');
			 loginButton.setText('SIGN IN');
			 loginButton.setDisabled(false);
	},
	
	successfulLogin: function(response)
	{
		var roleId = this.addUserDetailsToLocalStore(response);
		var roleName = '';
		if(roleId == '3')
		{
			roleName = 'PatientIoh';
		}
		else if(roleId == '1')
		{
			roleName = 'DoctorIoh';
		}
		else
		{
			Ext.Msg.alert('', 'This application is only for Doctors and Patients. Please login as a patient or a doctor.', Ext.emptyFn);
			return;
		}
		 
		this.showHomeScreenAccordingToRole(roleName);
	},	
	
	addUserDetailsToLocalStore: function(response)
	{
		 var userCredentials = Ext.getStore('UserCredentials');		 
		 userCredentials.removeAll();
		 userCredentials.sync();
		
		var userId = response.id;
		var userFirstName = response.firstname;
		var userLastName  = response.lastname;
		var userPhoto = response.photo;
		var userRole = response.role;
		var userName = response.username;
		var userPassword = response.password;
		var roleSpecificId = response.roleSpecificId;
				
		 var newUserRecord = Ext.create('Ayushman.model.UserCredentials',{
		  userid: userId,
		  username: userName,
		  password: userPassword,
		  firstname: userFirstName,
		  lastname: userLastName,
		  //photo: userPhoto,
		  role: userRole,
		  roleSpecificId: roleSpecificId
		 });	
		
		 userCredentials.add(newUserRecord);
		 userCredentials.sync();
		 
		 return userRole;
	},
	
	destroy: function()
	{
		console.log("Destroy function of loginController is called!");
		
		this.callParent();
		
		this.setViewName(null);
		this.setStoreName(null);
		
		console.log("Destroy function of loginController is Finished!");
	}
});