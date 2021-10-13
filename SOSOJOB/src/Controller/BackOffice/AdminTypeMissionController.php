<?php

namespace App\Controller\BackOffice;

use App\Entity\TypeDemission;
use App\Form\TypeDemissionType;
use App\Repository\TypeDemissionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/type/mission")
 */
class AdminTypeMissionController extends AbstractController
{
    /**
     * @Route("/", name="admin_type_mission_index", methods={"GET"})
     */
    public function index(TypeDemissionRepository $typeDemissionRepository): Response
    {
        return $this->render('backoffice/admin_type_mission/index.html.twig', [
            'type_demissions' => $typeDemissionRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="admin_type_mission_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $typeDemission = new TypeDemission();
        $form = $this->createForm(TypeDemissionType::class, $typeDemission);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($typeDemission);
            $entityManager->flush();

            return $this->redirectToRoute('admin_type_mission_index');
        }

        return $this->render('backoffice/admin_type_mission/new.html.twig', [
            'type_demission' => $typeDemission,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_type_mission_show", methods={"GET"})
     */
    public function show(TypeDemission $typeDemission): Response
    {
        return $this->render('backoffice/admin_type_mission/show.html.twig', [
            'type_demission' => $typeDemission,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_type_mission_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TypeDemission $typeDemission): Response
    {
        $form = $this->createForm(TypeDemissionType::class, $typeDemission);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_type_mission_index');
        }

        return $this->render('backoffice/admin_type_mission/edit.html.twig', [
            'type_demission' => $typeDemission,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_type_mission_delete", methods={"POST"})
     */
    public function delete(Request $request, TypeDemission $typeDemission): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typeDemission->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($typeDemission);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_type_mission_index');
    }
}
