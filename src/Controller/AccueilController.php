<?php

namespace App\Controller;

use App\Repository\AtelierRepository;
use App\Repository\CategorieChambreRepository;
use App\Repository\HotelRepository;
use App\Repository\ProposerRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController {

    /**
     * @Route("/", name="app_accueil");
     */
    public function index(AtelierRepository $repo, HotelRepository $repoH, ProposerRepository $repoP, CategorieChambreRepository $repoC): Response {
        $lesAteliers = $repo->findAll();
        $lesHotels = $repoH->findAll();
        $proposers = $repoP->findAll();
        $categories = $repoC->findAll();
        return $this->render('accueil/index.html.twig',[
            'lesAteliers' => $lesAteliers,
            'lesHotels' => $lesHotels,
            'proposers' => $proposers,
            'categories' => $categories,
        ]);
    }

}
