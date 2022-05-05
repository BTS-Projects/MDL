<?php

namespace App\Controller;

use App\Entity\Licencie;
use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use App\Security\EmailVerifier;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mime\Address;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use SymfonyCasts\Bundle\VerifyEmail\Exception\VerifyEmailExceptionInterface;

/**
 * @Route("/user")
 */
class UserController extends AbstractController {

    private $emailVerifier;

    public function __construct(EmailVerifier $emailVerifier) {
        $this->emailVerifier = $emailVerifier;
    }

    /**
     * @Route("/", name="app_user_index", methods={"GET"})
     */
    public function index(UserRepository $userRepository): Response {
        return $this->render('user/index.html.twig', [
                    'users' => $userRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_user_new", methods={"GET", "POST"})
     */
    public function new(Request $request, UserPasswordEncoderInterface $passwordEncoder, EntityManagerInterface $entityManager): Response {
        $user = new User();
        $licencieRepo = $entityManager->getRepository(Licencie::class);
        $userRepo = $entityManager->getRepository(User::class);
        $licencies = $licencieRepo->findAll();
        $users = $userRepo->findAll();
        $mail = '';

        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //On cherche à savoir si l'utilisateur existe déjà
            $i = 0;
            while ($i < count($users) && $users[$i]->getNumlicence() != $user->getNumLicence()) {
                $i++;
            }
            if ($i < count($users)) {
                //oui il existe déjà
                $this->addFlash('error', 'Le compte existe déjà');
                //redirect
                return $this->redirectToRoute('app_login', [], Response::HTTP_SEE_OTHER);
            } else {
                //il n'existe pas on vérifie que c'est bien un licencier
                $i = 0;
                while ($i < count($licencies) && $licencies[$i]->getNumlicence() != $user->getNumLicence()) {
                    $i++;
                }
                if ($i < count($licencies)) {
                    //oui c'est un licencier on l'ajoute à la base de donnée
                    $user->setPassword(
                            $passwordEncoder->encodePassword($user, $user->getPassword())
                    );
                    $user->setRoles(["ROLE_INSCRIT"]);
                    $user->setIsVerified(false);
                    $mail = $licencies[$i]->getMail();
                    $user->setEmail($mail);
                    $entityManager->persist($user);
                    $entityManager->flush();
                    
                    // generate a signed url and email it to the user
                    $this->emailVerifier->sendEmailConfirmation('app_verify_email', $user,
                            (new TemplatedEmail())
                                    ->from(new Address('admin@mdl.sio', 'Admin'))
                                    ->to($mail)
                                    ->subject('Please Confirm your Inscription')
                                    ->htmlTemplate('user/confirmation_email.html.twig')
                    );   
                } else {
                    $this->addFlash('error', 'Le numéro de licencié est incorrect');

                    return $this->redirectToRoute('app_accueil', [], Response::HTTP_SEE_OTHER);     

                }
                $this->addFlash('success', 'La création de votre compte a bien était effectuer veuillez confirmer votre inscription par mail');
                return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
                
            }
        }


        return $this->render('user/new.html.twig', [
                    'user' => $user,
                    'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_user_show", methods={"GET"})
     */
    public function show(User $user): Response {
        return $this->render('user/show.html.twig', [
                    'user' => $user,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_user_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, User $user, UserRepository $userRepository): Response {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user->setPassword($passwordEncoder->encodePassword($user, $user->getData()));
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('user/edit.html.twig', [
                    'user' => $user,
                    'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_user_delete", methods={"POST"})
     */
    public function delete(Request $request, User $user, UserRepository $userRepository): Response {
        if ($this->isCsrfTokenValid('delete' . $user->getId(), $request->request->get('_token'))) {
            $userRepository->remove($user);
        }

        return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
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

            return $this->redirectToRoute('app_user_new');
        }

        // @TODO Change the redirect on success and handle or remove the flash message in your templates
        $this->addFlash('success', 'Your email address has been verified.');

        return $this->redirectToRoute('app_user_new');
    }
}
