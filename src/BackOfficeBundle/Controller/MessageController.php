<?php

namespace BackOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Request;


class MessageController extends Controller
{
	public function listAction()
	{
		$em=$this->getDoctrine()->getManager();
		$listMessages=$em->getRepository('FrontOfficeBundle:Message')->findAll();

		return $this->render('BackOfficeBundle:Message:list.html.twig', 
			array('listMessages'=>$listMessages));
	}

	public function stateAction(Request $request, $action, $idMessage)
	{
		$em=$this->getDoctrine()->getManager();
		$session=$request->getSession();
		$listMessages=$em->getRepository('FrontOfficeBundle:Message')->findAll();
		$listIdMessages=[];

		foreach($listMessages as $message)
		{
			$id=$message->getId();
			$listIdMessages[]=$id;
		}

		if($idMessage != null && in_array($idMessage, $listIdMessages))
		{
			$message=$em->getRepository('FrontOfficeBundle:Message')->find($idMessage);
			if($action == 2)
			{
				if(!$message->getDateAnswered())
				{
					$message->setState(2);					
				}
				else
				{
					$message->setDateAnswered(null);
					$message->setState(2);
				}

				$em->flush();
				$session->getFlashBag()->add('messageRead','This message is now in read state');
			}
			else
			{
				$message->setState(3);
				$message->setDateAnswered(new \DateTime());
				$em->flush();
				$session->getFlashBag()->add('messageAnswered','This message is answered state');
			}

			return $this->redirectToRoute('back_office_message_list');
		}
		else
		{
			throw new NotFoundHttpException("Message not found");
		}
	}

	public function deleteAction(Request $request, $idMessage)
	{
		$em=$this->getDoctrine()->getManager();
		$session=$request->getSession();
		$listMessages=$em->getRepository('FrontOfficeBundle:Message')->findAll();
		$listIdMessages=[];

		foreach($listMessages as $message)
		{
			$id=$message->getId();
			$listIdMessages[]=$id;
		}

		if($idMessage != null && in_array($idMessage, $listIdMessages))
		{
			$em->remove($message);
			$em->flush();

			$session->getFlashBag()->add('removeMess', 'This message is deleted !');
			return $this->redirectToRoute('back_office_message_list');
		}
		else
		{
			throw new NotFoundHttpException("Message not found");
		}
	}
}