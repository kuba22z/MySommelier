<style>
    #actualPsw, #password, #password2 {
        width: 200px;
    }


</style>
<div class="modal fade" id="pswChangeModal" tabindex="-1" aria-labelledby="pswChangeModalLabel" aria-hidden="true">

    <script>
        //wenn man das popup versteckt ändert sich die URL ohne die Seite neuzuladen
        $('#pswChangeModal').on('hide.bs.modal', function (e) {

            //Ändert die URL ohne die Seite neuzuladen
            history.pushState({}, null, "/Kunde/Konto");
        })
    </script>

    @if(session()->has('successful'))
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">

                    @for($i=0;$i<4;$i++)
                        <br>
                    @endfor
                    @if(session('successful')===false)
                        <span class="error" style="color: red">Ihr Passwort wurde nicht erfolgreich geändert</span><br>
                    @else
                        <span class="error" style="color: green">Ihr Passwort wurde erfolgreich geändert</span><br>
                    @endif

                        @for($i=0;$i<10;$i++)
                            <br>
                        @endfor

                </div>
            </div>
        </div>
                @else
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="pswChangeModalLabel">Passwort Ändern</h5>
                                <button type="button" disabled class="close" data-dismiss="modal" aria-label="Close">
                                    <!--   <span aria-hidden="true">&times;</span>  optional close button-->
                                </button>
                            </div>
                            <div class="modal-body">

                                <form method="POST" action={{route('client_changePsw')}}>
                                    @csrf
                                    <div class="form-group">
                                        <label for="actualPsw" class="labelInput">Aktuelles Passwort:</label>
                                        <input type="password" class="form-control" id="actualPsw" name="actualPsw">

                                    </div>

                                    <div class="form-group">
                                        <label for="password" class="labelInput">Neues Passwort:</label>
                                        <input type="password" class="form-control" id="password" name="password">

                                    </div>
                                    <div class="form-group">
                                        <label for="password2" class="labelInput">Passwort widerholen:</label>
                                        <input type="password" class="form-control" id="password2"
                                               name="password_confirm">

                                    </div>


                                    <br>

                                    <button type="submit" class="btn btn-primary" id="save">Bestätigen</button>
                                </form>

                            </div>
                        </div>
                    </div>
            </div>
            @endif

