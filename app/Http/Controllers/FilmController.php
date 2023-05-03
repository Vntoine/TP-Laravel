<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Film;

class FilmController extends Controller
{
    public function index(Request $request)
    {
        return '<ul>
            <li>Babylon</li>
            <li>Juste ciel !</li>
            <li>Avatar 2</li>
        </ul>';
    }
    public function indexGenre(Request $request, $genre)
    {
        $input = $request->input(); // récupère tous les input de la requête
        $sort = $input['sort'] ?? 'asc' ; // récupère l'input sort si non présent on affecte asc
        $html = "List des films du genre : <strong>{$genre}</strong>";
        if (strcasecmp($genre, "comédie") == 0) {
            switch ($sort)
            {
                case ('asc'):
                    $html =$html."
                    <br/>
                    <ul>
                        <li>Babylon</li>
                        <li>Juste ciel !</li>
                    </ul>";
                case ('desc'):
                    $html =$html."
                    <br/>
                    <ul>
                        <li>Juste ciel !</li>
                        <li>Babylon</li>
                    </ul>";
            }
        }
        else{
            if (strcasecmp($genre, "Sciences-Fiction") == 0) {
                $html =$html."
                <br/>
                <ul>
                    <li>Avatar 2</li>
                </ul>";
            }
            else{ 
                $html =$html."
                <br/>Pas de films trouvés";
            }          
        }
        $html=$html.
            '<br/>uri :'.urldecode($request->path())
            .'<br/>url :'.urldecode($request->url())
            .'<br/>full url :'.urldecode($request->fullUrl())
            .'<br/>méthode :'.$request->method()
            ;
        $html=$html.'<br/><br/>Récupération de toutes les entête :<br/>';

        foreach ($request->header()  as $key => $value) {
            $html=$html.$key.' : '.$value[0].'<br/>';
            }
        $html=$html.'<br/><br/>Récupération d"une entete spécifique :<br/>';
        $headers['cacheControl'] = $request->headers->get('Cache-Control');
        $html=$html.'cacheControl : '.$headers['cacheControl'];
        $response = new Response($html);
        return $response;
    }
    public function __construct()
    {
       // $this->middleware('auth'); // ou $this->middleware('auth')->only(['create', 'update']);
       return true;
      // return false;
    }

    public function afficheFilms()
    {    //On simule l'acces au Model pour récupérer la liste des Films
        $films = [
            [
                'titre' => 'Babylon', 'year' => 2023
            ],
            [
                'titre' => 'Avatar 2', 'year' => 2022
            ]
        ];
        //appel de la vue listFilms en lui passant la liste des films
        return response()->view('backoffice.Film.listFilms', ['films' => $films]);
    }
    public function fluxRSS(){
        $xml1 = simplexml_load_file("https://www.allocine.fr/rss/news-cine.xml") or die("Error: Cannot create object");
        $xml2 = simplexml_load_file("https://www.lemonde.fr/cinema/rss_full.xml") or die("Error: Cannot create object");
        $vue = 'backoffice.film.rss';
        return view('backoffice.accueil',compact('xml1','xml2'),[
            'title'=>'Flux RSS - Laravel','includeviews'=>false,'vue'=>$vue,
        ]);
    }
    public function afficheFilmListe(){
        $jshead='
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.21.3/dist/bootstrap-table.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.21.3/dist/bootstrap-table.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.21.3/dist/extensions/mobile/bootstrap-table-mobile.min.js"></script>
    <script src="'.asset('js/tableFilm.js').'"></script>';
        $vues=array('backoffice.film.index','backoffice.modal.modalmessage','backoffice.modal.modalyt');
        $films=Film::with('genres','bandes_annonce')->orderBy('titre')->get();
        return view('backoffice.accueil',compact('films'),[
            'title'=>'Liste des films','jshead'=>$jshead,'includeviews'=>true,'vues'=>$vues,
        ]);
    }
    public function article(){
        $vue = 'backoffice.film.article';
        return view('backoffice.accueil',[
            'title'=>'Liste des articles - Laravel','includeviews'=>false,'vue'=>$vue,
        ]);
    }
}
