<?php

namespace Wunderman\LandingPageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AbonnementController extends Controller
{
    public function indexAction(Request $request)
    {
//        if($request->query->has('nom'))
//            $name = $request->query->get('nom');
//        else
//            $name = "Cher client";
        $response = new Response();
        return $this->render('WundermanLandingPageBundle:Abonnement:index.html.twig',array(
        ),$response);
    }
}
