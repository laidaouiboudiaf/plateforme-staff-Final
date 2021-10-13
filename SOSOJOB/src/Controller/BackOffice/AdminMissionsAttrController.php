<?php

namespace App\Controller\BackOffice;

use App\Entity\MissionsAttr;
use App\Form\MissionsAttrType;
use App\Service\FileUpload;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;


/**
 * @Route("/admin/missions/attr")
 */
class AdminMissionsAttrController extends AbstractController
{

    private $invoice_uploaded = "";

    /**
     * @Route("/", name="admin_missions_attr_index", methods={"GET"})
     */
    public function index(): Response
    {
        $missionsAttrs = $this->getDoctrine()
            ->getRepository(MissionsAttr::class)
            ->findAll();

        return $this->render('backoffice/admin_missions_attr/index.html.twig', [
            'missions_attrs' => $missionsAttrs,
        ]);
    }

    /**
     * @Route("/new", name="admin_missions_attr_new", methods={"GET","POST"})
     */
    public function new(Request $request, FileUpload $fileUploader): Response
    {
        $missionsAttr = new MissionsAttr();
        $form = $this->createForm(MissionsAttrType::class, $missionsAttr);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $factureFile = $form->get('facture')->getData();
            $factureFileF = $form->get('factureF')->getData();

            if($factureFile){
                $fatureFileName = $fileUploader->upload($factureFile);
             
                /*if($fatureFileName !== null){
                    $directory = $fileUploader->getTargetDirectory();
                    $full_path = $directory.'/'.$fatureFileName;
                }*/
                $missionsAttr->setFacture($fatureFileName);
              
            }
		  if($factureFileF){
                $fatureFileNameF = $fileUploader->upload($factureFileF);
           
                $missionsAttr->setFactureF($fatureFileNameF);
            }

            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->persist($missionsAttr);
            $entityManager->flush();

            return $this->redirectToRoute('admin_missions_attr_index');
        }

        return $this->render('backoffice/admin_missions_attr/new.html.twig', [
            'missions_attr' => $missionsAttr,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_missions_attr_show", methods={"GET"})
     */
    public function show(MissionsAttr $missionsAttr): Response
    {
        return $this->render('backoffice/admin_missions_attr/show.html.twig', [
            'missions_attr' => $missionsAttr,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_missions_attr_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, MissionsAttr $missionsAttr, FileUpload $fileUploader): Response
    {
        $form = $this->createForm(MissionsAttrType::class, $missionsAttr);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $factureFile = $form->get('facture')->getData();
		   	$factureFileF = $form->get('factureF')->getData();

            if($factureFile){
                $fatureFileName = $fileUploader->upload($factureFile);
                $missionsAttr->setFacture($fatureFileName);
            }
		  
		    if($factureFileF){
                $fatureFileNameF = $fileUploader->upload($factureFileF);
           
                $missionsAttr->setFactureF($fatureFileNameF);
            }



            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_missions_attr_index');
        }

        return $this->render('backoffice/admin_missions_attr/edit.html.twig', [
            'missions_attr' => $missionsAttr,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_missions_attr_delete", methods={"POST"})
     */
    public function delete(Request $request, MissionsAttr $missionsAttr): Response
    {
        if ($this->isCsrfTokenValid('delete'.$missionsAttr->getIdMissionsAttr(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($missionsAttr);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_missions_attr_index');
    }
}