<html>
    <title>Liste des Films</title>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/js/app.js'])
</head>
<body>
    <h1 onclick="test()">Liste des Films :</h1>
    <ul class="list-group" style="width: fit-content;">
    @foreach( $films as $film)
        <li class="list-group-item list-group-item-primary">{{ $film['titre'] }}, {{ $film['year'] }}</li> 
    @endforeach
    </ul>
    <script src="{{asset('/js/perso1.js')}}"></script>
</body>
</html>
