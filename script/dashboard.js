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

function addLineInClientsTable(id, prenom, nom, mail) {
  const newLine = `<tr id="cli-${id}">
                    <td>
                      ${id}
                    </td>
                    <td>
                      ${prenom}
                    </td>
                    <td>
                      ${nom}
                    </td>
                    <td>
                      ${mail}
                    </td>
                    <td>
                      <button onclick="preFillClientForm('${id}', '${prenom}', '${nom}', '${mail}')">Mod.</button>
                    </td>
                    <td>
                      <button onclick="askConfirmDeleteClient('${id}', '${prenom}', '${nom}')">Sup.</button>
                    </td>
                  </tr>`;

  //$("#clients-list-table").prepend(newLine);
  $("#clients-list-table-first-row").after(newLine);
}

function updateLineInClientsTable(id, prenom, nom, mail) {
  const updatedLine = `<tr id="cli-${id}">
                    <td>
                      ${id}
                    </td>
                    <td>
                      ${prenom}
                    </td>
                    <td>
                      ${nom}
                    </td>
                    <td>
                      ${mail}
                    </td>
                    <td>
                      <button onclick="preFillClientForm('${id}', '${prenom}', '${nom}', '${mail}')">Mod.</button>
                    </td>
                    <td>
                      <button onclick="askConfirmDeleteClient('${id}', '${prenom}', '${nom}')">Sup.</button>
                    </td>
                  </tr>`;

  $("#cli-" + id).replaceWith(updatedLine);
}

// AJAX CLIENT Add or Update
function confirmClientUpdate() {
  let reqType = "";

  if (confirm("Enregistrer ?")) {
    if ($("#clientid").val().length > 0) {
      reqType = "update";
    } else {
      reqType = "add";
    }

    const id = $("#clientid").val();
    const prenom = $("#prenom").val();
    const nom = $("#nom").val();
    const mail = $("#mail").val();

    axios
      .post("controleurs/ajax.php", {
        id: id,
        prenom: prenom,
        nom: nom,
        mail: mail,
        req: reqType,
        table: "client",
      })
      .then(function (res) {
        if (res.data.success) {
          $("#btn-client-reset").trigger("click");

          if (reqType === "add") {
            addLineInClientsTable(res.data.success, prenom, nom, mail);

            alert(
              "Le client " +
                prenom +
                " " +
                nom +
                " a été ajouté.\nID: " +
                res.data.success
            );
          } else if (reqType === "update") {
            updateLineInClientsTable(id, prenom, nom, mail);
            alert("Le client " + prenom + " " + nom + " a été modifié.");
          }
        } else {
          alert(
            "Erreur lors de la création du client : " + prenom + " " + nom + "."
          );
        }
      })
      .catch(function (err) {
        console.log(err);
      });
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
