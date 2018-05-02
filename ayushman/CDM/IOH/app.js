/*
    This file is generated and updated by Sencha Cmd. You can edit this file as
    needed for your application, but these edits will have to be merged by
    Sencha Cmd when it performs code generation tasks such as generating new
    models, controllers or views and when running "sencha app upgrade".

    Ideally changes to this file would be limited and most work would be done
    in other places (such as Controllers). If Sencha Cmd cannot merge your
    changes and its generated code, it will produce a "merge conflict" that you
    will need to resolve manually.
*/

Ext.application({
    //name: 'CDMApiDemo',
	name: 'Ayushman',

    requires: [ 'Ext.Ajax', 'Ayushman.util.Config',
       'Ext.MessageBox','Ayushman.util.Config', 'Ayushman.controller.LoginController', 'Ext.util.HashMap', 'Ayushman.controller.cdm.CdmPatientsListController',
		'Ayushman.controller.cdm.DoctorCdmHomeController', 'Ayushman.controller.cdm.CreateRegimenController', 'Ayushman.controller.cdm.components.InstructionHolderController',
		'Ayushman.controller.cdm.components.SingleInstructionContainerController',
		'Ayushman.controller.ioh.DoctorIohHomeController', 'Ayushman.controller.ioh.PatientIohHomeController',
		'Ayushman.controller.cdm.components.DrillDownGraphController',
		'Ayushman.controller.cdm.components.DrillDownContextMenuController', 'Ayushman.controller.cdm.DrillDownFiltersContainerController',
		'Ayushman.controller.cdm.components.DrillDownFilterComponentController', 'Ayushman.controller.cdm.components.FilteredPatientListItemComponentController',
		'Ayushman.controller.cdm.PatientDetailsController', 'Ayushman.controller.cdm.components.PatientsGeneralInfoKeyValueComponentController',
		'Ayushman.controller.cdm.SelectPeriodAndGoalForRegimenController', 'Ayushman.controller.cdm.CreateRegimenFinishedPageController',
		'Ayushman.controller.cdm.SendSmsController', 'Ayushman.controller.cdm.components.PreviousPlansListItemComponentController',
		'Ayushman.controller.cdm.PreviousRegimenController', 'Ayushman.controller.cdm.DrillDownGraphDataProvider',
		'Ayushman.controller.cdm.DividePatientsIntoBucketsHandler', 'Ayushman.controller.cdm.scorecalculators.ExercisewiseScoreCalculator',
		'Ayushman.controller.cdm.scorecalculators.BloodSugarwiseScoreCalculator',
		'Ayushman.controller.cdm.scorecalculators.FastingSugarwiseScoreCalculator',
		'Ayushman.controller.cdm.scorecalculators.PostPrandialSugarwiseScoreCalculator',
		'Ayushman.controller.cdm.scorecalculators.HbA1cwiseScoreCalculator',
		'Ayushman.controller.cdm.scorecalculators.AchievementswiseScoreCalculator',
		
		
    ], 

   views: [
         'LoginView','IohFrameView','Ayushman.view.cdm.DoctorCdmHomeView','Ayushman.view.cdm.CdmPatientsListView', 'Ayushman.view.cdm.CreateRegimenView',
		'Ayushman.view.cdm.components.InstructionHolderView', 'Ayushman.common.components.GenericDBDropDown', 'Ayushman.view.cdm.instructions.BodyWeightBasedExerciseInstruction',
		'Ayushman.view.cdm.components.SingleInstructionContainerView', 'Ayushman.view.cdm.instructions.CalorieBasedNutritionInstruction', 'Ayushman.view.cdm.instructions.FoodBasedNutritionInstruction',
		'Ayushman.view.cdm.instructions.DurationBasedInstruction', 'Ayushman.view.cdm.instructions.WeightBasedExerciseInstruction', 
		'Ayushman.view.cdm.instructions.HomeBasedTestInstruction',
		'Ayushman.view.ioh.DoctorIohHomeView', 'Ayushman.view.ioh.PatientIohHomeView',
		'Ayushman.view.cdm.components.DrillDownGraphView', 
		'Ayushman.view.cdm.components.DrillDownBarChartComponent',
		'Ayushman.view.cdm.components.DrillDownContextMenuView', 'Ayushman.view.cdm.DrillDownFiltersContainerView',
		'Ayushman.view.cdm.components.DrillDownFilterComponentView', 'Ayushman.view.cdm.components.FilteredPatientListItemComponentView',
		'Ayushman.view.cdm.PatientDetailsView', 'Ayushman.view.cdm.components.PatientsGeneralInfoKeyValueComponentView',
		'Ayushman.view.cdm.SelectPeriodAndGoalForRegimenView', 'Ayushman.view.cdm.instructions.HealthParamWithGoalInstruction',
		'Ayushman.view.cdm.instructions.LabBasedHealthParamInstruction', 'Ayushman.view.cdm.CreateRegimenFinishedPageView',
		'Ayushman.view.cdm.SendSmsView', 'Ayushman.view.cdm.components.PreviousPlansListItemComponentView',
		'Ayushman.view.cdm.PreviousRegimenView'
    ],
	
	stores: [ 'Ayushman.store.cdm.InstructionTypes', 
			  'Ayushman.store.cdm.GenericConstants', 
			  'Ayushman.store.cdm.CreateRegimenStore', 
			  'Ayushman.store.cdm.SingleInstructionContainerStore',
	          'Ayushman.store.cdm.InstructionParametersStore', 
			  'Ayushman.store.UserCredentials',
			  'Ayushman.store.DrillDownGraphStore',
			  'Ayushman.store.cdm.DrillDownDimensionStore',
			  'Ayushman.store.cdm.DrillDownTimeFrameStore',
			  'Ayushman.store.cdm.DrillDownPatientSummaryStore',
			  'Ayushman.store.cdm.DrillDownConfigurationStore',
			  'Ayushman.store.cdm.StartingDimensionDDStore',
			  'Ayushman.store.cdm.PatientsGeneralDetailsStore', 
			  'Ayushman.store.cdm.PatientsPlanDetailsStore',
			  'Ayushman.store.cdm.DrillDownRawDataStore',
			  'Ayushman.store.cdm.DimensionHierarchyStore',
			  'Ayushman.store.cdm.DimensionBucketsStore',
			  'Ayushman.store.cdm.localstores.DimensionHierarchyLocalStore',
			  'Ayushman.store.cdm.localstores.DimensionBucketsLocalStore',
			  'Ayushman.store.cdm.localstores.DrillDownRawDataLocalStore',
			  'Ayushman.store.cdm.localstores.BucketsWithPatientsLocalStore'
			  
			  
	],
    icon: {
        '57': 'resources/icons/Icon.png',
        '72': 'resources/icons/Icon~ipad.png',
        '114': 'resources/icons/Icon@2x.png',
        '144': 'resources/icons/Icon~ipad@2x.png'
    },

    isIconPrecomposed: true,

    startupImage: {
        '320x460': 'resources/startup/320x460.jpg',
        '640x920': 'resources/startup/640x920.png',
        '768x1004': 'resources/startup/768x1004.png',
        '748x1024': 'resources/startup/748x1024.png',
        '1536x2008': 'resources/startup/1536x2008.png',
        '1496x2048': 'resources/startup/1496x2048.png'
    },

    launch: function() {
        // Destroy the #appLoadingIndicator element
        Ext.fly('appLoadingIndicator').destroy();
        // Initialize the main views
		var controllerInstance = Ext.create('Ayushman.controller.LoginController'); 
		Ext.Viewport.add(controllerInstance.getViewInstance());
		
		
			
    },
	
    onUpdated: function() {
        Ext.Msg.confirm(
            "Application Update",
            "This application has just successfully been updated to the latest version. Reload now?",
            function(buttonId) {
                if (buttonId === 'yes') {
                    window.location.reload();
                }
            }
        );
    }
});
