<?php

namespace AppModelBundle\Entity;

/**
 * TipoTrabajo
 */
class TipoTrabajo
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
    private $tarifas;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tarifas = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return TipoTrabajo
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
     * @return TipoTrabajo
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
     * Add tarifa
     *
     * @param \AppModelBundle\Entity\Tarifa $tarifa
     *
     * @return TipoTrabajo
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
}
