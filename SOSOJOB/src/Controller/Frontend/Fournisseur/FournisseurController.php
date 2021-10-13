<?php

namespace App\Controller\Frontend\Fournisseur;

use App\Entity\Fournisseur;
use App\Entity\InfosBancairesF;
use  App\Repository\MissionsAttrRepository;
use  App\Repository\InfosBancaireFRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Form\FournisseurFormType;
use App\Form\InfosBancaireFrFormType;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use App\Service\FileUploader;



class FournisseurController extends AbstractController
{
    
     /**
     * Méthode pour afficher le Dashboard version "Fournisseur".
	 *@IsGranted("ROLE_FOURNISSEUR")
     * @Route("/dashboard", name="dashboard")
     */
    public function dashboard(Request $request){
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY', null, 'User tried to access a page without having IS_AUTHENTICATED_FULLY'); 
        $var=false;

        $fournisseurs=$this->getDoctrine()->getRepository(Fournisseur::class)->findAll();
        foreach($fournisseurs as $four){
                if($four->getIdUsers() == $this->getUser()){
                    $var =true;

             }
        }

        $fournisseur = new Fournisseur();
        $form = $this->createFormBuilder($fournisseur)
        ->add('numero_RCS',TextType::class,['label'=>'Numero_RCS',
        'attr'=>[
        'placeholder'=>'Renseignez votre numéro Rcs',],
        ])
        ->add('statut',ChoiceType::class,['label'=>'Avez-vous déjà un statut autoentrepreneur ?' ,'choices' => [
                      
            'oui' => 'à_déja_un_statut_entre',
            'non' => 'pas_encore_statut_entre',
        ],
            
            'expanded' => true,
            'multiple'=>false,
            
           
            'label_attr'=>[
                 'class'=>'radio-inline',
                 'checked'=>false,
             ]
          ])
        
        ->getForm();
        $form->handleRequest($request);
        $this->Suite_inscription($form, $fournisseur);
        return $this->render('frontend/useroffice/fournisseur/dashboard.html.twig', [
            'forme' => $form->createView(),
            'var'=>$var,
        ]);    
    
    }

    private function Suite_inscription(Form $form, Fournisseur $fournisseur)
    {

        if ($form->isSubmitted() && $form->isValid()) {
            $fournisseur = $form->getData();
            $user=$this->getUser();
            $fournisseur->setIdUsers($user);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($fournisseur);
            $entityManager->flush();
          
            $this->addFlash('succes', 'Inscription réussie');
            $this->addFlash('yes','yes');  
        
            return $this->redirectToRoute('dashboard');
              
        }  
    
        
    }


    /**
     * Methode pour afficher les mission d'un fournisseur
	 *@IsGranted("ROLE_FOURNISSEUR")
     * @Route("/missionfr", name="missions.fourn")
     */
    public function missionfr(MissionsAttrRepository $repo)
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY', null, 'User tried to access a page without having IS_AUTHENTICATED_FULLY'); 
        $idfour=null;
        $var=false;
        $fournisseurs=$this->getDoctrine()->getRepository(Fournisseur::class)->findAll();
        foreach($fournisseurs as $four){
                if($four->getIdUsers() == $this->getUser()){
                    $var =true;
                    //$idfour = $four->getIdFournisseur();
                    $idfour = $four;
                }
        } 

