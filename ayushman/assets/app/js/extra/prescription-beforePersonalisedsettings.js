	var dosage = '';
	var medicineId='';
	var frequency = [ '(1 - 1 - 1)',
					'(1 - 0 - 1)',
					'(1 - 0 - 0)',
					'(0 - 0 - 1)',
					'(0 - 1 - 0)',
					'(0 - 1 - 1)',
					'(1 - 1 - 0)',
					'(1 - 1 - 1 - 1)',
					'(0 - 0 - 1 - 0)',
					'(0 - 1 - 1 - 0)',
					'(1 - 0 - 1 - 0)',
					'(0 - 0 - 1 - 1)'
					];
	var days = [" X 1 day",
	" X 2 days",
	" X 3 days",
	" X 4 days",
	" X 5 days",
	" X 6 days",
	" X 7 days",
	" X 8 days",
	" X 9 days",
	" X 10 days",
	" X 15 days",
	" X 20 days",
	" X 25 days",
	" X 30 days",
	" X Everyday",
	" X Everyday 2 Months",
	" X Everyday 3 Months",
	" X Everyday 6 Months",
	" X Everyday a year"
	];
	var personalizeDays = [" 1 day",
	" 2 days",
	" 3 days",
	" 4 days",
	" 5 days",
	" 6 days",
	" 7 days",
	" 8 days",
	" 9 days",
	" 10 days",
	" 15 days",
	" 20 days",
	" 25 days",
	" 30 days",
	" Everyday",
	" Everyday 2 Months",
	" Everyday 3 Months",
	" Everyday 6 Months",
	" Everyday a year"
	];
	var instruction = ['After Food / जेवणानंतर / खाणे के बाद',
						'Before Food / जेवणाआधी / खाणे से पेहले',
						'Empty Stomach / रिकाम्यापोटी / खाली पेट ',
						'SOS / जसे हवे तसे / जब जरूरी हो',
						'With Food / जेवणाबरोबर',
						'With Milk / दुधाबरोबर',
						'Not on Empty Stomach / रिकाम्यापोटी घेऊ नका',
						'Early Morning / सकाळी लवकर',
						'Bed Time / झोपण्यापूर्वी',
						'On Affected Area / जखमेवर लावा',
						'Immediately / लगेच',
						'Wash / धुवा',
						'Both Ears / दोन्ही कानांना' ,
						'Both Eyes / दोन्ही डोळ्यांत',
						'Every Other Day / दर एक दिवसानंतर',
						'Every Other Hour / दर तासाला',
						'Every Other Week / दर आठ दिवसाला ',
						'Don’t Eat Anything Before 30 Mins / अर्धा तासा आधी काहीही खाऊ नये',
						'Don’t Eat Anything After 30 Mins / अर्धा तासा नंतर काहीही खाऊ नये'
						];
						
	function split( val ) {
	  return val.split( /- \s*/ );
	}
	function split1( val ) {
	  return val.split( /, \s*/ );
	}
	function extractLast1( term ) {
	  return split1( term ).pop();
	}
	function extractLast( term ) {
	  return split( term ).pop();
	}
	
	
	
	function loadScripts(){
		
		investigationIds = "";
		document.cookie = 'testdata= '+'; expires=Wed, 1 Jan 2070 13:47:11 UTC; path=/';
				
		if(readCookie('medicine') != "{}" && readCookie('medicine') != "undefined" && readCookie('medicine') != "[]"){
			jsonStr = readCookie('medicine');
			fragments = JSON.parse(jsonStr);
			setMedicineText(fragments);
		}
		if(readCookie('investigation_text') != "{}" && readCookie('investigation_text') != "undefined" && readCookie('investigation_text') !="[]"){
			jsonStr = readCookie('investigation_text');
			investigationFragments = JSON.parse(jsonStr);
			if(investigationFragments.length > 0){
				$('#investigations').show();
			}
			setInvestigationText(investigationFragments);
		}

		autocompletetboxes();
		
		if(changedQuestion == undefined){
			
		}
		else{
			$(".vitals").hide();
			if(changedQuestion['vitals'] != undefined && (changedQuestion['vitals']['vitals_q_1'] != undefined || changedQuestion['vitals']['vitals_q_2'] != undefined || changedQuestion['vitals']['vitals_q_8'] != undefined || changedQuestion['vitals']['vitals_q_21'] != undefined))
			{
				$('#vitals_q_1').val(changedQuestion['vitals']['vitals_q_1']);
				$('#vitals_q_2').val(changedQuestion['vitals']['vitals_q_2']);
				$('#vitals_q_3').val(changedQuestion['vitals']['vitals_q_3']);
				$('#vitals_q_8').val(changedQuestion['vitals']['vitals_q_8']);
				$('#vitals_q_11').val(changedQuestion['vitals']['vitals_q_11']);
				$('#vitals_q_21').val(changedQuestion['vitals']['vitals_q_21']);
				$('#vitals_q_41').val(changedQuestion['vitals']['vitals_q_41']);
				$('#vitals_q_42').val(changedQuestion['vitals']['vitals_q_42']);
				$('#vitals_q_43').val(changedQuestion['vitals']['vitals_q_43']);
				
				if($('#pvitals_q_1') != undefined){
					$('#pvitals_q_1').text(changedQuestion['vitals']['vitals_q_1']);
					$(".vitals").show();
				}
				if($('#pvitals_q_2') != undefined){
					$('#pvitals_q_2').text(changedQuestion['vitals']['vitals_q_2']);
					$(".vitals").show();
				}
				if($('#pvitals_q_8') != undefined){
					$('#pvitals_q_8').text(changedQuestion['vitals']['vitals_q_8']);
					$(".vitals").show();
				}
				if($('#pvitals_q_21') != undefined){
					$('#pvitals_q_21').text(changedQuestion['vitals']['vitals_q_21']);
					$(".vitals").show();
				}
				if($('#pvitals_q_3') != undefined){
					$('#pvitals_q_3').text(changedQuestion['vitals']['vitals_q_3']);
					$(".vitals").show();
				}
				if($('#pvitals_q_11') != undefined){
					$('#pvitals_q_11').text(changedQuestion['vitals']['vitals_q_11']);
					$(".vitals").show();
				}
				if($('#pvitals_q_41') != undefined){
					$('#pvitals_q_41').text(changedQuestion['vitals']['vitals_q_41']);
					$(".vitals").show();
				}
				if($('#pvitals_q_42') != undefined){
					$('#pvitals_q_42').text(changedQuestion['vitals']['vitals_q_42']);
					$(".vitals").show();
				}					
				if($('#pvitals_q_43') != undefined){
					$('#pvitals_q_43').text(changedQuestion['vitals']['vitals_q_45']);
					$(".vitals").show();
				}
				if($('#p1vitals_q_1') != undefined){
					$('#p1vitals_q_1').text(changedQuestion['vitals']['vitals_q_1']);
					$(".vitals").show();
				}
				if($('#p1vitals_q_2') != undefined){
					$('#p1vitals_q_2').text(changedQuestion['vitals']['vitals_q_2']);
					$(".vitals").show();
				}
				if($('#p1vitals_q_8') != undefined){
					$('#p1vitals_q_8').text(changedQuestion['vitals']['vitals_q_8']);
					$(".vitals").show();
				}
				if($('#p1vitals_q_21') != undefined){
					$('#p1vitals_q_21').text(changedQuestion['vitals']['vitals_q_21']);
					$(".vitals").show();
				}
				
				if($('#p2vitals_q_1') != undefined){
					$('#p2vitals_q_1').text(changedQuestion['vitals']['vitals_q_1']);
					$(".vitals").show();
				}
				if($('#p21vitals_q_2') != undefined){
					$('#p2vitals_q_2').text(changedQuestion['vitals']['vitals_q_2']);
					$(".vitals").show();
				}
				if($('#p2vitals_q_8') != undefined){
					$('#p2vitals_q_8').text(changedQuestion['vitals']['vitals_q_8']);
					$(".vitals").show();
				}
				if($('#p2vitals_q_21') != undefined){
					$('#p2vitals_q_21').text(changedQuestion['vitals']['vitals_q_21']);
					$(".vitals").show();
				}
				
				if($('#p3vitals_q_1') != undefined){
					$('#p3vitals_q_1').text(changedQuestion['vitals']['vitals_q_1']);
					$(".vitals").show();
				}
				if($('#p3vitals_q_2') != undefined){
					$('#p3vitals_q_2').text(changedQuestion['vitals']['vitals_q_2']);
					$(".vitals").show();
				}
				if($('#p3vitals_q_8') != undefined){
					$('#p3vitals_q_8').text(changedQuestion['vitals']['vitals_q_8']);
					$(".vitals").show();
				}
				if($('#p3vitals_q_21') != undefined){
					$('#p3vitals_q_21').text(changedQuestion['vitals']['vitals_q_21']);
					$(".vitals").show();
				}
				if($('#p4vitals_q_1') != undefined){
					$('#p4vitals_q_1').text(changedQuestion['vitals']['vitals_q_1']);
					$(".vitals").show();
				}
				if($('#p4vitals_q_2') != undefined){
					$('#p4vitals_q_2').text(changedQuestion['vitals']['vitals_q_2']);
					$(".vitals").show();
				}
				if($('#p4vitals_q_8') != undefined){
					$('#p4vitals_q_8').text(changedQuestion['vitals']['vitals_q_8']);
					$(".vitals").show();
				}
				if($('#p4vitals_q_21') != undefined){
					$('#p4vitals_q_21').text(changedQuestion['vitals']['vitals_q_21']);
					$(".vitals").show();
				}
			}
		}
	}
	
	function setVitals(item){
		//console.log(item);
		var scope = angular.element($("#quickprescription")).scope();
		if(!scope.$$phase) {
			scope.$apply(function(){
				scope.showForm('vitals','examinations','false', 'vitals_target');
				 changedQuestion  = scope.examination_data['changedQuestions'];
			});
		}
		
		if(changedQuestion == undefined){
			changedQuestion = {};
		}
		if(changedQuestion['vitals'] == undefined){
			changedQuestion['vitals'] = {};
		}
		if(changedQuestion['vitals'][$(item).attr('id')] == undefined){
			changedQuestion['vitals'][$(item).attr('id')] = {};
		}
		changedQuestion['vitals'][$(item).attr('id')] = $(item).val();
		
		var scope = angular.element($("#investigation")).scope();
		if(!scope.$$phase) {
			scope.$apply(function(){
				scope.examination_data['changedQuestions'] = changedQuestion ;
			});
		}
	
		Question = '';
		if($(item).attr('id') == 'vitals_q_1'){
			Question = 'Weight';
		}
		if($(item).attr('id') == 'vitals_q_2'){
			Question = 'Height';
		}
		if($(item).attr('id') == 'vitals_q_3'){
			Question = 'BMI';
		}
		if($(item).attr('id') == 'vitals_q_8'){
			Question = 'BP';
		}
		if($(item).attr('id') == 'vitals_q_21'){
			Question = 'Pulse';
		}
		if($(item).attr('id') == 'vitals_q_41'){
			Question = 'Waist';
		}
		if($(item).attr('id') == 'vitals_q_42'){
			Question = 'Hip';
		}
		if($(item).attr('id') == 'vitals_q_43'){
			Question = 'WHR';
		}
		if($(item).attr('id') == 'vitals_q_11'){
			Question = 'Temperature';
		}
		setQuestions(item, Question);
	}
	function setQuestions(answerElement,questionElementText){
		var scope = angular.element($("#investigation")).scope();
		//console.log("set Ques")
		if(!scope.$$phase) {
			scope.$apply(function(){
				examinationQuestion = scope.examination_data['examinationQuestions'];
			});
		}
		if(examinationQuestion == undefined){
			examinationQuestion = {};
		}
		if(examinationQuestion['vitals'] == undefined){
			examinationQuestion['vitals'] = {};
		}
		if(examinationQuestion['vitals'][$(answerElement).attr('id')] == undefined){
			examinationQuestion['vitals'][$(answerElement).attr('id')] = {};
		}

		examinationQuestion['vitals'][$(answerElement).attr('id')]['q']= questionElementText;
		examinationQuestion['vitals'][$(answerElement).attr('id')]['a']= $(answerElement).val();
		
		var scope = angular.element($("#investigation")).scope();
		if(!scope.$$phase) {
			scope.$apply(function(){
				scope.examination_data['examinationQuestions'] = examinationQuestion;
			});
		}
		document.cookie = 'examinationQuestion='+ JSON.stringify(examinationQuestion)+'; expires=Wed, 1 Jan 2070 13:47:11 UTC; path=/';
	}
	
	function readCookie(name) {
		var nameEQ = name + "="; 
		var ca = document.cookie.split(';'); 
		for(var i=0;i < ca.length;i++) { 
			var c = ca[i]; 
			while (c.charAt(0)==' ') c = c.substring(1,c.length); 
			if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length); 
		} 
		return undefined; 
	}
	
	function removefromFragments(i){
		fragments.splice(i, 1);
		setMedicineText(fragments);
	}
	function editFragments(i){
		$("#medicinename").val(fragments[i][0].value);
		$("#quantity").val(fragments[i][1].value);
		$("#frequency").val(fragments[i][2].value);
		$("#instructions").val(fragments[i][3].value);
		
		$('#medicines').hide();		
		$('#medicinetemplatediv').show();
		$('#medicinename').focus();
		
		fragments.splice(i, 1);
		setMedicineText(fragments);
	}
	function editInvestigationFragments(i){
		
		$("#investigationname").val(investigationFragments[i].value);
		
		$('#investigations').hide();		
		$('#investigationtemplatediv').show();
		$('#investigationname').focus();
		
		investigationFragments.splice(i, 1);
		setInvestigationText(investigationFragments);
	}
	function removefromInvestigationFragments(i){
		investigationFragments.splice(i, 1);
		setInvestigationText(investigationFragments);
	}

	function autocompletetboxes(){
		$('#report').show();
		$('#symptoms').show();
		$('#examinationsummary').show();
		$('#diagnosis').show();
		$('#investigations').show();
		
		$( "#medicines" ).focus(function(){
			$( this ).scrollTop(0 );
		});
		$( "#okBtn" ).focus(function(){
			$(this).css( "border",'1px solid black');
		});
		$( "#okBtn" ).focusout(function(){
			$(this).css( "border",'none');
		});
		$( "#clearBtn" ).focus(function(){
			$(this).css( "border",'1px solid black');
		});
		$( "#clearBtn" ).focusout(function(){
			$(this).css( "border",'none');
		});
		
		$( "#investigationOkBtn" ).focus(function(){
			$(this).css( "border",'1px solid black');
		});
		$( "#investigationOkBtn" ).focusout(function(){
			$(this).css( "border",'none');
		});
		$( "#investigationClearBtn" ).focus(function(){
			$(this).css( "border",'1px solid black');
		});
		$( "#investigationClearBtn" ).focusout(function(){
			$(this).css( "border",'none');
		});
		
		$( "#quantity" ).focus(function(){
			$('input#quantity').autocomplete("search");
		});
		$( "#frequency" ).focus(function(){
			$('input#frequency').autocomplete("search");
		});
		$( "#instructions" ).focus(function(){
			$('input#instructions').autocomplete("search");
		});
		$( "#medicinename" ).focus(function(){
		$('input#medicinename').autocomplete("search");
		});

		$('#medicinename').keydown(function(e){
			frequency = [ '(1 - 1 - 1)',
					'(1 - 0 - 1)',
					'(1 - 0 - 0)',
					'(0 - 0 - 1)',
					'(0 - 1 - 0)',
					'(0 - 1 - 1)',
					'(1 - 1 - 0)',
					'(1 - 1 - 1 - 1)',
					'(0 - 0 - 1 - 0)',
					'(0 - 1 - 1 - 0)',
					'(1 - 0 - 1 - 0)',
					'(0 - 0 - 1 - 1)'
					];
		});
		$("#medicines").keyup(function (e) {
			if($(this).val() != ''){
				$('#medicinename').val($(this).val());
			
				$(this).hide();
				$('#medicinetemplatediv').show();
				$('#medicinename').focus();
				$('#medicinename').val($(this).val());$(this).val('');
			}
		});

		$("#investigations").keyup(function (e) {
			$('#investigationname').val($(this).val());
			
			$(this).hide();
			$('#investigationtemplatediv').show();
			$('#investigationname').focus();
			$('#investigationname').val($(this).val());$(this).val('');
			
		});
		$("#diagnosis").keyup(function (e) {
				diagnosis_text = $(this).val();
				document.cookie = 'diagnosis_text='+diagnosis_text+'; expires=Wed, 1 Jan 2070 13:47:11 UTC; path=/';
				var scope = angular.element($("#diagnosis")).scope();
				if(!scope.$$phase) {
					scope.$apply(function(){
						scope.examination_data.text_diagnosis = diagnosis_text ;
					});
				}
		});
		$("#symptoms").keyup(function (e) {
				symptom_text = $(this).val();
				document.cookie = 'symptom_text='+symptom_text +'; expires=Wed, 1 Jan 2070 13:47:11 UTC; path=/';
				var scope = angular.element($("#symptoms")).scope();
				if(!scope.$$phase) {
					scope.$apply(function(){
						scope.examination_data.text_complaint = symptom_text;
					});
				}
		});
		$("#report").keyup(function (e) {
				report_text=$(this).val();
				document.cookie = 'report_text='+report_text +'; expires=Wed, 1 Jan 2070 13:47:11 UTC; path=/';
				var scope = angular.element($("#report")).scope();
				if(!scope.$$phase) {
					scope.$apply(function(){
						//scope.examination_data.text_reportparameter = report_text;
					});
				}
		});
		$("#report").mouseenter(function (e) {
				report_text=$(this).val();
				document.cookie = 'report_text='+report_text +'; expires=Wed, 1 Jan 2070 13:47:11 UTC; path=/';
				var scope = angular.element($("#report")).scope();
				if(!scope.$$phase) {
					scope.$apply(function(){
						//scope.examination_data.text_reportparameter = report_text;
					});
				}
		});			
		$("#followup").keyup(function (e) {
			followup_text = $(this).val();
			document.cookie = 'text_followup_note='+ $(this).val()+'; expires=Wed, 1 Jan 2070 13:47:11 UTC; path=/';
			var scope = angular.element($("#investigation")).scope();
				if(!scope.$$phase) {
					scope.$apply(function(){
						scope.examination_data.text_followup = followup_text;
					});
				}
		});
		$("#textexaminationsummary").keyup(function (e) {
			examinationsummary_text = $(this).val();
			document.cookie = 'examinationsummary_text='+ $(this).val()+'; expires=Wed, 1 Jan 2070 13:47:11 UTC; path=/';
			var scope = angular.element($("#investigation")).scope();
				if(!scope.$$phase) {
					scope.$apply(function(){
						scope.examination_data.textexaminationsummary = examinationsummary_text;
					});
				}
		});

		$("#diagnosis")
			.bind( "keydown", function( event ) {
				if ( event.keyCode === $.ui.keyCode.TAB &&
					$( this ).data( "ui-autocomplete" ).menu.active ) {
					event.preventDefault();
				}
			})
			.autocomplete({
				minLength: 1,
				source: function( request, response ) {
					typeBoxQuery = "select id as id, diseasename_c as value from diseasemasters where active_c = 1 and diseasename_c";
					 $.ajax({
						type: 'Get',
						url: "/ayushman/cautocompletedata/retrieve?query="+typeBoxQuery+"&term="+extractLast1(request.term),
						datatype: 'json', 
						success: function (data) {               
							response( $.ui.autocomplete.filter(
							JSON.parse(data), extractLast1( request.term )));
						},
						error: function (req, status, error) {
							ErrorMessage(req.responseText);
							$("#ui-datepicker-div").hide();
						}
					});
			},
			focus: function() {
				return false;
			},
			select: function( event, ui ) {
				var terms = split1( this.value );
				terms.pop();
				terms.push( ui.item.value );
				terms.push( "" );
				this.value = terms.join( ", " );
				diagnosis_text = this.value;
				document.cookie = 'diagnosis_text='+ diagnosis_text+'; expires=Wed, 1 Jan 2070 13:47:11 UTC; path=/';
				var scope = angular.element($("#investigation")).scope();
				if(!scope.$$phase) {
					scope.$apply(function(){
						scope.examination_data.text_diagnosis = diagnosis_text ;
					});
				}
				
				return false;
			}
		});
		$("#symptoms")
			.bind( "keydown", function( event ) {
				if ( event.keyCode === $.ui.keyCode.TAB &&
					$( this ).data( "ui-autocomplete" ).menu.active ) {
					event.preventDefault();
				}
			})
			.autocomplete({
				minLength: 0,
				source: function( request, response ) {
					typeBoxQuery = "select id as id, symptomname_c as value from symptommasters where active_c=1 and symptomname_c";
					 $.ajax({
						type: 'Get',
						url: "/ayushman/cautocompletedata/retrieve?query="+typeBoxQuery+"&term="+extractLast1(request.term),
						datatype: 'json', 
						success: function (data) {               
							response( $.ui.autocomplete.filter(
							JSON.parse(data), extractLast1( request.term )));
						},
						error: function (req, status, error) {
							ErrorMessage(req.responseText);
							$("#ui-datepicker-div").hide();
						}
					});
			},
			focus: function() {
				return false;
			},
			select: function( event, ui ) {
				var terms = split1( this.value );
				terms.pop();
				terms.push( ui.item.value );
				terms.push( "" );
				this.value = terms.join( ", " );
				symptomtext = this.value;
				document.cookie = 'symptom_text='+ symptomtext+'; expires=Wed, 1 Jan 2070 13:47:11 UTC; path=/';
				var scope = angular.element($("#template")).scope();
				if(!scope.$$phase) {
					scope.$apply(function(){
						scope.examination_data.text_complaint = symptomtext;
					});
				}
				return false;
			}
		});
		$("#investigationname").keydown(function (e) {
				if(e.keyCode == 9 || e.keyCode == 13){
					$("#investigationOkBtn").focus();
					return false;
				}
			})
			.autocomplete({
				position: { my: "left bottom", at: "left top", collision: "flip" },
				minLength: 1,
				source: function( request, response ) {
					typeBoxQuery = " select case when(aliasto_c = -1) then id else aliasto_c end as id,concat(testname_c,(case when (isnull(sample_c) or (sample_c = '')) then '' else concat(' (sample : ',sample_c,')') end)) AS value from testmasters where active_c = 1 and testname_c";					
					//typeBoxQuery = "select id as id, testname_c as value from investigations where testname_c";
					 $.ajax({
						type: 'Get',
						url: "/ayushman/cautocompletedata/retrieve?query="+typeBoxQuery+"&term="+extractLast1(request.term),
						datatype: 'json', 
						success: function (data) {               
							response( $.ui.autocomplete.filter(
							JSON.parse(data), extractLast1( request.term )));
						},
						error: function (req, status, error) {
							ErrorMessage(req.responseText);
							$("#ui-datepicker-div").hide();
						}
					});
			},
			select: function( event, ui ) {
				//$("#investigationOkBtn").focus();
			}
		});
		
		$( "#quantity" )
			.autocomplete({
				position: { my: "left bottom", at: "left top", collision: "flip" },
				minLength: 0,
				source: function( request, response ) {
					response( $.ui.autocomplete.filter(
					frequency, extractLast( request.term ) ) );
				},
				select: function( event, ui ) {
					setTimeout(function(){$('input#frequency').autocomplete("search");$('input#frequency').focus();}, 100);
				}
		  });
		  $( "#frequency" )
			.autocomplete({
				position: { my: "left bottom", at: "left top", collision: "flip" },
				minLength: 0,
				source: function( request, response ) {
					response( $.ui.autocomplete.filter(
					days, extractLast( request.term ) ) );
				},
				select: function( event, ui ) {
					setTimeout(function(){$('input#instructions').autocomplete("search");$('input#instructions').focus();}, 100);
				}
		  });
		   $( "#instructions" ).keydown(function (e) {
				if(e.keyCode == 9 || e.keyCode == 13){
					$("#okBtn").focus();
					return false;
				}
			})
			.autocomplete({
				position: { my: "left bottom", at: "left top", collision: "flip" },
				minLength: 0,
				source: function( request, response ) {
					response( $.ui.autocomplete.filter(
					instruction, extractLast( request.term ) ) );
				},
				select: function( event, ui ) {
					//$("#okBtn").focus();
				}
		  });
		$( "#medicinename" )
			.autocomplete({
				position: { my: "left bottom", at: "left top", collision: "flip" },
				minLength: 1,
				source: function( request, response ) {
					typeBoxQuery = "select id as id, UPPER(drugname) as value, dosage as dosage  from drugs where drugname";
					 $.ajax({
						type: 'Get',
						url: "/ayushman/cdrug/names?term="+request.term,
						datatype: 'json', 
						success: function (data) {               
							response( $.ui.autocomplete.filter(
							JSON.parse(data), extractLast( request.term ) ) );
						},
						error: function (req, status, error) {
							ErrorMessage(req.responseText);
							$("#ui-datepicker-div").hide();
						}
					});
			},

			select: function( event, ui ) {
				var  flag=ui.item.flag;
				var agelessthan14 = document.getElementById("agelessthan14").value;
				var bodyweight = Number(document.getElementById("vitals_q_1").value);
				document.getElementById("noConcentration").setAttribute("style","display:none");	
				document.getElementById("computedDosage").setAttribute("style","display:none");	
			
				//console.log(flag);
				if(flag==0){
					var dosage=ui.item.dosage;
					var frequency=ui.item.frequency;
					var  days=ui.item.days;
					var instruction=ui.item.instruction;
					var medId=ui.item.drugid;
					var drugStrength=ui.item.strength;
					var drugForm=ui.item.drugform;
					var dosageMG=ui.item.dosageinmg;
					document.getElementById("frequency").value="X"+days;
					document.getElementById("quantity").value=dosage+"X"+frequency;
					document.getElementById("instructions").value=instruction;
					document.getElementById("medId").value=medId;
					document.getElementById("drugStrength").value=drugStrength;
					document.getElementById("drugForm").value=drugForm;
					document.getElementById("adultDosage").value=ui.item.drugdosage;
					joinDosageFrequency(ui.item.drugdosage);
					if(agelessthan14 == "true" && bodyweight <=30)
					{
						document.getElementById("dosageMG").value=dosageMG;
						document.getElementById("frequency").value="";
						document.getElementById("quantity").value="";
						$('input#dosageMG').focus();
					}
					else
					{
						setTimeout(function(){$('input#quantity').autocomplete();}, 100);
					}					
					$("#addBtn").hide();
					$("#findBtn").hide();
				}
				 else{
					joinDosageFrequency(ui.item.dosage);
					$("#addBtn").show();
					$("#findBtn").hide();
					var medId=ui.item.id;
					var drugStrength=ui.item.strength;
					var drugForm=ui.item.drugform;
					document.getElementById("medId").value=medId;
					document.getElementById("drugStrength").value=drugStrength;
					document.getElementById("drugForm").value=drugForm;
					document.getElementById("adultDosage").value=ui.item.dosage;
					if(agelessthan14 == "true" && bodyweight <=30)
					{
						document.getElementById("frequency").value="";
						document.getElementById("quantity").value="";
						$('input#dosageMG').focus();
					}
					else
					{				
						setTimeout(function(){$('input#quantity').autocomplete("search");$('input#quantity').focus();}, 100);
					}
					//console.log("master  "+flag);
				}
			}	
		  });
	}
	
	function suggestDosage(drugStr,drugDose,weight,drugform,adultdose){
		if(drugform != 1 && drugform != 2 && drugform != 3 && drugform != 4 && drugform != 5 && drugform != 9)
		{
			// no notification
			return false;
		}
		if (drugStr == "" || drugStr == undefined) {
			//$('input#quantity').focus();
			if(Number(weight) <= 30)
			{
				document.getElementById("noConcentration").setAttribute("style","display:block");	
				document.getElementById("computedDosage").setAttribute("style","display:none");	
			
				frequency = [ '(1 - 1 - 1)',
					'(1 - 0 - 1)',
					'(1 - 0 - 0)',
					'(0 - 0 - 1)',
					'(0 - 1 - 0)',
					'(0 - 1 - 1)',
					'(1 - 1 - 0)',
					'(1 - 1 - 1 - 1)',
					'(0 - 0 - 1 - 0)',
					'(0 - 1 - 1 - 0)',
					'(1 - 0 - 1 - 0)',
					'(0 - 0 - 1 - 1)'
					];
				return false;
			}
		}
		if (weight == "" || weight == undefined) {
			showNotification('300','20','Save data','Enter Weight for Calculation','notification','timernotification',2500);
			$('input#vitals_q_1').focus();
			return false;
		}
		if(Number(weight) > 30)
		{
			document.getElementById("noConcentration").setAttribute("style","display:none");	
			document.getElementById("computedDosage").setAttribute("style","display:none");	
			
			joinDosageFrequency(adultdose);
			// Standard Adult dosages should be displayed
			$( "#quantity" )
			.autocomplete({
				position: { my: "left bottom", at: "left top", collision: "flip" },
				minLength: 0,
				source: function( request, response ) {
					response( $.ui.autocomplete.filter(
					frequency, extractLast( request.term ) ) );
				},
				select: function( event, ui ) {
					setTimeout(function(){$('input#frequency').autocomplete("search");$('input#frequency').focus();}, 100);
				}
			});	
			//setTimeout(function(){$('input#quantity').autocomplete("search");$('input#quantity').focus();}, 100);
			return false;
		}
		else
		{
			frequency = [ '(1 - 1 - 1)',
					'(1 - 0 - 1)',
					'(1 - 0 - 0)',
					'(0 - 0 - 1)',
					'(0 - 1 - 0)',
					'(0 - 1 - 1)',
					'(1 - 1 - 0)',
					'(1 - 1 - 1 - 1)',
					'(0 - 0 - 1 - 0)',
					'(0 - 1 - 1 - 0)',
					'(1 - 0 - 1 - 0)',
					'(0 - 0 - 1 - 1)'
					];
		}
		if (drugDose == "" || drugDose == undefined) {
			showNotification('300','20','Save data','Enter Dosage for Calculation','notification','timernotification',2500);
			frequency = [ '(1 - 1 - 1)',
					'(1 - 0 - 1)',
					'(1 - 0 - 0)',
					'(0 - 0 - 1)',
					'(0 - 1 - 0)',
					'(0 - 1 - 1)',
					'(1 - 1 - 0)',
					'(1 - 1 - 1 - 1)',
					'(0 - 0 - 1 - 0)',
					'(0 - 1 - 1 - 0)',
					'(1 - 0 - 1 - 0)',
					'(0 - 0 - 1 - 1)'
					];
			
			return false;
		}
		var dailyStrength = drugDose * weight;  
		// Assuming Strength is per tab / per ml
		joinCalculatedDosageFrequency(dailyStrength,drugform,drugStr);
		//console.log(drugform);
		//console.log(drugStr);
		//console.log(dailyStrength);
		//console.log(frequency);
		//setTimeout(function(){$('input#quantity').autocomplete();}, 100);
		setTimeout(function(){$('input#quantity').autocomplete("search");$('input#quantity').focus();}, 100);
	}
	function findinMaster(med){
			$('input#medicinename').autocomplete("search");
			$( "#medicinename" ).focus();
			var medicineName=med;
			var agelessthan14 = document.getElementById("agelessthan14").value;
			if (medicineName == "") {
				alert("Medicine Name must be filled out");
				return false;
			}
			$( "#medicinename" )
			.autocomplete({
				position: { my: "left bottom", at: "left top", collision: "flip" },
				minLength: 1,
				source: function( request, response ) {
					typeBoxQuery = "select id as id, UPPER(drugname) as value, dosage as dosage  from drugs where drugname";
					 $.ajax({
						type: 'Get',
						url: "/ayushman/cdrug/drugnames?term="+request.term,
						datatype: 'json', 
						success: function (data) { 
							response( $.ui.autocomplete.filter(
							JSON.parse(data), extractLast( request.term ) ) );
						},
						error: function (req, status, error) {
							ErrorMessage(req.responseText);
							$("#ui-datepicker-div").hide();
						}
					});
			},

			select: function( event, ui ) {
				var  flag=ui.item.flag;
				//console.log(flag);
				document.getElementById("noConcentration").setAttribute("style","display:none");	
				document.getElementById("computedDosage").setAttribute("style","display:none");	
		
				if(flag==0){
					var dosage=ui.item.dosage;
					var frequency=ui.item.frequency;
					var  days=ui.item.days;
					var instruction=ui.item.instruction;
					var drugStrength=ui.item.strength;
					var medId=ui.item.drugid;
					document.getElementById("frequency").value="X"+days;
					document.getElementById("quantity").value=dosage+"X"+frequency;
					document.getElementById("instructions").value=instruction;
					document.getElementById("medId").value=medId;
					document.getElementById("drugStrength").value=drugStrength;
					document.getElementById("adultDosage").value=ui.item.drugdosage;
					
					$("#addBtn").hide();
					$("#findBtn").hide();
					if(agelessthan14 == "true")
					{
						document.getElementById("frequency").value="";
						document.getElementById("quantity").value="";
						joinDosageFrequency(ui.item.drugdosage);
						$('input#dosageMG').focus();
					}
					else
					{
						joinDosageFrequency(ui.item.drugdosage);
						setTimeout(function(){$('input#quantity').autocomplete();}, 100);
					}
					//console.log("personal  "+flag);
					return false;
				}
				 else{
					joinDosageFrequency(ui.item.dosage);
					$("#addBtn").show();
					$("#findBtn").hide();
					var medId=ui.item.id;
					var drugStrength=ui.item.strength;
					document.getElementById("medId").value=medId;
					document.getElementById("drugStrength").value=drugStrength;
					document.getElementById("adultDosage").value=ui.item.dosage;
					
					if(agelessthan14 == "true")
					{
						document.getElementById("frequency").value="";
						document.getElementById("quantity").value="";
						$('input#dosageMG').focus();
					}
					else
					{				
						setTimeout(function(){$('input#quantity').autocomplete("search");$('input#quantity').focus();}, 100);
					}
					//console.log("master  "+flag);
				}
				return ;
			}	
		  });
		 return false; 
	  }
	
	function joinCalculatedDosageFrequency(dosage,drugform,drugStr){
		if (drugform ==1 || drugform ==2 ) // TAB and CAP
		{
			if(Number(dosage / drugStr) <= 0.8)
			{ // Dosage is 1/2 Tab
				if (drugform == 1)
				{
					var fullDose = "1/2 TAB";  // Dose per Day
					var halfDose = "1/4 TAB";
					var onethirdDose = "1/4 TAB";
					var onefourthDose = "1/4 TAB";
				}
				if (drugform == 2)
				{
					var fullDose = "1 CAP";  // Dose per Day
					var halfDose = "1/2 CAP";
					var onethirdDose = "1/4 CAP";
					var onefourthDose = "1/4 CAP";
				}
			}else if(Number(dosage / drugStr) > 0.8 && Number(dosage / drugStr) <= 1.3)
			{ // Dosage is 1 Tab
				if (drugform == 1)
				{
					var fullDose = "1 TAB";  // Dose per Day
					var halfDose = "1/2 TAB";
					var onethirdDose = "1/4 TAB";
					var onefourthDose = "1/4 TAB";
				}
				if (drugform == 2)
				{
					var fullDose = "1 CAP";  // Dose per Day
					var halfDose = "1/2 CAP";
					var onethirdDose = "1/4 CAP";
					var onefourthDose = "1/4 CAP";
				}
			}else if(Number(dosage / drugStr) > 1.3 && Number(dosage / drugStr) <= 1.8)
			{// Dosage is 1 and half TAB / CAP
				if (drugform == 1)
				{
					var fullDose = "1 and 1/2 TAB";  // Dose per Day
					var halfDose = "3/4 TAB";
					var onethirdDose = "1/2 TAB";
					var onefourthDose = "1/4 TAB";
				}else if (drugform == 2)
				{
					var fullDose = "1 and 1/2 CAP";  // Dose per Day
					var halfDose = "3/4 CAP";
					var onethirdDose = "1/2 CAP";
					var onefourthDose = "1/4 CAP";					
				}
			}else if(Number(dosage / drugStr) > 1.8 && Number(dosage / drugStr) <= 2.3)
			{// Dosage is 2 TAB / CAP
				if (drugform == 1)
				{
					var fullDose = "2 TAB";  // Dose per Day
					var halfDose = "1 TAB";
					var onethirdDose = "3/4 TAB";
					var onefourthDose = "1/2 TAB";
				}else if (drugform == 2)
				{
					var fullDose = "2 CAP";  // Dose per Day
					var halfDose = "1 CAP";
					var onethirdDose = "3/4 CAP";
					var onefourthDose = "1/2 CAP";
				}
			}else if(Number(dosage / drugStr) > 2.3 && Number(dosage / drugStr) <= 2.8)
			{// Dosage is 2  and half TAB / CAP
				if (drugform == 1)
				{
					var fullDose = "2 and 1/2 TAB";  // Dose per Day
					var halfDose = "1 and 1/4 TAB";
					var onethirdDose = "3/4 TAB";
					var onefourthDose = "1/2 TAB";
				}else if (drugform == 2)
				{
					var fullDose = "2 and 1/2 CAP";  // Dose per Day
					var halfDose = "1 and 1/4 CAP";
					var onethirdDose = "3/4 CAP";
					var onefourthDose = "1/2 CAP";
				}
			}else if(Number(dosage / drugStr) > 2.8 && Number(dosage / drugStr) <= 3.3)
			{// Dosage is 3 TAB / CAP
				if (drugform == 1)
				{
					var fullDose = "3 TAB";  // Dose per Day
					var halfDose = "1 and 1/2 TAB";
					var onethirdDose = "1 TAB";
					var onefourthDose = "3/4 TAB";
				}
				if (drugform == 2)
				{
					var fullDose = "3 CAP";  // Dose per Day
					var halfDose = "1 and 1/2 CAP";
					var onethirdDose = "1 CAP";
					var onefourthDose = "3/4 CAP";
				}
			}else if(Number(dosage / drugStr) > 3.3)
			{// Dosage is 4 TAB / CAP
				if (drugform == 1)
				{
					var fullDose = "4 TAB";  // Dose per Day
					var halfDose = "2 TAB";
					var onethirdDose = "1 and 1/2 TAB";
					var onefourthDose = "1 TAB";
				}else if (drugform == 2)
				{
					var fullDose = "4 CAP";  // Dose per Day
					var halfDose = "2 CAP";
					var onethirdDose = "1 and 1/2 CAP";
					var onefourthDose = "1 CAP";
				}
			}
			var frequency = [ onethirdDose + ' X (1 - 1 - 1)',
					halfDose +' X (1 - 0 - 1)',
					fullDose +' X (1 - 0 - 0)',
					fullDose +' X (0 - 0 - 1)',
					fullDose +' X (0 - 1 - 0)',
					halfDose +' X (0 - 1 - 1)',
					halfDose +' X (1 - 1 - 0)',
					onefourthDose +' X (1 - 1 - 1 - 1)',
					fullDose +' X (0 - 0 - 1 - 0)',
					halfDose +' X (0 - 1 - 1 - 0)',
					halfDose +' X (1 - 0 - 1 - 0)',
					halfDose +' X (0 - 0 - 1 - 1)'
					];
			document.getElementById("computedDosage").setAttribute("style","display:block");	
			document.getElementById("noConcentration").setAttribute("style","display:none");	
		}
		else if (drugform ==3 || drugform ==4 || drugform ==5 || drugform == 9)
		{
				// Injection - Syrup - Suspension
			var fullDose = Number(dosage/drugStr).toFixed(1);  // Dose per Day
			var intfullDose = parseInt(fullDose);
			var decfullDose = ((Number(fullDose) - Number(intfullDose))*10).toFixed(0);
			
			var halfDose = Number(dosage/drugStr/2).toFixed(1);
			var inthalfDose = parseInt(halfDose);
			var dechalfDose = ((Number(halfDose) - Number(inthalfDose))*10).toFixed(0);
			
			var onethirdDose = Number(dosage/drugStr/3).toFixed(1);
			var intonethirdDose = parseInt(onethirdDose);
			var deconethirdDose = ((Number(onethirdDose) - Number(intonethirdDose))*10).toFixed(0);
			//console.log(onethirdDose);
			//console.log(intonethirdDose);
			//console.log(deconethirdDose);
			var onefourthDose = Number(dosage/drugStr/4).toFixed(1);
			var intonefourthDose = parseInt(onefourthDose);
			var deconefourthDose = ((Number(onefourthDose) - Number(intonefourthDose))*10).toFixed(0);
			
			if ((decfullDose ==1) || (decfullDose ==2) ||(decfullDose ==0))
			{
					fullDose = Number(intfullDose); // Only Integer value;					
			}else if ((decfullDose ==3) || (decfullDose ==4) ||(decfullDose ==5)||(decfullDose ==6)||(decfullDose ==7))
			{
					fullDose = Number(intfullDose) + 0.5; //Rounded to 0.5 ml;
			}else if ((decfullDose ==8)||(decfullDose ==9))
			{
					fullDose = Number(intfullDose) + 1; //Rounded to next digit;
			}
			
			if ((dechalfDose ==1) || (dechalfDose ==2) ||(dechalfDose ==0))
			{
					halfDose = Number(inthalfDose) ; // Only Integer value;
			}else if ((dechalfDose ==3) || (dechalfDose ==4) ||(dechalfDose ==5)||(dechalfDose ==6)||(dechalfDose ==7))
			{
				 	halfDose = Number(inthalfDose) + 0.5; //Rounded to 0.5 ml;
			}else if ((dechalfDose ==8)||(dechalfDose ==9))
			{
					halfDose = Number(inthalfDose) + 1 ; //Rounded to next digit;
			}
			
			if ((deconethirdDose ==1) || (deconethirdDose ==2) ||(deconethirdDose ==0))
			{
					onethirdDose = Number(intonethirdDose); // Only Integer value;
			}else if ((deconethirdDose ==3) || (deconethirdDose ==4) ||(deconethirdDose ==5)||(deconethirdDose ==6)||(deconethirdDose ==7))
			{
				 	onethirdDose = Number(intonethirdDose) + 0.5; //Rounded to 0.5 ml;
			}else if ((deconethirdDose ==8)||(deconethirdDose ==9))
			{
					onethirdDose = Number(intonethirdDose) + 1;///Rounded to next digit;
			}		
		
			if ((deconefourthDose ==1) || (deconefourthDose ==2) ||(deconefourthDose ==0))
			{
					onefourthDose = Number(intonefourthDose); // Only Integer value;
			}else if ((deconefourthDose ==3) || (deconefourthDose ==4) ||(deconefourthDose ==5)||(deconefourthDose ==6)||(deconefourthDose ==7))
			{
				 	onefourthDose = Number(intonefourthDose) + 0.5; //Rounded to 0.5 ml;
			}else if ((deconefourthDose ==8)||(deconefourthDose ==9))
			{
					onefourthDose = Number(intonefourthDose) + 1; //Rounded to next digit;
			}		

			var frequency = [ onethirdDose +'ml X (1 - 1 - 1)',
					halfDose +'ml X (1 - 0 - 1)',
					fullDose +'ml X (1 - 0 - 0)',
					fullDose +'ml X (0 - 0 - 1)',
					fullDose +'ml X (0 - 1 - 0)',
					halfDose +'ml X (0 - 1 - 1)',
					halfDose +'ml X (1 - 1 - 0)',
					onefourthDose +'ml X (1 - 1 - 1 - 1)',
					fullDose +'ml X (0 - 0 - 1 - 0)',
					halfDose +'ml X (0 - 1 - 1 - 0)',
					halfDose +'ml X (1 - 0 - 1 - 0)',
					halfDose +'ml X (0 - 0 - 1 - 1)'
					];			
			document.getElementById("computedDosage").setAttribute("style","display:block");	
			document.getElementById("noConcentration").setAttribute("style","display:none");	
		}else
		{
			// Else No Suggestions
			document.getElementById("computedDosage").setAttribute("style","display:none");	
			document.getElementById("noConcentration").setAttribute("style","display:block");
		}			
		//console.log(frequency);
		$('input#quantity').autocomplete("search");
		$( "#quantity" ).focus();
	
		$( "#quantity" )
			.autocomplete({
				position: { my: "left bottom", at: "left top", collision: "flip" },
				minLength: 0,
				source: function( request, response ) {
					response( $.ui.autocomplete.filter(
					frequency, extractLast( request.term ) ) );
				},
				select: function( event, ui ) {
					setTimeout(function(){$('input#frequency').autocomplete("search");$('input#frequency').focus();}, 100);
				}
		  });	
	}
	function joinDosageFrequency(dosage){
		var frequencyTemp = [ '(1 - 1 - 1)',
					'(1 - 0 - 1)',
					'(1 - 0 - 0)',
					'(0 - 0 - 1)',
					'(0 - 1 - 0)',
					'(0 - 1 - 1)',
					'(1 - 1 - 0)',
					'(1 - 1 - 1 - 1)',
					'(0 - 0 - 1 - 0)',
					'(0 - 1 - 1 - 0)',
					'(1 - 0 - 1 - 0)',
					'(0 - 0 - 1 - 1)'
					];
		dosage = new String(dosage);
		dosage = dosage.split(",");
		temp = new Array();
		for(i=0;i<dosage.length;i++){
			for(j=0;j<frequencyTemp.length;j++){
				temp.push(dosage[i]+' X '+frequencyTemp[j]);
			}
		}
		frequency = temp;
	}
	function joinDosage(dosage){
		dosage = new String(dosage);
		dosage = dosage.split(",");
		temp = new Array();
		for(i=0;i<dosage.length;i++){
			
			temp.push(dosage[i]);			
		}
		dosagepersonalized = temp;
	}
	
	function setMedicineId(id){
		medicineId=id;
	}
	function createFragment(){
		var fragmentIds = new Array();
		$("#addBtn").hide();
		$("#findBtn").show();
	
		var item = {};
		item.value = $("#medicinename").val().toUpperCase();;
		fragmentIds.push(item);
		
		var item1 = {};
		item1.value = $("#quantity").val();
		fragmentIds.push(item1);
		
		var item2 = {};
		item2.value = $("#frequency").val();
		fragmentIds.push(item2);
		
		var item3 = {};
		item3.value = $("#instructions").val();
		fragmentIds.push(item3);
	
		fragments.push(fragmentIds);
		
		if($.trim($("#medicinename").val()) != ""){
			setMedicineText(fragments);
			clearBoxes();
		}else{
			alert("Please enter medicine name");
		}
	}
	function createInvestigationFragment(){
		var fragmentIds = new Array();
		
		var item = {};
		item.value = $("#investigationname").val();
		
		investigationFragments.push(item);
		
		if($.trim($("#investigationname").val()) != ""){
			setInvestigationText(investigationFragments);
			clearInvestigationBoxes();
		}else{
			alert("Please enter Investigation name");
		}
	}
	function clearInvestigationBoxes(){
		$("#investigationname").val('');
		setTimeout(function(){$('input#investigations').focus();}, 100);
	}
	function clearBoxes(){
		//document.getElementById("medicinename").disabled='true';
		//document.getElementById("medicinename").setAttribute("disabled", false);
		$("#addBtn").hide();
		$("#findBtn").show();
		document.getElementById("noConcentration").setAttribute("style","display:none");
		document.getElementById("computedDosage").setAttribute("style","display:none");
		
		$("#medicinename").val('');$("#quantity").val('');$("#frequency").val('');$("#instructions").val('');$("#medId").val('');
		$("#dosageMG").val('');$("#drugForm").val('');$("#drugStrength").val('');
		setTimeout(function(){$('input#medicines').focus();}, 100);		
	}
	function enableBoxes(){
		document.getElementById("medicinename").disabled='false';
		document.getElementById("medicinename").setAttribute("disabled", false);	
	}	
		
	function setMedicineText(temp1){
		fragments = temp1;
		$('#prescription').empty();
		medicine_text = new Array();
		temptext = "";
		for(var i = 0; i < fragments.length; i++){
			elm = '<div class="fragment bodytext_normal" title="'+fragments[i][0].value+'" style="height:auto;cursor:default;" href="javascript:void(0);">'+
				'<div style="width:100%;padding-top:10px;">'+
					'<div style="float:left;margin-left:1%;width:40%;font-weight:bold">' +fragments[i][0].value +
					'</div>'
					+"<div style='float:left;margin-left:1%;width:32%'>"+ fragments[i][1].value+' '+fragments[i][2].value+"</div>"+
					"<div style='float:left;margin-left:1%;width:25%'>"+ fragments[i][3].value+"</div>"
					+"<div style='float:left;width:100%;margin-bottom:10px;margin-top:10px;'><span id='close' style='height:22px;width:17px;float:right;' class='action' onclick='removefromFragments("+i+");$(this).parentNode.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode.parentNode); return false;'>x</span>"
					+"<a href='javascript:void(0);' class='action' style='float:right;margin-right:10px;' onclick='getDrugInfo("+JSON.stringify(fragments[i][0])+");' ><i class='fa fa-info-circle' style='font-size:11px;color:blue;padding-right:10px;'>&nbsp;Drug info</i></a>"
					+'<a href="javascript:void(0);" class="action" style="float:right;" onclick="editFragments('+i+');" title="Click To Edit" ><i class="fa fa-pencil-square-o" style="font-size:12px;color:blue;padding-right:10px;">&nbsp;Edit</i></a></div>'+
				'</div>'+
			'</div>';
			$(elm).appendTo($('#prescription'));
			
			if($('#pprescription') != undefined){
				$(elm).appendTo($('#pprescription'));
			}
			
			if($('#p1prescription') != undefined){
				$(elm).appendTo($('#p1prescription'));
			}
			if($('#p2prescription') != undefined){
				$(elm).appendTo($('#p2prescription'));
			}
			if($('#p3prescription') != undefined){
				$(elm).appendTo($('#p3prescription'));
			}
				
			if($('#medicinepprescription') != undefined){
				$(elm).appendTo($('#medicinepprescription'));
			}			
			temp = {};
			temp["drugname"] = fragments[i][0].value;
			temp["frequency"] = fragments[i][1].value;
			temp["days"] = fragments[i][2].value;
			temp["instruction"] = fragments[i][3].value;
			medicine_text.push(JSON.stringify(temp));
			temptext = temptext + fragments[i][0].value+"- "+ fragments[i][1].value+"- "+ fragments[i][2].value+"- "+ fragments[i][3].value + '\n';
		}
		var scope = angular.element($('#contentDiv')).scope();
		if(!scope.$$phase) {
			scope.$apply(function(){
				scope.examination_data.medicine_text = temptext ;
			});
		}
		
		medicine = JSON.stringify(fragments);
		document.cookie = 'medicine='+medicine+'; expires=Wed, 1 Jan 2070 13:47:11 UTC; path=/';
		document.cookie = 'medicine_text='+ JSON.stringify(medicine_text)+'; expires=Wed, 1 Jan 2070 13:47:11 UTC; path=/';
	}
	
	function setInvestigationText(temp1){
		investigationFragments = temp1;
		$('#investigation').empty();
		investigation_text = new Array();
		temptext = "";
		for(var i = 0; i < investigationFragments.length; i++){
			if(i==0){
				elm = '<span class="bodytext_bold heading">Investigations</span>'+
				'<div class="fragment bodytext_normal" style="height:auto;cursor:default;float: left;width: 100%;" href="javascript:void(0);">'+
					'<div style="width:100%;padding-top:10px;">'+
						'<div style="width:90%">'+investigationFragments[i].value+'</div>'
						+"<span id='close' style='height:22px;width:17px;float:right;' class='action' onclick='removefromInvestigationFragments("+i+");$(this).parentNode.parentNode.removeChild(this.parentNode); return false;'>x</span>"+
						'<a href="javascript:void(0);" class="action" style="float:right;" onclick="editInvestigationFragments('+i+');" title="Click To Edit" ><i class="fa fa-pencil-square-o" style="font-size:11px;color:blue;padding-right:10px;">&nbsp;Edit</i></a>'+"<a href='javascript:void(0);' class='action' style='float:right;margin-right:10px;' onclick='getTestInfo("+JSON.stringify(investigationFragments[i].value)+");' ><i class='fa fa-info-circle' style='font-size:13px;color:blue;padding-right:10px;'>&nbsp;More info</i></a>" +
					'</div>'+
				'</div>';
			}else{
				elm = '<div class="fragment bodytext_normal" style="height:auto;cursor:default;float: left;width: 100%;" href="javascript:void(0);">'+
					'<div style="width:100%;padding-top:10px;">'+
						'<div style="width:90%">'+investigationFragments[i].value+'</div>'
						+"<span id='close' style='height:22px;width:17px;float:right;' class='action' onclick='removefromInvestigationFragments("+i+");$(this).parentNode.parentNode.removeChild(this.parentNode); return false;'>x</span>"+
						'<a href="javascript:void(0);" class="action" style="float:right;" onclick="editInvestigationFragments('+i+');" title="Click To Edit" ><i class="fa fa-pencil-square-o" style="font-size:11px;color:blue;padding-right:10px;">&nbsp;Edit</i></a>'+"<a href='javascript:void(0);' class='action' style='float:right;margin-right:10px;' onclick='getTestInfo("+JSON.stringify(investigationFragments[i].value)+");' ><i class='fa fa-info-circle' style='font-size:13px;color:blue;padding-right:10px;'>&nbsp;More info</i></a>" +
					'</div>'+
				'</div>';
			}
			
			$(elm).appendTo($('#investigation'));
			if($('#pinvestigation') != undefined){
				$(elm).appendTo($('#pinvestigation'));
				$('#pinvestigation').show();
			}	
			if($('#p1investigation') != undefined){
				$(elm).appendTo($('#p1investigation'));
				$('#p1investigation').show();
			}	
			if($('#p2investigation') != undefined){
				$(elm).appendTo($('#p2investigation'));
				$('#p2investigation').show();
			}	
			if($('#p3investigation') != undefined){
				$(elm).appendTo($('#p3investigation'));
				$('#p3investigation').show();
			}	
			temp = {};
			temp["value"] = investigationFragments[i].value;
			temp["id"] = investigationFragments[i].id;
			investigation_text.push(temp);
			temptext = temptext +investigationFragments[i].value+'\n';
		} 
		var scope = angular.element($('#contentDiv')).scope();
		if(!scope.$$phase) {
			scope.$apply(function(){
				scope.examination_data.investigation_text = temptext ;
			});
		}
		document.cookie = 'investigation_text='+ JSON.stringify(investigation_text)+'; expires=Wed, 1 Jan 2070 13:47:11 UTC; path=/';
	}

