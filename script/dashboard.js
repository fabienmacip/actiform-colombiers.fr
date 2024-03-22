let dashboardTabPrograms = $("#dashboard-tab-programs");
let dashboardTabClients = $("#dashboard-tab-clients");
let dashboardTabPassword = $("#dashboard-tab-password");

function displayPrograms() {
  $("#dashboard-tab-programs").show();
  $("#dashboard-tab-clients").hide();
  $("#dashboard-tab-password").hide();
}

function displayClients() {
  $("#dashboard-tab-programs").hide();
  $("#dashboard-tab-clients").show();
  $("#dashboard-tab-password").hide();
}

function displayPasswordUpdate() {
  $("#dashboard-tab-programs").hide();
  $("#dashboard-tab-clients").hide();
  $("#dashboard-tab-password").show();
}

function closeDashboardMessage() {}

function preFillClientForm(id, prenom, nom, mail) {
  console.log(id + " " + prenom + " " + nom + " " + mail);

  $("#form-add-client-subtitle").text("MODIFIER CLIENT");
  $("#form-add-client").addClass("form-add-client-update");
  $("#form-add-client").removeClass("form-add-client-new");

  $("#clientid").val(id);
  $("#prenom").val(prenom);
  $("#nom").val(nom);
  $("#mail").val(mail);

  checkClientFormFields();
  checkClientFormFields();
  checkClientFormFields();
}

function emptyClientId() {
  $("#form-add-client-subtitle").text("NOUVEAU CLIENT");
  $("#form-add-client").removeClass("form-add-client-update");
  $("#form-add-client").addClass("form-add-client-new");
  $("#clientid").val(null);
}

function askConfirmDeleteClient(id, prenom, nom) {
  if (confirm("Supprimer le client " + prenom + " " + nom + " ?\n" + id)) {
    axios
      .post("controleurs/ajax.php", {
        id: id,
        req: "delete",
        table: "client",
      })
      .then(function (res) {
        if (res.data.success) {
          $("#cli-" + res.data.id).remove();
          alert("Le client " + prenom + " " + nom + " a été supprimé.");
        } else {
          alert(
            "Erreur lors de la suppresion du client : " +
              prenom +
              " " +
              nom +
              "."
          );
        }
      })
      .catch(function (err) {
        console.log(err);
      });
  }
}
function confirmClientUpdate() {
  if (confirm("Enregistrer ?")) {
    console.log("record-it");
  } else {
    console.log("cancelled");
  }
}

function checkClientFormFields() {
  const regexEmail = /^([0-9a-zA-Z].*?@([0-9a-zA-Z].*\.\w{2,4}))$/;

  let checkMail = false;
  checkMail = $("#mail").val().length > 4 && regexEmail.test($("#mail").val());

  // DISPLAY Error Messages
  if ($("#prenom").val().length < 2) {
    $("#prenom-error-message").show();
  } else {
    $("#prenom-error-message").hide();
  }

  if ($("#nom").val().length < 2) {
    $("#nom-error-message").show();
  } else {
    $("#nom-error-message").hide();
  }

  if (!checkMail) {
    $("#mail-error-message").show();
  } else {
    $("#mail-error-message").hide();
  }

  // DISABLED - UNDISABLED Submit Button
  if (
    $("#nom").val().length > 1 &&
    $("#prenom").val().length > 1 &&
    checkMail
  ) {
    $("#btn-client-update").prop("disabled", false);
    $("#btn-client-update").removeClass("btn-inactive");
  } else {
    $("#btn-client-update").prop("disabled", true);
    $("#btn-client-update").addClass("btn-inactive");
  }
}
