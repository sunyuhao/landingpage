<?php

namespace Wunderman\LandingPageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('WundermanLandingPageBundle:Default:index.html.twig');
    }
}
