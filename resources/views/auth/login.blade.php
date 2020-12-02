<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
            crossorigin="anonymous"></script>

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

</head>
<body>

<!-- Button trigger modal -->
<a data-toggle="modal" data-target="#exampleModal" onclick="{{route('login_view')}}">
    <img src="storage/usericon.png" width="100px">
</a>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <script>

        //wenn man das popup versteckt ändert sich die URL ohne die Seite neuzuladen
        $('#exampleModal').on('hide.bs.modal', function (e) {
            //Ändert die aktuelle URL ohne die Seite neuzuladen
            history.pushState({}, null, "/");
        })
    </script>


    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Login</h5>
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
                    <div class="form-group">
                        <input type="text" class="form-control" id="email" name="email" placeholder="E-mail"
                               value={{session("email")}}>
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control" id="password" name="password"
                               placeholder="Passwort" value=
                            {{session("password")}}>

                    </div>
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

</body>
</html>

<script>
    //Prüft ob die URL /login ist. Wenn ja wird das Modal gezeigt
    if (window.location.pathname === '/login') {
        $('#exampleModal').modal('show');
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
