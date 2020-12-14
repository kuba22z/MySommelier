<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet"/>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<style>
    .livesearch {
        width: 300px;
    }
</style>

<div class="modal fade" id="suchenModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">


    <script>
        //wenn man das popup versteckt ändert sich die URL ohne die Seite neuzuladen
        $('#suchenModal').on('hide.bs.modal', function (e) {
            //Ändert die aktuelle URL ohne die Seite neuzuladen
            history.pushState('/Anbieter/Geschaeft/Getraenk/auswaehlen', null, '/Anbieter/Geschaeft/einrichten');
        })
    </script>

    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Getränke meiner Karte hinzufügen</h5>
            </div>
            <div class="modal-body">

                <form method="GET" action={{route('search_drink')}}>
                    @csrf
                    <br>
                    <select class="livesearch form-control" name="livesearch" id="livesearch"></select>

                    <br><br>
                    <button type="submit" class="btn btn-primary" id="search">Suchen</button>


                    <a href="{{route('EANscan_view')}}">
                        <button type="button" class="btn btn-primary" id="EAN"> EAN Scan</button>
                    </a>
                </form>
                <hr>
                <form method="POST" action="{{route('create_drink_byCsv')}}" enctype="multipart/form-data">
                    @csrf
                    <div>CSV hochladen</div>
                    <br><span style="color: red">@error('csv'){{$message}}@enderror</span><br>
                    <label> Datei auswählen<br>
                        <input type="file" role=button class="btn btn-primary" id="csv" name="csv">
                    </label>

                    <button type="submit" class="btn btn-primary" id="upload">Datei hochladen</button>
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
