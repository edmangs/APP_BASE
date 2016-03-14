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
     * @var \AppModelBundle\Entity\Usuario
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
     * @param \AppModelBundle\Entity\Usuario $usuario
     *
     * @return Social
     */
    public function setUsuario(\AppModelBundle\Entity\Usuario $usuario = null)
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

