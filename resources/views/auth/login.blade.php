


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
                        <a onclick="
                    $('#loginModal').modal('hide')
                   $('#pswresetModal').modal('show')" style="color: #00b5ad" id="PwV"> Passwort vergessen?</a><br>
                    @endif
                    <br><br><br>
                    <button type="submit" class="btn btn-primary" id="anmelden">Anmelden</button>
                    <div class="register"><a id="newAccountBtn" onclick="
                    $('#loginModal').modal('hide')
                    $('#registerModal').modal('show')" style="color: #00b5ad">Neues Konto erstellen</a></div>

                </form>


            </div>
        </div>
    </div>
</div>


<script>
    //Prüft ob die URL /login ist. Wenn ja wird das Modal gezeigt
    @if(session('Registered')===false || session('LoggedIn')===false || session('Registered')===true || session('showLogin')===true)
    $('#loginModal').modal('show')
        @endif
    @if(session('showLogin')==true)
    //Ändert die URL ohne die Seite neuzuladen
    history.pushState({}, null, "/");
    @endif
</script>


<!-- Modal   Grundgerust für den Popup kann später hilfreich sein



<span style="color: green">Sie wurden erfolgreich eingeloggt</span><br>


// Simulate a mouse click:
window.location.href = "http://www.w3schools.com";

// Simulate an HTTP redirect:
window.location.replace("http://www.w3schools.com");
