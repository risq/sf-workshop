<?php

namespace Dev\PCultBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('DevPCultBundle:Default:index.html.twig', array('name' => $name));
    }
}
