<?php

namespace Brooter\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * WaterSource
 *
 * @ORM\Table(name="water_source")
 * @ORM\Entity(repositoryClass="Brooter\AdminBundle\Repository\WaterSourceRepository")
 */
class WaterSource
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
     * @ORM\Column(name="WaterSourceType", type="string", length=255)
     */
    private $waterSourceType;


    /**
     * @ORM\ManyToMany(targetEntity="Brooter\PropertyBundle\Entity\PostProperty", mappedBy="waterSource")
     */
    private $postProperty;


    public function _construct()
    {
        $this->postProperty=new \Doctrine\Common\Collections\ArrayCollection();
    }


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
     * Set waterSourceType
     *
     * @param string $waterSourceType
     *
     * @return WaterSource
     */
    public function setWaterSourceType($waterSourceType)
    {
        $this->waterSourceType = $waterSourceType;

        return $this;
    }

    /**
     * Get waterSourceType
     *
     * @return string
     */
    public function getWaterSourceType()
    {
        return $this->waterSourceType;
    }
}

