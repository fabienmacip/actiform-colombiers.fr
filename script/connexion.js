window.addEventListener("load", function () {
  /*   if (typeof $('#toaster-decouverte-form') != 'undefined' && $('#toaster-decouverte-form').is(":visible")) { 
    alert('Votre message a bien été envoyé. Nous vous recontactons dès que possible.');
  }
 */
  /*   if($('#message-absence-flag') && $('#message-absence-flag').val() === 'yes') {
    const messageAbsence = $('#message-absence').text().trim();
    this.alert(messageAbsence);
  }
 */
  /*   if($('#msgabsAdded') && $('#msgabsAdded').text() !== '') {
    let msgabsConfirm = $('#msgabsAdded').html().replace("<br>","\n");
    msgabsConfirm = msgabsConfirm.replace("<pre>","\n");
    msgabsConfirm = msgabsConfirm.replace("</pre>","\n\n");
    msgabsConfirm = msgabsConfirm.replace(/(<([^>]+)>)/gi, "");
    alert(msgabsConfirm);
  }
 */
  /*   if($('#admin-greeting') && ('#admin-greeting').text() !== '') {
    localStorage.setItem('admin-greeting',$('#admin-greeting').html());
  }
   */
});

function checkConnexionFormField(field) {
  let error = false;

  if (field == "connect-email") {
    const regexEmail = /^([0-9a-zA-Z].*?@([0-9a-zA-Z].*\.\w{2,4}))$/;
    error =
      ($("#connect-email").val().length > 0 &&
        !regexEmail.test($("#connect-email").val())) ||
      $("#connect-email").val().trim().length < 1;
  } else {
    error =
      $("#" + field)
        .val()
        .trim().length < 8;
  }

  if (error) {
    $("#error-" + field).show();
  } else {
    $("#error-" + field).hide();
  }

  validFormConnexion();
}

function validFormConnexion() {
  let formOK = true;
  const regexEmail = /^([0-9a-zA-Z].*?@([0-9a-zA-Z].*\.\w{2,4}))$/;

  if (
    $("#connect-email").val().length > 0 &&
    !regexEmail.test($("#connect-email").val())
  ) {
    formOK = false;
  }

  if ($("#connect-passw").val().length < 8) {
    formOK = false;
  }

  if (formOK) {
    $("#btn-connexion").addClass("btn-active");
    $("#btn-connexion").removeClass("btn-inactive");
    $("#btn-connexion").prop("disabled", false);
  } else {
    $("#btn-connexion").removeClass("btn-active");
    $("#btn-connexion").addClass("btn-inactive");
    $("#btn-connexion").prop("disabled", true);
  }
}

function checkPasswordFormField(field) {
  let error = false;
  let error2 = false;

  if (field == "password-passw") {
    error =
      $("#password-passw").val().length > 0 &&
      $("#password-passw").val().trim().length < 8;
  }

  if (field == "password-passw2") {
    error =
      $("#password-passw2").val().length > 0 &&
      $("#password-passw2").val().trim().length < 8;
  }

  if (
    $("#password-passw").val().length >= 8 &&
    $("#password-passw2").val().length >= 8
  ) {
    error2 = $("#password-passw").val() !== $("#password-passw2").val();
  }

  if (error) {
    $("#error-" + field).show();
  } else {
    $("#error-" + field).hide();
  }

  if (error2) {
    $("#error2-" + field).show();
  } else {
    $("#error2-" + field).hide();
  }

  validFormPassword();
}

function validFormPassword() {
  let formOK = true;

  if (
    ($("#password-passw").val().length > 0 &&
      $("#password-passw").val().trim().length < 8) ||
    ($("#password-passw2").val().length > 0 &&
      $("#password-passw2").val().trim().length < 8) ||
    $("#password-passw").val() !== $("#password-passw2").val()
  ) {
    formOK = false;
  }

  if (formOK) {
    $("#btn-password-update").addClass("btn-active");
    $("#btn-password-update").removeClass("btn-inactive");
    $("#btn-password-update").prop("disabled", false);
  } else {
    $("#btn-password-update").removeClass("btn-active");
    $("#btn-password-update").addClass("btn-inactive");
    $("#btn-password-update").prop("disabled", true);
  }
}

function confirmPasswordUpdate() {
  if (!confirm("Valider la modification de votre mot de passe ?")) {
    return;
  } else {
    $("#form-password").submit();
  }
}
