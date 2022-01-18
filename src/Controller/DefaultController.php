<?php

namespace App\Controller;

use App\Service\PanierService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

class DefaultController extends AbstractController
{
    /**
     * @Route("/default", name="default")
     */
    public function index(TranslatorInterface $translatable): Response
    {
        $translated = $translatable->trans('default.index.header');
        $translated = $translatable->trans('default.index.titre');

        return $this->render('index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }
    public function contact(): Response
    {
        return $this->render('contact.html.twig', [
            'controller_name' => 'DefaultController'
        ]);
    }

    public function navBar(PanierService $panierService){
        $nbProduit = $panierService->getNbProduits();
        return $this->render('template.html.twig',[
            'panier' => $nbProduit
        ]);
    }

}
