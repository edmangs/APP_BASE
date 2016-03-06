<?php

namespace AppModelBundle\Entity;

/**
 * Social
 */
class Social
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \AppModelBundle\Entity\User
     */
    private $usuario;


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
     * @param \AppModelBundle\Entity\User $usuario
     *
     * @return Social
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
}
