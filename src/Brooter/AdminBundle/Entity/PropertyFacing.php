<?php

namespace Brooter\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PropertyFacing
 *
 * @ORM\Table(name="property_facing")
 * @ORM\Entity(repositoryClass="Brooter\AdminBundle\Repository\PropertyFacingRepository")
 */
class PropertyFacing
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
     * @ORM\Column(name="FacingType", type="string", length=255)
     */
    private $facingType;

    /**
     * @ORM\OneToMany(targetEntity="Brooter\PropertyBundle\Entity\PostProperty", mappedBy="postProperty")
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
     * Set facingType
     *
     * @param string $facingType
     *
     * @return PropertyFacing
     */
    public function setFacingType($facingType)
    {
        $this->facingType = $facingType;

        return $this;
    }

    /**
     * Get facingType
     *
     * @return string
     */
    public function getFacingType()
    {
        return $this->facingType;
    }

    public function __toString()
    {
        return $this->facingType;
    }
}

