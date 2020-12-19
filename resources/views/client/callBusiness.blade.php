<div class="sticky-top">
    @include('layout.navbar')
</div>


@foreach($provider as $value)
    {{$value->businessName}} <br>


    <img src="{{asset($value->image)}}" onerror=this.src="{{asset('storage/default.png')}}"> <br>
    <!--<div class="fb-share-button" id="share_fb" data-href="https://cybersommelier.de" data-layout="button" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fcybersommelier.de%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>-->
    <button type="button" onclick="var win = window.open('https://de-de.facebook.com/', '_blank'); win.focus();" name="share_fb" id="share_fb" class="btn btn-outline-dark"><img src="{{asset('storage/facebook.png')}}"><p> Share</p></button><br>
    <a href="https://maps.google.com/?q={{$value->zip}}, {{$value->city}}, {{$value->street}}">
       {{$value->street}}<br>
        {{$value->zip}}
    {{$value->city}}<br></a>
    {{$value->openingHours}}<br>
    {{$value->description}}<br><br>


    @break
@endforeach
{{$text}}<br>

@foreach($provider as $drink)

    {{$drink->name}}
    {{$drink->type}}
    {{$drink->alcoholContent}}
    <br>
@endforeach

<form method="GET" action="{{route('callBusiness_view',$id)}}">
    <button type="submit" class="btn btn-primary" value="{{$showAllDrinks}}" name="Getraenkekarte" id="card">{{$button}}</button>
</form>
@if($showAllDrinks==='1')
{{"Bewertungen"}}



@endif

@include("auth.registration")
@include('auth.pswreset')
@include("auth.login")
