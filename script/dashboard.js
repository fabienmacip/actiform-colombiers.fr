let dashboardTabPrograms = $("#dashboard-tab-programs");
let dashboardTabClients = $("#dashboard-tab-clients");
let dashboardTabPassword = $("#dashboard-tab-password");

function displayPrograms() {
  $("#dashboard-tab-programs").show();
  $("#dashboard-link-programs").addClass("dashboard-tab-title-active");
  $("#dashboard-tab-clients").hide();
  $("#dashboard-link-clients").removeClass("dashboard-tab-title-active");
  $("#dashboard-tab-password").hide();
  $("#dashboard-link-password").removeClass("dashboard-tab-title-active");
}

function displayClients() {
  $("#dashboard-tab-programs").hide();
  $("#dashboard-link-programs").removeClass("dashboard-tab-title-active");
  $("#dashboard-tab-clients").show();
  $("#dashboard-link-clients").addClass("dashboard-tab-title-active");
  $("#dashboard-tab-password").hide();
  $("#dashboard-link-password").removeClass("dashboard-tab-title-active");
  $("#clientid").val(null);
}

function displayPasswordUpdate() {
  $("#dashboard-tab-programs").hide();
  $("#dashboard-link-programs").removeClass("dashboard-tab-title-active");
  $("#dashboard-tab-clients").hide();
  $("#dashboard-link-clients").removeClass("dashboard-tab-title-active");
  $("#dashboard-tab-password").show();
  $("#dashboard-link-password").addClass("dashboard-tab-title-active");
}

/* - - - - P R O G R A M S - t a b - - - - */
let menuContainer;

window.addEventListener("click", () => {
  menuContainer.innerHTML = "";
});

window.addEventListener("DOMContentLoaded", () => {
  menuContainer = document.querySelector("#search-menu-container");
  menuContainer.addEventListener("click", (e) => {
    e.stopPropagation();
  });

  let searchInput = document.querySelector("#client-search");
  let ref;
  searchInput.addEventListener("input", (e) => {
    const value = e.target.value;
    if (ref) {
      clearTimeout(ref);
    }

    ref = setTimeout(() => {
      axios
        .get("controleurs/ajax.php?table=client&search=" + value)
        .then((response) => {
          menuContainer.innerHTML = response.data["result"];
        })
        .catch((err) => {
          console.log(err);
        });
    }, 1000);
  });
});

function ajaxClientProgram(clientId) {
  axios
    .get("controleurs/ajax.php?table=program-client&clientid=" + clientId)
    .then((res) => {
      $("#div-program-cardio").html(res.data.result);
      $("#div-program-musculation").html(res.data.resultMuscu);
    })
    .catch((err) => {
      console.log(err);
    });
}

function clientChosenForProgram(id, prenom, nom, mail) {
  $("#search-menu").remove();

  const divInfosClient = `<div id="infos-client">
                          <input type="hidden" id="id-client" name="id-client" value="${id}">
                            ${prenom} ${nom} - ${mail}
                          </div>`;

  if ($("#infos-client").length) {
    $("#infos-client").replaceWith(divInfosClient);
  } else {
    $("#div-choose-clients").after(divInfosClient);
  }

  ajaxClientProgram(id);
}

/* - - - - SOUMISSION Formulaire CARDIO - - - - */
// The jQuery function for converting the form input values into a json object.
$.fn.serializeObject = function () {
  var o = {};
  var a = this.serializeArray();
  $.each(a, function () {
    if (o[this.name] !== undefined) {
      if (!o[this.name].push) {
        o[this.name] = [o[this.name]];
      }
      o[this.name].push(this.value || "");
    } else {
      o[this.name] = this.value || "";
    }
  });
  return o;
};

function updateCardioCells(id) {
  const id1 = parseInt(id);
  const id2 = id1 + 1;
  const id3 = id2 + 1;
  const id4 = id3 + 1;

  const form = $("#form-cardio-" + id);

  const action = "updateClientCardio";

  const objToSend = JSON.stringify(form.serializeObject());
  console.log(objToSend);

  axios
    .post("controleurs/ajax.php", {
      req: action,
      table: "client-cardio",
      datas: objToSend,
    })
    .then(function (res) {
      if (res.data.success) {
        alert("CARDIO - Données modifiées avec SUCCES");
      } else {
        alert("CARDIO - ERREUR lors de la modificaiton des données");
      }
    })
    .catch(function (err) {
      console.log(err);
    });
}

/* - - - - C L I E N T S - t a b - - - - */

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
    if ($("#clientid").val().length > 0 && parseInt($("#clientid").val()) > 0) {
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

/* - - - - P A S S W O R D - t a b - - - - */
function closeDashboardMessage() {}
