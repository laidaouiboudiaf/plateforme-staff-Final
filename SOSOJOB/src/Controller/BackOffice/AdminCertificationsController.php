<?php

namespace App\Controller\BackOffice;

use App\Entity\InfosCertifications;
use App\Form\InfosCertificationsType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/certifications")
 */
class AdminCertificationsController extends AbstractController
{
    /**
     * @Route("/", name="admin_certifications_index", methods={"GET"})
     */
    public function index(): Response
    {
        $infosCertifications = $this->getDoctrine()
            ->getRepository(InfosCertifications::class)
            ->findAll();

        return $this->render('backoffice/admin_certifications/index.html.twig', [
            'infos_certifications' => $infosCertifications,
        ]);
    }

    /**
     * @Route("/new", name="admin_certifications_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $infosCertification = new InfosCertifications();
        $form = $this->createForm(InfosCertificationsType::class, $infosCertification);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($infosCertification);
            $entityManager->flush();

            return $this->redirectToRoute('admin_certifications_index');
        }

        return $this->render('backoffice/admin_certifications/new.html.twig', [
            'infos_certification' => $infosCertification,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idCertifications}", name="admin_certifications_show", methods={"GET"})
     */
    public function show(InfosCertifications $infosCertification): Response
    {
        return $this->render('backoffice/admin_certifications/show.html.twig', [
            'infos_certification' => $infosCertification,
        ]);
    }

    /**
     * @Route("/{idCertifications}/edit", name="admin_certifications_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, InfosCertifications $infosCertification): Response
    {
        $form = $this->createForm(InfosCertificationsType::class, $infosCertification);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_certifications_index');
        }

        return $this->render('backoffice/admin_certifications/edit.html.twig', [
            'infos_certification' => $infosCertification,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idCertifications}", name="admin_certifications_delete", methods={"POST"})
     */
    public function delete(Request $request, InfosCertifications $infosCertification): Response
    {
        if ($this->isCsrfTokenValid('delete'.$infosCertification->getIdCertifications(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($infosCertification);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_certifications_index');
    }
}
