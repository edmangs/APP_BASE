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
        
        for($i = 0; $i <= 500; $i++) {
            
            $user = $this->getUserData();
            $userName = $this->getUserName($user);
            $object = new Usuario();
            
            $object->setNombres($user["nombre"]);
            $object->setApellidos($user["apellido"]);
            $object->setNombreUsuario($userName);
            $object->setCorreoElectronico($userName . "@correo.com");
            $object->setEdad(rand(18, 70));
            
            $date = $this->getDate();
            $newDate = date('Y-m-d', strtotime($date['date']. ' '.$date['operator'].' '.$date['days'].' days'));
            $object->setFechaCreacion(new \Datetime($newDate));
            $object->setTipoUsuario($this->getReference('tipo_usuario_periodista'));
            
            $manager->persist($object);
            $this->addReference('usuario_'.$i, $object);
        }
        $manager->flush();
    }
    
    public function getDate($date = null) {
        if(!$date){
            $date = date("Y-m-d H:i:s");
        }else{
            $date = $date->format('Y-m-d');
        }
        
        $operator = '-';
        $days = rand(0, 1500);
        if(rand(0,1) == true){
            $operator = '+';
        }
        
        if($date){
            $operator = '+';
        }
        
        return array("date" => $date, 'operator' => $operator, "days" => $days);
    }
    
    public function getUserData(){
        $names = json_decode('{"mens":{"names":[{"name":"Javier"},{"name":"Miguel"},{"name":"Luis"},{"name":"Jaime"},{"name":"Pedro"},{"name":"Camilo"},{"name":"David"},{"name":"Felipe"},{"name":"Jhon"},{"name":"Jhonatan"},{"name":"Johan"},{"name":"Faiber"},{"name":"Antonio"},{"name":"Francisco"},{"name":"Efraín"},{"name":"Diego"},{"name":"Dario"},{"name":"Felix"},{"name":"Fermin"},{"name":"Flavio"},{"name":"Moisés"},{"name":"Andres"}]},"womes":{"names":[{"name":"Nicol"},{"name":"Paula"},{"name":"Paola"},{"name":"Andrea"},{"name":"Sandra"},{"name":"Katherine"},{"name":"Beatriz"},{"name":"Elena"},{"name":"Elisa"},{"name":"Fanny"},{"name":"Margarita"},{"name":"Marta"},{"name":"Mariana"},{"name":"Mónica"},{"name":"Sara"},{"name":"Renata"},{"name":"Samantha"},{"name":"Juana"},{"name":"Ashley"},{"name":"Violeta"},{"name":"Zoe"},{"name":"Olivia"}]},"lastNames":[{"lastName":"Abadía"},{"lastName":"Aguinaga"},{"lastName":"Alcaraz"},{"lastName":"Bandama"},{"lastName":"Bautista"},{"lastName":"Bouffard"},{"lastName":"Cervantes"},{"lastName":"Clariana"},{"lastName":"Dorantes"},{"lastName":"Echebarría"},{"lastName":"Elizondo"},{"lastName":"Olid"},{"lastName":"Porsimecopian"},{"lastName":"Ríos"},{"lastName":"Rovira"},{"lastName":"Rubio"},{"lastName":"Sacristán"},{"lastName":"Sagarra"},{"lastName":"Elejalde"},{"lastName":"Godoy"},{"lastName":"Gonzaga"},{"lastName":"Hermosa"},{"lastName":"Lagos"},{"lastName":"Larrinaga"},{"lastName":"Leguina"},{"lastName":"Lerma"},{"lastName":"Sanz"},{"lastName":"Vahamonde"},{"lastName":"Zapata"},{"lastName":"Almagro"},{"lastName":"Almunia"},{"lastName":"Anglés"},{"lastName":"Arados"},{"lastName":"Avidave"},{"lastName":"Balaguer"},{"lastName":""},{"lastName":""}]}', true);
        
        $gender = 'womes';
        if(rand(0,1) == true){
            $gender = 'mens';
        }
        
        return  array(
            "nombre" => $names[$gender]['names'][rand(0, 21)]['name'] . ' ' . $names[$gender]['names'][rand(0, 21)]['name'], 
            "apellido" => $names['lastNames'][rand(0, 36)]['lastName'] . ' ' . $names['lastNames'][rand(0, 36)]['lastName']
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