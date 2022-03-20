<?php

namespace App\Controller;

use App\Service\RandomUsersService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route('/user', name: 'user', methods: ['GET'])]
    public function index(RandomUsersService $randomUsersService): Response
    {
        return $this->render(
            'user/index.html.twig',
            [
                'users' => $randomUsersService->getRandomUsers(),
            ]
        );
    }
}
