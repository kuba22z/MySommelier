<!-- @author Leon Straßburger, Serdar Akcay-->
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title></title>
<!--
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
            crossorigin="anonymous"></script>
      -->
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



    <style>


        .btn {
            background-color: #00b5ad;
            border: none;
        }

        .dropdown-toggle {
            background-color: #00b5ad;

        }

        .btn-secondary {
            background-color: #00b5ad;
            color: #00b5ad;
        }

        #dropdown {
            color: #00b5ad;


        }

        #dropdownMenu2 {
            background-color: #00b5ad;
            box-shadow: 0 0px 0px rgba(0, 0, 0, 0);
            border-color: #00b5ad;

        }

        .navbar {
            background-color: #00b5ad;
        }

        #exampleModal {
            box-shadow: 0 0px 0px rgba(0, 0, 0, 0);
        }


    </style>
</head>


<header>
<nav class="navbar navbar-light">

@guest
    <!-- Button trigger modal -->
        <a data-toggle="modal" data-target="#loginModal" onclick="history.pushState({}, null, '/login')">
            <img
                src="https://external-content.duckduckgo.com/iu/?u=http%3A%2F%2Fwww.stickpng.com%2Fassets%2Fimages%2F585e4beacb11b227491c3399.png&f=1&nofb=1"
                width="50" height="50" class="d-inline-block align-top" alt="">
        </a>
    @endguest
    @auth('all')
        <div id="dropdown">

            <!-- user dropdown button -->
            <a class="btn btn-secondary" type="button" id="dropdownMenu2" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                <img
                    src="https://external-content.duckduckgo.com/iu/?u=http%3A%2F%2Fwww.stickpng.com%2Fassets%2Fimages%2F585e4beacb11b227491c3399.png&f=1&nofb=1"
                    width="50" height="50" class="d-inline-block align-top" alt="">
            </a>

            <!-- dropdown menu options -->
            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">

                    <a href=
                       @auth('provider'){{route('provider_account_view')}} @elseauth('client') {{route('client_account_view')}} @endauth
                           class="dropdown-item" role="button">Mein Konto</a>
                    <div class="dropdown-divider"></div>
                    <a href={{route('logout')}} class="dropdown-item" role="button">Abmelden</a>

            </div>

        </div>
@endauth

<!-- home link-->
    <h3><a class="text-decoration-none text-dark" id="main_title" href="/">Cyber-Sommelier</a></h3>

</nav>

</header>


