<!doctype html>
<html lang="en">
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

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="POST" action={{route('login')}}>
                    @csrf
                    @if($errors->fromRegister->any() )
                        <span class="error" style="color: red">Fehler bei der Registrierung. Bitte versuchen Sie es erneut.</span>
                        <br>

                    @elseif (\Illuminate\Support\Facades\Auth::check())
                        <span style="color: green">Ihr Konto wurde erfolgreich erstellt</span><br>

                    @elseif(session('NotRegistered')===true && !(\Illuminate\Support\Facades\Auth::check()))
                        <span class="error" style="color: red">Die Email und/oder das Passwort
                                stimmen nicht. Bitte überprüfen Sie Ihre Eingaben</span><br>
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
                    @if(session('NotRegistered')===true && !(\Illuminate\Support\Facades\Auth::check()))
                        <a href="/passwort/reset" id="PwV"> Passwort vergessen?</a><br>
                    @endif
                    <br><br><br>
                    <button type="submit" class="btn btn-primary" id="anmelden">Anmelden</button>
                    <div class="register"><a href="/registration">Neues Konto erstellen</a></div>
                </form>


            </div>
        </div>
    </div>
</div>


</body>
</html>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
</button>
<!--wenn es Fehler gab bleibt der popup offen -->

<script>  $("#exampleModal").modal('show');</script>


<!-- Modal
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
