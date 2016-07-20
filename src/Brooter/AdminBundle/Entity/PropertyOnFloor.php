<?php

namespace Brooter\AdminBundle\Entity;

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
     * @ORM\OneToMany(targetEntity="Brooter\PropertyBundle\Entity\PostProperty", mappedBy="propOnFloor")
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
}

