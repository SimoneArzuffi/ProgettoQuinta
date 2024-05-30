/*document.addEventListener("DOMContentLoaded", function (event) {
    console.log("DOM fully loaded and parsed");

    // Aggiungi un listener al click del pulsante di ricerca
    var button = document.getElementById("button");
    button.addEventListener("click", eseguiRichiesta);
});

$(document).ready(function(){
    eseguiRichiesta();
});*/

function eseguiRichiesta() {
    // Ottieni il valore inserito dall'utente
    var nome = document.getElementById("nome").value;
    var cognome = document.getElementById("cognome").value;

    console.log("Nome:", nome);
    console.log("Cognome:", cognome);

    // Crea una richiesta XMLHttpRequest per inviare i valori al server
    let xhr = new XMLHttpRequest();
    xhr.open('POST', '../api/apiMostra.php', true); // Assicurati che l'URL sia corretto
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send('nome=' + encodeURIComponent(nome) + '&cognome=' + encodeURIComponent(cognome));

    // Gestisci la risposta del server
    xhr.onload = function () {
        if (xhr.status != 200) {
            alert(`Error ${xhr.status}: ${xhr.statusText}`);
        } else {
            var container = document.getElementById("tabella");
            container.innerHTML = xhr.response;

            // Aggiungi listener di click ai pulsanti di eliminazione e modifica
            container.querySelectorAll('.delete-btn').forEach(function (button) {
                button.addEventListener('click', onDeleteClick);
            });

            // Aggiungi listener di click ai pulsanti di modifica
            container.querySelectorAll('.edit-btn').forEach(function(button) {
                button.addEventListener('click', onEditClick);
            });
        }
    };
}


function onDeleteClick(e) {
    e.preventDefault();
    var id = e.target.dataset.id;

    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'api/apiElimina.php'); // Cambia con il tuo URL effettivo per l'eliminazione
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send('id=' + id);

    xhr.onload = function () {
        if (xhr.status != 200) {
            alert(`Error ${xhr.status}: ${xhr.statusText}`);
        } else {
            e.target.parentNode.remove();
        }
    };
}

function onEditClick(e) {
    e.preventDefault();
    var userDiv = e.target.parentNode;
    var id = e.target.dataset.id;
    var userInfo = userDiv.textContent.replace('Delete', '').trim(); // Prendiamo i dati esistenti e rimuoviamo la parte "Delete"

    // Supponiamo che il formato sia "Nome Cognome" - adattalo secondo le tue necessità
    var parts = userInfo.split(" ");
    var nome = parts[0];
    var cognome = parts.slice(1).join(" "); // In caso ci siano più cognomi

    // Converti il div in una forma modificabile
    userDiv.innerHTML = `<input type="text" id="editNome-${id}" value="${nome}"/><input type="text" id="editCognome-${id}" value="${cognome}"/><button class="save-btn" data-id="${id}">Salva</button>`;

    // Aggiungi un listener al pulsante di salvataggio
    userDiv.querySelector('.save-btn').addEventListener('click', function(e) {
        onSaveClick(e, id);
    });
}

function onSaveClick(e, id) {
    e.preventDefault();
    var nome = document.getElementById(`editNome-${id}`).value;
    var cognome = document.getElementById(`editCognome-${id}`).value;

    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'api/apiAggiorna.php'); // Cambia con il tuo URL effettivo per l'aggiornamento
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send('id=' + id + '&nome=' + encodeURIComponent(nome) + '&cognome=' + encodeURIComponent(cognome));

    xhr.onload = function () {
        if (xhr.status != 200) {
            alert(`Error ${xhr.status}: ${xhr.statusText}`);
        } else {
            // Aggiorna il div con le nuove informazioni
            var userDiv = e.target.parentNode;
            userDiv.innerHTML = `${nome} ${cognome} <button class="delete-btn" data-id="${id}">Delete</button> <button class="edit-btn" data-id="${id}">Modifica</button>`;

                // Reimposta gli event listener sui nuovi pulsanti
                userDiv.querySelector('.delete-btn').addEventListener('click', onDeleteClick);
                userDiv.querySelector('.edit-btn').addEventListener('click', onEditClick);
            }
        };
            
    // Gestisci eventuali errori di rete o codici di stato HTTP diversi da 200
    xhr.onerror = function() {
        alert('Si è verificato un errore nella richiesta di aggiornamento.');
    };
}