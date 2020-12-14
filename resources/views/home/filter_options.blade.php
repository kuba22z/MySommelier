<!DOCTYPE html>
<html>
<head>
	<title></title>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <style>
            .filter_opt{
                margin: 0 auto;
                padding-top:20px;
                padding-bottom:20px;

            }

            .filter_opt select {
                width:100%;
            }

            label {
                line-height: 0px;
                display: block;
                margin-top: 10px;
                text-align: center;
            }

            #alkgehalt_label{
                display: block;
            }

            #alkoholgehalt1 {
                margin-right:-1.5px;
                width:50%;
            }

            #alkoholgehalt2 {
                width:50%;
            }

            .star_filter {
                padding-right:10px;
            }
            .star_filter:last-child{
                padding-right:0px;
            }



        </style>
</head>
<body>
<form action="{{URL::to('/')}}filter_options" method="post">
<!-- https://www.w3schools.com/tags/tag_label.asp -->
    <div class="row filter_opt">
        <div class="col">
            <label for="prod_select">Produkte</label>
            <select name="prod_select" id="prod_select">
                <option value="all">Alle</option>
                <option value="Bier">Bier</option>
                <option value="Wein">Wein</option>
            </select>
        </div>
        <div class="col">
            <label for="art_select">Art</label>
            <select name="art_select" id="art_select">
                <option value="all">Alle</option>
                <option value="Mischbier">Mischbier</option>
                <option value="Pils">Pils</option>
                <option value="Vollbier">Vollbier</option>
                <option value="Riesling">Riesling</option>
                <option value="Weizen">Weizen</option>
                <option value="Weissbier">Weissbier</option>
            </select>
        </div>
        <div class="w-100"></div>
        <div class="col">
            <label for="herkunft_input">Herkunft</label>
            <input type="text" id="herkunft_input" name="herkunft_input" class="form-control mt-1" placeholder="Deutschland">
        </div>
        <div class="col">
            <div>
                <label id="alkgehalt_label" for="alkoholgehalt">Alkoholgehalt</label>
                <input type="range" id="alkoholgehalt1" name="alkoholgehalt1" min="0" max="9" value="0"><input type="range" id="alkoholgehalt2" name="alkoholgehalt2" min="10" max="20" value="20">
            </div>
        </div>
        <div class="w-100"></div>
        <div class="col">
            <label for="inhaltsstoffe_input">Inhaltsstoffe</label>
            <input type="text" id="inhaltsstoffe_input" name="inhaltsstoffe_input" class="mt-1">
            <input type="checkbox" id="keine_allergene_checkbox"><p style="display:inline; padding-left: 10px;">Keine Allergene</p>
        </div>
        <div class="col">
            <label for="bewertung">Bewertung</label>
            <input type="range" id="bewertung" name="bewertung" min="1" max="5"><br>
            @for($i=1; $i<=5; $i++)
                <img class="star_filter" src="https://img.icons8.com/material-rounded/24/000000/star.png"/>
            @endfor
            <!--
            <img src="https://img.icons8.com/metro/24/000000/star.png"/><img src="https://img.icons8.com/metro/24/000000/star.png"/>
            <img src="https://img.icons8.com/material-rounded/24/000000/star.png"/>
            <img src="https://img.icons8.com/material-rounded/24/000000/star-half.png"/>
            -->
        </div>
    </div>
</form>
</body>
</html>

