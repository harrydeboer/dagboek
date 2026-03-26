<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\PageRepositoryInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomepageController extends Controller
{
    public function __construct(
        private readonly PageRepositoryInterface $pageRepository,
    ) {
    }

    #[
        Route('/', name: 'homepage'),
    ]
    public function view(): Response
    {
        $pages = $this->pageRepository->findAll();

        return $this->render('homepage/view.html.twig', [
            'pages' => $pages,
        ]);
    }
}
