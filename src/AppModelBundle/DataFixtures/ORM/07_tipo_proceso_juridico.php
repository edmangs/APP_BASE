<?php

namespace AppModelBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppModelBundle\Entity\TipoProcesoJuridico;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class FixturesTipoProcesoJuridico extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface {

    public function getOrder() {
        return 7;
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
            array( 'nombre' => 'Acoso' ),
            array( 'nombre' => 'Agresión fisica' ),
            array( 'nombre' => 'Agresión verbal' ),
            array( 'nombre' => 'Amenazas' ),
            array( 'nombre' => 'Atentados' ),
            array( 'nombre' => 'Intento de asesinaro' )
        );
        
        foreach ($entities as $entity) {
            $object = new TipoProcesoJuridico();
            $object->setNombre($entity["nombre"]);
            $object->setFechaCreacion(new \DateTime());
            
            $manager->persist($object);
            $this->addReference('tipo_proceso_juridico_'.$entity['nombre'], $object);
        }
        $manager->flush();
    }
    
}

?>