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
    
    public function register(Request $request, UserPasswordEncoderInterface $userPasswordEncoder, GuardAuthenticatorHandler $guardHandler, ApplicationAuthenticator $authenticator, EntityManagerInterface $entityManager) : Response {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
            $userPasswordEncoder->encodePassword(
                    $user,
                    $form->get('password')->getData()
                )
            );
            
            $user->setRoles(["ROLE_INSCRIT"]);
            $entityManager->persist($user);
            $entityManager->flush();
            
            // generate a signed url and email it to the user
            $this->emailVerifier->sendEmailConfirmation('app_verify_email', $user,
                (new TemplatedEmail())
                    ->from(new Address('admin@navire.sio', 'Admin'))
                    ->to($user->getEmail())
                    ->subject('Please Confirm your Email and Inscription')
                    ->htmlTemplate('creation/confirmation_email.html.twig')
            );
            
             return $guardHandler->authenticateUserAndHandleSuccess(
                $user,
                $request,
                $authenticator,
                'main' // firewall name in security.yaml
            );
        }
    }
                
}
