<?php

namespace Brooter\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Address
 *
 * @ORM\Table(name="address")
 * @ORM\Entity(repositoryClass="Brooter\AdminBundle\Repository\AddressRepository")
 */
class Address
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
     * @ORM\Column(name="Locality", type="string", length=255)
     */
    private $locality;

    /**
     * @var string
     *
     * @ORM\Column(name="NearLandmark", type="string", length=255)
     */
    private $nearLandmark;

    /**
     * @var string
     *
     * @ORM\Column(name="PropAddress", type="string", length=255)
     */
    private $propAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="City", type="string", length=255)
     */
    private $city;


    /**
     * @ORM\OneToOne(targetEntity="Brooter\PropertyBundle\Entity\PostProperty", mappedBy="address")
     * @ORM\JoinColumn(name="PostProp_id", referencedColumnName="id")
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
     * Set locality
     *
     * @param string $locality
     *
     * @return Address
     */
    public function setLocality($locality)
    {
        $this->locality = $locality;

        return $this;
    }

    /**
     * Get locality
     *
     * @return string
     */
    public function getLocality()
    {
        return $this->locality;
    }

    /**
     * Set nearLandmark
     *
     * @param string $nearLandmark
     *
     * @return Address
     */
    public function setNearLandmark($nearLandmark)
    {
        $this->nearLandmark = $nearLandmark;

        return $this;
    }

    /**
     * Get nearLandmark
     *
     * @return string
     */
    public function getNearLandmark()
    {
        return $this->nearLandmark;
    }

    /**
     * Set propAddress
     *
     * @param string $propAddress
     *
     * @return Address
     */
    public function setPropAddress($propAddress)
    {
        $this->propAddress = $propAddress;

        return $this;
    }

    /**
     * Get propAddress
     *
     * @return string
     */
    public function getPropAddress()
    {
        return $this->propAddress;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return Address
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }
}

