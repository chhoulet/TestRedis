<?php

namespace BackOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FrontOfficeBundle\Entity\Image;
use FrontOfficeBundle\Form\ImageType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

Class ImageController extends Controller
{
	public function createAction(Request $request, $idArticle)
	{
		$em=$this->getDoctrine()->getManager();
		$session=$request->getSession();
		$listArticles=$em->getRepository('FrontOfficeBundle:Article')->findByActive(1);

		$listIdArticles=array();
		foreach($listArticles as $article)
		{
			$id=$article->getId();
			$listIdArticles[]=$id;
		}

		if($idArticle != null && in_array($idArticle, $listIdArticles))
		{
			$article= $em->getRepository('FrontOfficeBundle:Article')->find($idArticle);
			$image=new Image();
			$article->addImage($image);
			$image->setArticle($article);
			$form=$this->createForm(ImageType::class, $image);

			$form->handleRequest($request);

			if($form->isSubmitted() && $form->isValid())
			{
				$file=$image->getFilename();
				$filename=md5(uniqid()).'.'.$file->guessExtension();
				$file->move($this->getParameter('images_directory'), $filename);
				$image->setFilename($filename);

				$file1=$image->getFilename1();
				if($file1 != null)
				{
					$filename1=md5(uniqid()).'.'.$file1->guessExtension();
					$file1->move($this->getParameter('images_directory'), $filename1);
					$image->setFilename1($filename1);
				}

				$file2=$image->getFilename2();
				if($file2 != null)
				{
					$filename2=md5(uniqid()).'.'.$file2->guessExtension();
					$file2->move($this->getParameter('images_directory'), $filename2);
					$image->setFilename2($filename2);
				}

				$file3=$image->getFilename3();
				if($file3 != null)
				{
					$filename3=md5(uniqid()).'.'.$file3->guessExtension();
					$file3->move($this->getParameter('images_directory'), $filename3);
					$image->setFilename3($filename3);
				}

				$file4=$image->getFilename4();
				if($file4 != null)
				{
					$filename4=md5(uniqid()).'.'.$file4->guessExtension();
					$file4->move($this->getParameter('images_directory'), $filename4);
					$image->setFilename4($filename4);
				}

				$file5=$image->getFilename5();
				if($file5 != null)
				{
					$filename5=md5(uniqid()).'.'.$file5->guessExtension();
					$file5->move($this->getParameter('images_directory'), $filename5);
					$image->setFilename5($filename5);
				}

				$em->persist($image);
				$em->flush();

				$session->getFlashBag()->add('createImage','Cette image est bien ajouté à l\'article : '.$article->getTitle().'!');
				if($form->get('SaveAndCreate')->isClicked())
				{
					return $this->redirectToRoute('back_office_image_create', array('idArticle'=>$idArticle));
				}
				else
				{
					return $this->redirectToRoute('back_office_article_create');					
				}

			}

			return $this->render('BackOfficeBundle:Image:create.html.twig', array('form'=>$form->createView(), 'article'=>$article));
		}
		else
		{
			throw new NotFoundHttpException("Article inexistant");
		}
	}	
} 
