<?php

namespace App\Controller\Frontend;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;



/**
 * Classe contenant toutes les méthodes du Controller version "User".
 */
class UserOfficeController extends AbstractController {


    /**
     * Méthode pour afficher la page d'acceuil version "User".
     * @Route("/", name="home")
     */
    public function home() {
        return $this->render('frontend/useroffice/home.html.twig');
    }


}
