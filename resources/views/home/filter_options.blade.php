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

        #filter_row {
            padding-top: 5px;
            padding-bottom: 5px;
        }
    </style>

</head>
<body>



    <!-- https://www.w3schools.com/tags/tag_label.asp -->
    <div class="row filter_opt pl-0 pr-0" id="filter_row">
        <div class="col pl-1 pr-1">
            <label for="prod_select">Produkte</label>
            <select name="prod_select" id="prod_select">
                <option value="all">Alle</option>
                <option value="Bier">Bier</option>
                <option value="Wein">Wein</option>
            </select>
        </div>
        <div class="col pl-1 pr-1">
            <label for="art_select">Art</label>
            <select name="art_select" id="art_select">
                <option value="all">Alle</option>
                <option value="Mischbier">Mischbier</option>
                <option value="Pils">Pils</option>
                <option value="Vollbier">Vollbier</option>
                <option value="Riesling">Riesling</option>
                <option value="Weizen">Weizen</option>
                <option value="Weissbier">Weissbier</option>
                <option value="Weisswein">Weisswein</option>
                <option value="Rotwein">Rotwein</option>
                <option value="Glühwein">Glühwein</option>
            </select>
        </div>
    </div>
    <div class="row filter_opt pl-0 pr-0" id="filter_row">
        <div class="col pl-1 pr-1">
            <label for="herkunft_input">Herkunft</label>
            <input type="text" id="herkunft_input" name="herkunft_input" class="form-control mt-1" placeholder="Deutschland">
        </div>
        <div class="col pl-1 pr-1">
            <label id="alkgehalt_label" for="alkoholgehalt">Alkoholgehalt</label>
        </div>
    </div>
    <div class="row filter_opt pl-0 pr-0" id="filter_row">
        <div class="col pl-1 pr-1">
            <label for="inhaltsstoffe_input">Inhaltsstoffe</label>
            <input type="text" id="inhaltsstoffe_input" name="inhaltsstoffe_input" class="mt-1" placeholder="Zb.:Wasser,Sulfite">
            <input type="checkbox" id="keine_allergene_checkbox" name="keineAllergene" value="false"><p style="display:inline; padding-left: 10px;">Keine Allergene</p>
        </div>
        <div class="col pl-1 pr-1">
            <label for="bewertung">Bewertung</label>
            <input type="range" id="bewertung" name="bewertung" min="1" max="5"><br>
            @for($i=1; $i<=5; $i++)
                <img class="star_filter" src="https://img.icons8.com/material-rounded/26/000000/star.png"/>
            @endfor
        </div>
    </div>
</body>
</html>

