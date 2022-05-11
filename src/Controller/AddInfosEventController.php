<?php

namespace App\Controller;

use App\Entity\Atelier;
use App\Entity\Theme;
use App\Entity\Vacation;
use App\Form\AddInfosType;
use App\Form\AtelierType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AddInfosEventController extends AbstractController
{
    /**
     * @Route("/add/infos/event", name="app_add_infos_event")
     */
    public function index(Request $request, EntityManagerInterface $manager): Response
    {
        $choice = '';
        $form = $this->createForm(AddInfosType::class);
        $form->handleRequest($request);
        
        return $this->render('add_infos_event/index.html.twig', [
            'form' => $form->createView(),
            'choice' => $choice,
        ]);
    }
    /**
     * @Route("/add/infos/event/atelier", name="app_add_infos_event_atelier")
     */
    public function addAtelier(Request $request, EntityManagerInterface $manager): Response {
        $atelier = new Atelier();
        $form = $this->createForm(AtelierType::class, $atelier);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $manager->persist($atelier);
            $manager->flush();
            return $this->redirectToRoute('app_accueil');
        }
        return $this->render('add_infos_event/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    public function addTheme(Request $request, EntityManagerInterface $manager): Response {
        $atelier = new Theme();
    }
    public function addVacation(Request $request, EntityManagerInterface $manager): Response {
        $atelier = new Vacation();
    }
}
