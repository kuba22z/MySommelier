$('#EANscanModal').on('hide.bs.modal', function (e) {
    //Ändert die aktuelle URL ohne die Seite neuzuladen
    history.pushState('/Anbieter/Geschaeft/Getraenk/EANscan', null, '/Anbieter/Geschaeft/einrichten');
});
