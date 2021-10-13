<?php

namespace App\Controller\BackOffice;

use App\Entity\InfosFormations;
use App\Form\InfosFormationsType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/formations")
 */
class AdminFormationsController extends AbstractController
{
    /**
     * @Route("/", name="admin_formations_index", methods={"GET"})
     */
    public function index(): Response
    {
        $infosFormations = $this->getDoctrine()
            ->getRepository(InfosFormations::class)
            ->findAll();

        return $this->render('backoffice/admin_formations/index.html.twig', [
            'infos_formations' => $infosFormations,
        ]);
    }

    /**
     * @Route("/new", name="admin_formations_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $infosFormation = new InfosFormations();
        $form = $this->createForm(InfosFormationsType::class, $infosFormation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($infosFormation);
            $entityManager->flush();

            return $this->redirectToRoute('admin_formations_index');
        }

        return $this->render('backoffice/admin_formations/new.html.twig', [
            'infos_formation' => $infosFormation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idFormations}", name="admin_formations_show", methods={"GET"})
     */
    public function show(InfosFormations $infosFormation): Response
    {
        return $this->render('backoffice/admin_formations/show.html.twig', [
            'infos_formation' => $infosFormation,
        ]);
    }

    /**
     * @Route("/{idFormations}/edit", name="admin_formations_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, InfosFormations $infosFormation): Response
    {
        $form = $this->createForm(InfosFormationsType::class, $infosFormation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_formations_index');
        }

        return $this->render('backoffice/admin_formations/edit.html.twig', [
            'infos_formation' => $infosFormation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idFormations}", name="admin_formations_delete", methods={"POST"})
     */
    public function delete(Request $request, InfosFormations $infosFormation): Response
    {
        if ($this->isCsrfTokenValid('delete'.$infosFormation->getIdFormations(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($infosFormation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_formations_index');
    }
}
