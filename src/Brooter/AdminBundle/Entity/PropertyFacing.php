<?php

namespace Brooter\AdminBundle\Entity;

use Brooter\PropertyBundle\Entity\PostProperty;
use Doctrine\Common\Collections\ArrayCollection;
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
     * @ORM\OneToMany(targetEntity="Brooter\PropertyBundle\Entity\PostProperty", mappedBy="postProperty", cascade={"persist"})
      */
    private $postProperty;

    public function __construct()
    {
        $this->postProperty=new ArrayCollection();
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

    /**
     * @return mixed
     */
    public function getPostProperty()
    {
        return $this->postProperty;
    }
    public function addPostProperty(PostProperty $postProperty)
    {
        $postProperty->addPropertyFacing($this);
        $this->postProperty->add($postProperty);
    }
    public function removePostProperty(PostProperty $postProperty)
    {
        $this->postProperty->removeElement($postProperty);
    }
}

