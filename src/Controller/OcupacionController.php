<?php

namespace App\Controller;

use App\Entity\Ocupacion;
use App\Form\OcupacionType;
use App\Repository\OcupacionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/ocupacion")
 */
class OcupacionController extends AbstractController
{
    /**
     * @Route("/", name="ocupacion_index", methods={"GET"})
     */
    public function index(OcupacionRepository $ocupacionRepository): Response
    {
        return $this->render('ocupacion/index.html.twig', [
            'ocupacions' => $ocupacionRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="ocupacion_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $ocupacion = new Ocupacion();
        $form = $this->createForm(OcupacionType::class, $ocupacion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($ocupacion);
            $entityManager->flush();

            return $this->redirectToRoute('ocupacion_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('ocupacion/new.html.twig', [
            'ocupacion' => $ocupacion,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ocupacion_show", methods={"GET"})
     */
    public function show(Ocupacion $ocupacion): Response
    {
        return $this->render('ocupacion/show.html.twig', [
            'ocupacion' => $ocupacion,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="ocupacion_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Ocupacion $ocupacion): Response
    {
        $form = $this->createForm(OcupacionType::class, $ocupacion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ocupacion_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('ocupacion/edit.html.twig', [
            'ocupacion' => $ocupacion,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ocupacion_delete", methods={"POST"})
     */
    public function delete(Request $request, Ocupacion $ocupacion): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ocupacion->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($ocupacion);
            $entityManager->flush();
        }

        return $this->redirectToRoute('ocupacion_index', [], Response::HTTP_SEE_OTHER);
    }
}
