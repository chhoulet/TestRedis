<?php

namespace FrontOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

Class ArticleController extends Controller
{
	public function listAction()
	{
		$em=$this->getDoctrine()->getManager();
		$listArticles=$em->getRepository('FrontOfficeBundle:Article')->findByActive(1);
		
		return $this->render('FrontOfficeBundle:Article:list.html.twig', array('listArticles'=>$listArticles));
	}
}