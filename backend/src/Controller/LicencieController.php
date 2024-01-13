<?php

namespace App\Controller;

use App\Repository\LicencieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LicencieController extends AbstractController
{
    #[Route('/licencie', name: 'app_licencie')]
    public function index(LicencieRepository $licencieRepository): Response
    {
        $licencies = $licencieRepository->findAll();
        return $this->render('licencie/index.html.twig', [
            'licencies' => $licencies,
        ]);
    }
}
