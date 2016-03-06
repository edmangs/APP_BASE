<?php

namespace AppModelBundle\Entity;

/**
 * TipoProcesoJuridico
 */
class TipoProcesoJuridico
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
     * Constructor
     */
    public function __construct()
    {
        $this->procesoJuridicosUsuario = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return TipoProcesoJuridico
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
     * @return TipoProcesoJuridico
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
     * @return TipoProcesoJuridico
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
}
