CREATE TABLE gestore(
    id INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    cognome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS dipendente (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    cognome VARCHAR(255) NOT NULL,
    cf VARCHAR(16) UNIQUE NOT NULL,
    data_di_nascita DATE NOT NULL,
    ore_di_permesso INT UNSIGNED NOT NULL,
    giorni_di_ferie INT UNSIGNED NOT NULL,
    giorni_di_malatia INT UNSIGNED NOT NULL
);

CREATE TABLE IF NOT EXISTS ferie(
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_dipendente INT UNSIGNED NOT NULL,
    data_inizio DATE NOT NULL,
    data_fine DATE NOT NULL,
    giorni INT UNSIGNED NOT NULL,
    FOREIGN KEY(id_dipendente) REFERENCES dipendente(id)
);

CREATE TABLE IF NOT EXISTS malattia(
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_dipendente INT UNSIGNED NOT NULL,
    numero_malattia VARCHAR(9) NOT NULL,
    data_inizio DATE NOT NULL,
    data_fine DATE NOT NULL,
    giorni INT UNSIGNED NOT NULL,
    FOREIGN KEY(id_dipendente) REFERENCES dipendente(id)
);