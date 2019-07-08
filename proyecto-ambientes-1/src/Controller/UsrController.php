<?php

namespace App\Controller;

use App\Entity\Usr;
use App\Form\UsrType;
use App\Repository\UsrRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/usr")
 */
class UsrController extends AbstractController
{
    /**
     * @Route("/", name="usr_index", methods={"GET"})
     */
    public function index(UsrRepository $usrRepository): Response
    {
        return $this->render('usr/index.html.twig', [
            'usrs' => $usrRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="usr_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $usr = new Usr();
        $form = $this->createForm(UsrType::class, $usr);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($usr);
            $entityManager->flush();

            return $this->redirectToRoute('usr_index');
        }

        return $this->render('usr/new.html.twig', [
            'usr' => $usr,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="usr_show", methods={"GET"})
     */
    public function show(Usr $usr): Response
    {
        return $this->render('usr/show.html.twig', [
            'usr' => $usr,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="usr_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Usr $usr): Response
    {
        $form = $this->createForm(UsrType::class, $usr);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('usr_index', [
                'id' => $usr->getId(),
            ]);
        }

        return $this->render('usr/edit.html.twig', [
            'usr' => $usr,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="usr_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Usr $usr): Response
    {
        if ($this->isCsrfTokenValid('delete'.$usr->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($usr);
            $entityManager->flush();
        }

        return $this->redirectToRoute('usr_index');
    }
}
