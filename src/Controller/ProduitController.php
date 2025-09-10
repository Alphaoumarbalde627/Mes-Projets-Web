<?php

namespace App\Controller;


use App\Entity\Produit;
use App\Form\ProduitType;
use Doctrine\ORM\EntityManagerInterface;
use Dom\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

use function PHPUnit\Framework\isNull;

class ProduitController extends AbstractController
{
    #[Route('/produit', name: 'app_produit')]
    public function index(EntityManagerInterface $entitymanager): Response
    {
        $produits = $entitymanager->getRepository(Produit::class)->findAll();
        
        return $this->render('produit/produit.html.twig', [
            'controller_name' => 'ProduitController',
            'produits' => $produits,
        ]);
    }


    #[Route('/produit/new', name: 'app_produit_new')]
    public function nouveau(Request $request, EntityManagerInterface $entitymanager): Response
    {
        $produit = new Produit();
        $form = $this->createForm(ProduitType::class, $produit);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){
            $produit->setValide(true);

            $entitymanager->persist($produit);
            $entitymanager->flush();

            return $this->redirectToRoute('app_produit');

        }

        return $this->render('produit/newproduit.html.twig', [
            'controller_name' => 'ProduitController',
            'form' => $form->createView()
        ]);
    }


    #[Route('/produit/{id}', name: 'app_produit_detail')]
    public function detail(EntityManagerInterface $entitymanager, $id): Response
    {
        $produit = $entitymanager->getRepository(Produit::class)->findOneBy(['id' => $id]);

        if (is_null($produit)) {
            return $this->redirectToRoute('app_produit');
        }

        return $this->render('produit/detailproduit.html.twig', [
            'controller' => 'ProduitController',
            'produit' => $produit,
            'id'    => $id
        ]);

        
    }
}