function setPrint(){
	$("#prescriptionsPrint").empty();
	elm = $( "#prescriptionPrint" ).clone();
	elm.appendTo( "#prescriptionsPrint" );
	
	if($("#InvestigationChk").is(':checked')){
		elm = $( "#prescriptionPrint" ).clone();
		elm.css("page-break-before", "always");
		elm.find('#pprescription').hide();
		elm.appendTo( "#prescriptionsPrint" );
	}
	
	if($("#MedicinesChk").is(':checked')){
		elm = $( "#prescriptionPrint" ).clone();
		elm.css("page-break-before", "always");
		elm.find('#pinvestigation').hide();
		elm.appendTo( "#prescriptionsPrint" );
	}
	
	if($("#withoutheaderChk").is(':checked')){
		$("#prescriptionsPrint").find(".previewHeader").hide();  // checked
		$("#prescriptionsPrint").find(".note").hide();
	}else{	
		$("#prescriptionsPrint").find(".previewHeader").show();
		$("#prescriptionsPrint").find(".note").show();
	}
	
	if($("#withsignatureChk").is(':checked')){
		$("#prescriptionsPrint").find(".signature").show();  // checked
	}else{	
		$("#prescriptionsPrint").find(".signature").hide();
	}
	$("#prescriptionsPrint").find(".prescription").css("min-height","300px");
	
	$('<link rel="stylesheet" href="'+document.location.origin+'/ayushman/assets/app/css/prescription.css">').appendTo( "#prescriptionsPrint" );
}
function savePDf(){
	elm = $( "#prescriptionPrint" ).clone();
	elm.find('#pinvestigation').hide();
	$('<link rel="stylesheet" href="/ayushman/assets/app/css/prescription.css">').appendTo(elm);
	var htmlfile={htmlfile:elm.html(),appointmentid:appointmentid};
		$.ajax({
			type: 'post',
			data:htmlfile,
			url: "/ayushman/cconsultation/htmlToPdf",
			datatype: 'html', 
			success: function (data) {
				
			},
			error: function (req, status, error) {
			}
		});
}




