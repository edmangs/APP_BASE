<?php

namespace AppModelBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppModelBundle\Entity\EntidadProteccion;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use AppModelBundle\DataFixtures\ORM\FixturesUsuario;

class FixturesEntidadProteccion extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface {

    public function getOrder() {
        return 13;
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
        
        $entities = $this->getEntities();
        
        foreach ($entities as $key => $entity) {
            $object = new EntidadProteccion();
            $object->setNombre($entity['name']);
            
            $object->setTipoEntidadProteccion($this->getReference('tipo_entidad_proteccion_' . $entity['type']));
            $object->setFechaCreacion(new \DateTime());
            
            $manager->persist($object);
            $this->addReference('entidad_proteccion_'.$entity['name'], $object);
        }
        
        $manager->flush();
    }
    
    public function getEntities() {
        return json_decode('[{"name":"Consejería para Los Derechos Humanos, Presidencia de la República","type":"Entidades del ejecutivo"},{"name":"Programa de la Presidencia de la República para la Juventud, la Mujer y la Familia","type":"Entidades del ejecutivo"},{"name":"Ministerio de Gobierno, División de Asuntos Indígenas","type":"Entidades del ejecutivo"},{"name":"Instituto de Recursos Naturales Renovables, INDERENA","type":"Entidades del ejecutivo"},{"name":"Instituto Colombiano de Bienestar Familiar, ICBF","type":"Entidades del ejecutivo"},{"name":"Procuraduría General de la Nación","type":"Ministerio Público"},{"name":"Procuraduría Delegada para Los Derechos Humanos","type":"Ministerio Público"},{"name":"Procuraduría Delegada para Asuntos Agrarios","type":"Ministerio Público"},{"name":"Defensoria del Pueblo","type":"Ministerio Público"},{"name":"Defensoria Delegada para Los Indígenas y Minorías étnicas","type":"Ministerio Público"},{"name":"Personerías municipales Personería Santafé de Bogotá","type":"Ministerio Público"},{"name":"Asociación de Familiares de Detenidos Desaparecidos ASFADDES","type":"Nacionales no gubernamentales"},{"name":"Asociación Nacional de Usuarios Campesinos, ANUC","type":"Nacionales no gubernamentales"},{"name":"Central Unitaria de Trabajadores, CUT","type":"Nacionales no gubernamentales"},{"name":"Centro de Investigación y Educación Popular, CINEP","type":"Nacionales no gubernamentales"},{"name":"Comisión Andina de Juristas Seccional Colombiana","type":"Nacionales no gubernamentales"},{"name":"Comité Permanente par la Defensa de Los Derechos Humanos","type":"Nacionales no gubernamentales"},{"name":"Comité de Solidaridad con Los Presos Políticos","type":"Nacionales no gubernamentales"},{"name":"Organización Nacional Indígena de Colombia, ONIC","type":"Nacionales no gubernamentales"},{"name":"Comisión de Derechos Humanos, ONU","type":"Nacionales no gubernamentales"},{"name":"Comisión Interamericana de Derechos Humanos, OEA","type":"Nacionales no gubernamentales"},{"name":"Corte Interamericana de Derechos Humanos","type":"Nacionales no gubernamentales"},{"name":"Américas Watch","type":"Nacionales no gubernamentales"},{"name":"Amnistía Internacional","type":"Nacionales no gubernamentales"},{"name":"Asociación Latinoamericana para Los Derechos Humanos, ALDHU","type":"Nacionales no gubernamentales"},{"name":"Comité Internacional de la Cruz Roja","type":"Nacionales no gubernamentales"}]', true);
    }
}