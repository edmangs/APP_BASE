<?php

namespace AppModelBundle\Entity;

/**
 * EntidadProteccion
 */
class EntidadProteccion
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
    private $procesoJuridicos;

    /**
     * @var \AppModelBundle\Entity\TipoEntidadProteccion
     */
    private $tipoEntidadProteccion;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->procesoJuridicos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return EntidadProteccion
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
     * @return EntidadProteccion
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
     * Add procesoJuridico
     *
     * @param \AppModelBundle\Entity\ProteccionSeguridad $procesoJuridico
     *
     * @return EntidadProteccion
     */
    public function addProcesoJuridico(\AppModelBundle\Entity\ProteccionSeguridad $procesoJuridico)
    {
        $this->procesoJuridicos[] = $procesoJuridico;

        return $this;
    }

    /**
     * Remove procesoJuridico
     *
     * @param \AppModelBundle\Entity\ProteccionSeguridad $procesoJuridico
     */
    public function removeProcesoJuridico(\AppModelBundle\Entity\ProteccionSeguridad $procesoJuridico)
    {
        $this->procesoJuridicos->removeElement($procesoJuridico);
    }

    /**
     * Get procesoJuridicos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProcesoJuridicos()
    {
        return $this->procesoJuridicos;
    }

    /**
     * Set tipoEntidadProteccion
     *
     * @param \AppModelBundle\Entity\TipoEntidadProteccion $tipoEntidadProteccion
     *
     * @return EntidadProteccion
     */
    public function setTipoEntidadProteccion(\AppModelBundle\Entity\TipoEntidadProteccion $tipoEntidadProteccion = null)
    {
        $this->tipoEntidadProteccion = $tipoEntidadProteccion;

        return $this;
    }

    /**
     * Get tipoEntidadProteccion
     *
     * @return \AppModelBundle\Entity\TipoEntidadProteccion
     */
    public function getTipoEntidadProteccion()
    {
        return $this->tipoEntidadProteccion;
    }
}
