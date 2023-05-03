<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccueilController extends Controller
{
    public function index(Request $request)
    {
        return view('backoffice.accueil', [
            'user' => $request->user(),
            'title'=>'Accueil',
            'contentviacontroller'=>$this->carousel(),
        ]);

    }
    public function carousel()
    {
        $retour='
        <div class="row align-items-center bg-dark">
            <div class="col-lg-12">
				<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
					<div class="carousel-inner">
						<div class="carousel-item active">
                            <div class="d-flex justify-content-center">
							    <img class="d-block" src="/media/image/films/avatar2.jpg">
                            </div>
						</div>
						<div class="carousel-item">
                            <div class="d-flex justify-content-center">
								<img class="d-block" src="/media/image/films/Top_Gun_maverick.jpg">
							</div>
                        </div>
						<div class="carousel-item">
                            <div class="d-flex justify-content-center">
								<img class="d-block" src="/media/image/films/joker.jpg">
							</div>
                        </div>
						<div class="carousel-item">
                            <div class="d-flex justify-content-center">
							    <img class="d-block" src="/media/image/films/fabelmans.jpg">
						    </div>
                        </div>
						<div class="carousel-item">
                            <div class="d-flex justify-content-center">
							    <img class="d-block" src="/media/image/films/asada.jpg">
						    </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
					</div>
				</div>
			</div>
        </div>';
        return $retour;
    }

}
