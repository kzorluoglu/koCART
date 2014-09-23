$(document).ready(function () {

    var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
                $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-default');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for(var i=0; i<curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-primary').trigger('click');
	
 
	
	$('#billinganddelivery2').click(function() {
   $( "#cargo_first_name" ).val($( "#billing_first_name" ).val()); 
   $( "#cargo_email" ).val($( "#billing_email" ).val()); 
   $( "#cargo_telephone" ).val($( "#billing_telephone" ).val()); 
   $( "#cargo_address1" ).val($( "#billing_address1" ).val()); 
   $( "#cargo_address2" ).val($( "#billing_address2" ).val()); 
   $( "#cargo_city" ).val($( "#billing_city" ).val()); 
   $( "#cargo_postcode" ).val($( "#billing_postcode" ).val()); 
   $( "#cargo_country" ).val($( "#billing_country" ).val()); 
   $( "#cargo_region" ).val($( "#billing_region" ).val()); 
   
});	

					$('#payment').click(function() {
					  if ($(this).is(':checked')) {
						$("#payment_details").load('../payment/'+$(this).val());
					 
					  }
					});



});