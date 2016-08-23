<?php

namespace Brooter\AdvertisementBundle\Entity;

use Brooter\AdminBundle\Entity\AdvertisementPackage;
use Doctrine\ORM\Mapping as ORM;

/**
 * AdverUser
 *
 * @ORM\Table(name="adver_user")
 * @ORM\Entity(repositoryClass="Brooter\AdvertisementBundle\Repository\AdverUserRepository")
 */
class AdverUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    private $user;

    private $adpack;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="startdate", type="date")
     */
    private $startdate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="enddate", type="date")
     */
    private $enddate;

    /**
     * @var bool
     *
     * @ORM\Column(name="adverstatus", type="boolean")
     */
    private $adverstatus;

    /**
     * @var int
     *
     * @ORM\Column(name="totalcreditused", type="integer")
     */
    private $totalcreditused;

    /**
     * @var int
     *
     * @ORM\Column(name="totalremainingcredit", type="integer")
     */
    private $totalremainingcredit;


    public function __construct($user, AdvertisementPackage $advertisementPackage = null)
    {
        $this->user=$user;
        if($advertisementPackage)
        {
            $adpack=$advertisementPackage;
        }
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
     * Set startdate
     *
     * @param \DateTime $startdate
     *
     * @return AdverUser
     */
    public function setStartdate($startdate)
    {
        $this->startdate = $startdate;

        return $this;
    }

    /**
     * Get startdate
     *
     * @return \DateTime
     */
    public function getStartdate()
    {
        return $this->startdate;
    }

    /**
     * Set enddate
     *
     * @param \DateTime $enddate
     *
     * @return AdverUser
     */
    public function setEnddate($enddate)
    {
        $this->enddate = $enddate;

        return $this;
    }

    /**
     * Get enddate
     *
     * @return \DateTime
     */
    public function getEnddate()
    {
        return $this->enddate;
    }

    /**
     * Set adverstatus
     *
     * @param boolean $adverstatus
     *
     * @return AdverUser
     */
    public function setAdverstatus($adverstatus)
    {
        $this->adverstatus = $adverstatus;

        return $this;
    }

    /**
     * Get adverstatus
     *
     * @return bool
     */
    public function getAdverstatus()
    {
        return $this->adverstatus;
    }

    /**
     * Set totalcreditused
     *
     * @param integer $totalcreditused
     *
     * @return AdverUser
     */
    public function setTotalcreditused($totalcreditused)
    {
        $this->totalcreditused = $totalcreditused;

        return $this;
    }

    /**
     * Get totalcreditused
     *
     * @return int
     */
    public function getTotalcreditused()
    {
        return $this->totalcreditused;
    }

    /**
     * Set totalremainingcredit
     *
     * @param integer $totalremainingcredit
     *
     * @return AdverUser
     */
    public function setTotalremainingcredit($totalremainingcredit)
    {
        $this->totalremainingcredit = $totalremainingcredit;

        return $this;
    }

    /**
     * Get totalremainingcredit
     *
     * @return int
     */
    public function getTotalremainingcredit()
    {
        return $this->totalremainingcredit;
    }

    /**
     * @return mixed
     */
    public function getAdpack()
    {
        return $this->adpack;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $adpack
     */
    public function setAdpack($adpack)
    {
        $this->adpack = $adpack;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }
}

