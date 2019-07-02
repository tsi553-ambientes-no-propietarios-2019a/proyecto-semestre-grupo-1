<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EstacionController extends AbstractController
{
    /**
     * @Route("/estacion", name="estacion")
     */
    public function index()
    {
        return $this->render('estacion/index.html.twig', [
            'controller_name' => 'EstacionController',
        ]);
    }
}
