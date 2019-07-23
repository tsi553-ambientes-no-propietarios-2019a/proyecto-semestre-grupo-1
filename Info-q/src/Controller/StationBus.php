<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StationBus extends AbstractController
{
    /**
     * @Route("/estaciones", name="stationbus_index", methods={"GET"})
     */
    public function index(): Response
    {
        return $this->render('default/stationBus.html.twig');
    }

}