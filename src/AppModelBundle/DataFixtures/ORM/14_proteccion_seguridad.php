<?php

namespace AppModelBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppModelBundle\Entity\ProteccionSeguridad;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use AppModelBundle\DataFixtures\ORM\FixturesUsuario;
use AppModelBundle\DataFixtures\ORM\FixturesEntidadProteccion;

class FixturesProteccionSeguridad extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface {

    public function getOrder() {
        return 14;
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
        
        for($i = 0; $i <= 150; $i++) {
            
            $object = new ProteccionSeguridad();
            
            $object->setNombre($this->getNombreProteccion());
            
            $user = $this->getReference('usuario_' . rand(0, 499));
            $userFixtures = new FixturesUsuario();
            $entityFixtures = new FixturesEntidadProteccion();
            
            $entities = $entityFixtures->getEntities();
            $entity = $entities[rand(0, 25)];
            
            $date = $userFixtures->getDate($user->getFechaCreacion());
            $newDate = date('Y-m-d', strtotime($date['date']. ' '.$date['operator'].' '.$date['days'].' days'));
            $object->setFechaCreacion(new \DateTime($newDate));
            
            $object->setEntidadProteccion($this->getReference('entidad_proteccion_' . $entity['name']));
            $object->setUsuario($user);
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