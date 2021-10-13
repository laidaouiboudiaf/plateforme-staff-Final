<?php

namespace App\Controller\BackOffice;

use App\Entity\InfosPermis;
use App\Form\InfosPermisType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/permis")
 */
class AdminPermisController extends AbstractController
{
    /**
     * @Route("/", name="admin_permis_index", methods={"GET"})
     */
    public function index(): Response
    {
        $infosPermis = $this->getDoctrine()
            ->getRepository(InfosPermis::class)
            ->findAll();

        return $this->render('backoffice/admin_permis/index.html.twig', [
            'infos_permis' => $infosPermis,
        ]);
    }

    /**
     * @Route("/new", name="admin_permis_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $infosPermi = new InfosPermis();
        $form = $this->createForm(InfosPermisType::class, $infosPermi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($infosPermi);
            $entityManager->flush();

            return $this->redirectToRoute('admin_permis_index');
        }

        return $this->render('backoffice/admin_permis/new.html.twig', [
            'infos_permi' => $infosPermi,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idPermis}", name="admin_permis_show", methods={"GET"})
     */
    public function show(InfosPermis $infosPermi): Response
    {
        return $this->render('backoffice/admin_permis/show.html.twig', [
            'infos_permi' => $infosPermi,
        ]);
    }

    /**
     * @Route("/{idPermis}/edit", name="admin_permis_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, InfosPermis $infosPermi): Response
    {
        $form = $this->createForm(InfosPermisType::class, $infosPermi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_permis_index');
        }

        return $this->render('backoffice/admin_permis/edit.html.twig', [
            'infos_permi' => $infosPermi,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idPermis}", name="admin_permis_delete", methods={"POST"})
     */
    public function delete(Request $request, InfosPermis $infosPermi): Response
    {
        if ($this->isCsrfTokenValid('delete'.$infosPermi->getIdPermis(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($infosPermi);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_permis_index');
    }
}
