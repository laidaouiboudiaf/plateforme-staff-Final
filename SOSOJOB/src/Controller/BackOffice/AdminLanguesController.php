<?php

namespace App\Controller\BackOffice;

use App\Entity\InfosLangues;
use App\Form\InfosLanguesType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/langues")
 */
class AdminLanguesController extends AbstractController
{
    /**
     * @Route("/", name="admin_langues_index", methods={"GET"})
     */
    public function index(): Response
    {
        $infosLangues = $this->getDoctrine()
            ->getRepository(InfosLangues::class)
            ->findAll();

        return $this->render('backoffice/admin_langues/index.html.twig', [
            'infos_langues' => $infosLangues,
        ]);
    }

    /**
     * @Route("/new", name="admin_langues_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $infosLangue = new InfosLangues();
        $form = $this->createForm(InfosLanguesType::class, $infosLangue);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($infosLangue);
            $entityManager->flush();

            return $this->redirectToRoute('admin_langues_index');
        }

        return $this->render('backoffice/admin_langues/new.html.twig', [
            'infos_langue' => $infosLangue,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idLangues}", name="admin_langues_show", methods={"GET"})
     */
    public function show(InfosLangues $infosLangue): Response
    {
        return $this->render('backoffice/admin_langues/show.html.twig', [
            'infos_langue' => $infosLangue,
        ]);
    }

    /**
     * @Route("/{idLangues}/edit", name="admin_langues_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, InfosLangues $infosLangue): Response
    {
        $form = $this->createForm(InfosLanguesType::class, $infosLangue);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_langues_index');
        }

        return $this->render('backoffice/admin_langues/edit.html.twig', [
            'infos_langue' => $infosLangue,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idLangues}", name="admin_langues_delete", methods={"POST"})
     */
    public function delete(Request $request, InfosLangues $infosLangue): Response
    {
        if ($this->isCsrfTokenValid('delete'.$infosLangue->getIdLangues(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($infosLangue);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_langues_index');
    }
}
