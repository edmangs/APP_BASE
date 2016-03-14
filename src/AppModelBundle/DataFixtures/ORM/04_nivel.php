<?php

namespace AppModelBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppModelBundle\Entity\Nivel;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class FixturesNivel extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface {

    public function getOrder() {
        return 4;
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
        
        $entities = array(
            array( 'nombre' => 'Alto' ),
            array( 'nombre' => 'Bajo' ),
            array( 'nombre' => 'Medio' )
        );
        
        foreach ($entities as $entity) {
            $object = new Nivel();
            $object->setNombre($entity["nombre"]);
            $object->setFechaCreacion(new \DateTime());
            
            $manager->persist($object);
            $this->addReference('nivel_'.$entity['nombre'], $object);
        }
        $manager->flush();
    }

}

?>