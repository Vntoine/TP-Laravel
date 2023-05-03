<h1>Liste des Films</h1>
<table id="table" data-toggle="table" data-search="true" data-search-highlight="true" data-mobile-responsive="true" data-check-on-init="true" data-pagination="true">
    <thead>
        <tr>
            <th data-sortable="true" data-field="titre">Titre</th>
            <th data-sortable="true" data-width="10" data-width-unit="%" data-field="year">Année</th>
            <th data-sortable="true" data-width="10" data-width-unit="%" data-field="note">Note</th>
            <th data-field="genre" data-width="20" data-width-unit="%" data-searchable="false">Genre</th>
            <th data-field="bandeAnnonce" data-visible="false" data-searchable="false">Bande Annonce</th>
            <th data-field="synopsis" data-visible="false" data-searchable="false">Synopsis</th>
            <th data-field="operate" data-width="10" data-width-unit="%" data-searchable="false" data-formatter="operateFormatter" data-events="operateEvents">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($films as $film)
            <tr>
                <td>{{$film->titre}}</td>
                <td>{{$film->year}}</td>
                <td>{{$film->notation}}</td>
                <td>

                @foreach ($film->genres as $genre)
                    @if($genre->pivot->principal)
                        <b>{{$genre->nom}} </b>
                    @else
                        {{$genre->nom}}
                    @endif
                @endforeach
                </td>
                <td>
                @if(isset($film->bandes_annonce->link))
                        {{$film->bandes_annonce->link}}
                @endif
                </td>
                <td>{{ $film->synopsis }}</td>
                <td></td>
            </tr>
    @endforeach
    </tbody>
</table>
