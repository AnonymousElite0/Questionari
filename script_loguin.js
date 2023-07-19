/*conectar mi loguin a la base de datos para que no permita entrar si los datos no son correctos*/
function validar(){
    var utente, password, expresion;
    utente = document.getElementById("utente").value;
    password = document.getElementById("password").value;
    expresion = /\w+@\w+\.+[a-z]/;

    if(utente === "" || password === ""){
        alert("tutti i campi sono obbligatori");
        return false;
    }
    else if(utente.length>30){
        alert("L'utente è molto lungo");
        return false;
    }
    else if(password.length>30){
        alert("La password è troppo lunga");
        return false;
    }
    else if(!expresion.test(utente)){
        alert("L'utente non è valido");
        return false;
    }
    else if(usuario != "root" || clave != "Root1911!"){
        alert("Nome utente o password errati");
        return false;
    }
}
