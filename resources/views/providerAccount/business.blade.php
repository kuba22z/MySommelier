@include('layout.navbar')
<style>
        h1 {
            margin-left: auto;
        }

        .labelInput {
            float: left;
            position: relative;

        }


        #name, #address, #website {
            width: 180px;
        }

        #openHours, #telNr, #description {
            width: 250px;

        }


    </style>


</head>
<body>
<h1>Mein Geschäft</h1>

<form method="POST" action="{{route('save')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="firstName" class="labelInput">Vorname:</label>
        <input type="text" class="form-control" id="firstName" required name="firstName">
        <span style="color: red">@error('firstName'){{$message}}@enderror</span>
    </div>
    <div class="form-group">
        <label for="secondName" class="labelInput">Nachname:</label>
        <input type="text" class="form-control" id="secondName" required name="secondName">
        <span style="color: red">@error('secondName'){{$message}}@enderror</span>
    </div>


    <div class="form-group">
        <label for="address" class="labelInput">Adresse:</label>
        <input type="text" class="form-control" id="address" required name="address">
        <span style="color: red">@error('address'){{$message}}@enderror</span>
    </div>

    <div class="form-group">
        <label for="website" class="labelInput">Webseite:</label>
        <input type="url" class="form-control" id="website" name="website">
        <span style="color: red">@error('website'){{$message}}@enderror</span>
    </div>

    <div class="form-group">
        <label for="openHours" class="labelInput">Öffnungszeiten</label>
        <input type="text" class="form-control" id="openHours" name="openHours">
        <span style="color: red">@error('openHours'){{$message}}@enderror</span>
    </div>

    <div class="form-group">
        <label for="telNr" class="labelInput">Telefonnummer:</label>
        <input type="number" class="form-control" id="telNr" name="telNr">
        <span style="color: red">@error('telNr'){{$message}}@enderror</span>
    </div>

    <div class="form-group">
        <label for="description" class="labelInput">Beschreibung:</label>
        <input type="text" class="form-control" id="description" name="description">
        <span style="color: red">@error('description'){{$message}}@enderror</span>
    </div>

    <div class="form-group">
        <img src="{{ asset($provider->image)}}" width="200px"
             onerror=this.src="{{asset('storage/providersImage/uploadImage.png')}}">
        <input type="file" class="form-control" id="image" name="image">
        <span style="color: red">@error('image'){{$message}}@enderror</span>
    </div>



    <!-- Button trigger modal -->
    <a data-toggle="modal" data-target="#suchenModal" onclick="history.pushState({}, null, '/Anbieter/Geschaeft/Getraenk/suchen')">
        <svg width="4em" height="4em" viewBox="0 0 16 16" class="bi bi-plus-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
            <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
        </svg>
    </a>

    <br>
    <button type="submit" class="btn btn-primary" id="register">Speichern</button>
    <br>
    <a href="{{route('business_view')}}" class="btn btn-primary" role="button" id="back">Abbrechen</a>


</form>

@include('providerAccount.searchDrinkModal')
@include('providerAccount.EANscanModal')


</body>
</html>

<script>
    //Prüft ob die URL /login ist. Wenn ja wird das Modal gezeigt
    if (window.location.pathname === '/Anbieter/Geschaeft/Getraenk/suchen') {
        $('#suchenModal').modal('show');
    }

    //Prüft ob die URL /login ist. Wenn ja wird das Modal gezeigt
    if (window.location.pathname === '/Anbieter/Geschaeft/Getraenk/EANscan') {
        $('#EANscanModal').modal('show');
    }
</script>









