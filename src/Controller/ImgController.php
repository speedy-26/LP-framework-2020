<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Un controller pour la gestion d'une banque d'images
 * @Route("/img")
 * Class ImgController
 * @package App\Controller
 */
class ImgController extends AbstractController
{
    /**
     * Affiche une page d'accueil, ligne graphique + message de bienvenu
     * @Route("/home", name="home_img")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function home() {
        return $this->render('img/home.html.twig',[]);
    }
}