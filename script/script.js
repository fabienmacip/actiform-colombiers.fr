window.addEventListener('load', function() {

  if (typeof $('#toaster-decouverte-form') != 'undefined' && $('#toaster-decouverte-form').is(":visible")) { 
    alert('Votre message a bien été envoyé. Nous vous recontactons dès que possible.');
  }

})

function closeContactFormToaster(){
  $('#toaster-decouverte-form').hide();
}

function checkContactFormField(field) {
    
  let error = false;
  
  if(field == 'fsm-tel') {

    const regexPhone = /^(0)[1-9](\d{2}){4}$/;
    error = (($('#fsm-tel').val().length > 0 && !regexPhone.test($('#fsm-tel').val())) || $('#fsm-tel').val().trim().length < 1);    

  } else {
      error = ($('#'+field).val().trim().length < 3);
  }
  
  if(error) {
    $('#error-'+field).show();
  } else {
    $('#error-'+field).hide();
  }
  
  validFormRdv();

}

function validFormRdv() {
  
  let formOK = true;
  const regexPhone = /^(0)[1-9](\d{2}){4}$/;

  if($('#fsm-prenom').val().length < 3){
    formOK = false;
  }

  if($('#fsm-tel').val().length > 0 && !regexPhone.test($('#fsm-tel').val())){
    formOK = false;
  }

  if(!($('#fsm-conditions').prop('checked'))){
    formOK = false;
  }

  if(formOK){
    $('#btn-envoyer-short-mail').addClass('btn-active');
    $('#btn-envoyer-short-mail').removeClass('btn-inactive');
    $('#btn-envoyer-short-mail').prop('disabled', false);
  } else {
    $('#btn-envoyer-short-mail').removeClass('btn-active');
    $('#btn-envoyer-short-mail').addClass('btn-inactive');
    $('#btn-envoyer-short-mail').prop('disabled', true);
  }
  
}