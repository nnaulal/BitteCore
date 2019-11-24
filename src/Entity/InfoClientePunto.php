<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InfoClientePunto
 *
 * @ORM\Table(name="INFO_CLIENTE_PUNTO")
 * @ORM\Entity(repositoryClass="App\Repository\InfoClientePuntoRepository")
 */
class InfoClientePunto
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_CLIENTE_PUNTO", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
    * @var InfoCliente
    *
    * @ORM\ManyToOne(targetEntity="InfoCliente")
    * @ORM\JoinColumns({
    * @ORM\JoinColumn(name="CLIENTE_ID", referencedColumnName="ID_CLIENTE")
    * })
    */
    private $CLIENTE_ID;

    /**
    * @var InfoRestaurante
    *
    * @ORM\ManyToOne(targetEntity="InfoRestaurante")
    * @ORM\JoinColumns({
    * @ORM\JoinColumn(name="RESTAURANTE_ID", referencedColumnName="ID_RESTAURANTE")
    * })
    */
    private $RESTAURANTE_ID;

    /**
     * @var int
     *
     * @ORM\Column(name="CANTIDAD_PUNTOS", type="integer")
     */
    private $CANTIDADPUNTOS;

    /**
     * @var string
     *
     * @ORM\Column(name="ESTADO", type="string", length=100)
     */
    private $ESTADO;

    /**
     * @var string
     *
     * @ORM\Column(name="USR_CREACION", type="string", length=255)
     */
    private $USRCREACION;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="FE_CREACION", type="date")
     */
    private $FECREACION;

    /**
     * @var string
     *
     * @ORM\Column(name="USR_MODIFICACION", type="string", length=255, nullable=true)
     */
    private $USRMODIFICACION;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="FE_MODIFICACION", type="date", nullable=true)
     */
    private $FEMODIFICACION;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set CANTIDADPUNTOS
     *
     * @param integer $CANTIDADPUNTOS
     *
     * @return InfoClientePunto
     */
    public function setCANTIDADPUNTOS($CANTIDADPUNTOS)
    {
        $this->CANTIDADPUNTOS = $CANTIDADPUNTOS;

        return $this;
    }

    /**
     * Get CANTIDADPUNTOS
     *
     * @return int
     */
    public function getCANTIDADPUNTOS()
    {
        return $this->CANTIDADPUNTOS;
    }

    /**
     * Set ESTADO
     *
     * @param string $ESTADO
     *
     * @return InfoClientePunto
     */
    public function setESTADO($ESTADO)
    {
        $this->ESTADO = $ESTADO;

        return $this;
    }

    /**
     * Get ESTADO
     *
     * @return string
     */
    public function getESTADO()
    {
        return $this->ESTADO;
    }

    /**
     * Set USRCREACION
     *
     * @param string $USRCREACION
     *
     * @return InfoClientePunto
     */
    public function setUSRCREACION($USRCREACION)
    {
        $this->USRCREACION = $USRCREACION;

        return $this;
    }

    /**
     * Get USRCREACION
     *
     * @return string
     */
    public function getUSRCREACION()
    {
        return $this->USRCREACION;
    }

    /**
     * Set FECREACION
     *
     * @param \DateTime $FECREACION
     *
     * @return InfoClientePunto
     */
    public function setFECREACION($FECREACION)
    {
        $this->FECREACION = $FECREACION;

        return $this;
    }

    /**
     * Get FECREACION
     *
     * @return \DateTime
     */
    public function getFECREACION()
    {
        return $this->FECREACION;
    }

    /**
     * Set USRMODIFICACION
     *
     * @param string $USRMODIFICACION
     *
     * @return InfoClientePunto
     */
    public function setUSRMODIFICACION($USRMODIFICACION)
    {
        $this->USRMODIFICACION = $USRMODIFICACION;

        return $this;
    }

    /**
     * Get USRMODIFICACION
     *
     * @return string
     */
    public function getUSRMODIFICACION()
    {
        return $this->USRMODIFICACION;
    }

    /**
     * Set FEMODIFICACION
     *
     * @param \DateTime $FEMODIFICACION
     *
     * @return InfoClientePunto
     */
    public function setFEMODIFICACION($FEMODIFICACION)
    {
        $this->FEMODIFICACION = $FEMODIFICACION;

        return $this;
    }

    /**
     * Get FEMODIFICACION
     *
     * @return \DateTime
     */
    public function getFEMODIFICACION()
    {
        return $this->FEMODIFICACION;
    }

    /**
     * Set CLIENTEID
     *
     * @param \AppBundle\Entity\InfoCliente $CLIENTEID
     *
     * @return InfoClientePunto
     */
    public function setCLIENTEID(\AppBundle\Entity\InfoCliente $CLIENTEID = null)
    {
        $this->CLIENTE_ID = $CLIENTEID;

        return $this;
    }

    /**
     * Get CLIENTEID
     *
     * @return \AppBundle\Entity\InfoCliente
     */
    public function getCLIENTEID()
    {
        return $this->CLIENTE_ID;
    }


    /**
     * Set RESTAURANTEID
     *
     * @param \AppBundle\Entity\InfoRestaurante $RESTAURANTEID
     *
     * @return InfoClientePunto
     */
    public function setRESTAURANTEID(\AppBundle\Entity\InfoRestaurante $RESTAURANTEID = null)
    {
        $this->RESTAURANTE_ID = $RESTAURANTEID;

        return $this;
    }

    /**
     * Get RESTAURANTEID
     *
     * @return \AppBundle\Entity\InfoRestaurante
     */
    public function getRESTAURANTEID()
    {
        return $this->RESTAURANTE_ID;
    }
}
