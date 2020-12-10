<div class="modal fade" id="suchenModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">



    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Getränke meiner Karte hinzufügen</h5>
            </div>
            <div class="modal-body">

                <form method="GET" action={{route('search_drink')}}>

                    <br><br>
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Suchen">
                    </div>
                    <br>

                    <button type="submit" class="btn btn-primary" id="search">Suchen</button>


                    <a href="{{route('EANscan_view')}}">
                        <button type="button" class="btn btn-primary" id="EAN"> EAN Scan</button>
                    </a>

                    <hr>
                    <div>CSV hochladen</div>

                    <button type="submit" class="btn btn-primary" id="choose">Datei auswählen</button>
                    <button type="submit" class="btn btn-primary" id="upload">Datei hochladen</button>
                </form>


            </div>
        </div>
    </div>
</div>
