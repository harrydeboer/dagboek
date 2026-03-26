<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Page;
use App\Form\DeleteType;
use App\Form\PageType;
use App\Repository\PageRepositoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PageController extends Controller
{
    public function __construct(
        private readonly PageRepositoryInterface $pageRepository,
    ) {
    }

    #[Route('/pagina/wijzig/{id}', name: 'page_edit')]
    public function edit(Request $request, int $id): Response
    {
        $page = $this->pageRepository->get($id);

        $form = $this->createForm(PageType::class, $page, [
            'method' => 'POST',
        ]);

        $formDelete = $this->createForm(DeleteType::class, $page, [
            'action' => $this->generateUrl('page_delete', ['id' => $page->getId()]),
            'method' => 'POST',
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->pageRepository->update($page);

            return $this->redirectToRoute('homepage');
        }

        return $this->render('page/edit.html.twig', [
            'form' => $form->createView(),
            'formDelete' => $formDelete->createView(),
        ]);
    }

    #[Route('/pagina/toevoegen', name: 'page_create')]
    public function new(Request $request): Response
    {
        $page = new Page();
        $form = $this->createForm(PageType::class, $page);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->pageRepository->create($page);

            return $this->redirectToRoute('homepage');
        }

        return $this->render('page/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/pagina/verwijder/{id}', name: 'page_delete')]
    public function delete(Request $request, int $id): RedirectResponse
    {
        $page = $this->pageRepository->get($id);

        $form = $this->createForm(DeleteType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->pageRepository->delete($page);
        }

        return $this->redirectToRoute('homepage');
    }
}
