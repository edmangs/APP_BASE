<?php

namespace AppModelBundle\Entity;

/**
 * ProcesoJuridico
 */
class ProcesoJuridico
{
    /**
     * @var string
     */
    private $descripcion;

    /**
     * @var string
     */
    private $documento;

    /**
     * @var boolean
     */
    private $valido;

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
    private $proteccionSeguridades;

    /**
     * @var \AppModelBundle\Entity\User
     */
    private $usuario;

    /**
     * @var \AppModelBundle\Entity\TipoProcesoJuridico
     */
    private $tipoProcesoJuridico;

    /**
     * @var \AppModelBundle\Entity\Nivel
     */
    private $nivel;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->proteccionSeguridades = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return ProcesoJuridico
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
     * Set documento
     *
     * @param string $documento
     *
     * @return ProcesoJuridico
     */
    public function setDocumento($documento)
    {
        $this->documento = $documento;

        return $this;
    }

    /**
     * Get documento
     *
     * @return string
     */
    public function getDocumento()
    {
        return $this->documento;
    }

    /**
     * Set valido
     *
     * @param boolean $valido
     *
     * @return ProcesoJuridico
     */
    public function setValido($valido)
    {
        $this->valido = $valido;

        return $this;
    }

    /**
     * Get valido
     *
     * @return boolean
     */
    public function getValido()
    {
        return $this->valido;
    }

    /**
     * Set fechaCreacion
     *
     * @param \DateTime $fechaCreacion
     *
     * @return ProcesoJuridico
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
     * Add proteccionSeguridade
     *
     * @param \AppModelBundle\Entity\proteccionSeguridad $proteccionSeguridade
     *
     * @return ProcesoJuridico
     */
    public function addProteccionSeguridade(\AppModelBundle\Entity\proteccionSeguridad $proteccionSeguridade)
    {
        $this->proteccionSeguridades[] = $proteccionSeguridade;

        return $this;
    }

    /**
     * Remove proteccionSeguridade
     *
     * @param \AppModelBundle\Entity\proteccionSeguridad $proteccionSeguridade
     */
    public function removeProteccionSeguridade(\AppModelBundle\Entity\proteccionSeguridad $proteccionSeguridade)
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
     * Set usuario
     *
     * @param \AppModelBundle\Entity\User $usuario
     *
     * @return ProcesoJuridico
     */
    public function setUsuario(\AppModelBundle\Entity\User $usuario = null)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return \AppModelBundle\Entity\User
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set tipoProcesoJuridico
     *
     * @param \AppModelBundle\Entity\TipoProcesoJuridico $tipoProcesoJuridico
     *
     * @return ProcesoJuridico
     */
    public function setTipoProcesoJuridico(\AppModelBundle\Entity\TipoProcesoJuridico $tipoProcesoJuridico)
    {
        $this->tipoProcesoJuridico = $tipoProcesoJuridico;

        return $this;
    }

    /**
     * Get tipoProcesoJuridico
     *
     * @return \AppModelBundle\Entity\TipoProcesoJuridico
     */
    public function getTipoProcesoJuridico()
    {
        return $this->tipoProcesoJuridico;
    }

    /**
     * Set nivel
     *
     * @param \AppModelBundle\Entity\Nivel $nivel
     *
     * @return ProcesoJuridico
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
}
