function validation(element, validation)
{
	switch(validation){
		case 'numeric':
			var element = new LiveValidation($(element).attr('id'),{validMessage:' ',onInvalid:function(){this.insertMessage( this.createMessageSpan() ); this.addFieldClass(); var val = $(this.element).val(); $(this.element).val(val.replace(/[^0-9\s]+/g, ''));$(this.element).val($(this.element).val().substr(0, 3));}});
			element.add( Validate.Numericality,{ minimum: 0, maximum: 999 }, {onlyInteger: true,notANumberMessage:'Enter Numbers only'});
			break;
		case 'bp':
			$(element).blur(function() {
				var userinput = $(this).val();
				var pattern = /^\d{1,3}\/\d{1,3}$/;

				if(!pattern.test($(this).val()))
				{
					$(this).val('');
					$(this).trigger('change');
				}
			});
			var element = new LiveValidation($(element).attr('id'),{validMessage:' ',onInvalid:function(){this.insertMessage( this.createMessageSpan() ); this.addFieldClass();}});
			element.add( Validate.Format, { pattern:  /^\d{1,3}\/\d{1,3}$/, failureMessage: "Systolic/diastolic" }); 
			break;
	}
}
