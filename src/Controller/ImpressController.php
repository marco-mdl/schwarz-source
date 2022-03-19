<?php

namespace App\Controller;

use App\Entity\Impress;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ImpressController extends AbstractController
{
    #[Route('/{language}/impressum', name: 'impress_show', methods: ['GET'])]
    public function show(Impress $impress): Response
    {
        return $this->render(
            'impress/show.html.twig',
            [
                'impress' => $impress,
            ]
        );
    }
}
