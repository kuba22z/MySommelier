$( document ).ready(function() {
    $("#savePWModal").modal("show");
    $('#savePWModal').on('hide.bs.modal', function (e) {
        //Ändert die URL ohne die Seite neuzuladen
        history.pushState({}, null, "/Kunde/Konto");
    })
});
