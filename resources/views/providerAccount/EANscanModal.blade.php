<div class="modal fade" id="EANscanModal" tabindex="-1" aria-labelledby="examleModalLabel" aria-hidden="true">
    <script>
        //wenn man das popup versteckt ändert sich die URL ohne die Seite neuzuladen
        $('#EANscanModal').on('hide.bs.modal', function (e) {
            //Ändert die aktuelle URL ohne die Seite neuzuladen
            history.pushState('/Anbieter/Geschaeft/Getraenk/EANscan', null, '/Anbieter/Geschaeft/einrichten');
        })
    </script>

    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                @for($i=0;$i<5;$i++)
                    <br>
                @endfor
                <div>Die EAN Scan Funktion erscheint erst in einer späteren Version. </div>
                    @for($i=0;$i<10;$i++)
                        <br>
                    @endfor
            </div>
        </div>
    </div>
</div>


