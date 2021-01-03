const EAN_SEARCH_HREF = "{{route('EANscan_view')}}";

//wenn man das popup versteckt ändert sich die URL ohne die Seite neuzuladen
$('#suchenModal').on('hide.bs.modal', function (e) {
    //Ändert die aktuelle URL ohne die Seite neuzuladen
    history.pushState('/Anbieter/Geschaeft/Getraenk/suchen', null, '/Anbieter/Geschaeft/einrichten');
});
