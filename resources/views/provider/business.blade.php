<div class="sticky-top">
    @include('layout.navbar')
</div>


<style>
    h1 {
        margin-left: auto;
    }

    .labelInput {
        float: left;
        position: relative;

    }


    #name, #zip, #street, #city, #website {
        width: 180px;
    }

    #openHours, #telNr, #description {
        width: 300px;

    }


</style>

<body>
<h1>Mein Geschäft</h1>

<form method="POST" action="{{route('business_save')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name" class="labelInput">Name:</label>
        <input type="text" class="form-control" id="name" name="name">
        <span style="color: red">@error('name'){{$message}}@enderror</span>
    </div>


    <div class="form-group">
        <label for="zip" class="labelInput">PLZ:</label>
        <input type="text" class="form-control" id="zip" name="zip">
        <span style="color: red">@error('zip'){{$message}}@enderror</span>
    </div>
    <div class="form-group">
        <label for="city" class="labelInput">Stadt:</label>
        <input type="text" class="form-control" id="city" name="city">
        <span style="color: red">@error('city'){{$message}}@enderror</span>
    </div>

    <div class="form-group">
        <label for="street" class="labelInput">Straße und Hausnr. :</label>
        <input type="text" class="form-control" id="street" name="street" placeholder="(getrennt mit einem leerzeichen)">
        <span style="color: red">@error('street'){{$message}}@enderror</span>
    </div>

    <div class="form-group">
        <label for="website" class="labelInput">Webseite:</label>
        <input type="url" class="form-control" id="website" name="website">
        <span style="color: red">@error('website'){{$message}}@enderror</span>
    </div>

    <div class="form-group">
        <label for="openHours" class="labelInput">Öffnungszeiten</label>
        <input type="text" class="form-control" id="openHours" name="openHours"
               placeholder="Zb: Mo:08:00-17:00;Di:08:00-19:30;">
        <span style="color: red">@error('openHours'){{$message}}@enderror</span>
    </div>

    <div class="form-group">
        <label for="telNr" class="labelInput">Telefonnummer:</label>
        <input type="number" class="form-control" id="telNr" name="telNr">
        <span style="color: red">@error('telNr'){{$message}}@enderror</span>
    </div>

    <div class="form-group">
        <label for="description" class="labelInput">Beschreibung:</label>
        <input type="text" class="form-control" id="description" name="description" placeholder="(max 500 Zeichen)">
        <span style="color: red">@error('description'){{$message}}@enderror</span>
    </div>

    <div class="form-group">
        <img src="{{ asset($providerImage)}}" width="200px"
             onerror=this.src="{{asset('storage/providersImage/uploadImage.png')}}">
        <input type="file" class="form-control" id="image" name="image">
        <span style="color: red">@error('image'){{$message}}@enderror</span>
    </div>

    @foreach($offer as $key => $row)
        {{$row->name}}
        <input type="hidden" name="OffersCount" value="{{$loop->count}}">
        <input class="form-check-input" type="checkbox" value="{{$row->drink_id}}" id="" name="{{$loop->index}}"
               @if($row->recommended==true) checked @endif >
        <label class="form-check-label" for="defaultCheck1">
            Empfohlen
        </label>

        <button type="submit" name="removeIt" value="{{$row->drink_id}}">
            <svg width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-x" fill="red"
                 xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
            </svg>
        </button>
        <br>
@endforeach


<!-- Button trigger modal -->
    <a data-toggle="modal" data-target="#suchenModal"
       onclick="history.pushState({}, null, '/Anbieter/Geschaeft/Getraenk/auswaehlen')">
        <svg width="4em" height="4em" viewBox="0 0 16 16" class="bi bi-plus-circle" fill="currentColor"
             xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
            <path fill-rule="evenodd"
                  d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
        </svg>
    </a>

    <br>
    <button type="submit" class="btn btn-primary" id="register">Speichern</button>
    <br>
    <a href="{{route('business_view')}}" class="btn btn-primary" role="button" id="back">Abbrechen</a>


</form>


@include('provider.searchDrink')
@include('provider.EANscan')


</body>


<script>
    //Prüft ob die URL /login ist. Wenn ja wird das Modal gezeigt
    if (window.location.pathname === '/Anbieter/Geschaeft/Getraenk/EANscan') {
        $('#EANscanModal').modal('show');
    }

    //Prüft ob die URL /login ist. Wenn ja wird das Modal gezeigt
    if (window.location.pathname === '/Anbieter/Geschaeft/Getraenk/auswaehlen') {
        $('#suchenModal').modal('show');
    }
</script>











