<?php

namespace Brooter\AdminBundle\Entity;

use Brooter\PropertyBundle\Entity\PostProperty;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Availability
 *
 * @ORM\Table(name="availability")
 * @ORM\Entity(repositoryClass="Brooter\AdminBundle\Repository\AvailabilityRepository")
 */
class Availability
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
     * @ORM\Column(name="AvailabilityType", type="string", length=255)
     */
    private $availabilityType;


    /**
     * @ORM\OneToMany(targetEntity="Brooter\PropertyBundle\Entity\PostProperty", mappedBy="availability",cascade={"persist"})
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
     * Set availabilityType
     *
     * @param string $availabilityType
     *
     * @return Availability
     */
    public function setAvailabilityType($availabilityType)
    {
        $this->availabilityType = $availabilityType;

        return $this;
    }

    /**
     * Get availabilityType
     *
     * @return string
     */
    public function getAvailabilityType()
    {
        return $this->availabilityType;
    }

    public function __toString()
    {

        return $this->availabilityType;
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
        $postProperty->addAvailability($this);
        $this->postProperty->add($postProperty);
    }
    public function removePostProperty(PostProperty $postProperty)
    {
        $this->postProperty->removeElement($postProperty);
        
    }
}

