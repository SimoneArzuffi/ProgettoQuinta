# Employees Control
###### Web App per la gestione dei dipendenti di un'azienda

Questa Web App prevede le seguenti funzionalità:

	- da la possibilità di inserire e rimuovere i propri dipendenti (done)
 	- da la possibilità di inserire i gestori dei dipendenti, che possono inserire nuovi dipendenti, inserire le ferie, le 		 
	  malattie e i permessi dei vari dipendenti. (done)
	- garantisce la possibilià di inserire le malattie di un dipendente (done) e di visualizzare le malattie dei dipendenti in una tabella (to do solo parte di visualizzazione)
 	- garantisce la possibilità di inserire le ferie dei dipendenti (done) e di visualizzarle in una tabella (to do solo parte di visualizzazione)
	- garantisce la possibilità di inserie i permessi dei dipendenti (done) e di visualizzarli in una tabella (to do solo parte di visualizzazione)

di seguito è elencato il mockup

#### login pagine

![login](immagini/image-1.png)

#### home page
![home page](immagini/image-4.png)

#### tabella ferie
![tabella ferie](immagini/image-5.png)

#### tabella malattie
!![tabella malattie](immagini/image-6.png)

#### tabella dipendenti
![tabella dipendenti](immagini/image-7.png)

#### tabella permessi
![tabella permessi](immagini/image-8.png)

#### aggiungi dipendente
![inserisci dipendente](immagini/image-16.png)

#### rimuovi dipendente
![rimuovi dipendente](immagini/image-10.png)

#### inserisci malattia
![inserisci malattia](immagini/image-12.png)

#### inserisci ferie
![inserisci ferie](immagini/image-13.png)

#### inserisci permesso
![inserisci permesso](immagini/image-15.png)


###### E/R
![E/R](https://github.com/SimoneArzuffi/ProgettoQuinta/assets/101709449/d7c0cd34-e8af-48a0-8d5d-24a0ceb0c76e)

###### schema relazionale

DIPENDENTE(_ID_, CF, NOME, COGNOME, DATADINASCITA, RETRIBUZIONEORARIA, OREDIPERMESSO, GIORNIDIMALATTIA, GIORNIDIFERIE)

FERIE(_ID_, DATAINIZIO, DATAFINE,NOME, COGNOME ,GIORNI, DIPENDENTE_ID)

PERMESSI(_ID_, NOME, COGNOME, ORAINIZIO, ORAFINE, GIORNO, DIPENDENTE_ID)

MALATTIA(_ID_, NOME, COGNOME, NUMEROMALATTIA, DATAINIZIO, DATAFINE,NUMEROGIORNI, DIPENDENTE_ID)

GESTORE(_ID_, NOME, COGNOME, EMAIL, PASSWORD)

AZIENDA(_ID_, NOME)

###### istruzioni per l'uso

per utilizzare questa Web app si può ricorrere all'uso di XAMPP online.
nel codespace già creato il docker è già stato creato e configurato, qualora non fosse disponibile il codespace, se ne può creare un'altro e creare un nuovo XAMPP online attraverso la riga di comando qua sotto scritta:

docker run --name myXampp -p 41061:22 -p 41062:80 -d -v /workspaces/ProgettoQuinta:/www tomsik68/xampp:8

si consiglia l'utilizzo dell'estensione docker, quella ufficiale microsoft per facilitare lo start e lo stop di XAMPP.
nel file query.sql sono presenti tutte le query per la creazione delle varie tabelle, il database andrà necessariamente chiamamto progetto_quinta.
nella pagina di login non vi è la possibilità di registrarsi in quanto non necessario essendo un gestionale per le aziende e non ad uso del pubblico, per registrare nuovi utenti bisogna necessariamente effettuare il login.

credenziali per il login:
- email: admin.progettoquinta@progettoquinta.com
- password: admin

se si dovesse creare un nuovo codespace, di conseguenza si dovranno ricreare tutte le tabelle nel nuovo databese, quando si aprirà per la prima volta la pagina login.php creerà in automatico le credenziali dell'utente sopra indicato.
