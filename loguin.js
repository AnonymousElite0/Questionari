//recibir datos correctos de usuario y entrar al dashboard  o enviar mensaje de error

function login() {
    var utente = document.getElementById("utente").value;
    var password = document.getElementById("password").value;
    var data = { email: email, password: password };
    var dataJson = JSON.stringify(data);
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "http://localhost:3000/login", true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.send(dataJson);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var respuesta = JSON.parse(xhr.responseText);
            if (respuesta.status == "ok") {
                localStorage.setItem("token", respuesta.token);
                window.location.href = "dashboard.html";
            } else {
                alert(respuesta.message);
            }
        }
    };
}