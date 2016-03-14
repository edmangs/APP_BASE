<?php

namespace AppModelBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppModelBundle\Entity\Tarifa;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class FixturesTarifa extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface {

    public function getOrder() {
        return 9;
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
            
            $object = new Tarifa();
            
            $object->setPrecio(rand(1000000, 10000000));
            $object->setAnoTrabajo(new \DateTime());
            $object->setDescripcion($this->getLoremIpsum());
            $object->setFechaCreacion(new \DateTime());
            $object->setUsuario($this->getReference('usuario_' . rand(0, 49)));
            $object->setTipoTrabajo($this->getReference('tipo_trabajo_'.$this->getTrabajo()));
            
            $manager->persist($object);
            $this->addReference('tarifa_'.$i, $object);
        }
        $manager->flush();
    }
    
    public function getTrabajo(){
        $trabajos = array('Reportaje', 'Entrevista', 'Encabezados', 'Informativo', 'Audiovisuales', 'Otros');
        
        return $trabajos[rand(0, 5)];
    }
    
    public function getLoremIpsum() {
        $p[0] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ut sodales justo. Integer tristique risus vitae massa tempus tempor. Proin dignissim eros vitae tortor laoreet pharetra. Sed tristique ornare posuere. Maecenas non felis dapibus, pretium diam sed, porta est. Donec condimentum mattis efficitur.";
        $p[1] = "Proin viverra, lorem id consectetur vehicula, lorem sem facilisis odio, eu volutpat velit nisi a lectus.";
        $p[2] = "Nulla maximus ipsum vitae massa laoreet ornare. Duis rhoncus luctus diam ac consectetur. Praesent vel est facilisis, mattis quam vitae, pharetra elit. Phasellus sed ipsum lacinia, scelerisque orci in, vulputate enim. Nulla convallis, mauris non vehicula ornare, lacus nisi pharetra nunc, efficitur blandit arcu massa quis turpis.";
        $p[3] = "Vivamus erat turpis, sodales et sodales lacinia, vestibulum ut leo. Curabitur justo felis, sollicitudin quis mattis ut, laoreet quis sem. Integer vitae viverra erat. Duis sed velit consectetur, faucibus est ac, venenatis urna. Vivamus imperdiet tempus egestas. In vel quam velit.";
        $p[4] = "Ut pulvinar augue quis leo pulvinar pretium. Donec ultrices finibus est vel accumsan. Vivamus maximus augue non lectus elementum, sed blandit dolor varius. Sed ac arcu sagittis, egestas ipsum nec, egestas lorem. Duis sed ligula ut turpis semper efficitur iaculis sit amet purus.";
        $p[5] = "Nullam tempus scelerisque porttitor. Integer a tempor urna. Phasellus congue quam sapien, eu tincidunt ipsum euismod vitae.";
        
        return $p[rand(0, 5)];
    }
}