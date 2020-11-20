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

        div a {
            display: block;
            text-align: center;
        }

    </style>

</head>
<body>


<!-- Button trigger modal -->
<a data-toggle="modal" data-target="#exampleModal" onclick="window.location.pathname = 'login'">
    <img src="storage/usericon.png" width="100px">
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
                <h5 class="modal-title" id="exampleModalLabel">Passwort zurücksetzen</h5>
                <button type="button" disabled class="close" data-dismiss="modal" aria-label="Close">
                    <!--   <span aria-hidden="true">&times;</span>  optional close button-->
                </button>
            </div>
            <div class="modal-body"><br><br>

                <div>Um Ihr Passwort zurückzusetzen, senden Sie eine Email an</div>
                <div class="email"><a href="support@cyber-sommelier.de">support@cyber-sommelier.de</a></div>
                @for($i=0;$i<12;$i++)
                    <br>
                @endfor

            </div>
        </div>
    </div>
</div>

</body>
</html>
<script>
    //Prüft ob die URL /passwort/reset ist. Wenn ja wird das Modal gezeigt
    if (window.location.pathname === '/passwort-reset') {
        $('#exampleModal').modal('show');
    }
</script>




