<?php

namespace Wunderman\LandingPageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Wunderman\ArvatoBundle\Service\ArvatoProvider;

class InactifsController extends Controller
{
    public function indexAction(Request $request)
    {
//        if($request->query->has('nom'))
//            $name = $request->query->get('nom');
//        else
//            $name = "Cher client";
        $response = new Response();
        return $this->render('WundermanLandingPageBundle:Inactifs:index.html.twig',array(
//            'name'=>$name
        ),$response);
    }
}
