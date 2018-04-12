
//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".next1").click(function(){
	
	current_fs = $(this).parent();
	next_fs = $(this).parent().next();

	var $jenisInput = document.getElementById('selectInput').value;
		document.getElementById('label-input-1').classList.add('hidden');
		document.getElementById('input-manual').classList.add('hidden');
		document.getElementById('label-input-2').classList.add('hidden');
		document.getElementById('input-multiple').classList.add('hidden');
		document.getElementById('button-template').classList.add('hidden');
	if($jenisInput.trim() === 'manual') {
		document.getElementById('label-input-1').classList.remove('hidden');
		document.getElementById('input-manual').classList.remove('hidden');
	} else {
		document.getElementById('label-input-2').classList.remove('hidden');
		document.getElementById('input-multiple').classList.remove('hidden');
		document.getElementById('button-template').classList.remove('hidden');
	}
	var isValid = true;
	$("input[required='true']").each(function(idx) {
            if($(this).val().trim() === "") {
                isValid = false;
                alert("Please fill all the field");
            }
            
    });

    if($("#text-input-start").val() > $("#text-input-finish").val()) {
    	console.log('asdasd');
    	alert("End date must be greater than start date");
    	isValid = false;
    }

	if(isValid) {
		$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
	
	//show the next fieldset
	next_fs.show(); 
	//hide the current fieldset with style
	current_fs.hide();
	}
	
	
});

$(".input_file").click(function(){
	
	current_fs = $(this).parent();

	
		$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
	
	//show the next fieldset
	document.getElementById('step-2').classList.remove('step_2');
	current_fs.hide();
	
	
	
});




$(".previous").click(function(){
	
	current_fs = $(this).parent();
	previous_fs = $(this).parent().prev();
	
	
	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
	
	
	previous_fs.show(); 
	
	current_fs.hide();
});

