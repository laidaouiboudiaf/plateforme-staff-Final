<?php

namespace App\Controller\Frontend\Client;

use App\Entity\Missions;
use App\Entity\MissionsAttr;
use App\Form\MissionAttrValidType;
use App\Form\MissionFormType;
use App\Repository\MissionsAttrRepository;
use App\Repository\MissionsRepository;

use App\Repository\ClientRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Client;
use App\Form\ClientFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\Form\Form;

class ClientController extends AbstractController
{


    /**
     * Méthode pour afficher le Dashboard version "Client".
	 *@IsGranted("ROLE_CLIENT")
     * @Route("/dash_client", name="dash_client")
     */
    public function dashboard_client(Request $request)
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY', null, 'User tried to access a page without having IS_AUTHENTICATED_FULLY');
        $clients = $this->getDoctrine()->getRepository(Client::class)->findAll();
        $var = false;
        foreach ($clients as $cl) {

            if ($cl->getIdUsers() == $this->getUser()) {
                $var = true;
            }
        }

        $client = new Client();
        $form = $this->createForm(ClientFormType::class, $client);
        $form->handleRequest($request);
        $this->Suite_inscription($form, $client);
        return $this->render('frontend/useroffice/client/dashboard.html.twig', [
            'forme' => $form->createView(),
            'var' => $var,
        ]);

    }

    private function Suite_inscription(Form $form, Client $client)
    {

        if ($form->isSubmitted() && $form->isValid()) {
            $client = $form->getData();
            $user = $this->getUser();
            $client->setIdUsers($user);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($client);
            $entityManager->flush();

            $this->addFlash('succes', 'Inscription réussie');
            $this->addFlash('yes', 'yes');


        }
        return $this->redirectToRoute('dash_client');

    }
   /* public function updateHeure(Request $request)
    {


        $form = $this->createForm(MissionAttrValidType::class);
        $form = handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $nbHeure = $form->getData();
            $nbHeure->setNbHeures();

        }

    }*/


    /**
     *Méthode pour poster une mission 'client'.
	 *@IsGranted("ROLE_CLIENT")
     * @Route("/postmission", name="postmission")
     */


    public function mission(Request $request): Response
    {

        $clients = $this->getDoctrine()->getRepository(Client::class)->findAll();
        foreach ($clients as $cl) {

            if ($cl->getIdUsers() == $this->getUser()) {
                $clientMission = $cl;
            }
        }

        $missions = new Missions();
        $missions->setIdClient($clientMission);
        $form = $this->createForm(MissionFormType::class, $missions);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $missions = $form->getData();
            $missions->setEtat('dispo');

            $Manager = $this->getDoctrine()->getManager();
            $Manager->persist($missions);//prepare la requete sql
            $Manager->flush();


            $this->addFlash('succes', 'La mission a été bien enregistrer !');
            $this->addFlash('succes', 'Vous allez recevoir votre devis par mail !');

            return $this->redirectToRoute('dash_client');

        }


        return $this->render('frontend/useroffice/client/mission.html.twig', [
            'MissionForm' => $form->createView(),]);
    }


    public function findID_CLIENT()
    {

        $clients = $this->getDoctrine()->getRepository(Client::class)->findAll();
        foreach ($clients as $cl) {

            if ($cl->getIdUsers() == $this->getUser()) {
                return $clientMission = $cl;
            }
        }

    }


    /**
     *Méthode pour afficher les missions attr poster  par 'client'.
	 *@IsGranted("ROLE_CLIENT")
     * @Route("/mission", name="mission")
     */

    public function Affichmission(MissionsAttrRepository $attrRepo): Response
    {
        $IdClient = null;
        $clients = $this->getDoctrine()->getRepository(Client::class)->findAll();
        foreach ($clients as $cl) {

            if ($cl->getIdUsers() == $this->getUser()) {
                $IdClient = $cl->getIdClient();
            }
        }

	  $displayMissionAttr = $attrRepo->showMissionAttr($IdClient);


	  //dump($displayMissionAttr);


        return $this->render('frontend/useroffice/client/showMission.html.twig', [


            'displayMissionAttr' => $displayMissionAttr,


        ]);
    }


    /**
     *Méthode pour afficher les missions attr poster  par 'client'.
	 *@IsGranted("ROLE_CLIENT")
     * @Route("/facture", name="facture")
     */

    public function facture(MissionsAttrRepository $attrRepo): Response
    {
        $IdClient = null;
        $clients = $this->getDoctrine()->getRepository(Client::class)->findAll();
        foreach ($clients as $cl) {

            if ($cl->getIdUsers() == $this->getUser()) {
                $IdClient = $cl->getIdClient();
            }
        }

        $displayMissionAttr = $attrRepo->showMissionAttr($IdClient);


	  //dump($displayMissionAttr);


        return $this->render('frontend/useroffice/client/FactureMissions/facture.html.twig', [


                'displayMissionAttr' => $displayMissionAttr]


        );


    }
}
