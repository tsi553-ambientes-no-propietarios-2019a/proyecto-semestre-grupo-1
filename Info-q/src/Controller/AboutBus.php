<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AboutBus extends AbstractController
{
    /**
     * @Route("/sobrenostros", name="aboutbus_index", methods={"GET"})
     */
    public function index(): Response
    {
        return $this->render('default/aboutBus.html.twig');
    }

}