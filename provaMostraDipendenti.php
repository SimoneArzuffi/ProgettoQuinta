<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="file_css/mostra.css">
    </head>

    <body>

        <form>
            <input type="button" id="button">
        </form>

        <div id="tabella">

        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function (event) {
            console.log("DOM fully loaded and parsed");

            // Aggiungi un listener al click del pulsante di ricerca
            var button = document.getElementById("button");
            button.addEventListener("click", sulClick);
        });

        // Funzione chiamata quando viene fatto clic sul pulsante di ricerca
        function sulClick(e) {
            // Impedisci il comportamento predefinito del form (evita il ricaricamento della pagina)
            e.preventDefault();

            // Ottieni il valore inserito dall'utente
            var contenuto = document.getElementById("valore").value;

            // Crea una richiesta XMLHttpRequest per inviare il valore al server
            let xhr = new XMLHttpRequest();
            xhr.open('POST', 'apiMostra.php');
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.send('k=' + contenuto);

            // Gestisci la risposta del server
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

            return false; // Evita ulteriori azioni di default del form
        }

        // Funzione chiamata quando viene fatto clic su un pulsante di eliminazione
        function onDeleteClick(e) {
            e.preventDefault();

            // Ottieni l'ID dell'utente associato al pulsante di eliminazione
            var userId = e.target.dataset.id;

            // Crea una richiesta XMLHttpRequest per inviare l'ID al server per l'eliminazione
            let deleteXhr = new XMLHttpRequest();
            deleteXhr.open('POST', 'delete.php');
            deleteXhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            deleteXhr.send('id=' + userId);

            // Gestisci la risposta del server
            deleteXhr.onload = function () {
                if (deleteXhr.status != 200) {
                    alert(`Error ${deleteXhr.status}: ${deleteXhr.statusText}`);
                } else {
                    // Rimuovi la divisione dell'utente dal DOM
                    e.target.parentNode.remove();
                }
            };
        }
        </script>
    </body>


</html>