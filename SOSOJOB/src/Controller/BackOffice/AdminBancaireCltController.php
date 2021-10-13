<?php

namespace App\Controller\BackOffice;

use App\Entity\InfosBancairesC;
use App\Form\InfosBancairesCType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/bancaire/clt")
 */
class AdminBancaireCltController extends AbstractController
{
    /**
     * @Route("/", name="admin_bancaire_clt_index", methods={"GET"})
     */
    public function index(): Response
    {
        $infosBancairesCs = $this->getDoctrine()
            ->getRepository(InfosBancairesC::class)
            ->findAll();

        return $this->render('backoffice/admin_bancaire_clt/index.html.twig', [
            'infos_bancaires_cs' => $infosBancairesCs,
        ]);
    }

    /**
     * @Route("/new", name="admin_bancaire_clt_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $infosBancairesC = new InfosBancairesC();
        $form = $this->createForm(InfosBancairesCType::class, $infosBancairesC);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($infosBancairesC);
            $entityManager->flush();

            return $this->redirectToRoute('admin_bancaire_clt_index');
        }

        return $this->render('backoffice/admin_bancaire_clt/new.html.twig', [
            'infos_bancaires_c' => $infosBancairesC,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idBancairesC}", name="admin_bancaire_clt_show", methods={"GET"})
     */
    public function show(InfosBancairesC $infosBancairesC): Response
    {
        return $this->render('backoffice/admin_bancaire_clt/show.html.twig', [
            'infos_bancaires_c' => $infosBancairesC,
        ]);
    }

    /**
     * @Route("/{idBancairesC}/edit", name="admin_bancaire_clt_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, InfosBancairesC $infosBancairesC): Response
    {
        $form = $this->createForm(InfosBancairesCType::class, $infosBancairesC);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_bancaire_clt_index');
        }

        return $this->render('backoffice/admin_bancaire_clt/edit.html.twig', [
            'infos_bancaires_c' => $infosBancairesC,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idBancairesC}", name="admin_bancaire_clt_delete", methods={"POST"})
     */
    public function delete(Request $request, InfosBancairesC $infosBancairesC): Response
    {
        if ($this->isCsrfTokenValid('delete'.$infosBancairesC->getIdBancairesC(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($infosBancairesC);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_bancaire_clt_index');
    }
}
