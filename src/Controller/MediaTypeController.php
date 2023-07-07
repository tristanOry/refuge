<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MediaTypeController extends AbstractController
{
    #[Route('/media/type', name: 'app_media_type')]
    public function index(): Response
    {
        return $this->render('media_type/index.html.twig', [
            'controller_name' => 'MediaTypeController',
        ]);
    }
}
