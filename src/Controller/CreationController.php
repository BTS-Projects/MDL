<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Form\CreationType;
use App\Entity\User;
use App\Security\ApplicationAuthenticator;
use App\Security\EmailVerifier;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;
use SymfonyCasts\Bundle\VerifyEmail\Exception\VerifyEmailExceptionInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;


class CreationController extends AbstractController {

    /**
     * @Route("/creation", name="app_creation")
     */
    public function index(): Response {
        return $this->render('creation/index.html.twig', [
                    'controller_name' => 'CreationController',
        ]);
    }
    
    /**
     * @Route("/create", name="app_register")
     */
    public function register(Request $request, UserPasswordEncoderInterface $userPasswordEncoder, GuardAuthenticatorHandler $guardHandler, EntityManagerInterface $entityManager): Response {
        $user = new User();
        $form = $this->createForm(CreationType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user->setNumLicence($fotm->get('numLicence')->getData());
            // encode the plain password
            $user->setMdp(
                    $userPasswordEncoder->encodePassword(
                            $user,
                            $form->get('password')->getData()
                    )
            );

//            $user->setRoles(["ROLE_INSCRIT"]);
//            $entityManager->persist($user);
//            $entityManager->flush();
//
//            // generate a signed url and email it to the user
//            $this->emailVerifier->sendEmailConfirmation('app_verify_email', $user,
//                    (new TemplatedEmail())
//                            ->from(new Address('admin@navire.sio', 'Admin'))
//                            ->to($user->getEmail())
//                            ->subject('Please Confirm your Email and Inscription')
//                            ->htmlTemplate('creation/confirmation_email.html.twig')
//            );
//
//            return $guardHandler->authenticateUserAndHandleSuccess(
//                            $user,
//                            $request,
//                            $authenticator,
//                            'main' // firewall name in security.yaml
//            );
            
            return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
            ]);
        }
    }

    /**
     * @Route("/verify/email", name="app_verify_email")
     */
    public function verifyUserEmail(Request $request): Response {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        // validate email confirmation link, sets User::isVerified=true and persists
        try {
            $this->emailVerifier->handleEmailConfirmation($request, $this->getUser());
        } catch (VerifyEmailExceptionInterface $exception) {
            $this->addFlash('verify_email_error', $exception->getReason());

            return $this->redirectToRoute('app_register');
        }

        // @TODO Change the redirect on success and handle or remove the flash message in your templates
        $this->addFlash('success', 'Your email address has been verified.');

        return $this->redirectToRoute('app_register');
    }

}
