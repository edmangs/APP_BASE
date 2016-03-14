<?php

namespace AppModelBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppModelBundle\Entity\Carrera;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class FixturesCarrera extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface {

    public function getOrder() {
        return 6;
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
            array( 'nombre' => 'Ingenieria de sistemas' ),
            array( 'nombre' => 'Robotica' ),
            array( 'nombre' => 'Comunicaciones' ),
            array( 'nombre' => 'Medicina' ),
            array( 'nombre' => 'Psicologia' ),
            array( 'nombre' => 'Medias artes' ),
            array( 'nombre' => 'Educación fisica' ),
            array( 'nombre' => 'Otra' )
        );
        
        foreach ($entities as $entity) {
            $object = new Carrera();
            $object->setNombre($entity["nombre"]);
            $object->setDescripcion($this->getLoremIpsum());
            $object->setFechaCreacion(new \DateTime());
            
            $manager->persist($object);
            $this->addReference('carrera_'.$entity['nombre'], $object);
        }
        $manager->flush();
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

?>