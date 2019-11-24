<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdmiPais
 *
 * @ORM\Table(name="ADMI_PAIS")
 * @ORM\Entity(repositoryClass="App\Repository\PaisRepository")
 */
class AdmiPais
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_PAIS", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="PAIS_NOMBRE", type="string", length=52)
     */
    private $PAIS_NOMBRE;

    /**
     * @var string
     *
     * @ORM\Column(name="ESTADO", type="string", length=50)
     */
    private $ESTADO;


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
     * Set PAIS_NOMBRE
     *
     * @param string $PAIS_NOMBRE
     *
     * @return AdmiPais
     */
    public function setPAIS_NOMBRE($PAIS_NOMBRE)
    {
        $this->PAIS_NOMBRE = $PAIS_NOMBRE;

        return $this;
    }

    /**
     * Get PAIS_NOMBRE
     *
     * @return string
     */
    public function getPAIS_NOMBRE()
    {
        return $this->PAIS_NOMBRE;
    }

    /**
     * Set ESTADO
     *
     * @param string $ESTADO
     *
     * @return AdmiPais
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
}
