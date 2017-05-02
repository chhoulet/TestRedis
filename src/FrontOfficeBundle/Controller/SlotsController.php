<?php

namespace FrontOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use FrontOfficeBundle\Entity\Message;
use FrontOfficeBundle\Form\MessageType;

Class SlotsController extends Controller
{
	public function contactAction(Request $request)
	{
		$em=$this->getDoctrine()->getManager();
		$session=$request->getSession();
		$message=new Message();
		$form=$this->createForm(MessageType::class, $message);

		$form->handleRequest($request);

		if($form->isSubmitted() && $form->isValid())
		{
			$message->setDateCreated(new \DateTime());
			$em->persist($message);
			$em->flush();

			$session->getFlashBag()->add('createMess', 'Ce message est envoyé !');
			return $this->redirectToRoute('front_office_slots_contact');
		}

		return $this->render('FrontOfficeBundle:Slots:contact.html.twig', 
			array('form'=>$form->createView()));
	}

	public function aboutAction()
	{
		return $this->render('FrontOfficeBundle:Slots:about.html.twig');
	}
}