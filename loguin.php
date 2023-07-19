<?php
// Obtener los datos del formulario
$utente = $_POST['login-input-user'];
$password = $_POST['login-input-password'];

// Conectar a la base de datos SQL Server
$servername = "localhost";
$database = "Questionari";
$username = "WEB11\jusseppe";
$password_db = "Tecno2023!";

$conn = new PDO("sqlsrv:Server=$servername;Database=$database", $username, $password_db);

// Verificar la conexión
if ($conn === false) {
    die("Errore durante la connessione al database: " . print_r(sqlsrv_errors(), true));
}

// Consultar en la base de datos si los datos de inicio de sesión son correctos
$query = "SELECT * FROM usuarios WHERE usuario = ? AND password = ?";
$stmt = $conn->prepare($query);
$stmt->execute([$usuario, $password]);

// Verificar si se encontró un registro que coincida con los datos de inicio de sesión
if ($stmt->rowCount() > 0) {
    // Los datos de inicio de sesión son correctos
    // Aquí puedes redirigir al usuario a la página de inicio de sesión exitosa o realizar otras acciones necesarias
    echo "accesso riuscito";
} else {
    // Los datos de inicio de sesión son incorrectos
    // Aquí puedes mostrar un mensaje de error o redirigir al usuario a la página de inicio de sesión con error
    echo "Nome utente o password non corretti";
}

// Cerrar la conexión
$conn = null;
?>
