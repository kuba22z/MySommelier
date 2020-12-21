<div class="sticky-top">
    @include('layout.navbar')
</div>
@php
    $rand_float=round(rand(0,10)/10,2);
     $rand_int=rand(1,4);
    $random_bew = ($rand_int + $rand_float);
     $random_bew_anz = rand(10,150);
    $half_star = 0 ;
@endphp

@foreach($provider as $value)
    {{$value->businessName}} <br>


    <img src="{{asset($value->image)}}" onerror=this.src="{{asset('storage/default.png')}}"> <br>
    <!--<div class="fb-share-button" id="share_fb" data-href="https://cybersommelier.de" data-layout="button" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fcybersommelier.de%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>-->
    <button type="button" onclick="var win = window.open('https://de-de.facebook.com/', '_blank'); win.focus();"
            name="share_fb" id="share_fb" class="btn btn-outline-dark"><img src="{{asset('storage/facebook.png')}}">
        <p> Share</p></button><br>
    <a href="https://maps.google.com/?q={{$value->zip}}, {{$value->city}}, {{$value->street}}">
        {{$value->street}}<br>
        {{$value->zip}}
        {{$value->city}}<br></a>
    @foreach(explode(';',$value->openingHours) as $day)
        {{$day}}<br>
    @endforeach
    {{$value->description}}<br><br>


    @break
@endforeach


@foreach($provider as $drink)
    @if(empty($drink->name))
        @break
    @endif
    @if($loop->first)
        {{$text}}<br>
    @endif

    <img src="{{asset($drink->drinksImage)}}" onerror=this.src="{{asset('storage/default.png')}}" width="100px">
    {{$drink->name}}
    {{$drink->type}}
    {{$drink->alcoholContent}}
    <br>


    <div class="col-3.5">
        <p class="text-muted">
            @for($i = $random_bew; $i >= 1; $i--)
                <img class="star" src="https://img.icons8.com/material-rounded/8/000000/star.png"/>
            @endfor
            @if($rand_float >= 0.1 && $rand_float <= 0.9)
                <img class="half_star" src="https://img.icons8.com/material-rounded/8/000000/star-half.png"/>
            <!-- {{$half_star = 1}} -->
            @else
            <!-- {{$half_star = 0}} -->
            @endif
            @for($i = (5-$random_bew)-$half_star; $i > 0; $i--)
                <img class="star" src="https://img.icons8.com/metro/8/000000/star.png"/>
            @endfor
            <sub>({{$random_bew_anz}})</sub></p>
    </div>


@endforeach

<form method="GET" action="{{route('callBusiness_view',$id)}}">
    <button type="submit" class="btn btn-primary" value="{{$showAllDrinks}}" name="Getraenkekarte"
            id="card">{{$button}}</button>
</form>

@if($showAllDrinks==='1')
    {{"Bewertungen"}}


    <div class="col-3.5">
        <p class="text-muted">
            @for($i = $random_bew; $i >= 1; $i--)
                <img class="star" src="https://img.icons8.com/material-rounded/8/000000/star.png"/>
            @endfor
            @if($rand_float >= 0.1 && $rand_float <= 0.9)
                <img class="half_star" src="https://img.icons8.com/material-rounded/8/000000/star-half.png"/>
            <!-- {{$half_star = 1}} -->
            @else
            <!-- {{$half_star = 0}} -->
            @endif
            @for($i = (5-$random_bew)-$half_star; $i > 0; $i--)
                <img class="star" src="https://img.icons8.com/metro/8/000000/star.png"/>
            @endfor
            <sub>({{$random_bew_anz}})</sub></p>
    </div>

@endif

@include("auth.registration")
@include('auth.pswreset')
@include("auth.login")
