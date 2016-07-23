<?php

namespace Brooter\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Area
 *
 * @ORM\Table(name="area")
 * @ORM\Entity(repositoryClass="Brooter\AdminBundle\Repository\AreaRepository")
 */
class Area
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="AreaType", type="string", length=255)
     */
    private $areaType;

    /**
     * @var float
     *
     * @ORM\Column(name="CalculatedArea", type="float")
     */
    private $calculatedArea;

    /**
     * @ORM\OneToOne(targetEntity="AreaIn", mappedBy="area")
     */
    private $areaIn;


    /**
     * @ORM\OneToOne(targetEntity="Brooter\PropertyBundle\Entity\PostProperty", mappedBy="area")
     */
    private $postProperty;

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
     * Set areaType
     *
     * @param string $areaType
     *
     * @return Area
     */
    public function setAreaType($areaType)
    {
        $this->areaType = $areaType;

        return $this;
    }

    /**
     * Get areaType
     *
     * @return string
     */
    public function getAreaType()
    {
        return $this->areaType;
    }

    /**
     * Set calculatedArea
     *
     * @param float $calculatedArea
     *
     * @return Area
     */
    public function setCalculatedArea($calculatedArea)
    {
        $this->calculatedArea = $calculatedArea;

        return $this;
    }

    /**
     * Get calculatedArea
     *
     * @return float
     */
    public function getCalculatedArea()
    {
        return $this->calculatedArea;
    }
}

