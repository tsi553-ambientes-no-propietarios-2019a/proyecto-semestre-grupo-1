<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UsrController extends AbstractController
{
    /**
     * @Route("/usr", name="usr")
     */
    public function index()
    {
        return $this->render('usr/index.html.twig', [
            'controller_name' => 'UsrController',
        ]);
    }
}
