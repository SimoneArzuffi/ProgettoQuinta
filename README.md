# Employees Control
###### Web App per la gestione dei dipendenti di un'azienda

Questa Web App prevede la gestione per:

	- inserire/rimuovere nuovi dioendenti
 	- ingressi/uscite extraorinari di un dipendente
	- gestione malattie di un dipendente
 	- gestione ferie dipendente

di seguito è elencato il mockup

#### login pagine

![login](https://github.com/SimoneArzuffi/ProgettoQuinta/assets/101709449/89e08d86-a920-40fa-a0e8-a94179e97a22)

#### home page
![home page](https://github.com/SimoneArzuffi/ProgettoQuinta/assets/101709449/10410117-75c9-4cf4-bb16-4b1dc568c2af)

#### tabella ferie
![tabella ferie](https://github.com/SimoneArzuffi/ProgettoQuinta/assets/101709449/dd387fd1-47df-4b16-bbcb-4b2fd186431c)

#### tabella malattie
![tabella malattie](https://github.com/SimoneArzuffi/ProgettoQuinta/assets/101709449/f6e851d6-930c-429a-a22f-2c61f31485f3)

#### tabella dipendenti
![tabella dipendenti](https://github.com/SimoneArzuffi/ProgettoQuinta/assets/101709449/b6b9b8b6-6fd9-4c71-a9b4-4ee0e130b8e2)

#### tabella permessi
![tabella permessi](https://github.com/SimoneArzuffi/ProgettoQuinta/assets/101709449/05f793f0-3e8c-4c05-ab07-d1d26656ae9b)

#### aggiungi dipendente
![aggiungi dipendente](https://github.com/SimoneArzuffi/ProgettoQuinta/assets/101709449/51cb4846-ab53-40b1-a1e2-54bdc1afd4a9)

#### rimuovi dipendente
![rimuovi dipendente](https://github.com/SimoneArzuffi/ProgettoQuinta/assets/101709449/2fe85cbd-2490-4df7-8cd4-ebad83e3a460)

#### inserisci malattia
![inserisci malattia](https://github.com/SimoneArzuffi/ProgettoQuinta/assets/101709449/f76b397c-de24-4ee6-b792-6fffb12295b9)

#### inserisci ferie
![inserisci ferie](https://github.com/SimoneArzuffi/ProgettoQuinta/assets/101709449/3504aaeb-fecd-4b23-aee7-2edfae1c4d63)

#### inserisci permesso
![inserisci permesso](https://github.com/SimoneArzuffi/ProgettoQuinta/assets/101709449/1158f63e-802c-48ad-ad94-94811b8e4e40)


###### E/R
<img width="2784" alt="E/R" src="https://github.com/SimoneArzuffi/ProgettoQuinta/assets/101709449/a16b0c1a-82d4-4f9b-a124-5d921700c208">


###### schema relazionale

DIPENDENTE(_ID_, CF, NOME, COGNOME, DATADINASCITA, RETRIBUZIONEORARIA, OREDIPERMESSO, GIORNIDIMALATTIA, GIORNIDIFERIE)

FERIE(_ID_, DATAINIZIO, GIORNI, DIPENDENTE_ID)

PERMESSI(_ID_, ORAINIZIO, ORAFINE, GIORNO, DIPENDENTE_ID)

MALATTIA(_ID_, NUMEROMALATTIA, DATAINIZIO, NUMEROGIORNI, DIPENDENTE_ID)