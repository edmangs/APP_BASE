<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use AppBundle\Form\Type\CollectionFormType;

class DataFormType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $container = $options['container'];
        
        $builder->add('dataCollections', CollectionType::class, array(
            'entry_type'   => CollectionFormType::class,
            'allow_add'    => true,
            'label'        => 'label.data.collecctions'
        ));
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => null,
            'container' => null
        ));
    }

}
