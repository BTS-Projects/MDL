<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UserRepository;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use App\Form\InscriptionType;
use App\Repository\LicencieRepository;
use App\Entity\Licencie;
use App\Entity\Compte;
use App\Repository\AtelierRepository;
class InscriptionController extends AbstractController
{
    /**
     * @Route("/inscription", name="app_inscription")
     */
    public function Inscription(UserRepository $repo,LicencieRepository $repoLicencie,AtelierRepository $repoAtelier){
        
//        $licencie = new Licencie;
//        $lesLicencies = $repoLicencie->findAll();
//        $user = $repo->findAll();
//        $i = 0;
//        while( $i < count($lesLicencies) && $lesLicencies[$i]->getNumlicence() != $user->getNumLicence() ) {
//            $i++;
//        }
//        if ($i < count($lesLicencies)) {
//            $licencie = $lesLicencies[0];//$i
//        }
        $lesAteliers =$repoAtelier->findAll();
        $form = $this->createForm(InscriptionType::class);
        return $this->render('inscription/inscription.html.twig',
                [   //'licencie'=>$licencie,
                    'lesAtelier'=>$lesAteliers,
                    'form'=>$form->createView()]);
    }
}
