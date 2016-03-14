<?php

namespace AppModelBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppModelBundle\Entity\NivelEducativoUsuario;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class FixturesNivelEducativoUsuario extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface {

    public function getOrder() {
        return 10;
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
        
        for($i = 0; $i <= 25; $i++) {
            
            $object = new NivelEducativoUsuario();
            
            $object->setAnoFinalizacion(new \DateTime());
            $object->setFechaCreacion(new \DateTime());
            $object->setUsuario($this->getReference('usuario_' . rand(0, 49)));
            $object->setNivel($this->getReference('nivel_educativo_'. $this->getNivelEducativo()));
            $object->setCarrera($this->getReference('carrera_'.$this->getCarrera()));
            
            $manager->persist($object);
            $this->addReference('nivel_educativo_'.$i, $object);
        }
        $manager->flush();
    }
    
    public function getNivelEducativo() {
        $nivelEductivo = array( 'Bachillerato', 'Especializacion', 'Maestria', 'Primaria', 'Pregardo', 'Posgrado', 'Tecnico', 'Tecnologo');
        
        return $nivelEductivo[rand(0, 7)];
    }
    
    public function getCarrera() {
        $carrera = array( 'Ingenieria de sistemas', 'Robotica', 'Comunicaciones', 'Medicina', 'Psicologia', 'Medias artes', 'Educación fisica', 'Otra' );
        
        return $carrera[rand(0, 7)];
    }
}