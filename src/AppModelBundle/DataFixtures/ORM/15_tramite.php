<?php

namespace AppModelBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Tramite;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class FixturesTramite extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface {

    public function getOrder() {
        return 15;
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
        $objects = json_decode('[{"name":"Tramite 1","code":1},{"name":"Tramite 2","code":2}]');
                
        foreach ($objects as $object) {
            $entity = new Tramite();
            
            $entity->setName($object->name);
            $entity->setCode($object->code);
            
            $manager->persist($entity);
            
            $this->addReference('tramite_' . $object->name, $entity);
        }
        
        $manager->flush();
    }
}