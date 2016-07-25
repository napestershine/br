<?php

namespace Brooter\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PropertyAreaCategory
 *
 * @ORM\Table(name="property_area_category")
 * @ORM\Entity(repositoryClass="Brooter\AdminBundle\Repository\PropertyAreaCategoryRepository")
 */
class PropertyAreaCategory
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
     * @ORM\Column(name="PropAreaCategoryName", type="string", length=255)
     */
    private $propAreaCategoryName;


    /**
     * @ORM\OneToMany(targetEntity="Area", mappedBy="propAreaCategoryName")
     */
    private $area;


    public function _construct()
    {
        $this->area=new \Doctrine\Common\Collections\ArrayCollection();

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
     * Set propAreaCategoryName
     *
     * @param string $propAreaCategoryName
     *
     * @return PropertyAreaCategory
     */
    public function setPropAreaCategoryName($propAreaCategoryName)
    {
        $this->propAreaCategoryName = $propAreaCategoryName;

        return $this;
    }

    /**
     * Get propAreaCategoryName
     *
     * @return string
     */
    public function getPropAreaCategoryName()
    {
        return $this->propAreaCategoryName;
    }

    public function __toString()
    {
        return $this->propAreaCategoryName;
    }
    /**
     * @return mixed
     */
    public function getArea()
    {
        return $this->area;
    }
}

