<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="dash_admin")
     */
    public function index(): Response
    {
	   $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY', null, 'User tried to access a page without having IS_AUTHENTICATED_FULLY');
       return $this->render('backoffice/admin_home/index.html.twig', [
            
        ]);
    }
}
