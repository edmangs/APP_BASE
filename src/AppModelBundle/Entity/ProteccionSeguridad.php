<?php

namespace AppModelBundle\Entity;

/**
 * ProteccionSeguridad
 */
class ProteccionSeguridad
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
     * @var \AppModelBundle\Entity\Usuario
     */
    private $usuario;

    /**
     * @var \AppModelBundle\Entity\Nivel
     */
    private $nivel;

    /**
     * @var \AppModelBundle\Entity\ProcesoJuridico
     */
    private $procesoJuridico;

    /**
     * @var \AppModelBundle\Entity\EntidadProteccion
     */
    private $entidadProteccion;


    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return ProteccionSeguridad
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
     * @return ProteccionSeguridad
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
     * Set usuario
     *
     * @param \AppModelBundle\Entity\Usuario $usuario
     *
     * @return ProteccionSeguridad
     */
    public function setUsuario(\AppModelBundle\Entity\Usuario $usuario = null)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return \AppModelBundle\Entity\Usuario
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set nivel
     *
     * @param \AppModelBundle\Entity\Nivel $nivel
     *
     * @return ProteccionSeguridad
     */
    public function setNivel(\AppModelBundle\Entity\Nivel $nivel)
    {
        $this->nivel = $nivel;

        return $this;
    }

    /**
     * Get nivel
     *
     * @return \AppModelBundle\Entity\Nivel
     */
    public function getNivel()
    {
        return $this->nivel;
    }

    /**
     * Set procesoJuridico
     *
     * @param \AppModelBundle\Entity\ProcesoJuridico $procesoJuridico
     *
     * @return ProteccionSeguridad
     */
    public function setProcesoJuridico(\AppModelBundle\Entity\ProcesoJuridico $procesoJuridico = null)
    {
        $this->procesoJuridico = $procesoJuridico;

        return $this;
    }

    /**
     * Get procesoJuridico
     *
     * @return \AppModelBundle\Entity\ProcesoJuridico
     */
    public function getProcesoJuridico()
    {
        return $this->procesoJuridico;
    }

    /**
     * Set entidadProteccion
     *
     * @param \AppModelBundle\Entity\EntidadProteccion $entidadProteccion
     *
     * @return ProteccionSeguridad
     */
    public function setEntidadProteccion(\AppModelBundle\Entity\EntidadProteccion $entidadProteccion = null)
    {
        $this->entidadProteccion = $entidadProteccion;

        return $this;
    }

    /**
     * Get entidadProteccion
     *
     * @return \AppModelBundle\Entity\EntidadProteccion
     */
    public function getEntidadProteccion()
    {
        return $this->entidadProteccion;
    }
}
