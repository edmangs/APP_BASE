<?php

namespace AppModelBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppModelBundle\Entity\TipoUsuario;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class FixturesTipoUsuario extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface {

    public function getOrder() {
        return 2;
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
            array( 'nombre' => 'admin' ),
            array( 'nombre' => 'periodista' )
        );
        
        foreach ($entities as $entity) {
            $object = new TipoUsuario();
            $object->setNombre($entity["nombre"]);
            $object->setFechaCreacion(new \DateTime());
            
            $manager->persist($object);
            $this->addReference('tipo_usuario_'.$entity['nombre'], $object);
        }
        $manager->flush();
    }

}

?>