        $missionsAttr = $repo->findByFournisseur($idfour);
        return $this->render('frontend/useroffice/fournisseur/missionsfour.html.twig', [
            'idfour'=>$idfour,
            'var'=>$var,
            'missionsAttr'=>$missionsAttr
        ]);
    }


     /**
      * Methode pour afficher les informations bancaires du fournisseur
	  *@IsGranted("ROLE_FOURNISSEUR")
      * @Route("/bancairef", name="bancaire.four", methods={"GET","POST"})
      * @return void
      */
     public function banquaire(Request $request, InfosBancaireFRepository $repository, MissionsAttrRepository $missionRepo)
     {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY', null, 'User tried to access a page without having IS_AUTHENTICATED_FULLY'); 
        
        $idfour=null;
        $var=false;
        $fournisseurs=$this->getDoctrine()->getRepository(Fournisseur::class)->findAll();
        foreach($fournisseurs as $four){
                if($four->getIdUsers() == $this->getUser()){
                    $var =true;
                    //$idfour = $four->getIdFournisseur();
                    $idfour = $four;
                }
        } 
        
        $infosBancFour = $this->getDoctrine()
            ->getRepository(InfosBancairesF::class)
            ->findAll();
            

        //Permettre au fournisseur d'enregistrer ses informations bancaires
       
        $infosBancairesF = new InfosBancairesF();
        $infosBancairesF->setIdFournisseur($idfour);
        $form = $this->createForm(InfosBancaireFrFormType::class, $infosBancairesF);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
             $infosBancairesF = $form->getData();
            //$infosBancairesF->setIdFournisseur();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($infosBancairesF);
            $entityManager->flush();

            return $this->redirectToRoute('bancaire.four');
        }


        //Afficher les informations bancaire selon l'id du fournisseur
        $infosbancairefour = $repository->findByIdFournisseur($idfour);

        //Afficher les missions attribuées selon l'id du forunisseur
        $missionsAttr = $missionRepo->findByFournisseur($idfour);

        return $this->render('frontend/useroffice/fournisseur/bancfour.html.twig', [
           'idfour'=>$idfour, 
           'var'=>$var,
           'infosBancFour'=>$infosBancFour, 
           'newinfosbancfour' => $infosBancairesF,
           'infosbancairefourn'=>$infosbancairefour,
           'missionsAttr' => $missionsAttr, 
           'form'=>$form->createView()
        ]);  
     }


    

    /**
     * Méthode pour afficher la page profil version "fournisseur".
	 *@IsGranted("ROLE_FOURNISSEUR")
     * @Route("/pageprofil", name="pageprofil")
     */
    public function pageprofil() {
        return $this->render('frontend/useroffice/fournisseur/pageprofil.html.twig');
    }


    /**
     * Méthode pour création de statut autoentrepreneur "Fournisseur".
     *  @IsGranted("ROLE_FOURNISSEUR")
     * @Route("/statut", name="statut")
     */
    public function statut(Request $request,FileUploader $fileUploader):Response{
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY', null, 'User tried to access a page without having IS_AUTHENTICATED_FULLY');
        $fournisseur = new Fournisseur();
        $form = $this->createForm(FournisseurFormType::class, $fournisseur);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $fournisseur = $form->getData();
            $ci = $form->get('ci')->getData();
            $justificatif_domicile = $form->get('justificatif_domicile')->getData();
            $signature= $form->get('signature')->getData();
            $permis= $form->get('permis')->getData();
            $photo= $form->get('photo')->getData();

            $h_PoleEmploi= $form->get('h_PoleEmploi')->getData();
            $ABM= $form->get('ABM')->getData();
            $NDP= $form->get('NDP')->getData();
            $ANC= $form->get('ANC')->getData();
            $JPHD= $form->get('JPHD')->getData();
            $ZUS= $form->get('ZUS')->getData();

            if ($ci && $signature && $justificatif_domicile){
                $ciFileName = $fileUploader->upload($ci);
                $justificatif_domicileFileName = $fileUploader->upload($justificatif_domicile);
                $signatureFileName= $fileUploader->upload($signature);

                $fournisseur->setCi($ciFileName);
                $fournisseur->setJustificatifDomicile($justificatif_domicileFileName);
                $fournisseur->setSignature($signatureFileName);
            }
            if($permis){$permisFileName= $fileUploader->upload($permis);$fournisseur->setPermis($permisFileName);}
            if($photo){$photoFileName= $fileUploader->upload($photo);$fournisseur->setPhoto($photoFileName);}
            if($h_PoleEmploi){$h_PoleEmploiFileName= $fileUploader->upload($h_PoleEmploi);$fournisseur->setHPoleEmploi($h_PoleEmploiFileName);}
            if($ABM ){  $ABMFileName= $fileUploader->upload($ABM);$fournisseur->setABM($ABMFileName);}
            if($NDP){ $NDPFileName= $fileUploader->upload($NDP);$fournisseur->setNDP($NDPFileName);}
            if($ANC){$ANCFileName= $fileUploader->upload($ANC);$fournisseur->setANC($ANCFileName);}
            if($JPHD){$JPHDFileName= $fileUploader->upload($JPHD);$fournisseur->setJPHD($JPHDFileName);}
            if($ZUS){$ZUSFileName= $fileUploader->upload($ZUS);$fournisseur->setZUS($ZUSFileName);}


            $user=$this->getUser();
            $fournisseur->setIdUsers($user);
            $fournisseur->setStatut('StatutèCréer_Par_SosJOB');
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($fournisseur);
            $entityManager->flush();

            $this->addFlash('succes', 'Inscription réussie');
            $this->addFlash('yes','yes');

            return $this->redirectToRoute('dashboard');

        }
        return $this->render('frontend/useroffice/fournisseur/statut.html.twig', [
            'registrationForm' => $form->createView(),
        ]);

    }
    
    
    /**
	 *@IsGranted("ROLE_FOURNISSEUR")
     * @Route("/bancairef/{id}", name="banc.fr.delete", methods={"POST"})
     */
    public function delete(Request $request, InfosBancairesF $infosBancairesF): Response
    {
        if ($this->isCsrfTokenValid('delete'.$infosBancairesF->getIdBancairesF(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($infosBancairesF);
            $entityManager->flush();
        }

        return $this->redirectToRoute('bancaire.four');
    }
    
}
