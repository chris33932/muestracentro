<?php

namespace App\Controller;

use App\Entity\FranjaHoraria;
use App\Form\FranjaHorariaType;
use App\Repository\FranjaHorariaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/franja/horaria")
 */
class FranjaHorariaController extends AbstractController
{
    /**
     * @Route("/", name="franja_horaria_index", methods={"GET"})
     */
    public function index(FranjaHorariaRepository $franjaHorariaRepository): Response
    {
        return $this->render('franja_horaria/index.html.twig', [
            'franja_horarias' => $franjaHorariaRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="franja_horaria_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $franjaHorarium = new FranjaHoraria();
        $form = $this->createForm(FranjaHorariaType::class, $franjaHorarium);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($franjaHorarium);
            $entityManager->flush();

            return $this->redirectToRoute('franja_horaria_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('franja_horaria/new.html.twig', [
            'franja_horarium' => $franjaHorarium,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="franja_horaria_show", methods={"GET"})
     */
    public function show(FranjaHoraria $franjaHorarium): Response
    {
        return $this->render('franja_horaria/show.html.twig', [
            'franja_horarium' => $franjaHorarium,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="franja_horaria_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, FranjaHoraria $franjaHorarium): Response
    {
        $form = $this->createForm(FranjaHorariaType::class, $franjaHorarium);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('franja_horaria_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('franja_horaria/edit.html.twig', [
            'franja_horarium' => $franjaHorarium,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="franja_horaria_delete", methods={"POST"})
     */
    public function delete(Request $request, FranjaHoraria $franjaHorarium): Response
    {
        if ($this->isCsrfTokenValid('delete'.$franjaHorarium->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($franjaHorarium);
            $entityManager->flush();
        }

        return $this->redirectToRoute('franja_horaria_index', [], Response::HTTP_SEE_OTHER);
    }
}
