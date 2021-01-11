<style>
    .star {
        margin-right: -5px;
    }

    .half_star {
        margin-right: -8px;
    }

    .gtr_list {
        border-top: 1px solid black;
        border-bottom: 1px solid black;
    }

</style>

<?php $getr_arr = array("A Marca Bavaria" => "Bier l 5 % Vol.",
    "Aass Bock Beer" => "Mischbier l 2,5 % Vol.",
    "Aass Genuine Pilsner" => "Mischbier l 2,5 Vol.",
    "Aass Juleøl Premium" => "Mischbier l 2,5 Vol.",
    "Aass Lauritz Pilsner" => "Bier l 5 % Vol.",
    "Abita Abbey Ale" => "Bier l 5 % Vol.",
    "Abita Amber" => "Mischbier l 2,5 Vol.",
    "Abita Fleur-de-Lis Restoration Ale" => "Mischbier l 2,5 Vol.",
    "Abita Jockamo IPA" => "Mischbier l 2,5 Vol.",
    "Abita Light" => "Mischbier l 2,5 Vol.");
?>

@php  $drinksEmpty=true;         @endphp

@if($drinks->isNotEmpty())
@foreach($drinks as $drink)



    @php  // damit keine Getränke angezeigt werden die Allergene Inhaltstoffe erhalten (Falls die Checkbox angeklickt wurde)    @endphp
    @if(!empty($drink->isAllergen) && $allergen===false && in_array(1,explode(',',$drink->isAllergen))===true)
        @continue
    @endif



   @php  // damit nur Getränke mit Substanzen angezeigt werden die im Input vorkommen    @endphp
    @if( !empty($substancesInput))
        @php $FalseSubstances=false @endphp
        @foreach($substancesInput as $substance)
            @if( in_array(strtolower($substance),array_map('strtolower',explode(',',$drink->substances)))!==true)
                @php $FalseSubstances=true @endphp
                @break
            @endif
        @endforeach
        @if($FalseSubstances===true)
            @continue
        @endif
    @endif
    <!--
    {{ $rand_float=round(rand(0,10)/10,2)}}
    {{ $rand_int=rand(1,4)}}
    {{ $random_bew = ($rand_int + $rand_float)}}
    {{ $random_bew_anz = rand(10,150)}}
    {{ $half_star = 0 }}
        -->

    <div class="container-fluid gtr_list">
        <div class="row mx-auto">

            <div class="col-3.5">
                <img src="{{ $drink->image }}" onerror=this.src="{{asset('storage/default.png')}}" width="85"
                     height="85">
            </div>
            <div class="col-6">
                <h6><u><a href="?info={{$drink->name}}&bew={{$random_bew}}&id={{$drink->id}}"
                          class=" text-dark">{{ $drink->name }}</a></u></h6>
                <p class="text-muted">{{ "$drink->type | $drink->alcoholContent % Vol." }}</p>
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
                        <img class="star" src="https://img.icons8.com/metro/8/000000/star.png"/>
                    @endfor
                    <sub>({{$random_bew_anz}})</sub></p>
            </div>

        </div>
    </div>

     @if(!empty($drink))
    @php   $drinksEmpty=false; @endphp
    @endif
    @endforeach
@endif

@if( $drinksEmpty==true )
    <div class="row">
        <div class="col">
            <br>
            <br>
            <strong><h4 id="welcome_text" class="toggle_text_on_filter" >
                    Keine Getränke gefunden</h4></strong>
        </div>
    </div>

@endif
