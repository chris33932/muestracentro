<?php

namespace App\Controller;

use App\Entity\DiaSemana;
use App\Form\DiaSemanaType;
use App\Repository\DiaSemanaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/dia/semana")
 */
class DiaSemanaController extends AbstractController
{
    /**
     * @Route("/", name="dia_semana_index", methods={"GET"})
     */
    public function index(DiaSemanaRepository $diaSemanaRepository): Response
    {
        return $this->render('dia_semana/index.html.twig', [
            'dia_semanas' => $diaSemanaRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="dia_semana_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $diaSemana = new DiaSemana();
        $form = $this->createForm(DiaSemanaType::class, $diaSemana);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($diaSemana);
            $entityManager->flush();

            return $this->redirectToRoute('dia_semana_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('dia_semana/new.html.twig', [
            'dia_semana' => $diaSemana,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="dia_semana_show", methods={"GET"})
     */
    public function show(DiaSemana $diaSemana): Response
    {
        return $this->render('dia_semana/show.html.twig', [
            'dia_semana' => $diaSemana,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="dia_semana_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, DiaSemana $diaSemana): Response
    {
        $form = $this->createForm(DiaSemanaType::class, $diaSemana);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('dia_semana_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('dia_semana/edit.html.twig', [
            'dia_semana' => $diaSemana,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="dia_semana_delete", methods={"POST"})
     */
    public function delete(Request $request, DiaSemana $diaSemana): Response
    {
        if ($this->isCsrfTokenValid('delete'.$diaSemana->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($diaSemana);
            $entityManager->flush();
        }

        return $this->redirectToRoute('dia_semana_index', [], Response::HTTP_SEE_OTHER);
    }
}
