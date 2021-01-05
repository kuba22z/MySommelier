<h3 class="subTitle p-1" id="ratingsHeading">Meine Bewertungen</h3>
<div class="container" id="bewertungenContainer">
    @php $ratings = [['imageSrc' => 'storage/providersImage/Domkeller.jpeg', 'id' => 2, 'type' => 1, 'name' => 'Domkeller', 'stars' => 4, 'text' => 'Cooler Laden! Hier ist richtig cool!'],
                     ['imageSrc' => 'storage/drinksImage/beer/Hansa_Pils.png', 'id' => 5, 'type' => 0, 'name' => 'Hansa Pils', 'stars' => 3, 'text' => 'Sehr süffig aber cool 😎']]; @endphp
    @forelse($ratings as $b)
        @if ($b['imageSrc'] == '')
            @php $b['imageSrc'] = 'https://upload.wikimedia.org/wikipedia/commons/f/f1/Procyon_lotor_qtl2.jpg'; @endphp
        @endif
        @if ($b['type'] == 1)
            @php $link = url('') . '/Geschaeft/' . $b['id']; @endphp
        @else
            @php $link = url('') . '?info=' . $b['name'] . '&bew=4.1' . '&id=' . $b['id']; @endphp
        @endif
        <div class="row ratingRow mb-2 pb-1 px-4">
            <div class="col-3">
                <img class="img-fluid" src="{{ asset($b['imageSrc']) }}">
            </div>
            <div class="col-9 row">
                <div class="col-6 ratingName">
                    <a href="{{ $link }}">{{ $b['name'] }}</a>
                </div>
                <div class="col-6 ratingStars">
                    <span>
                        @for ($i = 1; $i <= $b['stars']; $i++)
                            <img src="https://img.icons8.com/material-rounded/8/000000/star.png">
                        @endfor
                        @for ($i = $b['stars'] + 1; $i <= 5; $i++)
                            <img src="https://img.icons8.com/metro/8/000000/star.png">
                        @endfor
                    </span>
                </div>
                <div class="col-12 ratingDescription">
                    {{ $b['text'] }}
                </div>
            </div>
        </div>
    @empty
        <div id="noRatings">Keine Bewertungen</div>
    @endforelse
</div>
