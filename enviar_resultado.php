<?php
//dati del modulo
$domanda1Risposta = $_POST['domanda1_risposta_hidden'];
$domanda2Risposta = $_POST['domanda2_risposta_hidden'];
$domanda3Risposta = $_POST['domanda3_risposta_hidden'];
$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$azienda = $_POST['azienda'];
$citta = $_POST['citta'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];

// Connessione alla base di dati
$servername = "Questionari"; 
$utente = "WEB11\jusseppe";
$password = "Tecno2023!"; 
$dbname = "Encuesta"; 

$conn = new mysqli($servername, $utente, $password, $dbname);

// Controlla la connessione
if ($conn->connect_error) {
    die("Connessione al database non riuscita: " . $conn->connect_error);
}

//dati nella tabella delle risposte
$sql = "INSERT INTO risposti (domanda1, domanda2, domanda3, nome, cognome, azienda, citta, email, telefono) VALUES ('$domanda1Risposta', '$domanda2Risposta', '$domanda3Risposta', '$nome', '$cognome', '$azienda', '$citta', '$email', '$telefono')";

if ($conn->query($sql) === true) {
    $punteggio = $domanda1Risposta + $domanda2Risposta + $domanda3Risposta;

    $messaggio = "";
    if ($punteggio >= 0 && $punteggio <= 10) {
        $messaggio = "No sei digital";
    } elseif ($punteggio >= 11 && $punteggio <= 20) {
        $messaggio = "Stai diventando digital ma puoi fare di più";
    } elseif ($punteggio >= 21 && $punteggio <= 30) {
        $mesaggio = "Sei digital";
    }


    // Invia un'email con il punteggio
    $asunto = "punteggio del sondaggio";
    $messaggioEmail = "¡Grazie per aver completato il sondaggio! Il tuo punteggio è: " . $puntaje . "\n";
    $messaggioEmail .= "Messaggio: " . $messaggio;

    // Asegúrate de tener una configuración adecuada para el envío de correos desde tu servidor
    // Configura los detalles del remitente, servidor SMTP y otros parámetros según tu entorno

    //configuración para gmail
    $impostazione = array(
        'protocolo' => 'smtp',
        'smtp_host' => 'ssl://smtp.gmail.com',
        'smtp_puerto' => 465,
        'smtp_usuario' => '<email>',
        'smtp_clave' => '<password>',
        'mailtype' => 'html',
        'charset' => 'utf-8',
        'newline' => "\r\n"
    );

    //configuración para hotmail
    $impostazione = array(
        'protocolo' => 'smtp',
        'smtp_host' => 'ssl://smtp.live.com',
        'smtp_puerto' => 465,
        'smtp_usuario' => '<email>',
        'smtp_clave' => '<password>',
        'mailtype' => 'html',
        'charset' => 'utf-8',
        'newline' => "\r\n"
    );

    //configuración para yahoo
    $impostazione = array(
        'protocolo' => 'smtp',
        'smtp_host' => 'ssl://smtp.mail.yahoo.com',
        'smtp_puerto' => 465,
        'smtp_usuario' => '<email>',
        'smtp_clave' => '<password>',
        'mailtype' => 'html',
        'charset' => 'utf-8',
        'newline' => "\r\n"
    );

    // Carga la librería email de CodeIgniter
    $this->load->library('email', $impostazione);





    // Envía el correo electrónico
    mail($email, $asunto, $messaggioEmail);

    echo "I dati sono stati salvati correttamente nel database. Il tuo punteggio è stato inviato via email.";
} else {
    echo "Errore durante il salvataggio dei dati nel database: " . $conn->error;
}

// Chiudere la connessione
$conn->close();
?>
