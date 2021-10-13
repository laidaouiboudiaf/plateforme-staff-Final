<?php

namespace App\Controller;

use App\Entity\Users;
use App\Form\RegistrationFormType;
use App\Repository\UsersRepository;
use App\Security\EmailVerifier;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mime\Address;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use SymfonyCasts\Bundle\VerifyEmail\Exception\VerifyEmailExceptionInterface;
use Symfony\Component\Form\Form;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Swift_Mailer;
use Twig\Extra\CssInliner\CssInlinerExtension;



class RegistrationController extends AbstractController
{
    private $emailVerifier;
    private $passwordEncoder;
    private $security;
    private $mailer ;

    public function __construct(EmailVerifier $emailVerifier, UserPasswordEncoderInterface $passwordEncoder,Security $security,MailerInterface $mailer)
    {
        $this->emailVerifier = $emailVerifier;
        $this->passwordEncoder = $passwordEncoder;
        $this->security = $security;
        $this->mailer = $mailer;
    }


    /**
    * @Route("/register", name="register")
    */
    public function register(Request $request): Response
    {
        if ($this->getUser()){

            if($this->security->isGranted('ROLE_ADMIN')){

                $response = $this->redirectToRoute('dash_admin');
            }
		  	else if($this->security->isGranted('ROLE_CLIENT')){

                $response = $this->redirectToRoute('dash_client');
            }

            else{
                    $response = $this->redirectToRoute('dashboard');
            }

            return $response;
        }

        $user = new Users();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        $this->verifyForm($form, $user);

        return $this->render('frontend/useroffice/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }

    private function verifyForm(Form $form, Users $user) {

        if ($form->isSubmitted() && $form->isValid()) {
            $user->setPassword(
                $this->passwordEncoder->encodePassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            $this->addFlash('success',"Votre compte a été créé avec succès. Veuillez vérifier votre courriel pour l'activation de votre compte.");

                 $this->emailVerifier->sendEmailConfirmation('app_verify_email', $user,
                  $email=(new TemplatedEmail())
                    ->from(new Address('contact@sosjob.fr', 'SOS JOB'))
                     ->to($user->getAdresseMail())
                       ->subject('Confirmation de votre adresse mail')
                      #->embed(fopen('%kernel.project_dir%/public/assets/img/logos/header.jpg','r'), 'tof')
                       ->htmlTemplate('registration/confirmation_email.html.twig')
                       ->context([

                    ])


              );


            //  $message = (new TemplatedEmail())
            //  ->subject('Please Confirm your Email')
            //  ->from('SosJob@gmail.com')
            //  ->to($user->getAdresseMail())
            //   ->htmlTemplate('registration/confirmation_email.html.twig')
            //  ;
            // $this->mailer->send($message);


                if($this->security->isGranted('ROLE_CLIENT')){

                    $response = $this->redirectToRoute('dash_client');
                }

                else{
                        $response = $this->redirectToRoute('dashboard');
                }


            return $response;
        }
    }

    /**
     * @Route("/verify/email", name="app_verify_email")
     */
    public function verifyUserEmail(Request $request,UsersRepository $usersRepository): Response
    {
        #$this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $id = $request->get('id');

        if (null === $id) {
            return $this->redirectToRoute('register');
        }

        $user = $usersRepository->find($id);

        if (null === $user) {
            return $this->redirectToRoute('register');
        }

        try {
            $this->emailVerifier->handleEmailConfirmation($request, $user);
        } catch (VerifyEmailExceptionInterface $exception) {
            $this->addFlash('verify_email_error', $exception->getReason());

            return $this->redirectToRoute('register');
        }

        // @TODO Change the redirect on success and handle or remove the flash message in your templates
        $this->addFlash('success', 'Votre email a été vérifié avec succès vous pouvez à présent vous connecter');

        if($this->security->isGranted('ROLE_CLIENT')){

            $response = $this->redirectToRoute('dash_client');
        }

        else{
            $response = $this->redirectToRoute('dashboard');
        }

        return $this->redirectToRoute('login');
    }



}
