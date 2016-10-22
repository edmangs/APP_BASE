<?php

namespace AppModelBundle\Entity;

/**
 * Carrera
 */
class Carrera
{
    /**
     * @var string
     */
    private $nombre;

    /**
     * @var string
     */
    private $descripcion;

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
    private $nivelEducativos;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->nivelEducativos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Carrera
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
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Carrera
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set fechaCreacion
     *
     * @param \DateTime $fechaCreacion
     *
     * @return Carrera
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
     * Add nivelEducativo
     *
     * @param \AppModelBundle\Entity\NivelEducativoUsuario $nivelEducativo
     *
     * @return Carrera
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
}
