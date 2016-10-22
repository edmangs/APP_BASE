<?php

namespace AppModelBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppModelBundle\Entity\ProcesoJuridico;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use AppModelBundle\DataFixtures\ORM\FixturesUsuario;

class FixturesProcesoJuridico extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface {

    public function getOrder() {
        return 11;
    }

    /**
     * @var ContainerInterface
     */
    private $container;
    
    public function setProcesosJuridicos($procesosJuridicos) {
        $this->procesosJuridicos[] = $procesosJuridicos;
    }

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null) {
        $this->container = $container;
    }

    public function load(ObjectManager $manager) {
        
        $procesos = array();
        for($i = 0; $i <= 200; $i++) {
            
            $object = new ProcesoJuridico();
            
            $user = $this->getReference('usuario_' . rand(0, 499));
            $userFixtures = new FixturesUsuario();
            $date = $userFixtures->getDate($user->getFechaCreacion());
            $newDate = date('Y-m-d', strtotime($date['date']. ' '.$date['operator'].' '.$date['days'].' days'));
            $object->setFechaCreacion(new \DateTime($newDate));
            
            $object->setDescripcion($this->getLoremIpsum());
            $object->setDocumento($this->getFile());
            $val = rand(0, 1);
            $object->setValido($val);
            
            $object->setUsuario($user);
            $object->setTipoProcesoJuridico($this->getReference('tipo_proceso_juridico_' . $this->getTipoProcesoJuridico()));
            $object->setNivel($this->getReference('nivel_' . $this->getNivel()));
            
            $manager->persist($object);
            $this->addReference('proceso_juridico_'.$i, $object);
            if($val == true){
                array_push($procesos, 'proceso_juridico_'.$i);
            }
        }
        
        $manager->flush();
        
        $session = new Session();
        $session->set('procesoJuridicos', $procesos);
    }
    
    public function getTipoProcesoJuridico() {
        $tipoProiceso = array( 'Acoso', 'Agresión fisica', 'Agresión verbal', 'Amenazas', 'Atentados', 'Intento de asesinaro' );
        
        return $tipoProiceso[rand(0, 5)];
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
    
    public function getFile() {
        $f[0] = "docmuneto 1.txt";
        $f[1] = "docmuneto 2.txt";
        $f[2] = "docmuneto 3.txt";
        $f[3] = "docmuneto 4.txt";
        $f[4] = "docmuneto 5.txt";
        $f[5] = "docmuneto 6.txt";
        
        return $f[rand(0, 5)];
    }
    
    public function getNivel() {
        $nivel = array( 'Alto', 'Bajo', 'Medio' );
        
        return $nivel[rand(0, 2)];
    }
    
}