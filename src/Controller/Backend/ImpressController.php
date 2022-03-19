<?php

namespace App\Controller\Backend;

use App\Entity\Impress;
use App\Form\ImpressType;
use App\Repository\ImpressRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/impress', name: 'backend_')]
class ImpressController extends AbstractController
{
    #[Route('/', name: 'impress_index', methods: ['GET'])]
    public function index(ImpressRepository $impressRepository): Response
    {
        return $this->render(
            'backend/impress/index.html.twig',
            [
                'impresses' => $impressRepository->findAll(),
            ]
        );
    }

    #[Route('/new', name: 'impress_new', methods: [
        'GET',
        'POST'])]
    public function new(Request $request, ImpressRepository $impressRepository): Response
    {
        $impress = new Impress();
        $form = $this->createForm(ImpressType::class, $impress);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $impressRepository->add($impress);

            return $this->redirectToRoute('backend_impress_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm(
            'backend/impress/new.html.twig',
            [
                'impress' => $impress,
                'form' => $form,
            ]
        );
    }

    #[Route('/{id}', name: 'impress_show', methods: ['GET'])]
    public function show(Impress $impress): Response
    {
        return $this->render(
            'backend/impress/show.html.twig',
            [
                'impress' => $impress,
            ]
        );
    }

    #[Route('/{id}/edit', name: 'impress_edit', methods: [
        'GET',
        'POST'])]
    public function edit(Request $request, Impress $impress, ImpressRepository $impressRepository): Response
    {
        $form = $this->createForm(ImpressType::class, $impress);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $impressRepository->add($impress);

            return $this->redirectToRoute('backend_impress_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm(
            'backend/impress/edit.html.twig',
            [
                'impress' => $impress,
                'form' => $form,
            ]
        );
    }

    #[Route('/{id}', name: 'impress_delete', methods: ['POST'])]
    public function delete(Request $request, Impress $impress, ImpressRepository $impressRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $impress->getId(), $request->request->get('_token'))) {
            $impressRepository->remove($impress);
        }

        return $this->redirectToRoute('backend_impress_index', [], Response::HTTP_SEE_OTHER);
    }
}
