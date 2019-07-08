<?php

namespace App\Controller;

use App\Entity\Unidad;
use App\Form\UnidadType;
use App\Repository\UnidadRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/unidad")
 */
class UnidadController extends AbstractController
{
    /**
     * @Route("/", name="unidad_index", methods={"GET"})
     */
    public function index(UnidadRepository $unidadRepository): Response
    {
        return $this->render('unidad/index.html.twig', [
            'unidads' => $unidadRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="unidad_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $unidad = new Unidad();
        $form = $this->createForm(UnidadType::class, $unidad);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($unidad);
            $entityManager->flush();

            return $this->redirectToRoute('unidad_index');
        }

        return $this->render('unidad/new.html.twig', [
            'unidad' => $unidad,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="unidad_show", methods={"GET"})
     */
    public function show(Unidad $unidad): Response
    {
        return $this->render('unidad/show.html.twig', [
            'unidad' => $unidad,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="unidad_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Unidad $unidad): Response
    {
        $form = $this->createForm(UnidadType::class, $unidad);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('unidad_index', [
                'id' => $unidad->getId(),
            ]);
        }

        return $this->render('unidad/edit.html.twig', [
            'unidad' => $unidad,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="unidad_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Unidad $unidad): Response
    {
        if ($this->isCsrfTokenValid('delete'.$unidad->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($unidad);
            $entityManager->flush();
        }

        return $this->redirectToRoute('unidad_index');
    }
}
