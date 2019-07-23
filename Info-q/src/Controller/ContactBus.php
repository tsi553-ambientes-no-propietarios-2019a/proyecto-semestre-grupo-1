<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactBus extends AbstractController
{
    /**
     * @Route("/contactos", name="contactbus_index", methods={"GET"})
     */
    public function index(): Response
    {
        return $this->render('default/contactBus.html.twig');
    }

}