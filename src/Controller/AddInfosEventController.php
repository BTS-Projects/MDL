<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AddInfosEventController extends AbstractController
{
    /**
     * @Route("/add/infos/event", name="app_add_infos_event")
     */
    public function index(): Response
    {
        return $this->render('add_infos_event/index.html.twig', [
            'controller_name' => 'AddInfosEventController',
        ]);
    }
}
