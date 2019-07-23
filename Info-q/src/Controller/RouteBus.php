<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class RouteBus extends AbstractController
{
    /**
     * @Route("/rutas", name="routebus_index", methods={"GET"})
     */
    public function index(): Response
    {
        return $this->render('default/routeBus.html.twig');
    }

}