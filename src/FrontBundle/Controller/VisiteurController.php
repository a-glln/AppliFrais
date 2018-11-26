<?php

namespace FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class VisiteurController extends Controller
{
    public function indexAction()
    {

        $nom = "toto";

        return $this->render('@Front/Visiteur/index.html.twig',
            array(
                "nom" => $nom
            ));
    }

    public function listeFichesAction()
    {


        return $this->render('@Front/Visiteur/liste_fiches.html.twig');
    }
}
