<?php

namespace App\Controller;

use App\Entity\Film;
use App\Form\FilmFormType;
use App\Service\FilmService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FilmController extends AbstractController
{

    /**
     * @Route("/film", name="films")
     */
    public function index(Request $request): Response
    {

        $film = new Film();
        $form = $this->createForm(FilmFormType::class, $film);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $titre = $form->getData()->getTitre();

            return $this->redirectToRoute('film', ['titre' => $titre]);
        }


        
        return $this->render('film/film.html.twig',[
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/film/{titre}", name="film")
     */
    public function coutFilm(FilmService $filmService, $titre): Response
    {
        $film = null;
        $erreur = '';
        try {
            $film = $filmService->updateCoutFilm($titre);
        } catch (\Exception $e) {
            $erreur = $e->getMessage();
        }
        

        return $this->render('film/index.html.twig',[
            'erreur' => $erreur,
            'film' => $film
        ]);
    }

}
