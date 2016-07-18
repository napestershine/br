<?php

namespace Brooter\AdminBundle\Entity;

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
     * @ORM\OneToMany(targetEntity="Brooter\PropertyBundle\Entity\PostProperty", mappedBy="reservedParking")
     */
    private $postProperty;

    public function _construct()
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
}

