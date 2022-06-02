$(document).ready(function(){
	$("#RepeatKey").keyup(function(){
		if($("#Key").val() == $("#RepeatKey").val() ){
			$("#Registry").css({
				'cursor': 'pointer',
				'opacity': '1',
				'color': 'white',
				'box-shadow': '0px 0px 10px 2px rgba(0, 197, 171,.7)',
				'background': 'rgb(0, 197, 171)',
				'disabled': 'false'
				
			});
			$( "#Registry" ).prop( "disabled", false );
		}
		else{
			$("#Registry").css({
				'color': 'white',
				'box-shadow': '0px 0px 10px 2px rgba(228,17,49,.7)',
				'background': 'rgb(228,17,49)'
			});
		}

	})
})

