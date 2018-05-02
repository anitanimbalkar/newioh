var calculate_age = function(bdate){
		
		var dob = new Date(bdate);
		var today = new Date();
		var nowyear = today.getFullYear();
		var nowmonth = today.getMonth();
		var nowday = today.getDate();

		var birthyear = dob.getFullYear();
		var birthmonth = dob.getMonth();
		var birthday = dob.getDate();

		var age = nowyear - birthyear;
		var age_month = nowmonth - birthmonth;
		if(age_month < 0){
			age = age -1;
			age_month = 12 + age_month;
		}
		var age_day = nowday - birthday;
		
		years = age;
		months = age_month;
		
		if(years == 0 && months == 0){
			age = 'Age < 1 month';
		}else if(years >= 10){
			age = years + ' Yrs.';
		}else if(years == 0 && months < 12){
			age = months +" Months";
		}else{
			if(months == 0){
				age = years + ' Yrs. ';
			}else{
				age = years + ' Yrs. '+ months +" Months";
			}			
		}
		return age;
	}