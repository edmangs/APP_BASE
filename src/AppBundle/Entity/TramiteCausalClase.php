<?php

namespace AppBundle\Entity;

/**
 * TramiteCausalClase
 */
class TramiteCausalClase
{
//--------------------------------- Modify -------------------------------------
    public function __toString() {
        return (string)$this->getId();
    }
//--------------------------------- Modify -------------------------------------
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
     * @var \AppBundle\Entity\Tramite
     */
    private $tramite;

    /**
     * @var \AppBundle\Entity\Causal
     */
    private $causal;

    /**
     * @var \AppBundle\Entity\Clase
     */
    private $clase;


    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return TramiteCausalClase
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
     * @return TramiteCausalClase
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
     * Set tramite
     *
     * @param \AppBundle\Entity\Tramite $tramite
     *
     * @return TramiteCausalClase
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

    /**
     * Set causal
     *
     * @param \AppBundle\Entity\Causal $causal
     *
     * @return TramiteCausalClase
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

    /**
     * Set clase
     *
     * @param \AppBundle\Entity\Clase $clase
     *
     * @return TramiteCausalClase
     */
    public function setClase(\AppBundle\Entity\Clase $clase = null)
    {
        $this->clase = $clase;

        return $this;
    }

    /**
     * Get clase
     *
     * @return \AppBundle\Entity\Clase
     */
    public function getClase()
    {
        return $this->clase;
    }
}
