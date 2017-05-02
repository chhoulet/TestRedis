<?php

namespace BackOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DashboardController extends Controller
{
    public function dashboardAction()
    {
    	$em=$this->getDoctrine()->getManager();
    	$listMessages=$em->getRepository('FrontOfficeBundle:Message')->findAll();
    	$nbrMessages=count($listMessages);

        return $this->render('BackOfficeBundle:Dashboard:dashboard.html.twig', 
        	array('nbrMessages'=>$nbrMessages));        
    }
}
