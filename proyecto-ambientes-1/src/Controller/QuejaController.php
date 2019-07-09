<?php

namespace App\Controller;

use App\Entity\Queja;
use App\Form\QuejaType;
use App\Repository\QuejaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/queja")
 */
class QuejaController extends AbstractController
{
    /**
     * @Route("/", name="queja_index", methods={"GET"})
     */
    public function index(QuejaRepository $quejaRepository): Response
    {
        return $this->render('queja/index.html.twig', [
            'quejas' => $quejaRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="queja_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $queja = new Queja();
        $form = $this->createForm(QuejaType::class, $queja);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($queja);
            $entityManager->flush();

            return $this->redirectToRoute('queja_index');
        }

        return $this->render('queja/new.html.twig', [
            'queja' => $queja,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="queja_show", methods={"GET"})
     */
    public function show(Queja $queja): Response
    {
        return $this->render('queja/show.html.twig', [
            'queja' => $queja,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="queja_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Queja $queja): Response
    {
        $form = $this->createForm(QuejaType::class, $queja);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('queja_index', [
                'id' => $queja->getId(),
            ]);
        }

        return $this->render('queja/edit.html.twig', [
            'queja' => $queja,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="queja_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Queja $queja): Response
    {
        if ($this->isCsrfTokenValid('delete'.$queja->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($queja);
            $entityManager->flush();
        }

        return $this->redirectToRoute('queja_index');
    }
}
