<?php

namespace BackOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FrontOfficeBundle\Entity\Article;
use FrontOfficeBundle\Form\ArticleType;
use Symfony\Component\HttpFoundation\Request;

Class ArticleController extends Controller
{
	public function createAction(Request $request)
	{
		$em=$this->getDoctrine()->getmanager();
		$session=$request->getSession();
		$listArticles=$em->getRepository('FrontOfficeBundle:Article')->findAll();
		$article=new Article();		
		$form=$this->createForm(ArticleType::class, $article);

		$form->handleRequest($request);

		if($form->isSubmitted() && $form->isValid())
		{

			$article->setDateCreated(new \DateTime());
			$em->persist($article);
			$em->flush();

			$idArticle=$article->getId();

			/*$nextAction = $form->get('saveAndAdd')->isClicked()
		        ? 'back_office_image_create', array('idArticle'=>$idArticle)
		        : 'back_office_homepage';*/

			$session->getFlashBag()->add('createArticle', 'Cet article est bien créé !');
		    if($form->get('saveAndAdd')->isClicked())
		    {
				return $this->redirectToRoute('back_office_image_create', array('idArticle'=>$idArticle));		    	
		    }
		    else
		    {
		    	return $this->redirectToRoute('back_office_article_create');
		    }

		}

		return $this->render('BackOfficeBundle:Article:create.html.twig', 
			array('listArticles'=>$listArticles,
				  'article'     =>$article,
				  'form'		=>$form->createView()));
	}

	public function activateAction(Request $request, $idArticle)
	{
		$em=$this->getDoctrine()->getManager();
		$session=$request->getSession();
		$listArticles=$em->getRepository('FrontOfficeBundle:Article')->findByActive(2);

		$listIdUnactive=[];
		foreach($listArticles as $article)
		{
			$id=$article->getId();
			$listIdUnactive[]=$id;
		}

		if($idArticle != null && in_array($idArticle, $listIdUnactive))
		{
			$article=$em->getRepository('FrontOfficeBundle:Article')->find($id);
			$article->setActive(1);
			$em->flush();

			$session->getFlashBag()->add('activate', $article->getTitle() .' is now activated !');
			return $this->redirectToRoute('back_office_article_create');
		}
		else
		{
			throw new NotFoundHttpException("Page not found");
		}
	}

	public function desactivateAction(Request $request, $idArticle)
	{
		$em=$this->getDoctrine()->getManager();
		$session=$request->getSession();
		$listArticles=$em->getRepository('FrontOfficeBundle:Article')->findByActive(1);

		$listIdUnactive=[];
		foreach($listArticles as $article)
		{
			$id=$article->getId();
			$listIdUnactive[]=$id;
		}

		if($idArticle != null && in_array($idArticle, $listIdUnactive))
		{
			$article=$em->getRepository('FrontOfficeBundle:Article')->find($id);
			$article->setActive(2);
			$em->flush();

			$session->getFlashBag()->add('desactivate', $article->getTitle() .' is now desactivated !');
			return $this->redirectToRoute('back_office_article_create');
		}
		else
		{
			throw new NotFoundHttpException("Page not found");
		}
	}
}

