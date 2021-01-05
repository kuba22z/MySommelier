<!--
<div class="sticky-top">
    include('layout.navbar')
</div>
-->
@extends('dominik_master')
@push('styles')
    <link rel="stylesheet" href="{{ url('/css/callBusiness.css') }}"> <!-- CCS File ist in public/css -->
@endpush
@section('content')
    @php
        $rand_float=round(rand(0,10)/10,2);
         $rand_int=rand(1,4);
        $random_bew = ($rand_int + $rand_float);
         $random_bew_anz = rand(10,150);
        $half_star = 0 ;
    @endphp
    <div class="container">
        @foreach($provider as $value)
            <div id="topInfoContainer" class="row p-3">
                <div class="col-5" id="imageAndFBButtonContainer">
                    <img id="bImage" class="img-fluid" src="{{asset($value->image)}}" onerror=this.src="{{asset('storage/default.png')}}">
                    <a id="fbButton" class="btn mintButton mt-2" href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" target="_blank">
                        <img class="img-fluid"  src="{{asset('storage/facebook.png')}}" alt="Facebook"> Share
                    </a>
                </div>
                <div class="col-7" id="infosContainer">
                    <h4>{{$value->businessName}}</h4>
                    <div id="ratingsContainer">
                        <span>{{ $random_bew }}</span>
                        <span>
                        @for ($i = 1; $i <= floor($random_bew); $i++)
                                <img src="https://img.icons8.com/material-rounded/8/000000/star.png">
                        @endfor
                        @for ($i = ceil($random_bew); $i <= 5; $i++)
                                <img src="https://img.icons8.com/metro/8/000000/star.png">
                        @endfor
                        </span>
                        <span>
                        <!--<a href="?bew=1">-->{{ $random_bew_anz }}<!--</a>-->
                        </span>
                    </div>
                    <div id="adressContainer" class="row">
                        <div class="col-2 pr-0">
                            <img class="img-fluid" src="{{ url('img/marker.svg') }}">
                        </div>
                        <div class="col-10 adressTextContainer">
                            <a href="https://maps.google.com/?q={{$value->street}}, {{$value->zip}} {{$value->city}}">
                                {{$value->street}}<br>
                                {{$value->zip}}
                                {{$value->city}}<br>
                            </a>
                        </div>
                    </div>
                    <br>
                    <div id="hoursContainer" class="row">
                        <div class="col-2 pr-0">
                            <img class="img-fluid" src="{{ url('img/clock.svg') }}">
                        </div>
                        <div class="col-10">
                            @foreach(explode(';',$value->openingHours) as $day)
                                {{$day}}
                                @if (!$loop->last) <br> @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div id="description">
                    {{$value->description}}
                </div>
            </div>
            @break
        @endforeach
        <div class="row textBox">
            <i>{{ $text }}</i>
        </div>
        @foreach($provider as $drink)
            @if(empty($drink->name))
                @break
            @endif

            <div class="row drinkRow pb-2 py-1">
                <img class="col-3 img-fluid" src="{{asset($drink->drinksImage)}}">
                <div class="col-9 row">
                    <div class="col-7">
                        <span class="drinkName">{{ $drink->name }}</span> <!-- link -->
                        <br>
                        <span>{{$drink->type}} {{$drink->alcoholContent}}% Vol.</span>
                    </div>
                    <div class="col-5 drinkStars">
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
                            <sub>({{$random_bew_anz}})</sub>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="row">
            <form class="p-0" method="GET" action="{{route('callBusiness_view',$id)}}">
                <button id="getCardButton" type="submit" class="btn mintButton" value="{{$showAllDrinks}}" name="Getraenkekarte">{{$button}}</button>
            </form>
        </div>
        @if($showAllDrinks==='1')
            <div id="bew" class="row textBox">
                <b>Bewertungen</b>
            </div>
            <div class="row ratingRow">
                <div class="col-4">
                    <p class="text-muted">
                        @for ($i = 1; $i <= floor($random_bew); $i++)
                            <img src="https://img.icons8.com/material-rounded/8/000000/star.png">
                        @endfor
                        @for ($i = ceil($random_bew); $i <= 5; $i++)
                            <img src="https://img.icons8.com/metro/8/000000/star.png">
                        @endfor
                        <br>
                        <span class="date">20/03/2019</span>
                    </p>
                </div>
                <div class="col-8">
                    Meine Lieblingsbar!
                </div>
            </div>
                <div class="row ratingRow">
                    <div class="col-4">
                        <p class="text-muted">
                            @for ($i = 1; $i <= floor($random_bew); $i++)
                                <img src="https://img.icons8.com/material-rounded/8/000000/star.png">
                            @endfor
                            @for ($i = ceil($random_bew); $i <= 5; $i++)
                                <img src="https://img.icons8.com/metro/8/000000/star.png">
                            @endfor
                            <br>
                            <span class="date">20/03/2019</span>
                        </p>
                    </div>
                    <div class="col-8">
                        Nicht so cool hier :(
                    </div>
                </div>
        @endif
    </div>


    @include("auth.registration")
    @include('auth.pswreset')
    @include("auth.login")
@endsection
