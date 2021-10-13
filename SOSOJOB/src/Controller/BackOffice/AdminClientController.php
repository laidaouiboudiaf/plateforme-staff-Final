<?php

namespace App\Controller\BackOffice;

use App\Entity\Client;
use App\Form\ClientType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/client")
 */
class AdminClientController extends AbstractController
{
    /**
     * @Route("/", name="admin_client_index", methods={"GET"})
     */
    public function index(): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY', null, 'User tried to access a page without having IS_AUTHENTICATED_FULLY');
        $clients = $this->getDoctrine()
            ->getRepository(Client::class)
            ->findAll();

        return $this->render('backoffice/admin_client/index.html.twig', [
            'clients' => $clients,
        ]);
    }

    /**
     * @Route("/new", name="admin_client_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $client = new Client();
        $form = $this->createForm(ClientType::class, $client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($client);
            $entityManager->flush();

            return $this->redirectToRoute('admin_client_index');
        }

        return $this->render('backoffice/admin_client/new.html.twig', [
            'client' => $client,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idClient}", name="admin_client_show", methods={"GET"})
     */
    public function show(Client $client): Response
    {
        return $this->render('backoffice/admin_client/show.html.twig', [
            'client' => $client,
        ]);
    }

    /**
     * @Route("/{idClient}/edit", name="admin_client_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Client $client): Response
    {
        $form = $this->createForm(ClientType::class, $client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_client_index');
        }

        return $this->render('backoffice/admin_client/edit.html.twig', [
            'client' => $client,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idClient}", name="admin_client_delete", methods={"POST"})
     */
    public function delete(Request $request, Client $client): Response
    {
        if ($this->isCsrfTokenValid('delete'.$client->getIdClient(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($client);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_client_index');
    }
}
