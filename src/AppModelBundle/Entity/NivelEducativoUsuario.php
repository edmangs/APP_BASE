<?php

namespace AppModelBundle\Entity;

/**
 * NivelEducativoUsuario
 */
class NivelEducativoUsuario
{
    /**
     * @var \DateTime
     */
    private $fechaCreacion;

    /**
     * @var \DateTime
     */
    private $anoFinalizacion;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \AppModelBundle\Entity\Carrera
     */
    private $carrera;

    /**
     * @var \AppModelBundle\Entity\NivelEducativo
     */
    private $nivel;

    /**
     * @var \AppModelBundle\Entity\Usuario
     */
    private $usuario;


    /**
     * Set fechaCreacion
     *
     * @param \DateTime $fechaCreacion
     *
     * @return NivelEducativoUsuario
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
     * Set anoFinalizacion
     *
     * @param \DateTime $anoFinalizacion
     *
     * @return NivelEducativoUsuario
     */
    public function setAnoFinalizacion($anoFinalizacion)
    {
        $this->anoFinalizacion = $anoFinalizacion;

        return $this;
    }

    /**
     * Get anoFinalizacion
     *
     * @return \DateTime
     */
    public function getAnoFinalizacion()
    {
        return $this->anoFinalizacion;
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
     * Set carrera
     *
     * @param \AppModelBundle\Entity\Carrera $carrera
     *
     * @return NivelEducativoUsuario
     */
    public function setCarrera(\AppModelBundle\Entity\Carrera $carrera)
    {
        $this->carrera = $carrera;

        return $this;
    }

    /**
     * Get carrera
     *
     * @return \AppModelBundle\Entity\Carrera
     */
    public function getCarrera()
    {
        return $this->carrera;
    }

    /**
     * Set nivel
     *
     * @param \AppModelBundle\Entity\NivelEducativo $nivel
     *
     * @return NivelEducativoUsuario
     */
    public function setNivel(\AppModelBundle\Entity\NivelEducativo $nivel)
    {
        $this->nivel = $nivel;

        return $this;
    }

    /**
     * Get nivel
     *
     * @return \AppModelBundle\Entity\NivelEducativo
     */
    public function getNivel()
    {
        return $this->nivel;
    }

    /**
     * Set usuario
     *
     * @param \AppModelBundle\Entity\Usuario $usuario
     *
     * @return NivelEducativoUsuario
     */
    public function setUsuario(\AppModelBundle\Entity\Usuario $usuario)
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
}
