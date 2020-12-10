


<style>
        .modal-title {
            margin-left: auto;
        }

        #email, #password {
            width: 280px;
            margin: 0 auto;
            display: block;

        }

        #anmelden {

            width: 130px;
            margin: 0 auto;
            display: block;
        }

        .register {
            width: auto;
        }

        div .register {
            display: block;
            text-align: center;
        }


    </style>



<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">

    <script>

        //wenn man das popup versteckt ändert sich die URL ohne die Seite neuzuladen
        $('#loginModal').on('hide.bs.modal', function (e) {
            //Ändert die aktuelle URL ohne die Seite neuzuladen
            history.pushState({}, null, "/");
        })
    </script>


    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title d" id="loginModalLabel">Login</h5>
                <button type="button" disabled class="close" data-dismiss="modal" aria-label="Close">
                    <!--   <span aria-hidden="true">&times;</span>  optional close button-->
                </button>
            </div>
            <div class="modal-body">

                <form method="POST" action={{route('login')}}>

                    @csrf
                    @if(session('Registered')===false)
                        <span class="error" style="color: red">Fehler bei der Registrierung. Bitte versuchen Sie es erneut.</span>
                        <br>
                    @elseif(session('LoggedIn')===false)
                        <span class="error" style="color: red">Die Email und/oder das Passwort
                                stimmen nicht. Bitte überprüfen Sie Ihre Eingaben</span><br>
                    @elseif (session('Registered')===true)
                        <span style="color: green">Ihr Konto wurde erfolgreich erstellt</span><br>
                    @endif

                    <br><br>
                        <input type="text" class="form-control" id="email" name="email" placeholder="E-mail"
                               value={{session("email")}}>

                    <br>
                    <input type="password" class="form-control" id="password" name="password"
                               placeholder="Passwort" value=
                            {{session("password")}}>


                    @if(session('LoggedIn')===false)
                        <a href={{route('pswreset_view')}} id="PwV"> Passwort vergessen?</a><br>
                    @endif
                    <br><br><br>
                    <button type="submit" class="btn btn-primary" id="anmelden">Anmelden</button>
                    <div class="register"><a href="{{route('registration_view')}}">Neues Konto erstellen</a></div>

                </form>


            </div>
        </div>
    </div>
</div>

<script>
    //Prüft ob die URL /login ist. Wenn ja wird das Modal gezeigt
    if (window.location.pathname === '/login') {
        $('#loginModal').modal('show');
    }
</script>


<!-- Modal   Grundgerust für den Popup kann später hilfreich sein

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>


<span style="color: green">Sie wurden erfolgreich eingeloggt</span><br>


// Simulate a mouse click:
window.location.href = "http://www.w3schools.com";

// Simulate an HTTP redirect:
window.location.replace("http://www.w3schools.com");
