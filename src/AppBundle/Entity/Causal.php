<?php

namespace AppBundle\Entity;

/**
 * Causal
 */
class Causal
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
    private $clases;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $tramitesCausalClases;

    /**
     * @var \AppBundle\Entity\Tramite
     */
    private $tramite;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->clases = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tramitesCausalClases = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Causal
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
     * @return Causal
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
     * @return Causal
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
     * @return Causal
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
     * @return Causal
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
     * Add clase
     *
     * @param \AppBundle\Entity\Clase $clase
     *
     * @return Causal
     */
    public function addClase(\AppBundle\Entity\Clase $clase)
    {
        $this->clases[] = $clase;

        return $this;
    }

    /**
     * Remove clase
     *
     * @param \AppBundle\Entity\Clase $clase
     */
    public function removeClase(\AppBundle\Entity\Clase $clase)
    {
        $this->clases->removeElement($clase);
    }

    /**
     * Get clases
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getClases()
    {
        return $this->clases;
    }

    /**
     * Add tramitesCausalClase
     *
     * @param \AppBundle\Entity\TramiteCausalClase $tramitesCausalClase
     *
     * @return Causal
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
     * Set tramite
     *
     * @param \AppBundle\Entity\Tramite $tramite
     *
     * @return Causal
     */
    public function setTramite(\AppBundle\Entity\Tramite $tramite = null)
    {
        $this->tramite = $tramite;

        return $this;
    }

    /**
     * Get tramite
     *
     * @return \AppBundle\Entity\Tramite
     */
    public function getTramite()
    {
        return $this->tramite;
    }
}
