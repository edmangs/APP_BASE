<?php

namespace AppModelBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppModelBundle\Entity\ProteccionSeguridad;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Session\Session;

class FixturesProteccionSeguridad extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface {

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
        
        for($i = 0; $i <= 15; $i++) {
            
            $object = new ProteccionSeguridad();
            
            $object->setNombre($this->getNombreProteccion());
            $object->setFechaCreacion(new \DateTime());
            $object->setUsuario($this->getReference('usuario_' . rand(0, 49)));
            $object->setProcesoJuridico($this->getReference($this->getProcesoJuridicos()));
            $object->setNivel($this->getReference('nivel_' . $this->getNivel()));
            
            $manager->persist($object);
            $this->addReference('proceso_seguridad_'.$i, $object);
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