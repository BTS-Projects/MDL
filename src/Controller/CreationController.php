<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

class CreationController extends AbstractController
{
    /**
     * @Route("/creation", name="app_creation")
     */
    public function index(): Response
    {
        return $this->render('creation/index.html.twig', [
            'controller_name' => 'CreationController',
        ]);
    }
    
//    public function creer(Request $request, EntityManagerInterface $manager) {
//        $form
//    }
}
