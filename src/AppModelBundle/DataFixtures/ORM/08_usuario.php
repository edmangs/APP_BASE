<?php

namespace AppModelBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppModelBundle\Entity\Usuario;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class FixturesUsuario extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface {

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
        
        for($i = 0; $i <= 50; $i++) {
            
            $user = $this->getUserData();
            $userName = $this->getUserName($user);
            $object = new Usuario();
            
            $object->setNombres($user["nombre"]);
            $object->setApellidos($user["apellido"]);
            $object->setNombreUsuario($userName);
            $object->setCorreoElectronico($userName . "@correo.com");
            $object->setEdad(rand(18, 70));
            $object->setFechaCreacion(new \DateTime());
            $object->setTipoUsuario($this->getReference('tipo_usuario_periodista'));
            
            $manager->persist($object);
            $this->addReference('usuario_'.$i, $object);
        }
        $manager->flush();
    }
    
    public function getUserData(){
        $nombre = array("Manuel", "Ana", "Jose", "Maria", "Migel", "Sara", "Dairo", "Alex", "Nicol", "Samuel");
        $nombre2 = array("", "Juan", "Paola", "Matias", "Sandra", "Octavio", "Diana", "Fefipe", "Cindy", "Estevan");
        
        $apellido = array("Hernandez", "Guzman", "Rojas", "Gil", "Tavera", "Rengifo", "Gonzalez", "Pereira", "Ocampo", "Diaz");
        $apellido2 = array("", "Leiva", "Buitrago", "Neruda", "Olivera", "", "Gonzalez", "Jimenez", "Munevar", "Zapata");
        
        return  array(
            "nombre" => $nombre[rand(0, 9)] . ' ' .$nombre2[rand(0, 9)], 
            "apellido" => $apellido[rand(0, 9)] . ' ' . $apellido2[rand(0, 9)]
        );
    }
    
    public function getUserName($user) {
        $arrayNombre = explode(' ', $user["nombre"]);
        $arrayApellido = explode(' ', $user["apellido"]);
        
        $userName = $arrayNombre[0];
        if(isset($arrayNombre[1])){
            $userName .= substr($arrayNombre[1], 0, 1);
        }
        
        $userName .= "." . $arrayApellido[0];
        if(isset($arrayApellido[1])){
            $userName .= substr($arrayApellido[1], 0, 1);
        }
        
        return strtolower($userName);
    } 
}