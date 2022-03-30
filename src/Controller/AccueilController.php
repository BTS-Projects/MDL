<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\AtelierRepository;
use Doctrine\Persistence\ManagerRegistry;

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
     * @return type
     */
public function accueilAtelier(AtelierRepository $repo){
    
    $types = $repo->findAll();
            return $this->render('accueil/index.html.twig', 
                    ['ateliers' =>$types,
                        ]);}


}