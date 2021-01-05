<div class="modal fade" id="suchenModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">


    <script>
        //wenn man das popup versteckt ändert sich die URL ohne die Seite neuzuladen
        $('#suchenModal').on('hide.bs.modal', function (e) {
            history.back();
        });
    </script>

    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Getränke meiner Karte hinzufügen</h5>
            </div>
            <div class="modal-body">
                <form method="GET" id="searchDrinkByNameForm" action={{route('search_drink')}}>
                    @csrf
                    <div class="mx-2">
                        <select class="livesearch form-control" name="livesearch" id="livesearch" style="width: 100%;"></select>
                    </div>
                    <div class="row my-2 mx-3">
                        <div class="col-5">
                            <button type="submit" class="btn mintButton" id="search">Suchen</button>
                        </div>
                        <div class="col-2"></div>
                        <div class="col-5">
                            <a href="{{route('EANscan_view')}}" class="btn mintButton">EAN-Scan</a>
                        </div>
                    </div>
                </form>
                <hr>
                <form method="POST" id="uploadCSVForm" action="{{route('create_drink_byCsv')}}" enctype="multipart/form-data">
                    @csrf
                    <h5 class="modal-title">CSV hochladen</h5>
                    <span style="color: red">@error('csv'){{$message}}@enderror</span>
                    <br>
                    <div class="row">
                        <div class="col-6">
                            <label class="btn mintButton"> Datei auswählen<br>
                                <input type="file" role=button class="" id="csv" name="csv">
                            </label>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn mintButton" id="upload">Datei hochladen</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
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
</script>
