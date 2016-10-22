<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AjaxController extends Controller {
    
    public function causalesAction(Request $request)
    {
        $id = $request->get('id');
        
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('AppBundle:Causal')->findBy(array("tramite" => $id));
        
        $serializer = $this->container->get('jms_serializer');
        $json = $serializer->serialize($entities, 'json');
        
        $response = new Response($json);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    public function clasesAction(Request $request)
    {   
        $id = $request->request->get('id');

        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('AppBundle:Clase')->findBy(array('causal' => $id));
        
        $serializer = $this->container->get('jms_serializer');
        $json = $serializer->serialize($entities, 'json');
        
        $response = new Response($json);
        $response->headers->set('Content-Type', 'application/json');
        
        return $response;
    }
    
}
