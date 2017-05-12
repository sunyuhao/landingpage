<?php

namespace Wunderman\ArvatoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('WundermanArvatoBundle:Default:index.html.twig');
    }
}
