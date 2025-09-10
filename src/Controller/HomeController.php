<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
        #[Route('/', name: 'home')]
        public function index(): Response
        {
            return $this->render('home/home.html.twig');
        }

        #[Route('/apropos', name: 'apropos')]
        public function apropos(): Response
        {
            return $this->render('apropos/apropos.html.twig');
        }

        #[Route('/contact', name: 'contact')]
        public function contact(): Response
        {
            return $this->render('contact/contact.html.twig');
        }
}
