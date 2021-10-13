<?php

namespace App\Controller\BackOffice;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
//use Symfony\Component\DependencyInjection\Loader\Configurator\security;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Security;

class AdminLoginController extends AbstractController
{
    
    private $security ;

    public function __construct(Security $security)
    {
       
        $this->security = $security;
    }
    
    /**
     * @Route("/admin", name="admin.login", methods={"GET", "POST"})
     */
    public function adminlogin(AuthenticationUtils $authenticationUtils): Response   
    {
        if ($this->getUser()){

            if($this->security->isGranted('ROLE_ADM')){
                    $response=$this->redirectToRoute('dash_admin');    
            }

            return $response;
        }
        
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('backoffice/admin_login/index.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

   


    
}
