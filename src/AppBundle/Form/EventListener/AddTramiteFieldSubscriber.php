<?php

namespace AppBundle\Form\EventListener;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class AddTramiteFieldSubscriber implements EventSubscriberInterface {

    private $propertyPathToCity;
    private $container;

    public function __construct($propertyPathToCity, $container) {
        $this->propertyPathToCity = $propertyPathToCity;
        $this->container = $container;
    }

    public static function getSubscribedEvents() {
        return array(
            FormEvents::PRE_SET_DATA => 'preSetData',
            FormEvents::PRE_SUBMIT => 'preSubmit'
        );
    }

    private function addClaseForm($form, $calse = null) {
        $formOptions = array(
            'class' => 'AppBundle:Tramite',
            'mapped' => false,
            'label' => 'Tramite',
            'empty_data' => null,
            'placeholder' => 'select.option',
            'attr'=>array(
                'class' => 'form-control select-tramite',
                'onchange'=>'app.getCausal(this)'
            )
        );

        if ($calse) {
            $formOptions['data'] = $calse;
        }

        $form->add($this->propertyPathToCity.'_tramite', EntityType::class, $formOptions);
    }

    public function preSetData(FormEvent $event) {
        $data = $event->getData();
        $form = $event->getForm();
        $clase = null;
        if ($data) {
            $accessor = PropertyAccess::getPropertyAccessor();
            $clase = $accessor->getValue($data, $this->propertyPathToCity);
        }
        if (!$clase) {
            $container = $this->container;
            $em = $container->get('doctrine')->getManager();
            $clase = $em->getRepository('AppBundle:Clase')->findOneByCode(1);
        }
        $country = ($clase) ? $clase->getCausal()->getTramite() : null;

        $this->addClaseForm($form, $country);
    }

    public function preSubmit(FormEvent $event) {
        $form = $event->getForm();

        $this->addClaseForm($form);
    }

}
