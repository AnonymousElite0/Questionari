window.addEventListener("DOMContentLoaded", function() {
    // Obtener referencia a los elementos del sidebar
    var sidebarItems = document.querySelectorAll(".sidebar ul li a");

    // Agregar evento click a cada elemento del sidebar
    sidebarItems.forEach(function(item) {
        item.addEventListener("click", function(event) {
            event.preventDefault();

            // Obtener el ID del contenido de la pestaña
            var tabId = this.getAttribute("href").replace("#", "");

            // Ocultar todos los contenidos y mostrar solo el seleccionado
            hideAllTabs();
            document.getElementById(tabId).style.display = "block";
        });
    });

    // Mostrar el contenido de la primera pestaña por defecto
    document.getElementById("dashboard").style.display = "block";

    function hideAllTabs() {
        // Ocultar todos los contenidos de las pestañas
        var tabs = document.getElementsByClassName("tab-content");
        for (var i = 0; i < tabs.length; i++) {
            tabs[i].style.display = "none";
        }
    }
});

