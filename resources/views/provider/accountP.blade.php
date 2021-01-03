@extends('dominik_master')
@push('styles')
    <link rel="stylesheet" href="{{ url('/css/konto.css') }}"> <!-- CCS File ist in public/css -->
@endpush
@push('scripts')
    <script src="{{ url('js/kontoProvider.js') }}"></script>
@endpush
@section('title', 'Mein Konto - Cyber-Sommelier')
@section('content')
    <h1 class="subpageHeadline">Mein Konto</h1>
    <h3 class="subTitle p-1">Kontaktinformationen</h3>
    <div class="p-4">
        <form id="formKonto" method="POST" action="{{route('provider_account_change')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="col-12 form-group row">
                    <div class="col-6">
                        <label class="col-form-label" for="forenameInput">Vorname:</label>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" id="forenameInput" name="firstName" placeholder="{{$firstName}}">
                    </div>
                    <span style="color: red">@error('firstName'){{$message}}@enderror</span>
                </div>
                <div class="col-12 form-group row">
                    <div class="col-6">
                        <label class="col-form-label" for="lastnameInput">Nachname:</label>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" id="lastnameInput" name="secondName"  placeholder="{{$secondName}}">
                    </div>
                    <span style="color: red">@error('secondName'){{$message}}@enderror</span>
                </div>
                <div class="col-12 form-group row">
                    <div class="col-6">
                        <label class="col-form-label" for="mailInput">E-Mail:</label>
                    </div>
                    <div class="col-6">
                        <input type="email" class="form-control" id="mailInput" name="email" placeholder="{{$email}}">
                    </div>
                    <span style="color: red">@error('email'){{$message}}@enderror</span>
                </div>
                <div class="col-12 form-group row">
                    <div class="col-6">
                        <label class="col-form-label" for="dateInput">Geburtsdatum:</label>
                    </div>
                    <div class="col-6">
                        <input type="date" class="form-control" id="dateInput" name="birthDate" value="{{$birthDate}}">
                    </div>
                    <span style="color: red">@error('birthDate'){{$message}}@enderror</span>
                </div>
                <div class="col-12 form-group row">
                    <div class="col-6">
                        <!-- nichts -->
                    </div>
                    <div class="col-6">
                        <button type="submit" class="btn mintButton">Speichern</button>
                    </div>
                </div>
                <div class="col-12 form-group row">
                    <div class="col-6">
                        <button type="button" class="btn mintButton" data-toggle="modal" data-target="#changePWModal"  onclick="history.pushState({}, null, '/Anbieter/Konto/Passwort/aendern')">Passwort ändern</button>
                    </div>
                    <div class="col-6">
                        <a href="{{route('business_view')}}" role="button" class="btn mintButton" aria-pressed="true">Mein Geschäft</a>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <h3 class="subTitle p-1" id="ratingsHeading">Meine Bewertungen</h3>
    <div class="overflow-auto" id="bewertungenContainer">
        @php $ratings = []; @endphp
        @forelse($ratings as $b)
            @if ($b['imageSrc'] == '')
                @php $b['imageSrc'] = 'https://upload.wikimedia.org/wikipedia/commons/f/f1/Procyon_lotor_qtl2.jpg'; @endphp
            @endif
            @if ($b['type'] == 1)
                @php $link = '/Geschefte/' . $b['name']; @endphp
            @else
                @php $link = '/Getraenke/' . $b['name']; @endphp
            @endif
            <div class="row ratingRow mb-2 pb-1 px-4">
                <img class="col-3 img-fluid" src="{{ $b['imageSrc'] }}">
                <div class="col-9 row">
                    <div class="col-6 ratingName">
                        <a href="{{ $link }}">{{ $b['name'] }}</a>
                    </div>
                    <div class="col-6 ratingStars">
                        <span>{{ $b['stars'] }} Sterne</span>
                    </div>
                    <div class="col-12 ratingDescription">
                        {{ $b['text'] }}
                    </div>
                </div>
            </div>
        @empty
            <div id="noRatings">Keine Bewertungen</div>
        @endforelse
    </div>
    <div class="allModals">
        <div class="modal fade" id="changePWModal" tabindex="-1" role="dialog" aria-labelledby="changePWModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Passwort ändern</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="container-fluid">
                            <form id="formPW" method="POST" action="{{ route('provider_changePsw') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="col-12 form-group row">
                                        <div class="col-7">
                                            <label class="col-form-label" for="actPWInput">Aktuelles Passwort:</label>
                                        </div>
                                        <div class="col-5">
                                            <input type="password" class="form-control" id="actPWInput" name="actualPsw" value="">
                                        </div>
                                    </div>
                                    <div class="col-12 form-group row">
                                        <div class="col-7">
                                            <label class="col-form-label" for="newPWInput">Neues Passwort:</label>
                                        </div>
                                        <div class="col-5">
                                            <input type="password" class="form-control" id="newPWInput" name="password" value="">
                                        </div>
                                    </div>
                                    <div class="col-12 form-group row">
                                        <div class="col-7">
                                            <label class="col-form-label" for="newPWValidationInput">Passwort wiederholen:</label>
                                        </div>
                                        <div class="col-5">
                                            <input type="password" class="form-control" id="newPWValidationInput" name="password_confirm" value="">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn mintButton" onclick="$('#formPW').submit();">Bestätigen</button>
                    </div>
                </div>
            </div>
        </div>
        @yield('savePswModal')
    </div>
@endsection
