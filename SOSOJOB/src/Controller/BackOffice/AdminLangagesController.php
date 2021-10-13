<?php

namespace App\Controller\BackOffice;

use App\Entity\InfosLangages;
use App\Form\InfosLangagesType;
use App\Repository\LangagesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/langages")
 */
class AdminLangagesController extends AbstractController
{
    /**
     * @Route("/", name="admin_langages_index", methods={"GET"})
     */
    public function index(LangagesRepository $langagesRepository): Response
    {
        return $this->render('backoffice/admin_langages/index.html.twig', [
            'infos_langages' => $langagesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="admin_langages_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $infosLangage = new InfosLangages();
        $form = $this->createForm(InfosLangagesType::class, $infosLangage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($infosLangage);
            $entityManager->flush();

            return $this->redirectToRoute('admin_langages_index');
        }

        return $this->render('backoffice/admin_langages/new.html.twig', [
            'infos_langage' => $infosLangage,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idLangages}", name="admin_langages_show", methods={"GET"})
     */
    public function show(InfosLangages $infosLangage): Response
    {
        return $this->render('backoffice/admin_langages/show.html.twig', [
            'infos_langage' => $infosLangage,
        ]);
    }

    /**
     * @Route("/{idLangages}/edit", name="admin_langages_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, InfosLangages $infosLangage): Response
    {
        $form = $this->createForm(InfosLangagesType::class, $infosLangage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_langages_index');
        }

        return $this->render('backoffice/admin_langages/edit.html.twig', [
            'infos_langage' => $infosLangage,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idLangages}", name="admin_langages_delete", methods={"POST"})
     */
    public function delete(Request $request, InfosLangages $infosLangage): Response
    {
        if ($this->isCsrfTokenValid('delete'.$infosLangage->getIdLangages(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($infosLangage);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_langages_index');
    }
}
