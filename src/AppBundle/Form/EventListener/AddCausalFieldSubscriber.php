<?php

namespace AppBundle\Form\EventListener;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class AddCausalFieldSubscriber implements EventSubscriberInterface {

    private $propertyPathToClase;
    private $container;

    public function __construct($propertyPathToClase, $container) {
        $this->propertyPathToClase= $propertyPathToClase;
        $this->container = $container;
    }

    public static function getSubscribedEvents() {
        return array(
            FormEvents::PRE_SET_DATA => 'preSetData',
            FormEvents::PRE_SUBMIT => 'preSubmit'
        );
    }

    private function addProvinceForm($form, $tramite_id, $province = null) {
        $formOptions = array(
            'class' => 'AppBundle:Causal',
            'placeholder' => 'select.option',
            'mapped' => false,
            'query_builder' => function (EntityRepository $repository) use ($tramite_id) {
                $qb = $repository->createQueryBuilder('c')
                    ->innerJoin('c.tramite', 't')
                    ->where('t.id = :tramite')
                    ->setParameter('tramite', $tramite_id)
                ;

                return $qb;
            },
            'attr'=>array(
                'onchange'=>'app.getClase(this)',
                'class' => 'form-control select-causal'
            )
        );

        if ($province) {
            $formOptions['data'] = $province;
        }

        $form->add($this->propertyPathToClase.'_causal', EntityType::class, $formOptions);
    }

    public function preSetData(FormEvent $event) {
        $data = $event->getData();
        $form = $event->getForm();
        $clase = null;
        if ($data) {
            $accessor = PropertyAccess::getPropertyAccessor();
            $clase = $accessor->getValue($data, $this->propertyPathToClase);
        }
        if (!$clase) {
            $container = $this->container;
            $em = $container->get('doctrine')->getManager();
            $clase = $em->getRepository('AppBundle:Clase')->findOneByCode(1);
        }
        $province = ($clase) ? $clase->getCausal() : null;
        $tramite_id = ($province) ? $province->getTramite()->getId() : null;
        $this->addProvinceForm($form, $tramite_id, $province);
    }

    public function preSubmit(FormEvent $event) {
        $data = $event->getData();
        $form = $event->getForm();

        $tramite_id = array_key_exists($this->propertyPathToClase.'_tramite', $data) ? $data[$this->propertyPathToClase.'_tramite'] : null;

        $this->addProvinceForm($form, $tramite_id);
    }

}
