<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EstadoController extends AbstractController
{
    /**
     * @Route("/estado", name="estado")
     */
    public function index()
    {
        return $this->render('estado/index.html.twig', [
            'controller_name' => 'EstadoController',
        ]);
    }
}
