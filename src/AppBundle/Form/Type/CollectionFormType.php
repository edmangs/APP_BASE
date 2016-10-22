<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Form\EventListener\AddTramiteFieldSubscriber;
use AppBundle\Form\EventListener\AddCausalFieldSubscriber;
use AppBundle\Form\EventListener\AddClaseFieldSubscriber;
use Symfony\Component\DependencyInjection\ContainerInterface;

class CollectionFormType extends AbstractType {
    
    protected $container;

    public function setContainer(ContainerInterface $container = null) {
        $this->container = $container;
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $propertyPathClase = "clase";
        
        $builder
            ->addEventSubscriber(new AddTramiteFieldSubscriber($propertyPathClase, $this->container))
            ->addEventSubscriber(new AddCausalFieldSubscriber($propertyPathClase, $this->container))
            ->addEventSubscriber(new AddClaseFieldSubscriber($propertyPathClase, $this->container))
        ;
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => null,
            'container' => null
        ));
    }

}
