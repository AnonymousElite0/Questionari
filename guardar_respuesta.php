<?php
// obtieni i dati del modulo
$domanda1Risposta = $_POST['domanda1_risposta_hidden'];
$domanda2Risposta = $_POST['domanda2_risposta_hidden'];
$domanda3Risposta = $_POST['domanda3_risposta_hidden'];
$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$azienda = $_POST['azienda'];
$citta = $_POST['citta'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];

// connessione al database
$servername = "localhost"; s
$username = "root"; 
$password = "Root1911!"; 
$dbname = "Questionari"; 

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connessione al database non riuscita: " . $conn->connect_error);
}

// risultati nella tabella delle risposte
$sql = "INSERT INTO respuestas (domanda1, domanda2, domanda3, nome, cognome, azienda, citta, email, telefono) VALUES ('$domanda1Risposta', '$domanda2Risposta', '$domanda3Risposta', '$nome', '$cognome', '$azienda', '$citta', '$email', '$telefono')";

if ($conn->query($sql) === true) {
    echo "I dati sono stati salvati correttamente nel database.";
} else {
    echo "Errore durante il salvataggio dei dati nel database: " . $conn->error;
}

//chiudere la connessione
$conn->close();
?>
