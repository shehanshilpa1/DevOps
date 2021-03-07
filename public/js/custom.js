// Form Validation

FormValidationNS = {};

FormValidationNS.blockUI = function(block){
	if(typeof block === 'undefined') return;
	if(block == true){
		var $blockUI = $('<div></div>');
		$blockUI.attr('id', 'blockUI');
		//$blockUI.append('<div>Loading...<img src="http://www.socialups.com/static/images/fbinventory/ajax_loader.gif"></div>');
		$blockUI.append('<div>Please wait ...<img src="/images/ajax_loading.gif"></div>');
		$blockUI.css({
			position: 'fixed',
			top: '0',
			left: '0',
			width: '100%',
			height: '100%',
			//opacity: '0.5',
			//'background-color': '#000',
			background: 'rgba(0,0,0,0.5)',
			'z-index': '9999',
			overflow: 'auto'});
		$blockUI.find('div').css({
			position: 'absolute',
		    top: '50%',
		    left: '50%',
		    width: '10em',
		    height: '2em',
		    margin: '-1em 0 0 -2.5em',
		    color: '#fff',
		    'font-weight': 'bold'
		});
		$blockUI.find('img').css({
			position: 'relative',
			opacity: '0.8',
	        top: '-85px',
	        left: '5%'
		});
		$('body').append($blockUI);
	}
	else{
		$('body').find('#blockUI').remove();
	}
};

FormValidationNS.clearSearch = function(){
	$('input[type="text"]').attr('value', '');
	$('select option[selected="selected"]').attr('selected', false);
}

FormValidationNS.compareDates = function(firstDate, secondDate, op){
	var date1 = new Date(firstDate);
	var date2 = new Date(secondDate);

	if(date1 < date2){
		return true;
	}
	return false;
}

FormValidationNS.isNumeric = function(value){
	if(!isNaN(value)){
		return true;
	}
	return false;
};

FormValidationNS.scrollToError = function(){
	if($('.alert-danger').length > 0){
		$('body, html').animate({
			scrollTop: $('.alert-danger').offset().top -60
		}, 600);
	}
	else if($('.error').length > 0){
		$('body, html').animate({
			scrollTop: $('.error:first').offset().top -60
		}, 600);
	}
	
};