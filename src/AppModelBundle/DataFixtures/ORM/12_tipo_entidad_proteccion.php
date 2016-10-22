<?php

namespace AppModelBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppModelBundle\Entity\TipoEntidadProteccion;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use AppModelBundle\DataFixtures\ORM\FixturesUsuario;

class FixturesTipoEntidadProteccion extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface {

    public function getOrder() {
        return 12;
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
        
        $types = array("Entidades del ejecutivo", "Ministerio Público", "Nacionales no gubernamentales");
        
        foreach ($types as $key => $type) {
            $object = new TipoEntidadProteccion();
            
            $object->setName($type);
            $object->setFechaCreacion(new \DateTime());
            
            $manager->persist($object);
            $this->addReference('tipo_entidad_proteccion_'.$type, $object);
        }
        
        $manager->flush();
    }
    
    public function getNivel() {
        $nivel = array( 'Alto', 'Bajo', 'Medio' );
        
        return $nivel[rand(0, 2)];
    }
    
    public function getProcesoJuridicos() {
        $session = new Session();
        $procesoJuridicos = $session->get('procesoJuridicos');
        
        return $procesoJuridicos[rand(0, count($procesoJuridicos) - 1)];
    }
    
    public function getNombreProteccion() {
        $nombre = array('Escolta', 'Seguridad internacional', 'Exilio pilitico');
        
        return $nombre[rand(0, 2)];
    }
}