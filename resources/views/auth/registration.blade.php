<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrieren</title>
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

        .labelInput {
            float: left;
            position: relative;
            right: 7px;
        }

        .form-group {
            float: right;
        }

        #email, #password, #password2 {
            width: 180px;
        }

        .rolle {
            width: auto;
            margin: 0 auto;
            display: block;
        }

        #labelRolle {
            position: relative;
            left: 50px;
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
            right: 35%;
            width: 60px;
        }

        #back, #register {
            width: 130px;
            margin: 0 auto;
            display: block;
        }

    </style>


</head>
<body>

<?php // window.location.pathname = 'login' leitet auf dei seite "login" weiter ?>
<a data-toggle="modal" data-target="#exampleModal" onclick="window.location.pathname = 'login'">
    <img src="storage/usericon.png">
</a>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <script>
        //wenn man das popup versteckt ändert sich die URL ohne die Seite neuzuladen
        $('#exampleModal').on('hide.bs.modal', function (e) {

            //Ändert die URL ohne die Seite neuzuladen
            history.pushState({}, null, "/");
        })
    </script>




    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrieren</h5>
                <button type="button" disabled class="close" data-dismiss="modal" aria-label="Close">
                    <!--   <span aria-hidden="true">&times;</span>  optional close button-->
                </button>
            </div>
            <div class="modal-body">

                <form method="POST" action={{route('register')}}>
                    @csrf
                    <div class="form-group">
                        <label for="email" class="labelInput">E-Mail:</label>
                        <input type="text" class="form-control" id="email" name="email" value=>

                    </div>

                    <div class="form-group">
                        <label for="password" class="labelInput">Passwort:</label>
                        <input type="password" class="form-control" id="password" name="password" value=>

                    </div>
                    <div class="form-group">
                        <label for="password2" class="labelInput">Passwort widerholen:</label>
                        <input type="password" class="form-control" id="password2" name="password_confirmation" value=>

                    </div>
                    <div class="rolle">
                        <label class="col-md-7 control-label" for="service_status" id="labelRolle">Bitte wählen Sie Ihre
                            Rolle
                            aus:</label>
                        <div class="col-md-7" id="rolle">
                            <select id="rolle" name="rolle" class="form-control">
                                <option value="kunde" name="kunde">Kunde</option>
                                <option value="anbieter" name="anbieter">Anbieter</option>
                            </select>
                        </div>

                        <br>

                        <?php
                        //Datensatz mit einem zufälligen Bild aus der Datenbank holen
                        $row = \Illuminate\Support\Facades\DB::table('captchaImages')->find(rand(1, 20));?>

                    </div>
                    <div class="d-flex flex-row bd-highlight mb-3">
                        <input type="hidden" name="captchaResult" value="<?php echo $row->result?>">
                        <img src="<?php echo $row->image ?>" class="img-fluid" id="chaptcha"
                             alt="Fehler beim laden des Captchas" height="80px" width="80px">
                        <input type="number" id="result" name="result" width=3>

                    </div>
                    <br>

                    <?php /* durch eine Konfiguration in filesystems wird an der Postion storage/app/public/captchas nach dem Bild geschaut
         nach der Änderung der filesystems datei muss php artisan storage:link ausgeführt werden*/ ?>

                    <button type="submit" class="btn btn-primary" id="register">Registrieren</button>
                    <br>
                    <a href="/login" class="btn btn-primary" role="button" id="back">Zurück</a>
                </form>

            </div>
        </div>
    </div>
</div>
</body>


<script>
    //Prüft ob die URL /registration ist. Wenn ja wird das Modal gezeigt
    if (window.location.pathname === '/registration') {
        $('#exampleModal').modal('show');
    }
</script>


<?php /*
<span style="color: red">@error('password'){{$message}}@enderror</span>

<span style="color: red">@error('email'){{$message}}@enderror</span>
<span style="color: red">@error('password'){{$message}}@enderror</span>
