@extends('dominik_master')
@push('styles')
    <link rel="stylesheet" href="{{ url('/css/business.css') }}"> <!-- CCS File ist in public/css -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet"/>
@endpush
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="{{ url('js/business.js') }}"></script>
    <script>
        @isset($drinkAdded)
            @if($drinkAdded === true)
                drinkAdded = true;
            @endif
        @endisset
        @isset($openSearch)
            openSearch = true;
        @endisset
    </script>
@endpush
@section('title', 'Geschäft einrichten - Cyber-Sommelier')
@section('content')
    <h1 class="subpageHeadline">Mein Geschäft</h1>
    <div class="p-4">
        <form id="formBusiness" method="POST" action="{{ route('business_save') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div id="businessProfilePictureContainer" class="form-group col-4">
                    <!-- Bild laden oder Standard anzeigen -->
                    <img src="{{ asset($providerImage) }}" id="businessProfilePicture"
                         class="img-fluid img-thumbnail" alt="Bild des Geschäfts"
                         onerror=this.src="{{ asset('storage/providersImage/uploadImage.png') }}">
                    <input type="file" class="form-control-file" id="image" name="image">
                    <span style="color: red">@error('image'){{$message}}@enderror</span>
                </div>
                <div class="col-8">
                    <div class="form-group row">
                        <div class="col-4">
                            <label for="nameInput" class="labelInput col-form-label">Name:</label>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control" id="nameInput" name="name">
                        </div>
                        <span style="color: red">@error('name'){{$message}}@enderror</span>
                    </div>

                    <div class="form-group row">
                        <div class="col-4">
                            <label for="websiteInput" class="labelInput col-form-label">Webseite:</label>
                        </div>
                        <div class="col-8">
                            <input type="url" class="form-control" id="websiteInput" name="website">
                        </div>
                        <span style="color: red">@error('website'){{$message}}@enderror</span>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-12 form-group row">
                    <div class="col-5">
                        <label for="streetAndHousenumberInput" class="labelInput col-form-label">Straße & Nr:</label>
                    </div>
                    <div class="col-7">
                        <input type="text" class="form-control" id="streetAndHousenumberInput" name="street">
                    </div>
                    <span style="color: red">@error('street'){{$message}}@enderror</span>
                </div>
                <div class="col-12 form-group row">
                    <div class="col-5">
                        <label for="PLZInput" class="labelInput col-form-label" >PLZ:</label>
                    </div>
                    <div class="col-7">
                        <input type="text" class="form-control" id="PLZInput" name="zip">
                    </div>
                    <span style="color: red">@error('zip'){{$message}}@enderror</span>
                </div>
                <div class="col-12 form-group row">
                    <div class="col-5">
                        <label for="cityInput" class="labelInput col-form-label">Ort:</label>
                    </div>
                    <div class="col-7">
                        <input type="text" class="form-control" id="cityInput"  name="city">
                    </div>
                    <span style="color: red">@error('city'){{$message}}@enderror</span>
                </div>
                <div class="col-12 form-group row">
                    <div class="col-5">
                        <label for="openHoursInputInput" class="labelInput col-form-label">Öffnungszeiten:</label>
                    </div>
                    <div class="col-7">
                        <input type="text" class="form-control" id="openHoursInputInput" name="openHours" placeholder="Zb: Mo:08:00-17:00;">
                    </div>
                    <span style="color: red">@error('openHours'){{$message}}@enderror</span>
                </div>
                <div class="col-12 form-group row">
                    <div class="col-5">
                        <label for="telNrInput" class="labelInput col-form-label">Telefonnummer:</label>
                    </div>
                    <div class="col-7">
                        <input type="text" class="form-control" id="telNrInput" name="telNr">
                    </div>
                    <span style="color: red">@error('telNr'){{$message}}@enderror</span>
                </div>
                <div class="col-12 form-group row">
                    <div class="col-5">
                        <label for="descriptionTextArea" class="labelInput col-form-label">Beschreibung:</label>
                    </div>
                    <div class="col-7">
                        <input type="text" class="form-control" id="descriptionTextArea" name="description" placeholder="(max 500 Zeichen)">
                    </div>
                    <span style="color: red">@error('description'){{$message}}@enderror</span>
                </div>
            </div>



            <br>
            <div id="offersContainer" class="container">
                <input type="hidden" name="OffersCount" value="{{count($offer)}}">

                @foreach($offer as $key => $row)
                    <div class="row offerRow px-1 @if($loop->last) lastOffer @endif">
                        <div class="col-6 offerName">
                            <span>{{ $row->name }}</span>
                        </div>
                        <div class="col-6 offerSettings">
                            <div style="justify-self: right">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" value="{{$row->drink_id}}" id="rec-checkbox-{{$loop->index}}" name="{{$loop->index}}"
                                           @if($row->recommended==true) checked @endif >
                                    <label class="form-check-label" for="rec-checkbox-{{$loop->index}}">
                                        Empfohlen
                                    </label>
                                </div>
                                <button type="submit" name="removeIt" id="remove{{$loop->index}}" value="{{$row->drink_id}}">
                                    &times;
                                </button>
                            </div>

                        </div>
                    </div>
            @endforeach

            <!-- Button trigger modal -->
                <div id="modalButtonContainer" class="py-4">
                    <a data-toggle="modal" id="searchModal" data-target="#suchenModal" onclick="history.pushState({}, null, '/Anbieter/Geschaeft/Getraenk/suchen')">
                        <svg width="4em" height="4em" viewBox="0 0 16 16" class="bi bi-plus-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div id="formButtonsContainer" class="row mt-4">
                <div class="col-5">
                    <button type="submit" class="btn mintButton" id="register">Speichern</button>
                </div>
                <div class="col-2">

                </div>
                <div class="col-5">
                    <a href="{{route('business_view')}}" class="btn mintButton" role="button" id="back">Abbrechen</a>
                </div>
            </div>
        </form>
    </div>
    <div id="addedModal" class="modal fade" tabindex="-1" aria-labelledby="examleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div>Ihre Auswahl wurde erfolgreich übernommen.</div>
                </div>
            </div>
        </div>
    </div>
    @include('provider.searchDrink')
    @include('provider.EANscan')
@endsection
