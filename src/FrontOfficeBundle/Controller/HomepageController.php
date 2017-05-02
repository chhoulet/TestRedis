<?php

namespace FrontOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Cache\Adapter\RedisAdapter;

class HomepageController extends Controller
{
    public function homepageAction()
    {
    	$em=$this->getDoctrine()->getManager();
    	/*$cache = new RedisAdapter($redisConnection);*/
    	$cache = $this->container->get('snc_redis.default');	

    	$cachedlistArticles = $this->get('cache.app')->getItem('listArticles');
        if (!$cachedlistArticles->isHit()) {
            $listArticles = $em->getRepository('FrontOfficeBundle:Article')->findAll(); 
            $cachedlistArticles->set($listArticles);
            $this->get('cache.app')->save($cachedlistArticles);
        } else {
            $listArticles = $cachedlistArticles->get();
/*var_dump($cachedlistArticles);die;*/
        }          	
           
        return $this->render('FrontOfficeBundle:Homepage:homepage.html.twig', 
				array('listArticles'=>$listArticles));  
    }
}
