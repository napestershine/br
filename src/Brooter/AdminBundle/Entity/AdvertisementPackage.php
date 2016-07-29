<?php

namespace Brooter\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdvertisementPackage
 *
 * @ORM\Table(name="advertisement_package")
 * @ORM\Entity(repositoryClass="Brooter\AdminBundle\Repository\AdvertisementPackageRepository")
 */
class AdvertisementPackage
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
     * @ORM\Column(name="adname", type="string", length=255)
     */
    private $adname;

    /**
     * @var float
     *
     * @ORM\Column(name="cost", type="float")
     */
    private $cost;

    /**
     * @var int
     *
     * @ORM\Column(name="totalcreditperyear", type="integer")
     */
    private $totalcreditperyear;

    /**
     * @var bool
     *
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;


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
     * Set adname
     *
     * @param string $adname
     *
     * @return AdvertisementPackage
     */
    public function setAdname($adname)
    {
        $this->adname = $adname;

        return $this;
    }

    /**
     * Get adname
     *
     * @return string
     */
    public function getAdname()
    {
        return $this->adname;
    }

    /**
     * Set cost
     *
     * @param float $cost
     *
     * @return AdvertisementPackage
     */
    public function setCost($cost)
    {
        $this->cost = $cost;

        return $this;
    }

    /**
     * Get cost
     *
     * @return float
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * Set totalcreditperyear
     *
     * @param integer $totalcreditperyear
     *
     * @return AdvertisementPackage
     */
    public function setTotalcreditperyear($totalcreditperyear)
    {
        $this->totalcreditperyear = $totalcreditperyear;

        return $this;
    }

    /**
     * Get totalcreditperyear
     *
     * @return int
     */
    public function getTotalcreditperyear()
    {
        return $this->totalcreditperyear;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return AdvertisementPackage
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }



    /**
     * Get active
     *
     * @return bool
     */
    public function getActive()
    {
        return $this->active;
    }

    public function __toString()
    {
        return $this->adname;
        // TODO: Implement __toString() method.
    }
}

