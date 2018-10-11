<?php

namespace FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ComptableController extends Controller
{
    public function indexAction()
    {

        $nom = "toto";

        return $this->render('@Front/Default/index.html.twig', array("nom" => $nom));
    }
}
