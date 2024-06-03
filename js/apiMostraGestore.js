document.addEventListener("DOMContentLoaded", function (event) {
    console.log("DOM fully loaded and parsed");

    // Aggiungi un listener al click del pulsante di ricerca
    var button = document.getElementById("button");
    button.addEventListener("click", sulClick);
    button.click();
});

function sulClick(e) {
    e.preventDefault(); // Impedisci il comportamento predefinito del form (evita il ricaricamento della pagina)

    // Crea una richiesta XMLHttpRequest per inviare i valori al server
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'api/apiMostraGestore.php', true); // Assicurati che l'URL sia corretto
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send();

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

            // Aggiungiamo ora i listener per i pulsanti di modifica che saranno inclusi nella risposta del server
            container.querySelectorAll('.edit-btn').forEach(function(button) {
                button.addEventListener('click', onEditClick);
            });
        }
    };

    return false; // Evita ulteriori azioni di default del form
}

function onDeleteClick(e) {
    e.preventDefault();
    var id = e.target.dataset.id;

    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'api/apiEliminaGestore.php'); // Cambia con il tuo URL effettivo per l'eliminazione
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