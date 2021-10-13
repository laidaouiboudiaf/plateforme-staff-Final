<?php

namespace App\Controller\BackOffice;

use App\Entity\Fournisseur;
use App\Form\FournisseurType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/fournisseur")
 */
class AdminFournisseurController extends AbstractController
{
    /**
     * @Route("/", name="admin_fournisseur_index", methods={"GET"})
     */
    public function index(): Response
    {
        $fournisseurs = $this->getDoctrine()
            ->getRepository(Fournisseur::class)
            ->findAll();

        return $this->render('backoffice/admin_fournisseur/index.html.twig', [
            'fournisseurs' => $fournisseurs,
        ]);
    }

    /**
     * @Route("/new", name="admin_fournisseur_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $fournisseur = new Fournisseur();
        $form = $this->createForm(FournisseurType::class, $fournisseur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($fournisseur);
            $entityManager->flush();

            return $this->redirectToRoute('admin_fournisseur_index');
        }

        return $this->render('backoffice/admin_fournisseur/new.html.twig', [
            'fournisseur' => $fournisseur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idFournisseur}", name="admin_fournisseur_show", methods={"GET"})
     */
    public function show(Fournisseur $fournisseur): Response
    {
        return $this->render('backoffice/admin_fournisseur/show.html.twig', [
            'fournisseur' => $fournisseur,
        ]);
    }

    /**
     * @Route("/{idFournisseur}/edit", name="admin_fournisseur_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Fournisseur $fournisseur): Response
    {
        $form = $this->createForm(FournisseurType::class, $fournisseur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_fournisseur_index');
        }

        return $this->render('backoffice/admin_fournisseur/edit.html.twig', [
            'fournisseur' => $fournisseur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idFournisseur}", name="admin_fournisseur_delete", methods={"POST"})
     */
    public function delete(Request $request, Fournisseur $fournisseur): Response
    {
        if ($this->isCsrfTokenValid('delete'.$fournisseur->getIdFournisseur(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($fournisseur);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_fournisseur_index');
    }
}
