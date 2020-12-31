<!DOCTYPE html>
<html>

<head>
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>

        .container-fluid{
            padding-top:10px;
            padding-bottom:10px;

            border-top: 2px solid black;
            border-bottom: 1px solid black;
        }

        .searchbar{
            background-color:white;
        }

        #search_input{
            border-radius: 50px;
        }

        #btn{
            width:6em;
            background-color:#00b5ad;
        }

        #btn1{
            width:100%;
            background-color:#00b5ad;
        }

        .bew_head {
            border-bottom:2px solid black;
        }

        .bew{
            border-bottom:none;
        }
        #searchbar_header > .col {
            padding-left: 5px;
            padding-right: 5px;
        }
        #welcome_text {
            text-align: center;
            background-color: white;
        }

        /*       #iframe_container iframe{
                   display:block;
                   background-color: white;
               }

               #iframe_container {
                   position: fixed;
                   left: 0%;
                   right: 0%;
                   top: 0%;
                   margin-top: 0%;
               }*/

    </style>

    <script>
        function toggleVis(){

            $("#toggle").toggle();
            $(".toggle_text_on_filter").toggle();
        }



    </script>


    <!--<div class="input-group-prepend">
        <span class="mt-2 md-2 input-group-text"><svg width="13" height="13" viewBox="0 0 13 13"><title>search</title><path d="m4.8495 7.8226c0.82666 0 1.5262-0.29146 2.0985-0.87438 0.57232-0.58292 0.86378-1.2877 0.87438-2.1144 0.010599-0.82666-0.28086-1.5262-0.87438-2.0985-0.59352-0.57232-1.293-0.86378-2.0985-0.87438-0.8055-0.010599-1.5103 0.28086-2.1144 0.87438-0.60414 0.59352-0.8956 1.293-0.87438 2.0985 0.021197 0.8055 0.31266 1.5103 0.87438 2.1144 0.56172 0.60414 1.2665 0.8956 2.1144 0.87438zm4.4695 0.2115 3.681 3.6819-1.259 1.284-3.6817-3.7 0.0019784-0.69479-0.090043-0.098846c-0.87973 0.76087-1.92 1.1413-3.1207 1.1413-1.3553 0-2.5025-0.46363-3.4417-1.3909s-1.4088-2.0686-1.4088-3.4239c0-1.3553 0.4696-2.4966 1.4088-3.4239 0.9392-0.92727 2.0864-1.3969 3.4417-1.4088 1.3553-0.011889 2.4906 0.45771 3.406 1.4088 0.9154 0.95107 1.379 2.0924 1.3909 3.4239 0 1.2126-0.38043 2.2588-1.1413 3.1385l0.098834 0.090049z"></path></svg></span>
    </div>-->

    <!-- https://getbootstrap.com/docs/4.0/utilities/position/ -->
</head>

<body>
<div class="sticky-top bg-white">

    @include('layout.navbar')
    <form class="container-fluid searchbar" action="{{route('search_in_home')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col">

                <strong><h6 id="welcome_text" class="toggle_text_on_filter">
                        Jetzt gewähltes Getränk<br>in Deiner Umgebung finden</h6></strong>
            </div>
        </div>
        <div class="row" id="searchbar_header">
            <div class="col">
                <input type="text" id="search_input" name="search_input" class="form-control mt-1 w-100" placeholder="🔍Suchen...">

            </div>
            <div class="col">
                <button type="button" onclick="toggleVis()" name="filter_button" id="btn" class="btn btn-outline-dark ml-1 mt-1 toggleButton w-100">Filter</button>
            </div>

            <div class="col">
                <button type="submit" name="search_button" id="btn" class="btn btn-outline-dark ml-1 mt-1 w-100">Suchen</button>
            </div>

        </div>

        <div id="toggle" style="display: none;">
            <div id="frame_container_filter">
                @include('home.filter_options')
            </div>
        </div>

    </form>


    @if(isset($_GET['info']) && $_GET['info'])
        <div id="frame_container">

            @include('home.getr_details')
        </div>
    @endif



</div>
@if($drinks->isEmpty())
    <div class="row">
        <div class="col">
            <br>
            <br>
            <strong><h4 id="welcome_text" class="toggle_text_on_filter" >
                    Keine Getränke gefunden</h4></strong>
        </div>
    </div>

@endif

@include("auth.registration")
@include("auth.pswreset")
@include("auth.login")


@if($drinks->isNotEmpty())
@if(isset($_GET['info']) && $_GET['info'])
    @include('home.anbieter_getr_liste')
    @include('home.bewertung')
@else
    @include('home.getr_liste', $drinks)
@endif
@endif

</body>
</html>
