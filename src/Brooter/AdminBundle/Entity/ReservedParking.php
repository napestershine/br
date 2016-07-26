<?php

namespace Brooter\AdminBundle\Entity;

use Brooter\AdminBundle\Repository\PostRepository;
use Brooter\PropertyBundle\Entity\PostProperty;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * ReservedParking
 *
 * @ORM\Table(name="reserved_parking")
 * @ORM\Entity(repositoryClass="Brooter\AdminBundle\Repository\ReservedParkingRepository")
 */
class ReservedParking
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
     * @ORM\Column(name="ReservedParkingType", type="string", length=255)
     */
    private $reservedParkingType;


    /**
     * @ORM\OneToMany(targetEntity="Brooter\PropertyBundle\Entity\PostProperty", mappedBy="reservedParking",cascade={"persist"})
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
     * Set reservedParkingType
     *
     * @param string $reservedParkingType
     *
     * @return ReservedParking
     */
    public function setReservedParkingType($reservedParkingType)
    {
        $this->reservedParkingType = $reservedParkingType;

        return $this;
    }

    /**
     * Get reservedParkingType
     *
     * @return string
     */
    public function getReservedParkingType()
    {
        return $this->reservedParkingType;
    }

    public function __toString()
    {
        return $this->reservedParkingType;
    }

    public function addPostProperty(PostProperty $postProperty)
    {
        $postProperty->addReservedParking($this);
        $this->postProperty->add($postProperty);
    }
    public function removePostProperty(PostProperty $postProperty)
    {
        $this->postProperty->removeElement($postProperty);
    }

    /**
     * @return mixed
     */
    public function getPostProperty()
    {
        return $this->postProperty;
    }
}

