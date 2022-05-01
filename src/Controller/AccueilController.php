<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\AtelierRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Repository\HotelRepository;

class AccueilController extends AbstractController{
 
    /**
     * @Route("/accueil", name="app_accueil");
     */
public function index(): Response {
        return $this->render('/accueil/index.html.twig', [
                    'controller_name' => 'AccueilController',
        ]);
    }

    /**
     * @Route("/accueil_atelier", name="atelier_accueil");
     * @Route("/");
     */
public function accueilAtelier(AtelierRepository $repo,HotelRepository $repoH ){
    
    $lesAteliers = $repo->findAll();
    $lesHotels = $repoH->findAll();
            return $this->render('accueil/index.html.twig', 
                    ['lesAteliers' =>$lesAteliers, 
                     'lesHotels' => $lesHotels,
                        ]);}


}