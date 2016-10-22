<?php

namespace AppModelBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Clase;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class FixturesClase extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface {

    public function getOrder() {
        return 17;
    }

    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null) {
        $this->container = $container;
    }

    public function load(ObjectManager $manager) {
        $objects = json_decode('[{"name":"Clase 1","code":1,"parent":"Causal 1"},{"name":"Clase 2","code":2,"parent":"Causal 1"},{"name":"Clase 3","code":3,"parent":"Causal 2"},{"name":"Clase 4","code":4,"parent":"Causal 2"},{"name":"Clase 5","code":5,"parent":"Causal 3"},{"name":"Clase 6","code":6,"parent":"Causal 3"},{"name":"Clase 7","code":7,"parent":"Causal 4"},{"name":"Clase 8","code":8,"parent":"Causal 4"}]');
                
        foreach ($objects as $object) {
            $entity = new Clase();
            
            $entity->setName($object->name);
            $entity->setCode($object->code);
            $entity->setCausal($this->getReference('causal_' . $object->parent));
            
            $manager->persist($entity);
            
            $this->addReference('clase_' . $object->name, $entity);
        }
        
        $manager->flush();
    }
}