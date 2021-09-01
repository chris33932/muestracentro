<?php

namespace App\Controller;

use App\Entity\EntidadRecepDenuncia;
use App\Form\EntidadRecepDenunciaType;
use App\Repository\EntidadRecepDenunciaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/entidad/recep/denuncia")
 */
class EntidadRecepDenunciaController extends AbstractController
{
    /**
     * @Route("/", name="entidad_recep_denuncia_index", methods={"GET"})
     */
    public function index(EntidadRecepDenunciaRepository $entidadRecepDenunciaRepository): Response
    {
        return $this->render('entidad_recep_denuncia/index.html.twig', [
            'entidad_recep_denuncias' => $entidadRecepDenunciaRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="entidad_recep_denuncia_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $entidadRecepDenuncium = new EntidadRecepDenuncia();
        $form = $this->createForm(EntidadRecepDenunciaType::class, $entidadRecepDenuncium);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($entidadRecepDenuncium);
            $entityManager->flush();

            return $this->redirectToRoute('entidad_recep_denuncia_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('entidad_recep_denuncia/new.html.twig', [
            'entidad_recep_denuncium' => $entidadRecepDenuncium,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="entidad_recep_denuncia_show", methods={"GET"})
     */
    public function show(EntidadRecepDenuncia $entidadRecepDenuncium): Response
    {
        return $this->render('entidad_recep_denuncia/show.html.twig', [
            'entidad_recep_denuncium' => $entidadRecepDenuncium,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="entidad_recep_denuncia_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, EntidadRecepDenuncia $entidadRecepDenuncium): Response
    {
        $form = $this->createForm(EntidadRecepDenunciaType::class, $entidadRecepDenuncium);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('entidad_recep_denuncia_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('entidad_recep_denuncia/edit.html.twig', [
            'entidad_recep_denuncium' => $entidadRecepDenuncium,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="entidad_recep_denuncia_delete", methods={"POST"})
     */
    public function delete(Request $request, EntidadRecepDenuncia $entidadRecepDenuncium): Response
    {
        if ($this->isCsrfTokenValid('delete'.$entidadRecepDenuncium->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($entidadRecepDenuncium);
            $entityManager->flush();
        }

        return $this->redirectToRoute('entidad_recep_denuncia_index', [], Response::HTTP_SEE_OTHER);
    }
}
