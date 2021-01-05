var drinkAdded = false;
var openSearch = false;

$( document ).ready(function() {
    //Prüft ob die URL /login ist. Wenn ja wird das Modal gezeigt
    if (window.location.pathname === '/Anbieter/Geschaeft/Getraenk/EANscan') {
        console.log("EAN öffnen");
        $('#EANscanModal').modal('show');
    }

    //Prüft ob die URL /login ist. Wenn ja wird das Modal gezeigt
    if (window.location.pathname === '/Anbieter/Geschaeft/Getraenk/auswaehlen') {
        $('#suchenModal').modal('show');
    }

    if (drinkAdded)
        $('#addedModal').modal('show');
    else if (openSearch)
        $('#suchenModal').modal('show');

    $('.livesearch').select2({
        placeholder: 'Suchen',
        ajax: {
            url: '/Anbieter/Geschaeft/Getraenk/Vorschlag',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.name,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }
    });
});
