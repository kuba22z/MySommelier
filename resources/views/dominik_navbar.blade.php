<nav class="navbar navbar-light">
    @guest
    <!-- Button trigger modal -->
    <a data-toggle="modal" data-target="#loginModal">
        <img
            src="https://external-content.duckduckgo.com/iu/?u=http%3A%2F%2Fwww.stickpng.com%2Fassets%2Fimages%2F585e4beacb11b227491c3399.png&f=1&nofb=1"
            width="50" height="50" class="d-inline-block align-top" alt="">
    </a>
    @endguest
    @auth('all')
        <div id="dropdown">
            <!-- user dropdown button -->
            <button class="btn navBtn" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="https://external-content.duckduckgo.com/iu/?u=http%3A%2F%2Fwww.stickpng.com%2Fassets%2Fimages%2F585e4beacb11b227491c3399.png&f=1&nofb=1" width="50" height="50" class="d-inline-block align-top" alt="">
            </button>

            <!-- dropdown menu options -->
            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <a href="@auth('provider'){{route('provider_account_view')}} @elseauth('client') {{route('client_account_view')}} @endauth"  class="dropdown-item" role="button">Mein Konto</a>
                <div class="dropdown-divider"></div>
                <a href="{{route('logout')}}" class="dropdown-item" id="abmelden" role="button">Abmelden</a>
            </div>
        </div>
        </div>
    @endauth
    <!-- home link-->
    <h3><a class="text-decoration-none text-dark" id="main_title" href="/">Cyber-Sommelier</a></h3>
</nav>
