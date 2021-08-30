<?php

namespace App\Service;

use App\Entity\Film;
use Doctrine\ORM\EntityManagerInterface;
use Exception;

class FilmService {

    private $em;

    public function __construct(EntityManagerInterface $em) 
    {
        $this->em = $em;
    }

    public function updateCoutFilm(string $titre) : Film
    {
      
        $film = $this->em->getRepository(Film::class)->findOneBy([
            'titre' => $titre
        ]);

        if ($film == null) {
            
            throw new Exception('Mauvais titre de film');    
        }
        

        $film->run();

        $this->em->persist($film);
        $this->em->flush();

        return $film;
    }

}

?>