$(document).ready(function () {
	$("#jSi").click(function() {
		$("#jisOpcion").css('visibility', 'visible');
		$("#jisOpcion").css('height', '130px');  
	});
	$("#jNo").click(function() {  
		$("#jisOpcion").css('visibility', 'hidden'); 
		$("#jisOpcion").css('height', '0px');  
	});
});