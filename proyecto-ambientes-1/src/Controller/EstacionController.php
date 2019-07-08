<?php

namespace App\Controller;

use App\Entity\Estacion;
use App\Form\EstacionType;
use App\Repository\EstacionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/estacion")
 */
class EstacionController extends AbstractController
{
    /**
     * @Route("/", name="estacion_index", methods={"GET"})
     */
    public function index(EstacionRepository $estacionRepository): Response
    {
        return $this->render('estacion/index.html.twig', [
            'estacions' => $estacionRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="estacion_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $estacion = new Estacion();
        $form = $this->createForm(EstacionType::class, $estacion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($estacion);
            $entityManager->flush();

            return $this->redirectToRoute('estacion_index');
        }

        return $this->render('estacion/new.html.twig', [
            'estacion' => $estacion,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="estacion_show", methods={"GET"})
     */
    public function show(Estacion $estacion): Response
    {
        return $this->render('estacion/show.html.twig', [
            'estacion' => $estacion,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="estacion_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Estacion $estacion): Response
    {
        $form = $this->createForm(EstacionType::class, $estacion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('estacion_index', [
                'id' => $estacion->getId(),
            ]);
        }

        return $this->render('estacion/edit.html.twig', [
            'estacion' => $estacion,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="estacion_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Estacion $estacion): Response
    {
        if ($this->isCsrfTokenValid('delete'.$estacion->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($estacion);
            $entityManager->flush();
        }

        return $this->redirectToRoute('estacion_index');
    }
}
