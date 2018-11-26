<?php

namespace FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ComptableController extends Controller
{
    public function indexAction()
    {

        $nom = $this->getUser()->getUserName();


        return $this->render('@Front/Comptable/index.html.twig',
            array(
                "nom" => $nom
            )
        );
    }
}
