<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(): RedirectResponse
    {
        return $this->redirectToRoute('backend_impress_index');
    }
}
