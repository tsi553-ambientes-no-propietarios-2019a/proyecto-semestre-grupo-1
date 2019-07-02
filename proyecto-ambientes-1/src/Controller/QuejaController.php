<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class QuejaController extends AbstractController
{
    /**
     * @Route("/queja", name="queja")
     */
    public function index()
    {
        return $this->render('queja/index.html.twig', [
            'controller_name' => 'QuejaController',
        ]);
    }
}
