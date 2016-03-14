<?php

namespace AppModelBundle\Entity;

/**
 * Tarifa
 */
class Tarifa
{
    /**
     * @var \DateTime
     */
    private $fechaCreacion;

    /**
     * @var integer
     */
    private $precio;

    /**
     * @var \DateTime
     */
    private $anoTrabajo;

    /**
     * @var string
     */
    private $descripcion;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \AppModelBundle\Entity\Usuario
     */
    private $usuario;

    /**
     * @var \AppModelBundle\Entity\TipoTrabajo
     */
    private $tipoTrabajo;


    /**
     * Set fechaCreacion
     *
     * @param \DateTime $fechaCreacion
     *
     * @return Tarifa
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
     * Set precio
     *
     * @param integer $precio
     *
     * @return Tarifa
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio
     *
     * @return integer
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set anoTrabajo
     *
     * @param \DateTime $anoTrabajo
     *
     * @return Tarifa
     */
    public function setAnoTrabajo($anoTrabajo)
    {
        $this->anoTrabajo = $anoTrabajo;

        return $this;
    }

    /**
     * Get anoTrabajo
     *
     * @return \DateTime
     */
    public function getAnoTrabajo()
    {
        return $this->anoTrabajo;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Tarifa
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
     * @return Tarifa
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
     * Set tipoTrabajo
     *
     * @param \AppModelBundle\Entity\TipoTrabajo $tipoTrabajo
     *
     * @return Tarifa
     */
    public function setTipoTrabajo(\AppModelBundle\Entity\TipoTrabajo $tipoTrabajo)
    {
        $this->tipoTrabajo = $tipoTrabajo;

        return $this;
    }

    /**
     * Get tipoTrabajo
     *
     * @return \AppModelBundle\Entity\TipoTrabajo
     */
    public function getTipoTrabajo()
    {
        return $this->tipoTrabajo;
    }
}

