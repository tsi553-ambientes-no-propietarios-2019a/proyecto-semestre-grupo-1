<?php

namespace App\Controller;

use App\Entity\Complain;
use App\Form\ComplainType;
use App\Repository\ComplainRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/complain")
 */
class ComplainController extends AbstractController
{
    /**
     * @Route("/", name="complain_index", methods={"GET"})
     */
    public function index(ComplainRepository $complainRepository): Response
    {
        return $this->render('complain/index.html.twig', [
            'complains' => $complainRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="complain_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $complain = new Complain();
        $form = $this->createForm(ComplainType::class, $complain);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($complain);
            $entityManager->flush();

            return $this->redirectToRoute('complain_index');
        }

        return $this->render('complain/new.html.twig', [
            'complain' => $complain,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="complain_show", methods={"GET"})
     */
    public function show(Complain $complain): Response
    {
        return $this->render('complain/show.html.twig', [
            'complain' => $complain,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="complain_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Complain $complain): Response
    {
        $form = $this->createForm(ComplainType::class, $complain);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('complain_index');
        }

        return $this->render('complain/edit.html.twig', [
            'complain' => $complain,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="complain_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Complain $complain): Response
    {
        if ($this->isCsrfTokenValid('delete'.$complain->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($complain);
            $entityManager->flush();
        }

        return $this->redirectToRoute('complain_index');
    }
}
