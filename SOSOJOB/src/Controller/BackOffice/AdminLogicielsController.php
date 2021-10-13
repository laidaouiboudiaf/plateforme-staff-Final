<?php

namespace App\Controller\BackOffice;

use App\Entity\InfosLogiciels;
use App\Form\InfosLogicielsType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/logiciels")
 */
class AdminLogicielsController extends AbstractController
{
    /**
     * @Route("/", name="admin_logiciels_index", methods={"GET"})
     */
    public function index(): Response
    {
        $infosLogiciels = $this->getDoctrine()
            ->getRepository(InfosLogiciels::class)
            ->findAll();

        return $this->render('backoffice/admin_logiciels/index.html.twig', [
            'infos_logiciels' => $infosLogiciels,
        ]);
    }

    /**
     * @Route("/new", name="admin_logiciels_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $infosLogiciel = new InfosLogiciels();
        $form = $this->createForm(InfosLogicielsType::class, $infosLogiciel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($infosLogiciel);
            $entityManager->flush();

            return $this->redirectToRoute('admin_logiciels_index');
        }

        return $this->render('backoffice/admin_logiciels/new.html.twig', [
            'infos_logiciel' => $infosLogiciel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idLogiciels}", name="admin_logiciels_show", methods={"GET"})
     */
    public function show(InfosLogiciels $infosLogiciel): Response
    {
        return $this->render('backoffice/admin_logiciels/show.html.twig', [
            'infos_logiciel' => $infosLogiciel,
        ]);
    }

    /**
     * @Route("/{idLogiciels}/edit", name="admin_logiciels_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, InfosLogiciels $infosLogiciel): Response
    {
        $form = $this->createForm(InfosLogicielsType::class, $infosLogiciel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_logiciels_index');
        }

        return $this->render('backoffice/admin_logiciels/edit.html.twig', [
            'infos_logiciel' => $infosLogiciel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idLogiciels}", name="admin_logiciels_delete", methods={"POST"})
     */
    public function delete(Request $request, InfosLogiciels $infosLogiciel): Response
    {
        if ($this->isCsrfTokenValid('delete'.$infosLogiciel->getIdLogiciels(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($infosLogiciel);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_logiciels_index');
    }
}
