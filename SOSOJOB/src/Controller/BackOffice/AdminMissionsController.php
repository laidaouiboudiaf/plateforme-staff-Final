<?php

namespace App\Controller\BackOffice;

use App\Entity\Missions;
use App\Form\MissionsType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/missions")
 */
class AdminMissionsController extends AbstractController
{
    /**
     * @Route("/", name="admin_missions_index", methods={"GET"})
     */
    public function index(): Response
    {
        $missions = $this->getDoctrine()
            ->getRepository(Missions::class)
            ->findAll();

        return $this->render('backoffice/admin_missions/index.html.twig', [
            'missions' => $missions,
        ]);
    }

    /**
     * @Route("/new", name="admin_missions_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $mission = new Missions();
        $form = $this->createForm(MissionsType::class, $mission);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($mission);
            $entityManager->flush();

            return $this->redirectToRoute('admin_missions_index');
        }

        return $this->render('backoffice/admin_missions/new.html.twig', [
            'mission' => $mission,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idMissions}", name="admin_missions_show", methods={"GET"})
     */
    public function show(Missions $mission): Response
    {
        return $this->render('backoffice/admin_missions/show.html.twig', [
            'mission' => $mission,
        ]);
    }

    /**
     * @Route("/{idMissions}/edit", name="admin_missions_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Missions $mission): Response
    {
        $form = $this->createForm(MissionsType::class, $mission);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_missions_index');
        }

        return $this->render('backoffice/admin_missions/edit.html.twig', [
            'mission' => $mission,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idMissions}", name="admin_missions_delete", methods={"POST"})
     */
    public function delete(Request $request, Missions $mission): Response
    {
        if ($this->isCsrfTokenValid('delete'.$mission->getIdMissions(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($mission);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_missions_index');
    }
}
