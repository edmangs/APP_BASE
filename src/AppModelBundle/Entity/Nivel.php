<?php

namespace AppModelBundle\Entity;

/**
 * Nivel
 */
class Nivel
{
    /**
     * @var string
     */
    private $nombre;

    /**
     * @var \DateTime
     */
    private $fechaCreacion;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $procesoJuridicosUsuario;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $proteccionSeguridades;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->procesoJuridicosUsuario = new \Doctrine\Common\Collections\ArrayCollection();
        $this->proteccionSeguridades = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Nivel
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set fechaCreacion
     *
     * @param \DateTime $fechaCreacion
     *
     * @return Nivel
     */
    public function setFechaCreacion($fechaCreacion)
    {
        $this->fechaCreacion = $fechaCreacion;

        return $this;
    }

    /**
     * Get fechaCreacion
     *
     * @return \DateTime
     */
    public function getFechaCreacion()
    {
        return $this->fechaCreacion;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Add procesoJuridicosUsuario
     *
     * @param \AppModelBundle\Entity\ProcesoJuridico $procesoJuridicosUsuario
     *
     * @return Nivel
     */
    public function addProcesoJuridicosUsuario(\AppModelBundle\Entity\ProcesoJuridico $procesoJuridicosUsuario)
    {
        $this->procesoJuridicosUsuario[] = $procesoJuridicosUsuario;

        return $this;
    }

    /**
     * Remove procesoJuridicosUsuario
     *
     * @param \AppModelBundle\Entity\ProcesoJuridico $procesoJuridicosUsuario
     */
    public function removeProcesoJuridicosUsuario(\AppModelBundle\Entity\ProcesoJuridico $procesoJuridicosUsuario)
    {
        $this->procesoJuridicosUsuario->removeElement($procesoJuridicosUsuario);
    }

    /**
     * Get procesoJuridicosUsuario
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProcesoJuridicosUsuario()
    {
        return $this->procesoJuridicosUsuario;
    }

    /**
     * Add proteccionSeguridade
     *
     * @param \AppModelBundle\Entity\ProteccionSeguridad $proteccionSeguridade
     *
     * @return Nivel
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
}

