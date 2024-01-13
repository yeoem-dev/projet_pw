<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategorieController extends AbstractController
{
    #[Route('/categorie', name: 'categorie_index')]
    public function index(CategorieRepository $categorieRepository): Response
    {
        $categories =  $categorieRepository->findAll();
        return $this->render('categorie/index.html.twig', 
                                ['categories'=>$categories]
                            );
    }

    #[Route("/categorie/{id}/licencies", name:"categorie_licencies")]
    public function licencies($id, CategorieRepository $categorieRepository): Response
    {
        $categorie = $categorieRepository->find($id);

        if (!$categorie) {
            throw $this->createNotFoundException('La catégorie demandée n\'existe pas');
        }

        $licencies = $categorie->getLicencies();

        return $this->render('categorie/licencies.html.twig', [
            'categorie' => $categorie,
            'licencies' => $licencies,
        ]);
    }

    #[Route("/categorie/{id}/contacts", name: "categorie_contacts")]
    
    public function contacts($id, CategorieRepository $categorieRepository): Response
    {
        $categorie = $categorieRepository->find($id);

        if (!$categorie) {
            throw $this->createNotFoundException('Catégorie non trouvée');
        }

        $contacts = [];
        foreach ($categorie->getLicencies() as $licencie) {
            foreach ($licencie->getContacts() as $contact) {
                $contacts[] = $contact;
            }
        }

        return $this->render('categorie/contacts.html.twig', [
            'contacts' => $contacts,
        ]);
    }
}
