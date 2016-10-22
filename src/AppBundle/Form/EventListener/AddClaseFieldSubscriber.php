<?php

namespace AppBundle\Form\EventListener;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class AddClaseFieldSubscriber implements EventSubscriberInterface {

    private $propertyPathToClase;
    private $container;
    private $causal;

    public function __construct($propertyPathToClase, $container) {
        $this->propertyPathToClase = $propertyPathToClase;
        $this->container = $container;
    }

    public static function getSubscribedEvents() {
        return array(
            FormEvents::PRE_SET_DATA => 'preSetData',
            FormEvents::PRE_SUBMIT => 'preSubmit'
        );
    }

    private function addClaseForm($form, $causal, $clase = null) {
        $formOptions = array(
            'class' => 'AppBundle\Entity\Clase',
            'placeholder' => 'select.option',
            'class' => 'AppBundle:Clase',
            'query_builder' => function (EntityRepository $repository) {
                $qb = $repository->createQueryBuilder('ca')
                        ->innerJoin('ca.causal', 'cl')
                        ->where('cl.id = :causal')
                        ->setParameter('causal', $this->causal)
                ;
                
                return $qb;
            },
            'attr' => [
                'class' => 'form-control select-clase'
            ]
        );

        if ($clase) {
            $formOptions['data'] = $clase;
        }
        
        $form->add($this->propertyPathToClase, 'entity', $formOptions);
    }

    public function preSetData(FormEvent $event) {
        $data = $event->getData();
        $form = $event->getForm();
        $clase = null;
        if ($data) {
            $accessor = PropertyAccess::createPropertyAccessor();
            $clase = $accessor->getValue($data, $this->propertyPathToClase);
        }
        if (!$clase) {
            $container = $this->container;
            $em = $container->get('doctrine')->getManager();
            $clase = $em->getRepository('AppBundle:Clase')->findOneByCode(1);
        }
        $province_id = ($clase) ? $clase->getCausal()->getId() : null;
        $this->causal = $province_id;
        
        $this->addClaseForm($form, $province_id, $clase);
    }

    public function preSubmit(FormEvent $event) {
        $data = $event->getData();
        $form = $event->getForm();

        $province_id = array_key_exists($this->propertyPathToClase.'_clase', $data) ? $data[$this->propertyPathToClase.'_clase'] : null;

        $this->addClaseForm($form, $province_id);
    }

}
