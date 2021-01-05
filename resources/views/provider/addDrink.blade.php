@extends('dominik_master')
@push('styles')
    <link rel="stylesheet" href="{{ url('/css/addDrink.css') }}"> <!-- CCS File ist in public/css -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet"/>
@endpush
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
@endpush
@section('content')
    <div class="subpageHeadline">
        <h1>Getränke meiner Karte hinzufügen</h1>
        <form id="searchForm" method="GET" action="{{route('search_drink')}}">
            @csrf
            <div class="form-row">
                <div class="col-5 form-group">
                    <select class="livesearch form-control" name="livesearch" id="livesearch"></select>
                </div>
                <div class="col-3">
                    <button type="submit" class="btn mintButton" id="search">Suchen</button>
                </div>
                <div class="col-4">
                    <a class="btn mintButton" href="{{route('EANscan_view')}}">EAN Scan</a>
                </div>
            </div>
        </form>
    </div>
    <div id="drinksContainer">
        <form method="POST" action="{{route('addDrink')}}">
            @csrf
            @foreach($row as $element)
                <div class="drinkRow form-row mb-2 mx-0 py-2">
                    <div class="col-3">
                        <img class="img-fluid" src="{{asset($element->image)}}" alt="Bild des Getränks">
                    </div>
                    <div class="col-6">
                        <div class="drinkName">
                            <a href="{{url('')}}?info={{$element->name}}&bew=4.6&id={{$element->id}}">{{$element->name}}</a>

                        </div>
                        <span class="drinkDesc">{{$element->type}} {{$element->alcoholContent}}% Vol.</span>
                    </div>
                    <div class="col-3">
                        <input type="hidden" name="name" hidden value="{{$element->name}}">
                        <button class="addButton" type="submit" name="id" value="{{$element->id}}">
                            <svg width="4em" height="4em" viewBox="0 0 16 16" class="bi bi-plus-circle" fill="currentColor"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path fill-rule="evenodd"
                                      d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                            </svg>
                        </button>
                    </div>
                </div>
            @endforeach
        </form>
    </div>
    <div id="buttonContainer" class="mt-4">
        <a href="{{route('create_drink_view')}}">
            <svg width="4em" height="4em" viewBox="0 0 16 16" class="bi bi-plus-circle" fill="currentColor"
                 xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path fill-rule="evenodd"
                      d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
            </svg>
        </a>
    </div>


    <script type="text/javascript">
        $('.livesearch').select2({
            placeholder: 'Suchen',
            ajax: {
                url: '/Anbieter/Geschaeft/Getraenk/Vorschlag',
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text: item.name,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        });
    </script>
@endsection
