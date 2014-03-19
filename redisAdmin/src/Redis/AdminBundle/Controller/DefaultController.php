<?php

namespace Redis\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('RedisAdminBundle:Default:index.html.twig', array('name' => $name));
    }
}
