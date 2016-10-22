<?php

namespace AppModelBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Causal;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class FixturesCausal extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface {

    public function getOrder() {
        return 16;
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
        $objects = json_decode('[{"name":"Causal 1","code":1,"parent":"Tramite 1"},{"name":"Causal 2","code":2,"parent":"Tramite 1"},{"name":"Causal 3","code":3,"parent":"Tramite 2"},{"name":"Causal 4","code":4,"parent":"Tramite 2"}]');
                
        foreach ($objects as $object) {
            $entity = new Causal();
            
            $entity->setName($object->name);
            $entity->setCode($object->code);
            $entity->setTramite($this->getReference('tramite_' . $object->parent));
            
            $manager->persist($entity);
            
            $this->addReference('causal_' . $object->name, $entity);
        }
        
        $manager->flush();
    }
}