<?php

namespace AppModelBundle\Entity;

/**
 * Usuario
 */
class Usuario
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var string
     */
    private $apellidos;

    /**
     * @var string
     */
    private $nombreUsuario;

    /**
     * @var integer
     */
    private $edad;

    /**
     * @var string
     */
    private $correoElectronico;

    /**
     * @var string
     */
    private $foto;

    /**
     * @var \DateTime
     */
    private $fechaCreacion;


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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Usuario
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
     * Set apellidos
     *
     * @param string $apellidos
     *
     * @return Usuario
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get apellidos
     *
     * @return string
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set nombreUsuario
     *
     * @param string $nombreUsuario
     *
     * @return Usuario
     */
    public function setNombreUsuario($nombreUsuario)
    {
        $this->nombreUsuario = $nombreUsuario;

        return $this;
    }

    /**
     * Get nombreUsuario
     *
     * @return string
     */
    public function getNombreUsuario()
    {
        return $this->nombreUsuario;
    }

    /**
     * Set edad
     *
     * @param integer $edad
     *
     * @return Usuario
     */
    public function setEdad($edad)
    {
        $this->edad = $edad;

        return $this;
    }

    /**
     * Get edad
     *
     * @return integer
     */
    public function getEdad()
    {
        return $this->edad;
    }

    /**
     * Set correoElectronico
     *
     * @param string $correoElectronico
     *
     * @return Usuario
     */
    public function setCorreoElectronico($correoElectronico)
    {
        $this->correoElectronico = $correoElectronico;

        return $this;
    }

    /**
     * Get correoElectronico
     *
     * @return string
     */
    public function getCorreoElectronico()
    {
        return $this->correoElectronico;
    }

    /**
     * Set foto
     *
     * @param string $foto
     *
     * @return Usuario
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;

        return $this;
    }

    /**
     * Get foto
     *
     * @return string
     */
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * Set fechaCreacion
     *
     * @param \DateTime $fechaCreacion
     *
     * @return Usuario
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
     * @var string
     */
    private $nombres;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $sociales;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $tarifas;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $procesosJuridicos;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $proteccionSeguridades;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $nivelEducativos;

    /**
     * @var \AppModelBundle\Entity\TipoUsuario
     */
    private $tipoUsuario;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->sociales = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tarifas = new \Doctrine\Common\Collections\ArrayCollection();
        $this->procesosJuridicos = new \Doctrine\Common\Collections\ArrayCollection();
        $this->proteccionSeguridades = new \Doctrine\Common\Collections\ArrayCollection();
        $this->nivelEducativos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set nombres
     *
     * @param string $nombres
     *
     * @return Usuario
     */
    public function setNombres($nombres)
    {
        $this->nombres = $nombres;

        return $this;
    }

    /**
     * Get nombres
     *
     * @return string
     */
    public function getNombres()
    {
        return $this->nombres;
    }

    /**
     * Add sociale
     *
     * @param \AppModelBundle\Entity\Social $sociale
     *
     * @return Usuario
     */
    public function addSociale(\AppModelBundle\Entity\Social $sociale)
    {
        $this->sociales[] = $sociale;

        return $this;
    }

    /**
     * Remove sociale
     *
     * @param \AppModelBundle\Entity\Social $sociale
     */
    public function removeSociale(\AppModelBundle\Entity\Social $sociale)
    {
        $this->sociales->removeElement($sociale);
    }

    /**
     * Get sociales
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSociales()
    {
        return $this->sociales;
    }

    /**
     * Add tarifa
     *
     * @param \AppModelBundle\Entity\Tarifa $tarifa
     *
     * @return Usuario
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

    /**
     * Add procesosJuridico
     *
     * @param \AppModelBundle\Entity\ProcesoJuridico $procesosJuridico
     *
     * @return Usuario
     */
    public function addProcesosJuridico(\AppModelBundle\Entity\ProcesoJuridico $procesosJuridico)
    {
        $this->procesosJuridicos[] = $procesosJuridico;

        return $this;
    }

    /**
     * Remove procesosJuridico
     *
     * @param \AppModelBundle\Entity\ProcesoJuridico $procesosJuridico
     */
    public function removeProcesosJuridico(\AppModelBundle\Entity\ProcesoJuridico $procesosJuridico)
    {
        $this->procesosJuridicos->removeElement($procesosJuridico);
    }

    /**
     * Get procesosJuridicos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProcesosJuridicos()
    {
        return $this->procesosJuridicos;
    }

    /**
     * Add proteccionSeguridade
     *
     * @param \AppModelBundle\Entity\ProteccionSeguridad $proteccionSeguridade
     *
     * @return Usuario
     */
    public function addProteccionSeguridade(\AppModelBundle\Entity\ProteccionSeguridad $proteccionSeguridade)
    {
        $this->proteccionSeguridades[] = $proteccionSeguridade;

        return $this;
    }

    /**
     * Remove proteccionSeguridade
     *
     * @param \AppModelBundle\Entity\ProteccionSeguridad $proteccionSeguridade
     */
    public function removeProteccionSeguridade(\AppModelBundle\Entity\ProteccionSeguridad $proteccionSeguridade)
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
     * Add nivelEducativo
     *
     * @param \AppModelBundle\Entity\NivelEducativoUsuario $nivelEducativo
     *
     * @return Usuario
     */
    public function addNivelEducativo(\AppModelBundle\Entity\NivelEducativoUsuario $nivelEducativo)
    {
        $this->nivelEducativos[] = $nivelEducativo;

        return $this;
    }

    /**
     * Remove nivelEducativo
     *
     * @param \AppModelBundle\Entity\NivelEducativoUsuario $nivelEducativo
     */
    public function removeNivelEducativo(\AppModelBundle\Entity\NivelEducativoUsuario $nivelEducativo)
    {
        $this->nivelEducativos->removeElement($nivelEducativo);
    }

    /**
     * Get nivelEducativos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNivelEducativos()
    {
        return $this->nivelEducativos;
    }

    /**
     * Set tipoUsuario
     *
     * @param \AppModelBundle\Entity\TipoUsuario $tipoUsuario
     *
     * @return Usuario
     */
    public function setTipoUsuario(\AppModelBundle\Entity\TipoUsuario $tipoUsuario)
    {
        $this->tipoUsuario = $tipoUsuario;

        return $this;
    }

    /**
     * Get tipoUsuario
     *
     * @return \AppModelBundle\Entity\TipoUsuario
     */
    public function getTipoUsuario()
    {
        return $this->tipoUsuario;
    }
}
