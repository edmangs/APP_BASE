<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\Type\DataFormType;
use AppBundle\Entity\TramiteCausalClase;

class DefaultController extends Controller
{
    protected $em;

    public function setContainer(\Symfony\Component\DependencyInjection\ContainerInterface $container = null) {
        parent::setContainer($container);
        
        $this->em = $this->getDoctrine()->getManager();
        $this->trans = $container->get('translator');
    }
    
    public function indexAction(Request $request)
    {
        $form = $this->createForm(DataFormType::class, null, ['container' => $this->container]);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            foreach ($form->get("dataCollections")->getData() as $key => $collection) {
                $entity = new TramiteCausalClase();
                
                $entity->setClase($collection['clase']);
                $entity->setCausal($collection['clase']->getCausal());
                $entity->setTramite($collection['clase']->getCausal()->getTramite());
                
                $this->em->persist($entity);
            }
            
            $this->em->flush();
            
            if($form->get("dataCollections")->getData()){
                $this->addFlash('success', $this->trans->trans('save.data.successfully'));
            }else{
                $this->addFlash('warning', $this->trans->trans('not.save.data'));
            }
        }
        
        return $this->render('AppBundle:Default:index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
