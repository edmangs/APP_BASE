<?php

namespace AppBundle\Entity;

/**
 * Clase
 */
class Clase
{
//--------------------------------- Modify -------------------------------------
    public function __toString() {
        return $this->getName();
    }
//--------------------------------- Modify -------------------------------------

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $code;

    /**
     * @var string
     */
    private $slug;

    /**
     * @var \DateTime
     */
    private $created;

    /**
     * @var \DateTime
     */
    private $updated;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $tramitesCausalClases;

    /**
     * @var \AppBundle\Entity\Causal
     */
    private $causal;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tramitesCausalClases = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Clase
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
     * Set code
     *
     * @param string $code
     *
     * @return Clase
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return Clase
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Clase
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     *
     * @return Clase
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
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
     * Add tramitesCausalClase
     *
     * @param \AppBundle\Entity\TramiteCausalClase $tramitesCausalClase
     *
     * @return Clase
     */
    public function addTramitesCausalClase(\AppBundle\Entity\TramiteCausalClase $tramitesCausalClase)
    {
        $this->tramitesCausalClases[] = $tramitesCausalClase;

        return $this;
    }

    /**
     * Remove tramitesCausalClase
     *
     * @param \AppBundle\Entity\TramiteCausalClase $tramitesCausalClase
     */
    public function removeTramitesCausalClase(\AppBundle\Entity\TramiteCausalClase $tramitesCausalClase)
    {
        $this->tramitesCausalClases->removeElement($tramitesCausalClase);
    }

    /**
     * Get tramitesCausalClases
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTramitesCausalClases()
    {
        return $this->tramitesCausalClases;
    }

    /**
     * Set causal
     *
     * @param \AppBundle\Entity\Causal $causal
     *
     * @return Clase
     */
    public function setCausal(\AppBundle\Entity\Causal $causal = null)
    {
        $this->causal = $causal;

        return $this;
    }

    /**
     * Get causal
     *
     * @return \AppBundle\Entity\Causal
     */
    public function getCausal()
    {
        return $this->causal;
    }
}
