<?php

namespace CommitStripBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function showAction($id)
    {
    	$em = $this->getDoctrine()->getManager();
    	$card = $em->getRepository('CommitStripBundle:Card')->find($id);

        $prev_card = $em->getRepository('CommitStripBundle:Card')->getPrev($id);
        $next_card = $em->getRepository('CommitStripBundle:Card')->getNext($id);

        return $this->render('CommitStripBundle:Default:show.html.twig', array(
            'card' => $card,
            'next_card' => $next_card,
        	'prev_card' => $prev_card,
        	));
    }
}
