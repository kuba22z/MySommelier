<style>
    h1 {
        margin-left: auto;
    }
</style>

<div class="sticky-top">
    @include('layout.navbar')
</div>
<body>
<h1> Getränke meiner Karte hinzufügen</h1>
<form method="GET" action="{{route('search_drink')}}">
    @csrf
    <div class="form-group">
        <input type="text" class="form-control" id="name" name="name" placeholder="Suchen">
    </div>
    <br>
    <button type="submit" class="btn btn-primary" id="search">Suchen</button>
    <a href="{{route('EANscan_view')}}">
        <button type="button" class="btn btn-primary" id="EAN"> EAN Scan</button>
    </a>


</form>
<form method="POST" action="{{route('addDrink')}}">
    @csrf

    @foreach($row as $element)
        @foreach($element as $key => $value)
            @if($key==='image')
                <img src="{{$value}}" alt="">
            @elseif($key!=='id')
                {{$value}}
            @endif
        @endforeach
        <input type="hidden" name="name" hidden value="{{$element->name}}">
        <button type="submit" name="id" value="{{$element->id}}">
            <svg width="4em" height="4em" viewBox="0 0 16 16" class="bi bi-plus-circle" fill="currentColor"
                 xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path fill-rule="evenodd"
                      d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
            </svg>
        </button>

    @endforeach
</form>
    <button >
        <svg width="4em" height="4em" viewBox="0 0 16 16" class="bi bi-plus-circle" fill="currentColor"
             xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
            <path fill-rule="evenodd"
                  d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
        </svg>
    </button>
</body>
