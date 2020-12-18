<!-- Bootstrap Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>

<!-- Bootstrap Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<style>
    .star {
        margin-right:-5px;
    }

    .half_star {
        margin-right:-8px;
    }

    .anb_list{
        border-top:1px solid black;
        border-bottom:1px solid black;
    }

</style>

<?php $anbieter_arr=array("Zuhause"=>"250m entfernt",
    "Würgeengel"=>"250m",
    "PapperlaPub "=>"950m",
    "Hell Club"=>"3,5km",
    "Apollo Kino & Bar"=>"600m"
);
?>

@foreach($anbieter_arr as $key => $value)
    <!--
    {{ $rand_float=round(rand(0,10)/10,2)}}
    {{ $rand_int=rand(1,4)}}
    {{ $random_bew = ($rand_int + $rand_float)}}
    {{ $random_bew_anz = rand(10,150)}}
    {{ $half_star = 0 }}
        -->
    <div class="container-fluid anb_list">
        <div class="row">
            <div class="col-3">
                <img src="{{ asset('storage/default.png') }}" width="85" height="85">
            </div>
            <div class="col-5">
                <h6><u><a href="#" class=" text-dark">{{ "$key" }}</a></u></h6>
                <p class="text-muted">{{"▼ $value entfernt"}}</p>
            </div>
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
                        <img  class="star" src="https://img.icons8.com/metro/8/000000/star.png"/>
                    @endfor
                    <sub>({{$random_bew_anz}})</sub></p>
            </div>

        </div>
    </div>
@endforeach

<div style="bottom: 0px; " class="sticky-top bg-white">
    <button type="submit" name="filter_button" id="btn1" class="btn btn-outline-dark ">Mehr</button>
    <div class="container-fluid bew">
        <div class="row bew_head">
            <div class="col">
                <strong><h4>Bewertungen</h4></strong>
            </div>
            <div class="col">
                <a href="#" style="color:black;">Bewertung schreiben ></a>
            </div>

        </div>
        <div class="row bew_placehold">
            <div class="col">
                <h4> [Hier soll die Bewertung stehen] </h4>
            </div>
        </div>
    </div>
</div>

