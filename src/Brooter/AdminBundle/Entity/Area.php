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
     * @ORM\ManyToOne(targetEntity="Brooter\AdminBundle\Entity\PropertyAreaCategory", inversedBy="area" )
     * @ORM\JoinColumn(name="PropertyAreaCategory_id", referencedColumnName="id")
     */
    private $propAreaCategoryName;


    /**
     * @var float
     *
     * @ORM\Column(name="CalculatedArea", type="float")
     */
    private $calculatedArea;



    /**
     * @ORM\OneToOne(targetEntity="Brooter\PropertyBundle\Entity\PostProperty", mappedBy="area", cascade={"persist"})
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



    /**
     * @return mixed
     */
    public function getPostProperty()
    {
        return $this->postProperty;
    }

    /**
     * @param mixed $postProperty
     */
    public function setPostProperty($postProperty)
    {
        $this->postProperty = $postProperty;
    }
    /**
     * @return mixed
     */
    public function getPropAreaCategoryName()
    {
        return $this->propAreaCategoryName;
    }


    public function setPropAreaCategoryName($propAreaCategoryName)
    {
        $this->propAreaCategoryName = $propAreaCategoryName;
    }

    public function __toString()
    {
        return $this->propAreaCategoryName;
    }
}

