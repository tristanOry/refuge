<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RaceController extends AbstractController
{
    #[Route('/pensionnaires', name: 'app_race')]
    public function show(): Response
    {
        return $this->render('race/index.html.twig', [
            'controller_name' => 'RaceController',
        ]);
    }

    #[Route('/pensionnaires/{slug}', name: 'app_race_by_race')]
    public function showFamily(Request $request): Response
    {
        return $this->render('race/index.html.twig', [
            'controller_name' => 'RaceController->Family',
            'slug' => $request->attributes->get('slug'),
        ]);
    }
}
