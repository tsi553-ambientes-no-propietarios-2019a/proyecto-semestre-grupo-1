<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UnidadController extends AbstractController
{
    /**
     * @Route("/unidad", name="unidad")
     */
    public function index()
    {
        return $this->render('unidad/index.html.twig', [
            'controller_name' => 'UnidadController',
        ]);
    }
}
