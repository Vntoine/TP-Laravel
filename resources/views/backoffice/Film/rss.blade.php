@php
    $nb = 1;
    $image = '';
@endphp
<div class='accordion' id='accordionAccueil'>
    @isset($xml1)
        <div class='accordion-item'>
            <h2 class='accordion-header' id='headingAlloCine'>
            <button class='accordion-button' type='button' data-bs-toggle='collapse' data-bs-target='#collapseAlloCine' aria-expanded='true' aria-controls='collapseAlloCine'>
                <h4>ALLO AlloCine</h4>
            </button>
            </h2>
            <div id='collapseAlloCine' class='accordion-collapse collapse show' aria-labelledby='headingAlloCine' data-bs-parent='#accordionAccueil'>
                <div class='accordion-body'>
                    <h2>{{ $xml1->channel->title }}</h2>
                    <div class="container-fluid bg-dark">
                        <div class="d-flex flex-row flex-wrap justify-content-left mb-3">
                            @foreach($xml1->channel->item as $item)
                                <div class="card text-white bg-dark col-12 col-sm-6 col-lg-4">
                                    <div class="card-body">
                                        <h3 class="card-title">{{ $item->title }}</h3>
                                        <a href="{{ $item->link }}" class="card-link">LIEN</a>
                                        {!! $item->description !!}
                                    </div>
                                    <img class="card-img-bottom" src="{{ $item->enclosure['url'] }}" alt="Card image cap">
                                </div>
                                @if ($nb==6)
                                    @break
                                @endif
                                @php($nb++)
                            @endforeach
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    @endisset
    @isset($xml2)
        <div class='accordion-item'>
            <h2 class='accordion-header' id='headingLeMonde'>
            <button class='accordion-button' type='button' data-bs-toggle='collapse' data-bs-target='#collapseLeMonde' aria-expanded='true' aria-controls='collapseLeMonde'>
                <h4>FLUX LeMonde</h4>
            </button>
            </h2>
            <div id='collapseLeMonde' class='accordion-collapse collapse' aria-labelledby='headingLeMonde' data-bs-parent='#accordionAccueil'>
                <div class='accordion-body'>
                <h2>{{ $xml2->channel->title }}</h2>
                <div class="container-fluid bg-dark">
                        <div class="d-flex flex-row flex-wrap justify-content-left mb-3">
                            @php($nb=1)
                            @foreach($xml2->channel->item as $item)
                                <div class="card text-white bg-dark col-12 col-sm-6 col-lg-4">
                                    <div class="card-body">
                                        <h3 class="card-title">{{ $item->title }}</h3>
                                        <a href="{{ $item->link }}" class="card-link">LIEN</a>
                                        <p>{{ $item->description }}</p>
                                    </div>
                                    <?php
                                    $image = '';
                                    foreach ($item->children('media', true) as $k => $v) {
                                        $attributes = $v->attributes();
                                        if (count($attributes) == 0) {
                                            continue;
                                        } else {
                                            $image = $attributes->url;
                                        }} 
                                    ?>

                                    <img class="card-img-bottom" src="{{$image}}" alt="text alternatif">
                                </div>
                                @if ($nb==6)
                                    @break
                                @endif
                                @php($nb++)
                            @endforeach
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    @endisset
</div>