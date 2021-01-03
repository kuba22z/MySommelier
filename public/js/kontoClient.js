//Prüft ob die URL /login ist. Wenn ja wird das Modal gezeigt

$( document ).ready(function() {
    /*
    if (window.location.pathname === '/Kunde/Konto/Passwort/aendern') {
        $('#changePWModal').modal('show');
    }
     */
    $('#changePWModal').on('hide.bs.modal', function (e) {
        //Ändert die URL ohne die Seite neuzuladen
        history.pushState({}, null, "/Kunde/Konto");
    });
});
