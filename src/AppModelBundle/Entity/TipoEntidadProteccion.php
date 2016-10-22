<?php

namespace AppModelBundle\Entity;

/**
 * TipoEntidadProteccion
 */
class TipoEntidadProteccion
{
    
    /**
     * @var string
     */
    private $name;

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
    private $entidadProtecciones;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->entidadProtecciones = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return TipoEntidadProteccion
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set fechaCreacion
     *
     * @param \DateTime $fechaCreacion
     *
     * @return TipoEntidadProteccion
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
     * Add entidadProteccione
     *
     * @param \AppModelBundle\Entity\EntidadProteccion $entidadProteccione
     *
     * @return TipoEntidadProteccion
     */
    public function addEntidadProteccione(\AppModelBundle\Entity\EntidadProteccion $entidadProteccione)
    {
        $this->entidadProtecciones[] = $entidadProteccione;

        return $this;
    }

    /**
     * Remove entidadProteccione
     *
     * @param \AppModelBundle\Entity\EntidadProteccion $entidadProteccione
     */
    public function removeEntidadProteccione(\AppModelBundle\Entity\EntidadProteccion $entidadProteccione)
    {
        $this->entidadProtecciones->removeElement($entidadProteccione);
    }

    /**
     * Get entidadProtecciones
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEntidadProtecciones()
    {
        return $this->entidadProtecciones;
    }
}
