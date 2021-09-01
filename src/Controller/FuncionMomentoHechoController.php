<?php

namespace App\Controller;

use App\Entity\FuncionMomentoHecho;
use App\Form\FuncionMomentoHechoType;
use App\Repository\FuncionMomentoHechoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/funcion/momento/hecho")
 */
class FuncionMomentoHechoController extends AbstractController
{
    /**
     * @Route("/", name="funcion_momento_hecho_index", methods={"GET"})
     */
    public function index(FuncionMomentoHechoRepository $funcionMomentoHechoRepository): Response
    {
        return $this->render('funcion_momento_hecho/index.html.twig', [
            'funcion_momento_hechos' => $funcionMomentoHechoRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="funcion_momento_hecho_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $funcionMomentoHecho = new FuncionMomentoHecho();
        $form = $this->createForm(FuncionMomentoHechoType::class, $funcionMomentoHecho);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($funcionMomentoHecho);
            $entityManager->flush();

            return $this->redirectToRoute('funcion_momento_hecho_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('funcion_momento_hecho/new.html.twig', [
            'funcion_momento_hecho' => $funcionMomentoHecho,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="funcion_momento_hecho_show", methods={"GET"})
     */
    public function show(FuncionMomentoHecho $funcionMomentoHecho): Response
    {
        return $this->render('funcion_momento_hecho/show.html.twig', [
            'funcion_momento_hecho' => $funcionMomentoHecho,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="funcion_momento_hecho_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, FuncionMomentoHecho $funcionMomentoHecho): Response
    {
        $form = $this->createForm(FuncionMomentoHechoType::class, $funcionMomentoHecho);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('funcion_momento_hecho_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('funcion_momento_hecho/edit.html.twig', [
            'funcion_momento_hecho' => $funcionMomentoHecho,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="funcion_momento_hecho_delete", methods={"POST"})
     */
    public function delete(Request $request, FuncionMomentoHecho $funcionMomentoHecho): Response
    {
        if ($this->isCsrfTokenValid('delete'.$funcionMomentoHecho->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($funcionMomentoHecho);
            $entityManager->flush();
        }

        return $this->redirectToRoute('funcion_momento_hecho_index', [], Response::HTTP_SEE_OTHER);
    }
}
