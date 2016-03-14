<?php

namespace AppModelBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppModelBundle\Entity\TipoTrabajo;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class FixturesTipoTrabajo extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface {

    public function getOrder() {
        return 5;
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
            array( 'nombre' => 'Reportaje' ),
            array( 'nombre' => 'Entrevista' ),
            array( 'nombre' => 'Encabezados' ),
            array( 'nombre' => 'Informativo' ),
            array( 'nombre' => 'Audiovisuales' ),
            array( 'nombre' => 'Otros' )
        );
        
        foreach ($entities as $entity) {
            $object = new TipoTrabajo();
            $object->setNombre($entity["nombre"]);
            $object->setFechaCreacion(new \DateTime());
            
            $manager->persist($object);
            $this->addReference('tipo_trabajo_'.$entity['nombre'], $object);
        }
        $manager->flush();
    }

}

?>