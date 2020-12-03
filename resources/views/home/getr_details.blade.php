<!DOCTYPE html>
<html>
<head>
	<title></title>

    <style>
        .details {
                margin: 0 auto;
                padding-top:20px;
            }

        .getr_name {
            margin-bottom:0;
        }

        #share_fb {
            margin-top: 5px;
            width:150px;
            padding-top:0;
            padding-bottom:0;
        }

        #share_fb p {
            display:inline;
        }

        .getr_name {
            font-size:1.2rem;
        }

        .bew_zahl {
            font-size:1.2rem;
            display:inline;
        }
    </style>
</head>
<body>
<div id="fb-root"></div>
<!--<script async defer crossorigin="anonymous" src="https://connect.facebook.net/de_DE/sdk.js#xfbml=1&version=v9.0" nonce="Ufw8ZZh2"></script>-->
@foreach($drinks as $drink)
    <div class="row details">
        <div class="col">
            <img src="{{$drink->image}}" width=150 height=150>

            <!--<div class="fb-share-button" id="share_fb" data-href="https://cybersommelier.de" data-layout="button" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fcybersommelier.de%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>-->
            <button type="button" onclick="var win = window.open('https://de-de.facebook.com/', '_blank'); win.focus();" name="share_fb" id="share_fb" class="btn btn-outline-dark"><img src="{{ URL::to('/assets/img/facebook.PNG') }}"><p> Share</p></button>
        </div>
        <div class="col">

            <!--{{$bew_hinterkomma = $_GET['bew']-intval($_GET['bew'])}}-->
            <p class="dis">
                <strong><p class="getr_name">{{$_GET['info']}}</p></strong>
                <p class="bew_zahl">{{$_GET['bew']}}</p>
                @for($i = intval($_GET['bew']); $i >= 1; $i--)
                    <img class="star" src="https://img.icons8.com/material-rounded/16/000000/star.png"/>
                @endfor
                @if($bew_hinterkomma >= 0.1 && $bew_hinterkomma <= 0.9)
                    <img class="half_star" src="https://img.icons8.com/material-rounded/16/000000/star-half.png"/>
                <!-- {{$half_star = 1}} -->
                @else
                <!-- {{$half_star = 0}} -->
                @endif
                @for($i = (5-$_GET['bew'])-$half_star; $i > 0; $i--)
                    <img  class="star" src="https://img.icons8.com/metro/16/000000/star.png"/>
                @endfor

            <br>



                ▼ {{$drink->origin}}<br>
                🍺 {{$drink->type}}<br>
                <strong>%</strong> {{$drink->alcoholContent}}% Vol.
            </p>

        </div>
    </div>
@endforeach
</body>
</html>
