<?php

namespace App\Controller;

use App\Entity\Unit;
use App\Form\UnitType;
use App\Repository\UnitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/unit")
 */
class UnitController extends AbstractController
{
    /**
     * @Route("/", name="unit_index", methods={"GET"})
     */
    public function index(UnitRepository $unitRepository): Response
    {
        return $this->render('unit/index.html.twig', [
            'units' => $unitRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="unit_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $unit = new Unit();
        $form = $this->createForm(UnitType::class, $unit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($unit);
            $entityManager->flush();

            return $this->redirectToRoute('unit_index');
        }

        return $this->render('unit/new.html.twig', [
            'unit' => $unit,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="unit_show", methods={"GET"})
     */
    public function show(Unit $unit): Response
    {
        return $this->render('unit/show.html.twig', [
            'unit' => $unit,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="unit_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Unit $unit): Response
    {
        $form = $this->createForm(UnitType::class, $unit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('unit_index');
        }

        return $this->render('unit/edit.html.twig', [
            'unit' => $unit,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="unit_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Unit $unit): Response
    {
        if ($this->isCsrfTokenValid('delete'.$unit->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($unit);
            $entityManager->flush();
        }

        return $this->redirectToRoute('unit_index');
    }
}
