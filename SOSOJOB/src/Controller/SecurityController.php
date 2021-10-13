<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Security;

class SecurityController extends AbstractController
{
    private $security ;

    public function __construct(Security $security)
    {
       
        $this->security = $security;
    }

    /**
     * @Route("/login", name="login", methods={"GET", "POST"})
     */
    public function login(AuthenticationUtils $authenticationUtils): Response   
    {
        if ($this->getUser()){

            if($this->security->isGranted('ROLE_ADMIN')){
                    $response=$this->redirectToRoute('dash_admin');    
            }
		  else if($this->security->isGranted('ROLE_CLIENT')){
                    $response=$this->redirectToRoute('dash_client');    
            }

            else{
                   $response=$this->redirectToRoute('dashboard');
            }

            return $response;
        }
        
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('frontend/useroffice/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logout()
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
