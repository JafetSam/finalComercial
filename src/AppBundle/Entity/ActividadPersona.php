<?php

namespace AppBundle\Entity;

/**
 * ActividadPersona
 */
class ActividadPersona
{
    /**
     * @var integer
     */
    private $idActPer;

    /**
     * @var \DateTime
     */
    private $fecha;

    /**
     * @var \AppBundle\Entity\Persona
     */
    private $idPersona;

    /**
     * @var \AppBundle\Entity\Actividad
     */
    private $idActividad;


    /**
     * Get idActPer
     *
     * @return integer
     */
    public function getIdActPer()
    {
        return $this->idActPer;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return ActividadPersona
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set idPersona
     *
     * @param \AppBundle\Entity\Persona $idPersona
     *
     * @return ActividadPersona
     */
    public function setIdPersona(\AppBundle\Entity\Persona $idPersona = null)
    {
        $this->idPersona = $idPersona;

        return $this;
    }

    /**
     * Get idPersona
     *
     * @return \AppBundle\Entity\Persona
     */
    public function getIdPersona()
    {
        return $this->idPersona;
    }

    /**
     * Set idActividad
     *
     * @param \AppBundle\Entity\Actividad $idActividad
     *
     * @return ActividadPersona
     */
    public function setIdActividad(\AppBundle\Entity\Actividad $idActividad = null)
    {
        $this->idActividad = $idActividad;

        return $this;
    }

    /**
     * Get idActividad
     *
     * @return \AppBundle\Entity\Actividad
     */
    public function getIdActividad()
    {
        return $this->idActividad;
    }
}

