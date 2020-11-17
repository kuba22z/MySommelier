<?php  ?>
    <!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Passwort zurücksetzen</title>
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


    </style>


</head>
        <body>



        <form method="POST" action={{route('register')}}>

            <div class="form-group">
                <label for="email" class="labelInput">Name:</label>
                <input type="text" class="form-control" id="email" name="email" value=>

            </div>

            <div class="form-group">
                <label for="password" class="labelInput">Adresse:</label>
                <input type="password" class="form-control" id="password" name="password" value=>

            </div>
            <div class="form-group">
                <label for="password2" class="labelInput">Webseite:</label>
                <input type="password" class="form-control" id="password2" name="password_confirmation" value=>
            </div>

            <br>


            <button type="submit" class="btn btn-primary" id="register">Registrieren</button>
            <br>
            <a href="/login" class="btn btn-primary" role="button" id="back">Zurück</a>


        </form>

        </body>
</html>
