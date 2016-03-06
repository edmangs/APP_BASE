<?php

namespace AppModelBundle\Entity;

use Sonata\UserBundle\Entity\BaseUser as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 */
class User extends BaseUser {

//************************* Modificacion ***************************************

    public function __construct() {
        parent::__construct();
        $this->setRoles(array('ROLE_PERIODISTA'));
    }
    
//*********************** Fin modificacion *************************************
    
    /**
     * @var string
     */
    private $picture;

    /**
     * @var integer
     */
    private $age;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $sociales;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $tarifas;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $procesosJuridicos;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $proteccionSeguridades;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $nivelEducativos;

    /**
     * @var \AppModelBundle\Entity\TipoUsuario
     */
    private $tipoUsuario;


    /**
     * Set picture
     *
     * @param string $picture
     *
     * @return User
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get picture
     *
     * @return string
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set age
     *
     * @param integer $age
     *
     * @return User
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return integer
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Add sociale
     *
     * @param \AppModelBundle\Entity\Social $sociale
     *
     * @return User
     */
    public function addSociale(\AppModelBundle\Entity\Social $sociale)
    {
        $this->sociales[] = $sociale;

        return $this;
    }

    /**
     * Remove sociale
     *
     * @param \AppModelBundle\Entity\Social $sociale
     */
    public function removeSociale(\AppModelBundle\Entity\Social $sociale)
    {
        $this->sociales->removeElement($sociale);
    }

    /**
     * Get sociales
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSociales()
    {
        return $this->sociales;
    }

    /**
     * Add tarifa
     *
     * @param \AppModelBundle\Entity\Tarifa $tarifa
     *
     * @return User
     */
    public function addTarifa(\AppModelBundle\Entity\Tarifa $tarifa)
    {
        $this->tarifas[] = $tarifa;

        return $this;
    }

    /**
     * Remove tarifa
     *
     * @param \AppModelBundle\Entity\Tarifa $tarifa
     */
    public function removeTarifa(\AppModelBundle\Entity\Tarifa $tarifa)
    {
        $this->tarifas->removeElement($tarifa);
    }

    /**
     * Get tarifas
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTarifas()
    {
        return $this->tarifas;
    }

    /**
     * Add procesosJuridico
     *
     * @param \AppModelBundle\Entity\ProcesoJuridico $procesosJuridico
     *
     * @return User
     */
    public function addProcesosJuridico(\AppModelBundle\Entity\ProcesoJuridico $procesosJuridico)
    {
        $this->procesosJuridicos[] = $procesosJuridico;

        return $this;
    }

    /**
     * Remove procesosJuridico
     *
     * @param \AppModelBundle\Entity\ProcesoJuridico $procesosJuridico
     */
    public function removeProcesosJuridico(\AppModelBundle\Entity\ProcesoJuridico $procesosJuridico)
    {
        $this->procesosJuridicos->removeElement($procesosJuridico);
    }

    /**
     * Get procesosJuridicos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProcesosJuridicos()
    {
        return $this->procesosJuridicos;
    }

    /**
     * Add proteccionSeguridade
     *
     * @param \AppModelBundle\Entity\ProteccionSeguridad $proteccionSeguridade
     *
     * @return User
     */
    public function addProteccionSeguridade(\AppModelBundle\Entity\ProteccionSeguridad $proteccionSeguridade)
    {
        $this->proteccionSeguridades[] = $proteccionSeguridade;

        return $this;
    }

    /**
     * Remove proteccionSeguridade
     *
     * @param \AppModelBundle\Entity\ProteccionSeguridad $proteccionSeguridade
     */
    public function removeProteccionSeguridade(\AppModelBundle\Entity\ProteccionSeguridad $proteccionSeguridade)
    {
        $this->proteccionSeguridades->removeElement($proteccionSeguridade);
    }

    /**
     * Get proteccionSeguridades
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProteccionSeguridades()
    {
        return $this->proteccionSeguridades;
    }

    /**
     * Add nivelEducativo
     *
     * @param \AppModelBundle\Entity\NivelEducativoUsuario $nivelEducativo
     *
     * @return User
     */
    public function addNivelEducativo(\AppModelBundle\Entity\NivelEducativoUsuario $nivelEducativo)
    {
        $this->nivelEducativos[] = $nivelEducativo;

        return $this;
    }

    /**
     * Remove nivelEducativo
     *
     * @param \AppModelBundle\Entity\NivelEducativoUsuario $nivelEducativo
     */
    public function removeNivelEducativo(\AppModelBundle\Entity\NivelEducativoUsuario $nivelEducativo)
    {
        $this->nivelEducativos->removeElement($nivelEducativo);
    }

    /**
     * Get nivelEducativos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNivelEducativos()
    {
        return $this->nivelEducativos;
    }

    /**
     * Set tipoUsuario
     *
     * @param \AppModelBundle\Entity\TipoUsuario $tipoUsuario
     *
     * @return User
     */
    public function setTipoUsuario(\AppModelBundle\Entity\TipoUsuario $tipoUsuario)
    {
        $this->tipoUsuario = $tipoUsuario;

        return $this;
    }

    /**
     * Get tipoUsuario
     *
     * @return \AppModelBundle\Entity\TipoUsuario
     */
    public function getTipoUsuario()
    {
        return $this->tipoUsuario;
    }
}
