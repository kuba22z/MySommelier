<style>
    .modal-title {
        margin-left: auto;
    }

    .labelInput {
        float: left;
        position: relative;
        right: 7px;
    }

    .textgroup {
        float: right;
        position: relative;
        left: 40px;
    }

    #emailr, #passwordr, #password2r {

        width: 150px;
    }

    .group {
        width: 90%;
    }

    .pass2Textgroup {
        width: 312px;
    }

    #labelRolle {
        float: left;
        position: relative;
        left: 80px;
    }

    #rolle {

        width: 140px;
        margin: auto;
        display: block;
        position: relative;
        right: 8px;
    }

    #chaptcha {
        width: 80px;
        margin: 0 auto;
        display: block;
        position: absolute;
        right: 50%;
    }

    #result {
        position: absolute;
        right: 36%;
        width: 60px;
    }

    #back, #register {
        width: 130px;
        margin: 0 auto;
        display: block;
    }

</style>


<!-- Button trigger modal -->
<a data-toggle="modal" data-target="#registerModal" hidden>

</a>

<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registerModalLabel">Registrieren</h5>
                <button type="button" disabled class="close" data-dismiss="modal" aria-label="Close">
                    <!--   <span aria-hidden="true">&times;</span>  optional close button-->
                </button>
            </div>
            <div class="modal-body">

                <form method="POST" action={{route('register')}}>
                    @csrf
                    <div class="group">
                        <div class="form-group textgroup">
                            <label for="emailr" class="labelInput">E-Mail:</label>
                            <input type="text" class="form-control" id="emailr" name="email">
                        </div>

                        <div class="form-group textgroup ">
                            <label for="passwordr" class="labelInput">Passwort:</label>
                            <input type="password" class="form-control" id="passwordr" name="password">

                        </div>
                        <div class="form-group textgroup pass2Textgroup">

                            <label for="password2r" class="labelInput">Passwort wiederholen:</label>
                            <input type="password" class="form-control" id="password2r"
                                   name="password_confirmation">

                        </div>
                    </div>

                    <div class="rolle">

                        <label for="rolle" id="labelRolle">Bitte wählen Sie Ihre Rolle aus:</label>

                        <div class="col-md-7" id="rolle">
                            <select id="rolle" name="rolle" class="form-control">
                                <option value="kunde" name="kunde">Kunde</option>
                                <option value="anbieter" name="anbieter">Anbieter</option>
                            </select>
                        </div>
                        <br>
                    </div>
                    <div class="d-flex flex-row bd-highlight mb-3">
                        <input type="hidden" name="captchaID" value="{{$randImage->id}}">
                        <img src="{{asset($randImage->image)}}" class="img-fluid" id="chaptcha"
                             alt="Fehler beim laden des Captchas" height="80px" width="80px">
                        <input type="number" id="result" name="result" width=3>

                    </div>
                    <br>

                    <button type="submit" class="btn btn-primary" id="register">Registrieren</button>
                    <br>
                    <a onclick="$('#registerModal').modal('hide')
                    $('#loginModal').modal('show')" class="btn btn-primary" role="button" id="back">Zurück</a>
                </form>

            </div>
        </div>
    </div>
</div>
