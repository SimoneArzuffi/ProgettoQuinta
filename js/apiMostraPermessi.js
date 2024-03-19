document.addEventListener("DOMContentLoaded", function (event) {
    console.log("DOM fully loaded and parsed");

    // Aggiungi un listener al click del pulsante di ricerca
    var button = document.getElementById("mostra");
    button.addEventListener("click", sulClick);
});

function sulClick(e) {
    // Impedisci il comportamento predefinito del form (evita il ricaricamento della pagina)
    e.preventDefault();

    // Ottieni il valore inserito dall'utente
    var contenuto = document.getElementById("mostra").value;
    //ottieni nome e cognome
    var nome = document.getElementById("nome").value;
    var cognome = document.getElementById("cognome").value;

    // Crea una richiesta XMLHttpRequest per inviare il valore al server
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'api/apiMostraPermessi.php');
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send('nome=' + nome + '&cognome=' + cognome);

    //gestisci la risposta del server
    xhr.onload = function () {
        if (xhr.status != 200) {
            alert(`Error ${xhr.status}: ${xhr.statusText}`);
        } else {
            // Aggiorna il contenuto della tabella con la risposta del server
            var k = document.getElementById("tabella");
            k.innerHTML = xhr.response;

            // Aggiungi listener di click ai pulsanti di eliminazione
            var deleteButtons = document.querySelectorAll('.delete-btn');
            deleteButtons.forEach(function (button) {
                button.addEventListener('click', onDeleteClick);
            });
        }
    };
}

function onDeleteClick(e) {
    // Ottieni l'id del record da eliminare
    e.preventDefault();

    var id = e.target.dataset.id;

    // Crea una richiesta XMLHttpRequest per inviare l'id al server
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'api/apiEliminaPermessi.php');
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send('id=' + id);

    //gestisci la risposta del server
    xhr.onload = function () {
        if (xhr.status != 200) {
            alert(`Error ${xhr.status}: ${xhr.statusText}`);
        } else {
            // Rimuovi la divisione dell'utente dal DOM
            e.target.parentNode.remove();
        }
    };
}