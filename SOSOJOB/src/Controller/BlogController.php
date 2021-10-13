<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    /**
     * Méthode pour afficher le premeir article
     * @Route("/Blog1", name="Blog1")
     */
    public function Blog1() {
        return $this->render('frontend/useroffice/Condition/blog/blog1.html.twig');
    }

    /**
     * Méthode pour afficher le deuxiéme article
     * @Route("/Blog2", name="Blog2")
     */
    public function Blog2() {
        return $this->render('frontend/useroffice/Condition/blog/blog2.html.twig');
    }
    
    
    /**
     * Methode pour aller dans le FAQ Entreprise
     * @Route("/faqentreprise", name="faq_entreprise")
     */
    public function faqEntreprise()
    {
        return $this->render('frontend/useroffice/Condition/FAQ_Entreprise.html.twig');
    }

    /**
     * Methode pour aller dans le FAQ Fournisseur
     * @Route("/faqfournisseur", name="faq_fournisseur")
     */
    public function faqFournisseur()
    {
        return $this->render('frontend/useroffice/Condition/FAQ_jobber.html.twig');
    }


    /**
     * Methode pour aller dans les mentions legales
     * @Route("/mentionslegales", name="mentions_legales")
     */
    public function mentionsLegal()
    {
        return $this->render('frontend/useroffice/Condition/Mention_Legale.html.twig');
    }


    /**
     * Methode pour se diriger vers les conditions Générales
     * @Route("/conditions", name="conditions")
     */
    public function conditions()
    {
        return $this->render('frontend/useroffice/Condition/condition.html.twig');
    }


    /**
     * Methode pour se diriger vers les données personnelles
     * @Route("/donneespersonnelles", name="donneespers")
     */
    public function donneespersonnelles()
    {
        return $this->render('frontend/useroffice/Condition/Données_Personelles.html.twig');
    }

    /**
     * Méthode pour afficher la page blog
     * @Route("register/Blog", name="Blog")
     */
    public function Blog() {
        return $this->render('frontend/useroffice/Condition/blog.html.twig');
    }
}
