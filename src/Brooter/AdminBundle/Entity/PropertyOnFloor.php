<?php

namespace Brooter\AdminBundle\Entity;

use Brooter\PropertyBundle\Entity\PostProperty;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * PropertyOnFloor
 *
 * @ORM\Table(name="property_on_floor")
 * @ORM\Entity(repositoryClass="Brooter\AdminBundle\Repository\PropertyOnFloorRepository")
 */
class PropertyOnFloor
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
     * @ORM\Column(name="PropFloor", type="string", length=255)
     */
    private $propFloor;


    /**
     * @ORM\OneToMany(targetEntity="Brooter\PropertyBundle\Entity\PostProperty", mappedBy="propOnFloor",cascade={"persist"})
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
     * Set propFloor
     *
     * @param string $propFloor
     *
     * @return PropertyOnFloor
     */
    public function setPropFloor($propFloor)
    {
        $this->propFloor = $propFloor;

        return $this;
    }

    /**
     * Get propFloor
     *
     * @return string
     */
    public function getPropFloor()
    {
        return $this->propFloor;
    }

    public function __toString()
    {
        return $this->propFloor;
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
        $postProperty->addPropertyOnFloor($this);
        $this->postProperty->add($postProperty);
    }
    public function removePostProperty(PostProperty $postProperty)
    {
        $this->postProperty->removeElement($postProperty);
    }
    
}

