<?php

namespace AppBundle\Entity;

/**
 * Tramite
 */
class Tramite
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
    private $causales;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $tramitesCausalClases;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->causales = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tramitesCausalClases = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Tramite
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
     * @return Tramite
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
     * @return Tramite
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
     * @return Tramite
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
     * @return Tramite
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
     * Add causale
     *
     * @param \AppBundle\Entity\Causal $causale
     *
     * @return Tramite
     */
    public function addCausale(\AppBundle\Entity\Causal $causale)
    {
        $this->causales[] = $causale;

        return $this;
    }

    /**
     * Remove causale
     *
     * @param \AppBundle\Entity\Causal $causale
     */
    public function removeCausale(\AppBundle\Entity\Causal $causale)
    {
        $this->causales->removeElement($causale);
    }

    /**
     * Get causales
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCausales()
    {
        return $this->causales;
    }

    /**
     * Add tramitesCausalClase
     *
     * @param \AppBundle\Entity\TramiteCausalClase $tramitesCausalClase
     *
     * @return Tramite
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
}
