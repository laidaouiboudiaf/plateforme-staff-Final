<?php

namespace App\Controller\BackOffice;

use App\Entity\InfosBancairesF;
use App\Form\InfosBancairesFType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/bancaire/fr")
 */
class AdminBancaireFrController extends AbstractController
{
    /**
     * @Route("/", name="admin_bancaire_fr_index", methods={"GET"})
     */
    public function index(): Response
    {
        $infosBancairesFs = $this->getDoctrine()
            ->getRepository(InfosBancairesF::class)
            ->findAll();

        return $this->render('backoffice/admin_bancaire_fr/index.html.twig', [
            'infos_bancaires_fs' => $infosBancairesFs,
        ]);
    }

    /**
     * @Route("/new", name="admin_bancaire_fr_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $infosBancairesF = new InfosBancairesF();
        $form = $this->createForm(InfosBancairesFType::class, $infosBancairesF);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($infosBancairesF);
            $entityManager->flush();

            return $this->redirectToRoute('admin_bancaire_fr_index');
        }

        return $this->render('backoffice/admin_bancaire_fr/new.html.twig', [
            'infos_bancaires_f' => $infosBancairesF,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idBancairesF}", name="admin_bancaire_fr_show", methods={"GET"})
     */
    public function show(InfosBancairesF $infosBancairesF): Response
    {
        return $this->render('backoffice/admin_bancaire_fr/show.html.twig', [
            'infos_bancaires_f' => $infosBancairesF,
        ]);
    }

    /**
     * @Route("/{idBancairesF}/edit", name="admin_bancaire_fr_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, InfosBancairesF $infosBancairesF): Response
    {
        $form = $this->createForm(InfosBancairesFType::class, $infosBancairesF);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_bancaire_fr_index');
        }

        return $this->render('backoffice/admin_bancaire_fr/edit.html.twig', [
            'infos_bancaires_f' => $infosBancairesF,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idBancairesF}", name="admin_bancaire_fr_delete", methods={"POST"})
     */
    public function delete(Request $request, InfosBancairesF $infosBancairesF): Response
    {
        if ($this->isCsrfTokenValid('delete'.$infosBancairesF->getIdBancairesF(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($infosBancairesF);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_bancaire_fr_index');
    }
}
